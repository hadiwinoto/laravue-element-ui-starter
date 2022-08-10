<template>
<div>
  <el-carousel height="430px" :interval="5000" arrow="always">
    <el-carousel-item>
     <img src="https://www.ojk.go.id/id/Banners/Selamat%20Bertugas%20Anggota%20Dewan%20Komisioner%20OJK.jpeg" class="image">
    </el-carousel-item>
    <el-carousel-item>
     <img src="https://www.ojk.go.id/id/Banners/BUKU-OJK-MEMBANGUN-NEGERI-WEBANNER.png" class="image">
    </el-carousel-item>
        <el-carousel-item>
     <img src="https://www.ojk.go.id/id/Banners/Banner-Web-Perjalanan-Satu-Dasawarsa--22.png" class="image">
    </el-carousel-item>
        <el-carousel-item>
     <img src="https://www.ojk.go.id/id/Banners/Selamat%20Bertugas%20Anggota%20Dewan%20Komisioner%20OJK.jpeg" class="image">
    </el-carousel-item>
        <el-carousel-item>
     <img src="https://www.ojk.go.id/id/Banners/WhatsApp%20Image%202022-06-14%20at%203.14.02%20PM.jpeg" class="image">
    </el-carousel-item>
  </el-carousel>
  <el-row :gutter="12" class="mt-3 mb-10">
      <el-col :span="8">
        <el-card shadow="hover">
          <img src="https://www.ojk.go.id/id/Banners/Selamat%20Bertugas%20Anggota%20Dewan%20Komisioner%20OJK.jpeg" class="image">
          <div style="padding: 14px;">
            <div class="bottom clearfix">
              <time class="time">{{ currentDate }}</time>
              <el-button type="text" class="button">Detail</el-button>
            </div>
          </div>
        </el-card>
      </el-col>
      <el-col :span="8">
        <el-card shadow="hover">
          <img src="https://www.ojk.go.id/id/Banners/BUKU-OJK-MEMBANGUN-NEGERI-WEBANNER.png" class="image">
          <div style="padding: 14px;">
            <div class="bottom clearfix">
              <time class="time">{{ currentDate }}</time>
              <el-button type="text" class="button">Detail</el-button>
            </div>
          </div>
        </el-card>
      </el-col>
      <el-col :span="8">
        <el-card shadow="hover">
          <img src="https://www.ojk.go.id/id/Banners/Banner-Web-Perjalanan-Satu-Dasawarsa--22.png" class="image">
          <div style="padding: 14px;">
            <div class="bottom clearfix">
              <time class="time">{{ currentDate }}</time>
              <el-button type="text" class="button">Detail</el-button>
            </div>
          </div>
        </el-card>
      </el-col>
  </el-row>


</div>
</template>
<script>
export default {
  components:{

  },
  data() {
    return {
      currentDate: new Date(),
      item:[],
    };
  }
}
</script>


<style>
  .el-carousel__item h3 {
    color: #475669;
    font-size: 18px;
    opacity: 0.75;
    line-height: 300px;
    margin: 0;
  }

  .el-carousel__item:nth-child(2n) {
    background-color: #99a9bf;
  }

  .el-carousel__item:nth-child(2n+1) {
    background-color: #d3dce6;
  }
  .time {
    font-size: 13px;
    color: #999;
  }
  
  .bottom {
    margin-top: 13px;
    line-height: 12px;
  }

  .button {
    padding: 0;
    float: right;
  }

  .image {
    width: 100%;
    display: block;
  }

  .clearfix:before,
  .clearfix:after {
      display: table;
      content: "";
  }
  
  .clearfix:after {
      clear: both
  }

</style>
