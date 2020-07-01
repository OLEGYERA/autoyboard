import {HTTP} from '../../http.js'

let state = {
    sign: {
        isLogin: null,
        lastVerify: [],
    },
};

let getters = {
    SIGN_IS_LOGIN: state => {
        return state.sign.isLogin;
    },
    SIGN_VERIFY: state => {
        return state.sign.lastVerify;
    },
};

let mutations = {
    SET_SIGN_VERIFY: (state, payload) => {
        state.sign.lastVerify = payload;
    },

    //
    // ADD_TODO: (state, payload) => {
    //     state.todos.push(payload);
    // },
};

let actions = {
    GET_SIGN_VERIFY: (context, payload) => {
        HTTP.post(`auth/verify`, payload).then(response => {
            context.commit('SET_SIGN_VERIFY', {status: 1, data: response.data});
        }).catch(error => {
            context.commit('SET_SIGN_VERIFY', {status: 0, data: error.response});
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
