import Vue from 'vue';
import Vuex from 'vuex';
import user from '../storage/user';
import model from '../storage/model';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        user,
        model,
    },
});
