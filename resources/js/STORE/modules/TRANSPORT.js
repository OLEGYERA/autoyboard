import {HTTP} from '../../http.js'

let state = {
    transportTypes: [],
    transportBodies: [],
    transportStates: [],
    transportFuels: [],
    transportTransmissions: [],
    transportGears: [],
    transportFullStore: {
        typeChoosed: null,
        bodiesChoosed: [],
        importersChoosed: [],
        statesChoosed: [],
        fuelsChoosed: [],
        fuelConsumptionChoosed: {from: null, to: null},
        mileageChoosed: {from: null, to: null},
        transmissionsChoosed: [],
        gearsChoosed: [],
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
    GET_TRANSPORT_STATES: state => {
        state.transportStates.forEach(el => {
            if(state.transportFullStore.statesChoosed.indexOf(el.val) !== -1){
                el['choosed'] = true;
            }
            else{
                el['choosed'] = false;
            }
        })
        return state.transportStates
    },
    GET_TRANSPORT_IMPORTERS: (state, getters, rootState, rootGetters) => rootGetters['GET_MANUFACTURE_REGIONS'],
    GET_TRANSPORT_FUELS: state => state.transportFuels,
    GET_FUEL_CONSUMPTION: state => state.fuelConsumption,

    GET_TRANSPORT_TRANSMISSIONS: state => state.transportTransmissions,
    GET_TRANSPORT_GEARS: state => state.transportGears,
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
        state.transportStates = payload.transportStates;
        state.transportFuels = payload.transportFuels;
        state.transportTransmissions = payload.transportTransmissions;
        state.transportFullStore.typeChoosed = payload.typeChoosed;
        state.transportFullStore.bodiesChoosed = payload.bodiesChoosed;
        state.transportFullStore.importersChoosed = payload.importersChoosed;
        state.transportFullStore.statesChoosed = payload.statesChoosed;
        state.transportFullStore.fuelsChoosed = payload.fuelsChoosed;
        state.transportFullStore.fuelConsumptionChoosed = payload.fuelConsumptionChoosed;
        state.transportFullStore.mileageChoosed = payload.mileageChoosed;

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
    SET_TRANSPORT_STATE_CHOOSE: (state, payload) => {
        const condition = state.transportFullStore.statesChoosed.find(function(el){
            if(payload === el) return true;
        })

        if(condition !== undefined){
            state.transportFullStore.statesChoosed.splice(state.transportFullStore.statesChoosed.indexOf(condition), 1);
        } else{
            state.transportFullStore.statesChoosed.push(payload)
        }
    },
    SET_IMPORTERS_CHOOSE: (state, payload) => {
        state.transportFullStore.importersChoosed.push(payload);
    },
    DELETE_IMPORTERS_CHOOSE: (state, payload) => {
        state.transportFullStore.importersChoosed.splice(state.transportFullStore.importersChoosed.indexOf(payload), 1);
    },
    SET_FUELS_CHOOSE: (state, payload) => {
        state.transportFullStore.fuelsChoosed.push(payload);
    },
    DELETE_FUELS_CHOOSE: (state, payload) => {
        state.transportFullStore.fuelsChoosed.splice(state.transportFullStore.fuelsChoosed.indexOf(payload), 1);
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
