import {HTTP} from '../../http.js'

let state = {
    user: null,
};

let getters = {
    USER_DATA: state => {
        return state.user;
    },
};

let mutations = {
    SET_USER_DATA: (state, payload) => {
        state.user = payload;
    },
};

let actions = {
    GET_USER_DATA: (context) => {
        HTTP.get(`admin/auth-user`).then(response => {
            context.commit('SET_USER_DATA', response.data);
        }).catch(error => {
            context.commit('SET_USER_DATA', null);
        })
    },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
