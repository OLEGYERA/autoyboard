import Vue from 'vue';

const Components = {
    basic: Vue.component('basic', require('./components/basic.vue').default),
    signin: Vue.component('signin', require('./components/signin.vue').default),
    signinpass: Vue.component('signinpass', require('./components/signinpass.vue').default),
    signup: Vue.component('signup', require('./components/signup.vue').default),
    telver: Vue.component('telver', require('./components/telver.vue').default),
}

export default Components;
