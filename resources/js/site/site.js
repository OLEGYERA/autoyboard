require('../bootstrap.js');

import Vue from 'vue';
import {services} from '../STORE/services';

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


Vue.component('yselectsearch', require('./components/yselectsearch').default);
Vue.component('yselectmultysearch', require('./components/yselectmultysearch').default);
Vue.component('ycheck', require('./components/ycheck').default);





Vue.component('yfsearch', require('./components/yregionsearch').default);


Vue.component('ydropdown', require('./components/ydropdown').default);


Vue.component('ystickers', require('./components/ystickers').default);

Vue.component('ycardauto', require('./components/ycardauto').default);




Vue.component('yfilterextended', require('./components/yfilterextended').default);
Vue.component('yfilterform', require('./components/yfilterform').default);
Vue.component('ycardfilter', require('./components/ycardfilter').default);
Vue.component('ydropdowfilter', require('./components/ydropdownfilter').default);

Vue.directive('click-outside', {
    bind: function (el, binding, vnode) {
        el.clickOutsideEvent = function (event) {
            // here I check that click was outside the el and his childrens
            if (!(el == event.target || el.contains(event.target))) {
                // and if it did, call method provided in attribute value
                vnode.context[binding.expression](event);
            }
        };
        document.body.addEventListener('click', el.clickOutsideEvent)
    },
    unbind: function (el) {
        document.body.removeEventListener('click', el.clickOutsideEvent)
    },
});


var myMixin = {
    created: function () {
        this.hello()
    },
    methods: {
        hello: function () {
            console.log('привет из примеси!')
        }
    }
}

new Vue({
    store: services
}).$mount('#yb-site', );
