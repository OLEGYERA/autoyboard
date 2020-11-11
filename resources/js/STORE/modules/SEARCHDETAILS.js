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
            accident: null,
            noMotion: null,

            bargain: null,
            exchange: null,
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
    CLEAR_SEARCHDETAIL_MODULE: (state, payload) => {
        state.searchDetailFullStore.autoConditionChoosed = 1;
        state.searchDetailFullStore.searchPropsChoosed = {
            withPhoto: true,
            abroad: false,
            credit: false,
            customsСleared: false,
            accident: false,
            noMotion: false,
            bargain: false,
            exchange: false,
        };
        state.searchDetailFullStore.priceChoosed = {
            currency: 1,
            from: '',
            to: '',
        };
        state.searchDetailFullStore.sortingChoosed = 1;
        state.searchDetailFullStore.periodChoosed = 1;
        state.searchDetailFullStore.relevanceChoosed = 1;
        state.searchDetailFullStore.showChoosed = 1;
    },
}

export default {
    state,
    getters,
    mutations,
};
