import {HTTP} from '../../http.js'

let state = {
    all: [],
};

let getters = {
    ALL_DATA: state => {
        return state.all;
    },
};

let mutations = {
    SET_ALL_DATA: (state, payload) => {
        state.all = payload;
    },
};

let actions = {
    GET_ALL_DATA: (context, payload) => {
        HTTP.get(`admin/${payload.url}/all`).then(response => {
            context.commit('SET_ALL_DATA', response.data);
        })
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
