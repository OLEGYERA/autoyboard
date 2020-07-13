require('../bootstrap.js');

import Vue from 'vue';

Vue.component('ycats', require('./components/ycats.vue').default);
Vue.component('ybutton', require('./components/ybutton.vue').default);
Vue.component('ysearch', require('./components/ysearch.vue').default);
Vue.component('ylocation', require('./components/ylocation.vue').default);
Vue.component('ymenu', require('./components/ymenu.vue').default);
Vue.component('yreguests', require('./components/yreguests').default);
Vue.component('ystatus', require('./components/ystatus').default);
Vue.component('yexpanded', require('./components/yexpanded').default);
Vue.component('yform', require('./components/yform').default);

Vue.component('ybestoffer', require('./components/ybestoffers').default);

Vue.component('ycatalog', require('./components/ycatalog').default);



new Vue({

}).$mount('#yb-site', );
