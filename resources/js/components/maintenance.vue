<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <el-card class="box-card">
          <div slot="header">
            <span>History Maintenance</span>
            <div style="float: right">
              <el-button type="success" size="small" class="ml-3">
                <el-link href="/download/template"  style="color: white; text-decoration: none">
                  Template
                </el-link>
              </el-button>
              <el-button
                type="primary"
                size="small"
                class="ml-3"
                @click="showModal = true"
              >
                <el-link style="color: white; text-decoration: none">
                  Create
                </el-link>
              </el-button>
              <el-button
                type="warning"
                size="small"
                @click="showModalMassal = true"
              >
                <i class="el-icon-upload"></i>Input Massal
              </el-button>
            </div>
          </div>
          <vue-element-loading :active="show" spinner="bar-fade-scale" />
          <div class="table-responsive-md">
            <div class="col-md-12">
              <div class="row mb-3">
                <div class="col">
                  <label>Tanggal Perbaikan</label>
                  <DatePicker v-model="filter.tanggalstart"></DatePicker>
                </div>
                <div class="col">
                  <label>Tanggal Selesai</label>
                  <DatePicker v-model="filter.tanggalend"></DatePicker>
                </div>
                <div class="col">
                  <label>Jenis</label>
                  <v-select
                    :options="optionsjenis"
                    @input="onChangeJenis($event)"
                    v-model="filter.jenis_perbaikan"
                    type="text"
                  ></v-select>
                </div>
                <div class="col">
                  <label>Tempat</label>
                  <v-select
                    :options="optionstempat"
                    @input="onChangeTempat($event)"
                    v-model="filter.tempat_perbaikan"
                    type="text"
                  ></v-select>
                </div>
                <div class="col">
                  <label>Model</label>
                  <v-select
                    :options="optionsmodelperbaikan"
                    @input="onChangeModel($event)"
                    v-model="filter.model_perbaikan"
                    type="text"
                  ></v-select>
                </div>
                <div class="col">
                  <label>Nomor Polisi</label>
                  <input
                    type="text"
                    @keyup.enter="fetchData"
                    class="form-control"
                    v-model="filter.nomor_polisi"
                    placeholder="Nomor Polisi"
                  />
                </div>
                <div class="col">
                  <label>Sopir</label>
                  <input
                    type="text"
                    @keyup.enter="fetchData"
                    class="form-control"
                    v-model="filter.sopir"
                    placeholder="Sopir"
                  />
                </div>
                <div class="col">
                  <button
                    class="btn btn-primary btn-sm mt-4"
                    placeholder="Sopir"
                  ><i class="el-icon-search text-white"></i>Cari</button>
                </div>
              </div>
            </div>

            <table class="table text-nowrap">
              <thead>
                <tr style="background-color: #f5f7fa">
                  <th width="10%" rowspan="2" class="text-left">
                    Nomor Perbaikan
                  </th>
                  <th width="13%" rowspan="2" class="text-center">Tanggal</th>
                  <th colspan="3" class="text-center">Perbaikan</th>
                  <th width="10%" rowspan="2" class="text-center">No. Pol</th>
                  <th width="15%" rowspan="2" class="text-center">Sopir</th>
                  <th width="15%" rowspan="2" class="text-center">Montir</th>
                  <th width="15%" rowspan="2" class="text-center">
                    Tanggal Selesai
                  </th>
                  <th width="20%" rowspan="2" class="text-center">Biaya</th>
                  <th width="20%" rowspan="2" class="text-center">
                    <i class="el-icon-setting"></i>
                  </th>
                </tr>
                <tr style="background-color: #f5f7fa">
                  <th class="text-center" width="15%">Jenis</th>
                  <th class="text-center" width="15%">Tempat</th>
                  <th class="text-center" width="15%">Model</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="(mtc, idxmtc) in maintenance.data" :key="idxmtc">
                  <td class="text-center">
                    <span>{{ mtc.nomor_perbaikan }}</span>
                  </td>
                  <td class="text-center">
                    <span class="text-primary">{{
                      mtc.tanggal_perbaikan
                    }}</span>
                  </td>
                  <td class="text-center">
                    {{ mtc.jenis_perbaikan }}
                  </td>
                  <td class="text-center">
                    {{ mtc.tempat_perbaikan }}
                  </td>
                  <td class="text-center">
                    {{ mtc.model_perbaikan }}
                  </td>
                  <td class="text-center">
                    {{ mtc.nomor_polisi }}
                  </td>
                  <td class="text-center">
                    {{ mtc.nama_supir }}
                  </td>
                  <td class="text-center">
                    {{ mtc.nama_montir }}
                  </td>
                  <td class="text-center">
                    <span class="text-success">{{ mtc.tanggal_selesai }}</span>
                  </td>
                  <td class="text-center">
                    <span class="text-danger">{{
                      formatnumberindo("Rp. " + mtc.biaya)
                    }}</span>
                  </td>
                  <td class="text-center">
                    <a :href="'/maintenance/' + mtc.id"
                      ><i class="el-icon-search text-primary"></i
                    ></a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- <nav aria-label="Page navigation example">
              <ul class="pagination">
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                    <span class="sr-only">Previous</span>
                  </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                    <span class="sr-only">Next</span>
                  </a>
                </li>
              </ul>
            </nav> -->
          <pagination
            :data="maintenance"
            @pagination-change-page="fetchData"
            :limit="3"
          ></pagination>
        </el-card>

        <Modal
          :based-on="showModal"
          title="Input Data"
          @close="showModal = false"
        >
          <div class="row">
            <form @submit.prevent="onSubmit">
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Perbaikan</label>
                <div class="col-sm-8">
                  <DatePicker
                    v-model="form.tanggal_perbaikan"
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
                    v-model="form.jenis_perbaikan"
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
                    v-model="form.detail_perbaikan"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tempat Perbaikan</label>
                <div class="col-sm-8">
                  <v-select
                    :options="optionstempat"
                    v-model="form.tempat_perbaikan"
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
                    v-model="form.detail_lokasi"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Model Perbaikan</label>
                <div class="col-sm-8">
                  <v-select
                    :options="optionsmodelperbaikan"
                    type="text"
                    v-model="form.model_perbaikan"
                  ></v-select>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nomor Polisi</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    v-model="form.no_polisi"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nama Supir</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    v-model="form.nama_supir"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Nama Montir</label>
                <div class="col-sm-8">
                  <input
                    type="text"
                    v-model="form.nama_montir"
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
                    v-model="form.keterangan"
                    class="form-control"
                  ></textarea>
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Biaya</label>
                <div class="col-sm-8">
                  <input
                    type="number"
                    v-model="form.biaya"
                    class="form-control"
                  />
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label">Tanggal Selesai</label>
                <div class="col-sm-8">
                  <DatePicker
                    v-model="form.tanggal_selesai"
                    style="width: 100%"
                  ></DatePicker>
                  <!-- <input  type="text" class="form-control"/> -->
                </div>
              </div>
              <div class="form-group row mb-3">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <button
                    type="submit"
                    :disabled="buttondisabled"
                    class="btn btn-primary"
                    size="small"
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

        <Modal
          :based-on="showModalMassal"
          title="Input Massal"
          @close="showModalMassal = false"
        >
        <form @submit.prevent="uploadFile">
          <div class="container">
            <div class="row justify-content-center">
              <input type="file" ref="fileInput" @change="onFileChange" class="form-control" />
            </div>
            <div class="row justify-content-center mt-3">
              <button
                type="submit"
                :disabled="buttondisabled"
                class="btn btn-primary"
                size="small"
              >
                <span
                  :class="buttonloading"
                  role="status"
                  aria-hidden="true"
                ></span>
                Upload
              </button>
            </div>
            <el-form-item>
              <button type="submit">Submit</button>
              <el-button>Cancel</el-button>
            </el-form-item>
          </div>
        </form>
         
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
      showModal: false,
      showModalMassal: false,
      labelPosition: "right",
      formLabelAlign: {
        name: "",
        region: "",
        type: "",
      },
      show: true,
      maintenance: [],
      optionsjenis: [],
      optionstempat: [],
      optionsmodelperbaikan: [],
      optionskendaraan: [],
      form: {},
      buttonloading: "",
      buttondisabled: false,
      meta: {
        current_page: 0,
        per_page: 0,
        total: "",
      },
      file: null,
      filter: {
        jenis_perbaikan: "",
        tempat_perbaikan: "",
        model_perbaikan: "",
        nomor_polisi: "",
        sopir: "",
        tanggalstart: "",
        tanggalend: "",
      },
    };
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData(page = 1) {
      this.$http
        .get("/maintenance/get/alldata?page=" + page, {
          params: {
            jenis_perbaikan: this.filter.jenis_perbaikan,
            tempat_perbaikan: this.filter.tempat_perbaikan,
            model_perbaikan: this.filter.model_perbaikan,
            nomor_polisi: this.filter.nomor_polisi,
            sopir: this.filter.sopir,
            tanggalstart: this.filter.tanggalstart,
            tanggalend: this.filter.tanggalend,
          },
        })
        .then((response) => {
          this.maintenance = response.data.data;
          this.optionsjenis = response.data.jenis_perbaikan;
          this.optionstempat = response.data.master_tempat_perbaikan;
          this.optionsmodelperbaikan = response.data.modelperbaikan;
          this.optionskendaraan = response.data.masterkendaraan;
          this.meta.current_page = response.data.data.current_page;
          this.meta.per_page = response.data.data.per_page;
          this.meta.total = response.data.data.total;
          this.show = false;
        })
        .catch((error) => {});
    },
    onSubmit() {
      let data = {
        form: this.form,
      };
      this.buttonloading = "spinner-border spinner-border-sm";
      this.buttondisabled = true;
      setTimeout(() => {
        this.$http
          .post("/maintenance/submit", data)
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
    onChangeJenis(event) {
      if (event === null) {
        this.filter.jenis_perbaikan = null;
      } else {
        this.filter.jenis_perbaikan = event;
      }
      this.fetchData();
    },
    onChangeTempat(event) {
      if (event === null) {
        this.filter.tempat_perbaikan = null;
      } else {
        this.filter.tempat_perbaikan = event;
      }
      this.fetchData();
    },
    onChangeModel(event) {
      if (event === null) {
        this.filter.model_perbaikan = null;
      } else {
        this.filter.model_perbaikan = event;
      }
      this.fetchData();
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
    onFileChange(event) {
            this.file = event.target.files[0];
    },
    uploadFile() {
        let formData = new FormData();
            formData.append('file', this.file);
            axios.post('/import/template', formData)
              .then(response => {
                this.$awn.success("Sukses Submit Data");
                this.showModalMassal = false;
                this.buttonloading = "";
                this.buttondisabled = false;
            })
            .catch(error => {
               this.$awn.error("Gagal Import Data!");
            });
    }
  },
};
</script>
