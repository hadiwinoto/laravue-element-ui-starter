<template>
      
          <el-breadcrumb separator-class="el-icon-arrow-right">
          <el-breadcrumb-item :to="{ path: '/maintenance' }">Maintenance</el-breadcrumb-item>
          <el-breadcrumb-item>Detail</el-breadcrumb-item>
          
          </el-breadcrumb>         
    
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
