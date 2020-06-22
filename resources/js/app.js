require('./bootstrap');



import Vue from 'vue';
Vue.component('excel', require('./components/excel.vue').default);

// Vue.config.productionTip = false;
// Vue.config.devtools = false;
// Vue.config.errorHandler = function(err, vm, info) {
//     console.log('=(')
// }






new Vue({
    el: '#app',
});
