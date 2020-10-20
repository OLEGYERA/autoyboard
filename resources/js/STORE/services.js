import Vue from 'vue';
import Vuex from 'vuex';
import REGIONS from './modules/REGIONS';
import RBMY from './modules/RBMY';
import TRANSPORT from './modules/TRANSPORT';
import SEARCHDEATAILS from './modules/SEARCHDETAILS';

Vue.use(Vuex);

export const services = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        REGIONS,
        RBMY,
        TRANSPORT,
        SEARCHDEATAILS
    },
});
