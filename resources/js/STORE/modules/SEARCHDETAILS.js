import {HTTP} from '../../http.js'

let state = {
    currencies: [
        {val: 1, name: '$'}, {val: 2, name: '₴'}, {val: 3, name: '€'}
    ],
    searchDetailFullStore: {
        autoConditionChoosed: null,
        searchPropsChoosed: {
            // fullResource: null,
            // verifiedAuto: null,
            withPhoto: null,

            abroad: null,
            credit: null,
            customsСleared: null,
            confiscated: null,
            accident: null,
            noMotion: null,

            bargain: null,
            exchangeCar: null,
            exchangeHouse: null,

        },
        priceChoosed: {
            currency: null,
            from: null,
            to: null,
        }

    },
};

let getters = {
    GET_SEARCHDETAILS: state => state.searchDetailFullStore,
    GET_CURRENCIES: state => state.currencies,
};

let mutations = {
    SET_SEARCHDETAIL_ARR: (state, payload) => {
        state.searchDetailFullStore = payload;
    },
    SET_AUTO_CONDITION_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.autoConditionChoosed = payload;
    },
    SET_SEARCH_PROPS_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.searchPropsChoosed[payload.name] = payload.val;
    },
    SET_PRICE_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.priceChoosed[payload.name] = payload.val;
    },

    // SET_TRANPORT_ARR: (state, payload) => {
    //     state.transportTypes = payload.transportTypes;
    //     state.transportBodies = payload.transportBodies;
    //     state.transportFullStore.typeChoosed = payload.typeChoosed;
    //     state.transportFullStore.bodiesChoosed = payload.bodiesChoosed;
    // },
    // SET_TRANSPORT_BODY_CHOOSE: (state, payload) => {
    //     const condition = state.transportFullStore.bodiesChoosed.find(function(el){
    //         if(payload === el) return true;
    //     })
    //
    //     if(condition !== undefined){
    //         state.transportFullStore.bodiesChoosed.splice(state.transportFullStore.bodiesChoosed.indexOf(condition), 1);
    //     } else{
    //         state.transportFullStore.bodiesChoosed.push(payload)
    //     }
    // },
    //
    // SET_TRANSPORT_TYPES_FROM_API: (state, payload) => {
    //     state.transportTypes = payload;
    // },
    //
    // SET_TRANSPORT_BODIES_FROM_API: (state, payload) => {
    //     state.transportBodies = payload;
    // }
}

let actions = {
    // TRANSPORT_TYPES_FROM_API: async (context, payload) => {
    //     HTTP.get(payload)
    //         .then(response => {
    //             context.commit('SET_TRANSPORT_TYPES_FROM_API', response.data);
    //         })
    //         .catch(error =>{
    //             console.log('error', error)
    //         })
    // },
    //
    // BODIES_FROM_API: async (context, payload) => {
    //     HTTP.get(payload)
    //         .then(response => {
    //             context.commit('SET_TRANSPORT_BODIES_FROM_API', response.data);
    //         })
    //         .catch(error =>{
    //             console.log('error', error)
    //         })
    // },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
