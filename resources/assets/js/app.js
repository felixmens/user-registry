

require('./bootstrap');
window.Vue = require('vue');

Vue.component('lists', require('./components/Lists.vue'));
Vue.component('formmodal', require('./components/formmodal.vue'));
Vue.component('del-modal', require('./components/deletemodal.vue'));


var app = new Vue({
    el: '#vue-content',
  })