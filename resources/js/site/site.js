require('../bootstrap.js');

import Vue from 'vue';

//modules
Vue.component('ymenu', require('./modules/header/ymenu.vue').default);



Vue.component('ysearch', require('./modules/header/ysearch.vue').default);
Vue.component('ylocation', require('./components/ylocation.vue').default);
Vue.component('ystatus', require('./components/ystatus').default);
Vue.component('yexpanded', require('./components/yexpanded').default);
Vue.component('yform', require('./components/yform').default);
Vue.component('ycheckbox', require('./components/ycheckbox').default);
Vue.component('ytitle', require('./components/ytitle').default);
Vue.component('ybestoffer', require('./components/ybestoffers').default);
Vue.component('yrange', require('./components/yrangeslider').default);
Vue.component('ycatalog', require('./components/ycatalog').default);
Vue.component('yfavorite', require('./components/yfavorite').default);
Vue.component('yanalitics', require('./components/yanalitics').default);
Vue.component('ynews', require('./components/ynews').default);

 Vue.component('yselect', require('./components/yselectsearch').default);
Vue.component('ystickers', require('./components/ystickers').default);



Vue.component('carousel', require('./components/carousel').default);

new Vue({

}).$mount('#yb-site', );
