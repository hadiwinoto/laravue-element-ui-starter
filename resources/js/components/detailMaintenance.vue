<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <el-card class="box-card">
          <div slot="header" class="clearfix">
            <span>Detail Data</span>
            <el-button
              style="float: right; padding: 3px 0"
              @click="showModal = true"
              type="text"
              ><i class="el-icon-edit"></i> Edit</el-button
            >
          </div>
          <vue-element-loading :active="show" spinner="bar-fade-scale" />
          <table class="table table-borderless table-condensed table-hover">
            <thead>
              <tr>
                <th class="text-center" width="10%"></th>
                <th class="text-center" width="5%"></th>
                <th class="text-center" width="15%"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td width="10%">Nomor Perbaikan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.nomor_perbaikan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Jenis Perbaikan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.jenis_perbaikan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Detail Perbaikan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.detail_perbaikan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Tempat Perbaikan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.tempat_perbaikan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Detail Lokasi</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.detail_lokasi }}
                </td>
              </tr>
              <tr>
                <td width="10%">Model Perbaikan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.model_perbaikan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Nomor Polisi</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.nomor_polisi }}
                </td>
              </tr>
              <tr>
                <td width="10%">Nama Supir</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.nama_supir }}
                </td>
              </tr>
              <tr>
                <td width="10%">Nama Montir</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.nama_montir }}
                </td>
              </tr>
              <tr>
                <td width="10%">Keterangan</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.keterangan }}
                </td>
              </tr>
              <tr>
                <td width="10%">Biaya</td>
                <td width="5%">:</td>
                <td>
                  <span class="text-danger">{{
                    formatnumberindo("Rp. " + maintenance.biaya)
                  }}</span>
                </td>
              </tr>
              <tr>
                <td width="10%">Tanggal Selesai</td>
                <td width="5%">:</td>
                <td>
                  {{ maintenance.tanggal_selesai }}
                </td>
              </tr>
            </tbody>
          </table>
        </el-card>

        <Modal
          :based-on="showModal"
          title="Edit Data"
          @close="showModal = false"
        >
          <div class="row">
            <form @submit.prevent="onSubmit">
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Perbaikan</label>
                <div class="col-sm-8">
                  <DatePicker
                    v-model="maintenance.tanggal_perbaikan"
                    style="width: 100%"
                  ></DatePicker>
                  <!-- <input  type="text" class="form-control"/> -->
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Jenis Perbaikan</label>
                <div class="col-sm-8">
                  <v-select
                    :options="optionsjenis"
                    v-model="maintenance.jenis_perbaikan"
                    label="name"
                    type="text"
                  ></v-select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Detail Perbaikan</label>
                <div class="col-sm-8">
                  <textarea
                    type="text"
                    class="form-control"
                    v-model="maintenance.detail_perbaikan"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tempat Perbaikan</label>
                <div class="col-sm-8">
                  <v-select
                    :options="optionstempat"
                    label="name"
                    v-model="maintenance.tempat_perbaikan"
                    type="text"
                  ></v-select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Detail Lokasi</label>
                <div class="col-sm-8">
                  <textarea
                    type="text"
                    class="form-control"
                    v-model="maintenance.detail_lokasi"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Model Perbaikan</label>
                <div class="col-sm-8">
                  <v-select
                    :options="optionsmodelperbaikan"
                    type="text"
                    v-model="maintenance.model_perbaikan"
                  ></v-select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nomor Polisi</label>
                <div class="col-sm-8">
                  <v-select
                    type="text"
                    :options="optionskendaraan"
                    v-model="maintenance.nomor_polisi"
                    label="no_polisi"
                  ></v-select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nama Supir</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    v-model="maintenance.nama_supir"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nama Montir</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    v-model="maintenance.nama_montir"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Keterangan</label>
                <div class="col-sm-8">
                  <textarea
                    type="text"
                    rows="3"
                    v-model="maintenance.keterangan"
                    class="form-control"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Biaya</label>
                <div class="col-sm-8">
                  <input
                    type="number"
                    v-model="maintenance.biaya"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-8">
                  <DatePicker
                    v-model="maintenance.tanggal_selesai"
                    style="width: 100%"
                  ></DatePicker>
                  <!-- <input  type="text" class="form-control"/> -->
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <!-- <el-button type="submit" size="small">Submit</el-button> -->
                  <button
                    type="submit"
                    :disabled="buttondisabled"
                    class="btn btn-primary"
                  >
                    <span
                      :class="buttonloading"
                      role="status"
                      aria-hidden="true"
                    ></span
                    >Submit
                  </button>
                </div>
              </div>
            </form>
          </div>
        </Modal>
      </div>
    </div>
  </div>
</template>

<script>
import moment from "moment";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  components: {
    DatePicker,
  },
  data() {
    return {
      id: null,
      showModal: false,
      buttonloading: "",
      buttondisabled: false,
      showModal: false,
      show: true,
      optionsjenis: [],
      optionstempat: [],
      optionsmodelperbaikan: [],
      optionskendaraan: [],
      maintenance: {
        jenis_perbaikan: "",
        tanggal_perbaikan: "",
        biaya: null,
        nomor_polisi: "",
      },
    };
  },
  created() {
    this.id = window.location.href.split("/").pop();
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.$http
        .get("/maintenance/data/getbyid", {
          params: {
            id: this.id,
          },
        })
        .then((response) => {
          this.maintenance = response.data.data;
          this.optionsjenis = response.data.jenis_perbaikan;
          this.optionstempat = response.data.master_tempat_perbaikan;
          this.optionsmodelperbaikan = response.data.modelperbaikan;
          this.optionskendaraan = response.data.masterkendaraan;
          this.show = false;
        })
        .catch((error) => {});
    },
    onSubmit() {
      let data = {
        id: this.id,
        form: this.maintenance,
      };
      this.buttonloading = "spinner-border spinner-border-sm";
      this.buttondisabled = true;
      setTimeout(() => {
        this.$http
          .post("/maintenance/data/editdata", data)
          .then((Response) => {
            this.$awn.success("Sukses Submit Data");
            this.fetchData();
            this.showModal = false;
            this.buttonloading = "";
            this.buttondisabled = false;
          })
          .catch((error) => {
            this.$awn.alert("Gagal Submit Data");
            this.showModal = false;
            this.buttonloading = "";
            this.buttondisabled = false;
          });
      }, 500);
    },
    formatnumberindo(num) {
      if (typeof num === "undefined" || num === null) {
        // Do stuff
      } else {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
      }
    },
    formattglindo(value) {
      return moment(value).locale("id").format("LL");
    },
  },
};
</script>
