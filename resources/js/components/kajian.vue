<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <el-card class="box-card">
                  <label>Filter Pencarian</label>
                  <el-form :inline="true" :model="formInline" class="demo-form-inline">
                      <el-form-item>
                        <el-input  placeholder="Judul"></el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-input  placeholder="Tahun"></el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-input  placeholder="Bidang"></el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-input  placeholder="PIC"></el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-input  placeholder="Status"></el-input>
                      </el-form-item>
                      <el-form-item>
                        <el-button type="primary" @click="onSubmit">Cari</el-button>
                      </el-form-item>
                  </el-form>
                </el-card>
            </div>
            <div class="col-md-12 mt-3">
                <el-card class="box-card">
                    <el-table
                    :data="tableData"
                    style="width: 100%">
                    <el-table-column
                      prop="judul"
                      label="Judul"
                      width="600">
                    </el-table-column>
                    <el-table-column
                      prop="jenis"
                      label="Jenis Kajian"
                      width="170">
                    </el-table-column>
                    <el-table-column
                      prop="nomor"
                      label="PIC"
                      width="170">
                    
                    </el-table-column>
                    <el-table-column
                      prop="tahun"
                      label="Tahun"
                      width="170">
                      
                    </el-table-column>
                    <el-table-column
                      prop="status"
                      label="Status"
                      width="140">
                      
                    </el-table-column>
                  </el-table>
                </el-card>
            </div>
        </div>
            
        </div>
</template>

<script>
  export default {
    
    data() {
      return {
        
      }
    },
    methods: {
    getDataKamar(id) {
      this.isLoadingContentKamar = true;
      this.$http
        .get("/komersial/data/master/getdata/tipekamar", {
          params: {
            id: id,
          },
        })
        .then((response) => {
          this.datakamar = response.data;
          this.isLoadingContentKamar = false;
        });
    },
    },
  }
</script>
<style>
  .el-table .warning-row {
    background: oldlace;
  }

  .el-table .success-row {
    background: #f0f9eb;
  }
</style>

