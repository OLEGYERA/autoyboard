import {HTTP} from '../../http.js'

let state = {
    sign: {
        isLogin: null,
        lastVerify: [],
        teapotLogin: null,
    },
};

let getters = {
    SIGN_IS_LOGIN: state => {
        return state.sign.isLogin;
    },
    AUTH_VERIFY: state => {
        return state.sign.lastVerify;
    },
    AUTH_TEAPOT_LOGIN: state => {
        return state.sign.teapotLogin;
    },
};

let mutations = {
    SET_AUIH_VERIFY: (state, payload) => {
        state.sign.lastVerify = payload;
    },

    SET_AUTH_TEAPOT_LOGIN: (state, payload) => {
        state.sign.teapotLogin = payload;
    },

    //
    // ADD_TODO: (state, payload) => {
    //     state.todos.push(payload);
    // },
};

let actions = {
    GET_AUTH_VERIFY: (context, payload) => {
        HTTP.post(`auth/verify`, payload).then(response => {
            context.commit('SET_AUIH_VERIFY', {status: 1, data: response.data, sended_data: payload});
        }).catch(error => {
            context.commit('SET_AUIH_VERIFY', {status: 0, data: error.response, sended_data: payload});
        })
    },
    // GET_TODO: async (context, payload) => {
    //     let {data} = await Axios.get('http://yourwebsite.com/api/todo');
    //     context.commit('SET_TODO', data);
    // },
    //
    // SAVE_TODO: async (context, payload) => {
    //     let {data} = await Axios.post('http://yourwebsite.com/api/todo');
    //     context.commit('ADD_TODO', payload);
    // },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
