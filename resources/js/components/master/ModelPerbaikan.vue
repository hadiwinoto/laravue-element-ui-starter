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
              <el-table :data="tableData" stripe style="width: 100%">
                <el-table-column prop="date" label="Date" width="180">
                </el-table-column>
                <el-table-column prop="name" label="Name" width="180">
                </el-table-column>
                <el-table-column prop="address" label="Address">
                </el-table-column>
              </el-table>
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
  