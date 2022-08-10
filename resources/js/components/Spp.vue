<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <el-card class="box-card">
                      <el-form ref="form" :model="form" label-width="120px">
                        <el-form-item label="Activity name">
                          <el-input v-model="form.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Activity zone">
                          <el-select v-model="form.region" placeholder="please select your zone">
                            <el-option label="Zone one" value="Indonesia"></el-option>
                            <el-option label="Zone two" value="Japan"></el-option>
                          </el-select>
                        </el-form-item>
                        <el-form-item label="Activity form">
                          <el-input type="textarea" v-model="form.desc"></el-input>
                        </el-form-item>
                        <el-form-item>
                          <el-button type="primary" @click="onSubmit">Create</el-button>
                          <el-button>Cancel</el-button>
                        </el-form-item>
                      </el-form>

                </el-card>
            </div>
        </div>
    </div>
</template>

<script>
  export default {
    data() {
      return {
        form: {
          name: '',
          region: '',
          date1: '',
          date2: '',
          delivery: false,
          type: [],
          resource: '',
          desc: ''
        }
      }
    },
    methods: {
      onSubmit() {
        let data = {
          form: this.form
        };
        this.$http.post("/api/submit/data",data).then((Response) => {
          this.$notify({
            title: 'Success',
            message: 'This is a success message',
            position: 'bottom-right',
            type: 'success'
          }).catch((error) => {
                    this.$notify.error({
                    title: 'Error',
                    message: 'This is an error message',
                    position: 'bottom-right'
            });
          })

        })
      }
    }
  }
</script>
