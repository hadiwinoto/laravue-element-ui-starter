<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-3">
        <div class="card">
          
          <div class="card-body">
            <el-col>
              <el-menu default-active="1" class="el-menu-vertical-demo">
                <el-menu-item index="1">
                  <i class="el-icon-setting"></i>
                  <span>Jenis Perbaikan</span>
                </el-menu-item>
                <el-menu-item index="2">
                  <i class="el-icon-setting"></i>
                  <span>Tempat Perbaikan</span>
                </el-menu-item>
                <el-menu-item index="3">
                  <i class="el-icon-setting"></i>
                  <span>Model Perbaikan</span>
                </el-menu-item>
                <el-menu-item index="4">
                  <i class="el-icon-setting"></i>
                  <span>Nomor Polisi Kendaraan</span>
                </el-menu-item>
                <el-menu-item index="5">
                  <i class="el-icon-setting"></i>
                  <span>Nomor Kendaraan</span>
                </el-menu-item>
                <el-menu-item index="6">
                  <i class="el-icon-setting"></i>
                  <span>Nama Supir</span>
                </el-menu-item>
                <el-menu-item index="7">
                  <i class="el-icon-setting"></i>
                  <span>Nama Montir</span>
                </el-menu-item>
              </el-menu>
            </el-col>
          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card">
          
          <div class="card-body">
            <div slot="header" class="clearfix">
              <span><b>Master Jenis Perbaikan</b></span>
                  <el-button style="float: right;" size="small" type="primary">Tambah Data</el-button>
              </div>
               
                    <el-table
                        :data="jenisperbaiakan.filter(data => !search || data.name.toLowerCase().includes(search.toLowerCase()))"
                        style="width: 100%">
                        <el-table-column
                          label="No"
                          prop="">
                        </el-table-column>
                        <el-table-column
                          label="Name"
                          prop="name">
                        </el-table-column>
                        <el-table-column
                          align="right">
                          <template slot-scope="scope">
                            <el-button
                              size="mini"
                              @click="handleEdit(scope.$index, scope.row)">Edit</el-button>
                            <el-button
                              size="mini"
                              type="danger"
                              @click="handleDelete(scope.$index, scope.row)">Delete</el-button>
                          </template>
                        </el-table-column>
                      </el-table>




          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      form:null,
      isLoadingContent:false,
      jenisperbaiakan:[],
    };
  },
  created(){
    this.getData();
  },
  methods: {
    getData(id) {
      this.isLoadingContent = true;
      this.$http
        .get("/master-data/fetch-perbaikan")
        .then((response) => {
          this.jenisperbaiakan  = response.data;
          this.isLoadingContent = false;
        });
    },
    handleEdit(index, row) {
        console.log(index, row);
      },
      handleDelete(index, row) {
        console.log(index, row);
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
