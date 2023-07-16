<template>
    <div class="col-3">
      <div class="list-group" id="list-tab" role="tablist">
        <a class="list-group-item list-group-item-action" :class="{ active: isCurrentRoute('/master-data') }" href="/master-data">
          Jenis Perbaikan
        </a>
        <a class="list-group-item list-group-item-action" :class="{ active: isCurrentRoute('/master-data/tempat-perbaikan') }" href="/master-data/tempat-perbaikan">
          Tempat Perbaikan
        </a>
        <a class="list-group-item list-group-item-action" :class="{ active: isCurrentRoute('/master-data/nopol-kendaraan') }" href="/master-data/nopol-kendaraan" role="tab" aria-controls="list-messages">
          Nomor Polisi
        </a>
        <a class="list-group-item list-group-item-action" :class="{ active: isCurrentRoute('/master-data/driver') }" href="/master-data/driver" role="tab" aria-controls="list-settings">
          Driver
        </a>
      </div>
    </div>
  </template>

  <script>
  export default {
    methods: {
      isCurrentRoute(route) {
        return window.location.pathname === route;
      },
    },
  };
  </script>
