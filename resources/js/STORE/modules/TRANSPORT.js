import {HTTP} from '../../http.js'

let state = {
    transportTypes: [],
    transportBodies: [],
    transportColors: [],
    transportStates: [],
    transportFuels: [],
    transportTransmissions: [],
    transportGears: [],
    transportTechs: {
        security: [],
        comfort: [],
        multimedia: [],
        others: [],
    },
    transportFullStore: {
        typeChoosed: null,
        bodiesChoosed: [],
        colorsChoosed: [],
        importersChoosed: [],
        statesChoosed: [],
        fuelsChoosed: [],
        fuelConsumptionChoosed: {from: null, to: null},
        mileageChoosed: {from: null, to: null},
        transmissionsChoosed: [],
        volumeChoosed: {from: null, to: null},
        doorsChoosed: {from: null, to: null},
        gearsChoosed: [],
        powerChoosed: {from: null, to: null},
        seatsChoosed: {from: null, to: null},
        techsChoosed: {
            security: [],
            comfort: [],
            multimedia: [],
            others: [],
        }
    }
};

let getters = {
    GET_TRANSPORTS: state => state.transportFullStore,
    GET_TRANSPORT_TYPES: state => state.transportTypes,
    GET_TRANSPORT_COLORS: state => state.transportColors,
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
    GET_TRANSPORT_TECHS: state => state.transportTechs,
};

let mutations = {
    SET_TRANSPORT_TYPE: (state, payload) => {
        state.transportFullStore.typeChoosed = payload;
        state.transportFullStore.bodiesChoosed = [];

        state.transportFullStore.fuelsChoosed = [];
        state.transportFullStore.fuelConsumptionChoosed = {from: null, to: null};
        state.transportFullStore.mileageChoosed = {from: null, to: null};

        state.transportFullStore.transmissionsChoosed = [];
        state.transportFullStore.volumeChoosed = {from: null, to: null};
        state.transportFullStore.doorsChoosed = {from: null, to: null};

        state.transportFullStore.gearsChoosed = [];
        state.transportFullStore.powerChoosed = {from: null, to: null};
        state.transportFullStore.seatsChoosed = {from: null, to: null};

        state.transportFullStore.techsChoosed = {
            security: [],
            comfort: [],
            multimedia: [],
            others: [],
        }

    },
    SET_TRANPORT_ARR: (state, payload) => {
        state.transportTypes = payload.transportTypes;
        state.transportBodies = payload.transportBodies;
        state.transportColors = payload.transportColors;
        state.transportStates = payload.transportStates;
        state.transportFuels = payload.transportFuels;
        state.transportGears = payload.transportGears;
        state.transportTechs = payload.transportTechs;
        state.transportTransmissions = payload.transportTransmissions;
        state.transportFullStore.typeChoosed = payload.typeChoosed;
        state.transportFullStore.bodiesChoosed = payload.bodiesChoosed;
        state.transportFullStore.colorsChoosed = payload.colorsChoosed;
        state.transportFullStore.importersChoosed = payload.importersChoosed;
        state.transportFullStore.statesChoosed = payload.statesChoosed;
        state.transportFullStore.fuelsChoosed = payload.fuelsChoosed;
        state.transportFullStore.fuelConsumptionChoosed = payload.fuelConsumptionChoosed;
        state.transportFullStore.mileageChoosed = payload.mileageChoosed;
        state.transportFullStore.transmissionsChoosed = payload.transmissionsChoosed;
        state.transportFullStore.volumeChoosed = payload.volumeChoosed;
        state.transportFullStore.doorsChoosed = payload.doorsChoosed;
        state.transportFullStore.gearsChoosed = payload.gearsChoosed;
        state.transportFullStore.powerChoosed = payload.powerChoosed;
        state.transportFullStore.seatsChoosed = payload.seatsChoosed;
        state.transportFullStore.techsChoosed = payload.techsChoosed;
    },
    SET_TRANSPORT_BODY_CHOOSE: (state, payload) => {
        const condition = state.transportFullStore.bodiesChoosed.find(function (el) {
            if (payload === el) return true;
        })

        if (condition !== undefined) {
            state.transportFullStore.bodiesChoosed.splice(state.transportFullStore.bodiesChoosed.indexOf(condition), 1);
        } else {
            state.transportFullStore.bodiesChoosed.push(payload)
        }
    },

    SET_COLORS_CHOOSE: (state, payload) => {
        state.transportFullStore.colorsChoosed.push(payload);
    },
    DELETE_COLORS_CHOOSE: (state, payload) => {
        state.transportFullStore.colorsChoosed.splice(state.transportFullStore.colorsChoosed.indexOf(payload), 1);
    },

    SET_TRANSPORT_STATE_CHOOSE: (state, payload) => {
        const condition = state.transportFullStore.statesChoosed.find(function (el) {
            if (payload === el) return true;
        })

        if (condition !== undefined) {
            state.transportFullStore.statesChoosed.splice(state.transportFullStore.statesChoosed.indexOf(condition), 1);
        } else {
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
    SET_TRANSMISSIONS_CHOOSE: (state, payload) => {
        state.transportFullStore.transmissionsChoosed.push(payload);
    },
    DELETE_TRANSMISSIONS_CHOOSE: (state, payload) => {
        state.transportFullStore.transmissionsChoosed.splice(state.transportFullStore.transmissionsChoosed.indexOf(payload), 1);
    },

    SET_GERAS_CHOOSE: (state, payload) => {
        state.transportFullStore.gearsChoosed.push(payload);
    },
    DELETE_GEARS_CHOOSE: (state, payload) => {
        state.transportFullStore.gearsChoosed.splice(state.transportFullStore.gearsChoosed.indexOf(payload), 1);
    },

    SET_TRANSPORT_TECHS_CHOOSE: (state, payload) => {
        const condition = state.transportFullStore.techsChoosed[payload.alias].find(function (el) {
            if (payload.val === el) return true;
        })

        if (condition !== undefined) {
            state.transportFullStore.techsChoosed[payload.alias].splice(state.transportFullStore.techsChoosed[payload.alias].indexOf(condition), 1);
        } else {
            state.transportFullStore.techsChoosed[payload.alias].push(payload.val)
        }

    },


    SET_TRANSPORT_TYPES_FROM_API: (state, payload) => {
        state.transportTypes = payload;
    },
    SET_TRANSPORT_BODIES_FROM_API: (state, payload) => {
        state.transportBodies = payload;
    },
    SET_TRANSMISSIONS_FROM_API: (state, payload) => {
        state.transportTransmissions = payload;
    },
    SET_GEARS_FROM_API: (state, payload) => {
        state.transportGears = payload;
    },
    SET_TECHS_FROM_API: (state, payload) => {
        state.transportTechs = payload;
    },


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
    TRANSMISSIONS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_TRANSMISSIONS_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },

    GEARS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_GEARS_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },

    TECHS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_TECHS_FROM_API', response.data);
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
