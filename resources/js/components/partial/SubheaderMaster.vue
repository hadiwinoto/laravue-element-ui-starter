<template>
      <ul class="navbar-nav">
          <el-breadcrumb separator-class="el-icon-arrow-right">
           <el-breadcrumb-item :to="{ path: '/master' }">Master Data</el-breadcrumb-item>
          </el-breadcrumb>         
      </ul>
</template>
<script>
  export default {
    data() {
      return {
        activeIndex: '1',
        activeIndex2: '2'
      };
    },
    methods: {
      handleSelect(key, keyPath) {
        console.log(key, keyPath);
      }
    }
  }
</script>
