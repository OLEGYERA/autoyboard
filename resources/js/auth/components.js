import Vue from 'vue';

const Components = {
    basic: Vue.component('basic', require('./components/basic.vue').default),
    login: Vue.component('login', require('./components/login.vue').default),
    signin: Vue.component('signin', require('./components/signin.vue').default),
    signup: Vue.component('signup', require('./components/signup.vue').default),
}

export default Components;
