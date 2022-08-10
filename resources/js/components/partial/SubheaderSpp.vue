<template>
    <div class="container mt-2 mb-2">
        <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/home' }"><span class="text-white">Beranda</span></el-breadcrumb-item>
          <el-breadcrumb-item :to="{ path: '/' }"><span class="text-white">Standar Pedoman Pemeriksaan</span></el-breadcrumb-item>
          <el-breadcrumb-item><a href="/"></a></el-breadcrumb-item>
        </el-breadcrumb>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        activeIndex: '1',
        activeIndex2: '1'
      };
    },
    methods: {
      handleSelect(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>
