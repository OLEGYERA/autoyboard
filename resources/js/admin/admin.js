require('../bootstrap.js');

import Vue from 'vue';
import Routes from './services/router'
import {store} from './services/store';

// Vue.config.productionTip = false;
// Vue.config.devtools = false;
// Vue.config.errorHandler = function(err, vm, info) {
//     console.log('=(')
// }

Vue.component('yinput', require('./modules/htmls/yinput.vue').default);
Vue.component('yavatar', require('./modules/htmls/yavatar.vue').default);

Vue.component('ytabs', require('./modules/systems/ytabs.vue').default);

// Vue.component('ycheck', require('../MODULES/ycheck.vue').default);

Vue.component('ynavigation', require('./components/navigation.vue').default);
Vue.component('ynav-list', require('./modules/systems/navigation/ynav-list.vue').default);

Vue.component('yheader', require('./components/header.vue').default);


new Vue({
    router: Routes,
    store: store
}).$mount('#admin-panel');
