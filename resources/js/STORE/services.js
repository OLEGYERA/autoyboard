import Vue from 'vue';
import Vuex from 'vuex';
import regions from './modules/regions';

Vue.use(Vuex);

export const services = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        regions,
    },
});
