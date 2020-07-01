require('../bootstrap.js');

import Vue from 'vue';
import Routes from './router'
import {store} from '../STORE/store';

// Vue.config.productionTip = false;
// Vue.config.devtools = false;
// Vue.config.errorHandler = function(err, vm, info) {
//     console.log('=(')
// }

Vue.component('yinput', require('../MODULES/yinput.vue').default);
Vue.component('ycheck', require('../MODULES/ycheck.vue').default);


new Vue({
    router: Routes,
    store: store
}).$mount('#authentication');
