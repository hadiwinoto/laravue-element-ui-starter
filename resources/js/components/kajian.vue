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
    methods: {
      tableRowClassName({row, rowIndex}) {
        if (rowIndex === 1) {
          return 'warning-row';
        } else if (rowIndex === 3) {
          return 'success-row';
        }
        return '';
      }
    },
    data() {
      return {
        tableData:  [
          {
            judul: 'Kajian Kerja Sama KAPA/OAA dengan KAP Lokal Untuk Meningkatkan Kualitas Penugasan Audit di Pasar Modal ',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'PILE',
            tahun:'2022',
            status:'Done'
          }, 
          {
            judul: 'Kajian Reorganisasi Emiten & Perusahaan Publik di Pasar Modal Indonesia',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'PILE',
            tahun:'2022',
            status:'Done'
          }, 
          {
            judul: 'Kajian Akademik Pengomunikasian Hal Audit Utama dalam Laporan Auditor di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'SAPPEPP',
            tahun:'2022',
            status:'Done'
          }, 
          {
            judul: 'Kajian tentang Kodifikasi Kasus Pelanggaran dalam Pelaporan Keuangan Entitas di Pasar Modal yang Melibatkan Akuntan Publik ',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'SAPPEPP',
            tahun:'2022',
            status:'Done'
          }, 
          {
            judul: 'Kajian (Lanjutan) Pemetaan Price to Earning Ratio dan Analisis Pengaruh Public Float, Kapitalisasi Pasar, dan Konsentrasi Kepemilikan terhadap Pergerakan Harga Saham',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'LPP',
            tahun:'2022',
            status:'Done'
          }, 
          {
            judul: 'Kajian Penyusunan Kertas Kerja Pemeriksaan Akuntan Publik dan Kantor Akuntan Publik yang Melakukan Kegiatan di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'LPP',
            tahun:'2022',
            status:'Done'
          },
          {
            judul: 'Kajian Penyajian Kembali Laporan Keuangan dan Penerbitan Kembali Opini Akuntan Publik di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'PILE',
            tahun:'2021',
            status:'On Progress'
          }, 
          {
            judul: 'Kajian Laporan Akuntan Publik dalam Pembubaran dan Likuidasi Reksa Dana',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'PILE',
            tahun:'2021',
            status:'On Progress'
          },
          {
            judul: 'Sosialisasi Standar Audit Baru dan revisi (2021) di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'SAPPEPP',
            tahun:'2021',
            status:'Done'
          }, 
          {
            judul: 'Penyusunan RPOJK Pengomunikasian Hal Audit Utama (HAU) dalam Laporan Auditor Independen di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'SAPPEPP',
            tahun:'2021',
            status:'On Progress'
          }, 
           {
            judul: 'Penyusunan Kertas kerja reviu kepatuhan Akuntan Publik atas audit laporan keuangan historis di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'LPP',
            tahun:'2021',
            status:'On Progress'
          },
          {
            judul: 'Penyusunan RSEDK Pedoman Pemeriksaan Kepatuhan dan Pemeriksaan Teknis terhadap Akuntan Publik dan Kantor Akuntan Publik di Pasar Modal',
            jenis: 'SPP',
            address: 'No. 189, Grove St, Los Angeles',
            nomor:'LPP',
            tahun:'2021',
            status:'On Progress'
          }, 
        
        ]
      }
    }
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

