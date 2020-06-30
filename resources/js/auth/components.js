import Vue from 'vue';

const Components = {
    basic: Vue.component('basic', require('./components/basic.vue').default),
    signin: Vue.component('signin', require('./components/signin.vue').default),
    signup: Vue.component('signup', require('./components/signup.vue').default),
}

export default Components;