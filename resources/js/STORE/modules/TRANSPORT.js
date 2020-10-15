import {HTTP} from '../../http.js'

let state = {
    transportTypes: [],
    transportBodies: [],
    transportFullStore: {
        typeChoosed: null,
        bodiesChoosed: []
    }
};

let getters = {
    GET_TRANSPORT_TYPES: state => state.transportTypes,
    GET_TRANSPORT_BODIES: state => {
        state.transportBodies.forEach(el => {
            if(state.transportFullStore.bodiesChoosed.indexOf(el.val) !== -1){
                el['choosed'] = true;
            }
            else{
                el['choosed'] = false;
            }
        })
        return state.transportBodies
    },
    GET_TRANSPORTS: state => state.transportFullStore,
};

let mutations = {
    SET_TRANSPORT_TYPE: (state, payload) => {
        state.transportFullStore.typeChoosed = payload;
        state.transportFullStore.bodiesChoosed = [];
    },
    SET_TRANPORT_ARR: (state, payload) => {
        state.transportTypes = payload.transportTypes;
        state.transportBodies = payload.transportBodies;
        state.transportFullStore.typeChoosed = payload.typeChoosed;
        state.transportFullStore.bodiesChoosed = payload.bodiesChoosed;
    },
    SET_TRANSPORT_BODY_CHOOSE: (state, payload) => {
        const condition = state.transportFullStore.bodiesChoosed.find(function(el){
            if(payload === el) return true;
        })

        if(condition !== undefined){
            state.transportFullStore.bodiesChoosed.splice(state.transportFullStore.bodiesChoosed.indexOf(condition), 1);
        } else{
            state.transportFullStore.bodiesChoosed.push(payload)
        }
    },

    SET_TRANSPORT_TYPES_FROM_API: (state, payload) => {
        state.transportTypes = payload;
    },

    SET_TRANSPORT_BODIES_FROM_API: (state, payload) => {
        state.transportBodies = payload;
    }
}

let actions = {
    TRANSPORT_TYPES_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_TRANSPORT_TYPES_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },

    BODIES_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_TRANSPORT_BODIES_FROM_API', response.data);
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
    actions,
};
