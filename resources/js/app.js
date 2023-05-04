/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import axios from 'axios'
import VueAxios from 'vue-axios'
import locale from 'element-ui/lib/locale/lang/en'
import "vue-select/dist/vue-select.css";

import VueModal from '@kouts/vue-modal'
import '@kouts/vue-modal/dist/vue-modal.css'

import vSelect from "vue-select";
import VueElementLoading from "vue-element-loading";

Vue.component("VueElementLoading", VueElementLoading);

Vue.component("v-select", vSelect);

Vue.component('Modal', VueModal)

Vue.use(VueAxios, axios)


import VueAWN from 'vue-awesome-notifications';
import 'vue-awesome-notifications/dist/styles/style.css';

Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(ElementUI, { locale })

const option_alert = {
    position: 'bottom-right',
    labels: {
        success: 'Ok',
        alert: 'Oops...'
    },
    duration: 700
};
Vue.use(VueAWN, option_alert);

import * as mdb from 'mdb-ui-kit'; // lib
import { Input } from 'mdb-ui-kit'; // module


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('dashboard-component', require('./components/Dashboard.vue').default);
Vue.component('welcome-page-component', require('./components/partial/WelcomePage.vue').default);
Vue.component('maintenance-component', require('./components/maintenance.vue').default);
Vue.component('maintenance-component-detail', require('./components/detailMaintenance').default);
Vue.component('master-component', require('./components/masterData.vue').default);
Vue.component('jenis-perbaikan', require('./components/master/JenisPerbaikan.vue').default);




Vue.component('subheader-component', require('./components/partial/Subheader.vue').default);
Vue.component('subheader-maintenance', require('./components/partial/SubheaderMaintenance').default);
Vue.component('subheader-maintenance-detail', require('./components/partial/SubheaderDetailMaintenance.vue').default);
Vue.component('subheader-masterdata', require('./components/partial/SubheaderMaster').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
