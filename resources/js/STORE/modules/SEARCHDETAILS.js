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
            /**/confiscated: null,
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
        },
        systemSorting: [],
        sortingChoosed: null,
        systemPeriod: [],
        periodChoosed: null,
        systemRelevance: [],
        relevanceChoosed: null,
        systemShow: [],
        showChoosed: null,
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
    SET_SORTING_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.sortingChoosed = payload;
    },
    SET_PERIOD_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.periodChoosed = payload;
    },
    SET_RELEVANCE_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.relevanceChoosed = payload;
    },
    SET_SHOW_CHOOSED: (state, payload) => {
        state.searchDetailFullStore.showChoosed = payload;
    },
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
