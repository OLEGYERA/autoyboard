import Vue from 'vue';

import Admin from '../components/admin.vue';
import Aggregator from '../components/aggregator/aggregator.vue';
import AggNucleus from '../components/aggregator/nucleus/nucleus.vue';
import AggNucProxyList from '../components/aggregator/nucleus/proxy/list.vue';
import AggNucProxyEdit from '../components/aggregator/nucleus/proxy/edit.vue';
import AggNucUserAgentEdit from '../components/aggregator/nucleus/user-agent/list.vue';


import aggProxyList from '../components/aggregator/nucleus/proxy/list.vue';



const Components = {
    Admin: Vue.component('admin', require('../components/admin.vue').default),

    //aggregator - Agg
    Aggregator: Aggregator,
        AggNucleus: AggNucleus,
            AggNucProxyList: AggNucProxyList,
            AggNucProxyEdit: AggNucProxyEdit,
            AggNucUserAgentEdit:AggNucUserAgentEdit,

    //proxy
    aggProxyList: aggProxyList,
    // signin: Vue.component('signin', require('./components/signin.vue').default),
    // signinpass: Vue.component('signinpass', require('./components/signinpass.vue').default),
    // signup: Vue.component('signup', require('./components/signup.vue').default),
    // telver: Vue.component('telver', require('./components/telver.vue').default),
}

export default Components;
