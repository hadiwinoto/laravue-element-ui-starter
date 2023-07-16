<template>
    <div class="container">
      <div class="row">
        <SideMenu></SideMenu>
        <div class="col-md-9">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive"></div>
                    <table class="table table-bordered table-sm">
                        <thead class="table-light">
                            <tr>
                                <td style="width: 10px;">No.</td>
                                <td>Nama</td>
                                <td style="width: 25px;">Action</td>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              <!-- <el-table :data="tableData" stripe style="width: 100%">
                <el-table-column prop="date" label="Date" width="180">
                </el-table-column>
                <el-table-column prop="name" label="Name" width="180">
                </el-table-column>
                <el-table-column prop="address" label="Address">
                </el-table-column>
              </el-table> -->
            </div>
          </div>
        </div>
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
          tableData:[

          ],
        },
      };
    },
    created(){


    },
    methods: {
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
