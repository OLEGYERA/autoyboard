import {HTTP} from '../../http.js'

let state = {
    count: 0,
    dataID: [],
    dataTransports: [],
};

let getters = {
    GET_DATA_ID: state => state.dataID,
    GET_DATA_TRANSPORTS: state => state.dataTransports,
    GET_COUNT: state => state.count,
};

let mutations = {
    SET_FILTER_IDS_FROM_API: (state, payload) => {
        state.count = payload.count;
        state.dataID = payload.dataID;
    },
    SET_FILTER_TRANSPORT_FROM_API: (state, payload) => {
        state.dataTransports[payload.id] = payload;
    },
};

let actions = {
    FILTER_IDS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_FILTER_IDS_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },
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
