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
      confirmDelete(){

      },
      handleEdit(){

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
  