require('../bootstrap.js');

import Vue from 'vue';

Vue.component('ycats', require('./components/ycats.vue').default);
Vue.component('ybutton', require('./components/ybutton.vue').default);
Vue.component('ysearch', require('./components/ysearch.vue').default);
Vue.component('ylocation', require('./components/ylocation.vue').default);
Vue.component('ymenu', require('./components/ymenu.vue').default);

new Vue({

}).$mount('#yb-site', );
