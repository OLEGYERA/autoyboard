require('../bootstrap.js');

import Vue from 'vue';
import Routes from './router'

// Vue.config.productionTip = false;
// Vue.config.devtools = false;
// Vue.config.errorHandler = function(err, vm, info) {
//     console.log('=(')
// }




new Vue({
    Routes
}).$mount('#auth');
