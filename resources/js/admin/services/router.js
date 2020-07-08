import C from './components.js';
import Vue from 'vue';
import VueRouter from 'vue-router'
import Aggregator from "../components/aggregator/aggregator";
import AggNucleus from "../components/aggregator/nucleus/nucleus";
Vue.use(VueRouter);

const router = new VueRouter
({
    // mode: 'history',
    routes: [
        {path: '/', redirect: {name: 'aggregator'}},
        {path: '/aggregator', component: C.Aggregator, name: 'aggregator', meta: {title: 'Агрегатор', icon: 'fas fa-atom'},
            children: [
                {path: '/', redirect: {name: 'agg_nucleus'}},
                {path: 'nucleus', component: C.AggNucleus, name: 'agg_nucleus', meta: {title: 'Ядро'},
                    children: [
                        {path: '/', redirect: {name: 'agg_nuc_proxy-list'}},
                        {path: '/proxy', redirect: {name: 'agg_nuc_proxy-list'}},
                        {path: 'proxy/list', component: C.AggNucProxyList, name: 'agg_nuc_proxy-list' , meta: {title: 'Proxy'}},
                        {path: 'proxy/edit', component: C.AggNucProxyEdit, name: 'agg_nuc_proxy-edit'},
                        {path: 'user-agent/list', component: C.AggNucUserAgentEdit, name: 'agg_nuc_user_agent-list', meta: {title: 'User-Agent'}},
                    ]
                },
            ]
        },
        // {path: '/aggregator', component: C.aggregatorParent,
        //     children: [
        //         {path: '/', redirect: {name: 'proxy-list'}},
        //         {path: 'proxy', component: C.aggregatorProxyList, name: 'proxy-list'}
        //     ]
        // },
        // {path: '/sign-in/:login/password', component: C.signinpass, name: 'signinpass'},
        // {path: '/sign-up', component: C.signup, name: 'signup'},
        // {path: '/tel/verification/:user', component: C.telver, name: 'telver'},
    ]
})




export default router;
