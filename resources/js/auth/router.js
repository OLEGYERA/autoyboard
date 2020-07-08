import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [
        {path: '/', redirect: '/sign-in'},
        {path: '/sign-in', component: C.signin, name: 'signin'},
        {path: '/sign-in/:login/password', component: C.signinpass, name: 'signinpass'},
        {path: '/sign-up', component: C.signup, name: 'signup'},
        {path: '/tel/verification/:user', component: C.telver, name: 'telver'},
    ]
})




export default router;
