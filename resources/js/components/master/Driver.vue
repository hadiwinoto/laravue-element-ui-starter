<template>
    <div class="container">
        <div class="row">
            <SideMenu></SideMenu>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <span><b>Driver</b></span>
                        <el-button
                            class="mb-2"
                            style="float: right"
                            size="small"
                            type="primary"
                            @click="showModal = true"
                            >Tambah Data</el-button
                        >
                        <div class="table-responsive"></div>
                        <table class="table table-bordered table-sm">
                            <thead class="table-light">
                                <th width="4%" class="text-center">No.</th>
                                <th width="70%">Nama Driver</th>
                                <th width="15%" class="text-center">Action</th>
                            </thead>
                            <tbody>
                                <tr v-for="(dta,idx) in datadriver" :key="idx">
                                    <td>{{idx+1}}</td>
                                    <td>{{ dta.nama }}</td>
                                    <td>
                                        <el-button size="mini" @click="getById(dta.id)">Edit</el-button>
                                        <el-button
                                        size="mini"
                                        type="danger"
                                        @click="confirmDelete(dta.id)"
                                        >Delete</el-button
                                        >
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <Modal :based-on="showModal" title="Input Data" @close="onClose()">
            <div class="row">
                <form @submit.prevent="onSubmit">
                    <div class="form-group row mb-3">
                        <label class="col-sm-4 col-form-label"
                            >Nama Driver</label
                        >
                        <div class="col-sm-8">
                            <input
                                type="text"
                                v-model="form.nama"
                                class="form-control"
                            />
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
    </div>
</template>

<script>
import SideMenu from "./SideMenu.vue";
export default {
  components: {
    SideMenu,
  },
  data() {
    return {
      id:null,
      buttonloading: "",
      buttondisabled: false,
      isLoadingContent: false,
      showModal: false,
      showModalMassal: false,
      tempatperbaikan: [],
      show: true,
      form: {
          nama: "",
      },
      datadriver:[],
    };
  },
  created(){
    this.getData();
  },
  methods: {
    getData() {
        this.isLoadingContent = true;
        this.$http.get("/master-data/fetch-data-driver").then((response) => {
        this.datadriver = response.data.data;
        this.isLoadingContent = false;
      });
    },
    getById(id) {
      this.id =  id;
      this.showModal = true;
      this.$http
        .get("/master-data/fetch-data-driver-byid", {
          params: {
            id: id,
          },
        })
        .then((response) => {
          this.form.nama = response.data.nama;
          this.isLoadingContent = false;
        })
        .catch((error) => {
          console.log("Gagal Memuat Data");
        });
    },
   onClose(){
          this.showModal = false;
          this.form.nama = null;
   },
   confirmDelete(id) {
            this.$confirm(
                "This will permanently delete the Data. Continue?",
                "Warning",
                {
                    confirmButtonText: "OK",
                    cancelButtonText: "Cancel",
                    type: "warning",
                    center: true,
                }
            )
                .then(() => {
                    this.$http
                        .post("/master-data/submit-driver-delete/" + id)
                        .then((Response) => {
                            this.$awn.success("Success Delete Data!");
                            this.getData();
                            this.id = null;
                            this.form.nama = null;
                        });
                })
                .catch(() => {
                    this.$awn.alert("Gagal Delete Data!");
                    this.id = null;
                    this.form.nama = null;
                    this.getData();
                });
        },
   onSubmit() {
    let data = {
        id: this.id,
        form: this.form,
      };
        this.buttonloading = "spinner-border spinner-border-sm";
        this.buttondisabled = true;
        this.$http
            .post("/master-data/submit-data-driver", data)
            .then((Response) => {
                this.$awn.success("Sukses Submit Data");
                this.getData();
                this.showModal = false;
                this.buttonloading = "";
                this.buttondisabled = false;
                this.id = null;
                this.form.nama = null;
            })
            .catch((error) => {
                this.$awn.alert("Gagal Submit Data");
                this.showModal = false;
                this.buttonloading = "";
                this.buttondisabled = false;
                this.id = null;
                this.form.nama = null;
            });
    },
  },
};
</script>
