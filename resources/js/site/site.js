require('../bootstrap.js');

import Vue from 'vue';

//modules
Vue.component('ymenu', require('./modules/header/ymenu.vue').default);

//mobile
Vue.component('ymobilesticker', require('./components/ymobilesticker').default);
Vue.component('ymobilecatalog', require('./components/ymobilecatalog').default);
Vue.component('ymobileanalitics', require('./components/ymobileanalitics').default);
//finish mobile
//change visible
Vue.component('ychangeoffers', require('./components/ybestofferschange').default);
Vue.component('ynewschange', require('./components/ynewschange').default);
//finish change visible

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

Vue.component('ydropdown', require('./components/ydropdown').default);


Vue.component('ystickers', require('./components/ystickers').default);

new Vue({

}).$mount('#yb-site', );
