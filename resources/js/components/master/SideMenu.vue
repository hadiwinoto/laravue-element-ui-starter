<template>
    <div>
        <el-col>
              <el-menu
                default-active="1"
                class="el-menu-vertical-demo"
                @open="handleOpen"
                @close="handleClose"
              >
              <el-menu-item index="1">
                  <i class="el-icon-setting"></i>
                  <a href="/master-data">Jenis Perbaikan</a>
                </el-menu-item>
                <el-menu-item index="2">
                  <i class="el-icon-setting"></i>
                  <a href="/master-data/tempat-perbaikan">Tempat Perbaikan</a>
                </el-menu-item>
                <el-menu-item index="3">
                  <i class="el-icon-setting"></i>
                  <a href="/master-data/model-perbaikan">Model Perbaikan</a>
                </el-menu-item>
                <el-menu-item index="4">
                  <i class="el-icon-setting"></i>
                  <a href="#">Nomor Polisi Kendaraan</a>
                </el-menu-item>
                <el-menu-item index="5">
                  <i class="el-icon-setting"></i>
                  <a href="#">Nomor Kendaraan</a>
                </el-menu-item>
                <el-menu-item index="6">
                  <i class="el-icon-setting"></i>
                  <a href="#">Nama Supir</a>
                </el-menu-item>
                <el-menu-item index="7">
                  <i class="el-icon-setting"></i>
                  <a href="#">Nama Montir</a>
                </el-menu-item>
              </el-menu>
            </el-col>
    </div>
</template>