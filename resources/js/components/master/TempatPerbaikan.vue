<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <SideMenu></SideMenu>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          <div class="card-body">
            <span><b>Master Tempat Perbaikan</b></span>
            <el-button class="mb-2" style="float: right;" size="small" type="primary" @click="showModal = true">Tambah
              Data</el-button>
            <table class="table">
              <thead>
                <th width="70%">Nama Tempat</th>
                <th width="30%" class="text-center">Action</th>
              </thead>
              <tbody>
                <tr>
                  <td></td>
                  <td class="text-center">
                    <el-button size="mini" @click="handleEdit(pbr.id)">Edit</el-button>
                    <el-button size="mini" type="danger" @click="confirmDelete(pbr.id)">Delete</el-button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <Modal :based-on="showModal" title="Input Data" @close="showModal = false">
        <div class="row">
          <form @submit.prevent="onSubmit">
            <div class="form-group row mb-3">
              <label class="col-sm-4 col-form-label">Nama Tempat</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" />
              </div>
            </div>
            <div class="form-group row mb-3">
              <label class="col-sm-4 col-form-label"></label>
              <div class="col-sm-8">
                <button type="submit" :disabled="buttondisabled" class="btn btn-primary" size="small">
                  <span :class="buttonloading" role="status" aria-hidden="true"></span>Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </Modal>
    </div>
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
      form: {
        name: "",
        region: "",
        date1: "",
        date2: "",
        delivery: false,
        type: [],
        resource: "",
        desc: "",
        tableData: [

        ],
        showModal: false,
        search: "",
        buttonloading: "",
        buttondisabled: false,
        isLoadingContent: false,
        tempatperbaikan: [],
      },
    };
  },
  created() {
    this.getData();
  },
  methods: {
    getData() {
      this.isLoadingContent = true;
      this.$http
        .get("/master-data/fetch-tempat-perbaikan")
        .then((response) => {
          this.tempatperbaikan = response.data.data;
          this.isLoadingContent = false;
        });
    },
    confirmDelete() {

    },
    handleEdit() {

    },
    onSubmit() {
      let data = {
        form: this.form,
      };
      this.$http.post("/api/submit/data", data).then((Response) => {
        this.$notify({
          title: "Success",
          message: "This is a success message",
          position: "bottom-right",
          type: "success",
        }).catch((error) => {
          this.$notify.error({
            title: "Error",
            message: "This is an error message",
            position: "bottom-right",
          });
        });
      });
    },
  },
};
</script>
  