import {HTTP} from '../../http.js'

let state = {
    VerifyPageName: null,
    lastVerify: [], // data || isNew
    teapotLogin: null,
};

let getters = {
    AUTH_VERIFY_ID_COUNTER: state => {
        return state.VerifyIDCounter;
    },
    AUTH_VERIFY: state => {
        return state.lastVerify;
    },
    AUTH_TEAPOT_LOGIN: state => {
        return state.teapotLogin;
    },
};

let mutations = {
    SET_VERIFY_PAGE_NAME: (state, payload) => {
        state.VerifyPageName = payload;
    },
    SET_AUIH_VERIFY: (state, payload) => {
        state.lastVerify = payload;
    },
    SET_AUIH_VERIFY_CODE: (state, payload) => {
        state.lastVerify = payload;
    },
    SET_AUTH_TEAPOT_LOGIN: (state, payload) => {
        state.teapotLogin = payload;
    },
    //
    // ADD_TODO: (state, payload) => {
    //     state.todos.push(payload);
    // },
};

let actions = {
    GET_AUTH_VERIFY: async (context, payload) => {
        let verify_page_name = context.state.VerifyPageName;
        HTTP.post(`auth/verify`, payload).then(response => {
            context.commit('SET_AUIH_VERIFY', {verify_page_name: verify_page_name, status: 1, data: response.data, sended_data: payload});
        }).catch(error => {
            context.commit('SET_AUIH_VERIFY', {verify_page_name: verify_page_name, status: 0, data: error.response, sended_data: payload});
        })
    },
    GET_AUTH_VERIFY_CODE: async (context, payload) => {
        let verify_page_name = context.state.VerifyPageName;
        HTTP.post(`auth/verify/code`, payload).then(response => {
            context.commit('SET_AUIH_VERIFY_CODE', {verify_page_name: verify_page_name, status: 1, data: response.data, sended_data: payload});
        }).catch(error => {
            context.commit('SET_AUIH_VERIFY_CODE', {verify_page_name: verify_page_name, status: 0, data: error.response, sended_data: payload});
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
