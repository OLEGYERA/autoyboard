import {HTTP} from '../../http.js'

let state = {
    count: 0,
    dataTransports: [],
};

let getters = {
    GET_DATA_TRANSPORTS: state => state.dataTransports,
    GET_COUNT: state => state.count,
};

let mutations = {
    CLEAR_DATA_TRANSPORTS: (state, payload) => {
        state.dataTransports = [];
    },
    SET_FILTER_TRANSPORT_FROM_API: (state, payload) => {
        state.count = payload.count;
        state.dataTransports = payload.dataTransports;
    },
};

let actions = {
    FILTER_TRANSPORT_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_FILTER_TRANSPORT_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },
};
export default {
    state,
    getters,
    mutations,
    actions
};
