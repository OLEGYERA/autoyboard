import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
Vue.use(VueRouter);

const router = new VueRouter
({
    routes: [
        {path: '/sign-in', component: C.signin, name: 'signin'},
        {path: '/login', component: C.login, name: 'login'},
    ]
})




export default router;
