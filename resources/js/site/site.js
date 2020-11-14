require('../bootstrap.js');

import Vue from 'vue';
import {services} from '../STORE/services';


Vue.component('full-filter', require('./components/filters/full-filter').default);
Vue.component('selected-items', require('./components/filters/selected-items').default);
Vue.component('filter-form', require('./components/filters/filter/form').default);
Vue.component('filter-cards', require('./components/filters/filter/cards').default);




//modules
Vue.component('ycheck', require('./modules/inputs/ycheck').default);
Vue.component('yselectsearch', require('./modules/inputs/yselectsearch').default);
Vue.component('yselectmultysearch', require('./modules/inputs/yselectmultysearch').default);
Vue.component('ydropdown', require('./modules/inputs/ydropdown').default);
Vue.component('ydoublenuminput', require('./modules/inputs/ydoublenuminput').default);
Vue.component('yprice', require('./modules/inputs/yprice').default);




Vue.component('ymenu', require('./modules/header/ymenu.vue').default);
//
// //mobile
// Vue.component('ymobilesticker', require('./components/ymobilesticker').default);
// Vue.component('ymobilecatalog', require('./components/ymobilecatalog').default);
// Vue.component('ymobileanalitics', require('./components/ymobileanalitics').default);
// //finish mobile
// //change visible
Vue.component('ychangeoffers', require('./components/ybestofferschange').default);
// Vue.component('ynewschange', require('./components/ynewschange').default);
// //finish change visible
//
Vue.component('ysearch', require('./modules/header/ysearch.vue').default);
Vue.component('ylocation', require('./components/ylocation.vue').default);
// Vue.component('ystatus', require('./components/ystatus').default);
Vue.component('yexpanded', require('./components/yexpanded').default);
Vue.component('ycheckbox', require('./components/ycheckbox').default);
Vue.component('yratio', require('./components/yratio').default);

Vue.component('ytitle', require('./components/ytitle').default);
Vue.component('ybestoffer', require('./components/ybestoffers').default);
// Vue.component('ycatalog', require('./components/ycatalog').default);
Vue.component('yfavorite', require('./components/yfavorite').default);
// Vue.component('yanalitics', require('./components/yanalitics').default);
// Vue.component('ynews', require('./components/ynews').default);
// Vue.component('yfaqquestions', require('./components/yfaqquestions').default);



Vue.component('ypaginaton', require('./components/ypagination').default);


Vue.component('yfsearch', require('./components/yregionsearch').default);

Vue.component('ycolors', require('./components/ycolors').default);
Vue.component('ychaccordion', require('./components/ychaccordion').default);

//
// Vue.component('yfsearch', require('./components/yregionsearch').default);
//
//
//
//
// Vue.component('ystickers', require('./components/ystickers').default);
//
Vue.component('ycardauto', require('./components/ycardauto').default);
//



Vue.component('ydropdowfilter', require('./components/ydropdownfilter').default);


// Vue.directive('click-outside', {
//     bind: function (el, binding, vnode) {
//         el.clickOutsideEvent = function (event) {
//             // here I check that click was outside the el and his childrens
//             if (!(el == event.target || el.contains(event.target))) {
//                 // and if it did, call method provided in attribute value
//                 vnode.context[binding.expression](event);
//             }
//         };
//         document.body.addEventListener('click', el.clickOutsideEvent)
//     },
//     unbind: function (el) {
//         document.body.removeEventListener('click', el.clickOutsideEvent)
//     },
// });

import VueLazyload from 'vue-lazyload'

Vue.use(VueLazyload)

Vue.use(VueLazyload, {
    loading: 'http://yboard.loc/img/system/preloader/card.gif',
    preLoad: 2,
    error: 'dist/error.png',
    attempt: 2
})

new Vue({
    store: services
}).$mount('#yb-site', );
