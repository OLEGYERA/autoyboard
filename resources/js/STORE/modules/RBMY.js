import {HTTP} from '../../http.js'

let state = {
    rbmyFullStore: [{
        regionChoose: null,
        brandChoose: null,
        modelsChoose: [],
        yearFrom: null,
        yearTo: null,
        brands: [],
        models: [],
    }],
    manufactureRegions: [], //one load
    brands: [],
    years: [],
};

let getters = {
    GET_RBMYS: state => {
        return state.rbmyFullStore;
    },
    GET_MANUFACTURE_REGIONS: state => {
        return state.manufactureRegions;
    },
    //if absent RBMY brand units
    GET_BRANDS: state => {
        return state.brands;
    },
    GET_YEARS: state => {
        return state.years;
    }
};

let mutations = {
    SET_NEW_RBMY: (state, payload) => {
        state.rbmyFullStore = payload;
    },
    CREATE_NEW_RBMY: (state, payload) => {
        state.rbmyFullStore.push({
            regionChoose: null,
            brandChoose: null,
            modelsChoose: [],
            yearFrom: null,
            yearTo: null,
            brands: [],
            models: []
        });
    },
    DELETE_RBMY: (state, payload) => {
        state.rbmyFullStore.splice(payload, 1);
    },
    SET_REGION_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].regionChoose = payload.choose;
        let manufactureBrands = [];
        state.brands.forEach(el => {
            if(el.manufacture == payload.choose && el.manufacture !== null){
                manufactureBrands.push(el);
            }
        });
        state.rbmyFullStore[payload.index].brands = manufactureBrands;
        state.rbmyFullStore[payload.index].brandChoose = null;
        state.rbmyFullStore[payload.index].models = [];
        state.rbmyFullStore[payload.index].modelsChoose = [];
    },
    DELETE_REGION_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].regionChoose = null;
        state.rbmyFullStore[payload.index].brands = [];
        state.rbmyFullStore[payload.index].brandChoose = null;
        state.rbmyFullStore[payload.index].models = [];
        state.rbmyFullStore[payload.index].modelsChoose = [];
    },
    CLEAR_BRANDS_MODELS: (state, payload) => {
        state.rbmyFullStore = [{
            regionChoose: null,
            brandChoose: null,
            modelsChoose: [],
            yearFrom: null,
            yearTo: null,
            brands: [],
            models: []
        }];
    },
    SET_BRAND_CHOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].brandChoose = payload.choose;
        state.rbmyFullStore[payload.index].models = [];
        state.rbmyFullStore[payload.index].modelsChoose = [];
    },
    DELETE_BRAND_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].brandChoose = null;
        state.rbmyFullStore[payload.index].models = [];
        state.rbmyFullStore[payload.index].modelsChoose = [];
    },
    SET_MODELS_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].modelsChoose.push(payload.choose);
    },
    DELETE_MODELS_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].modelsChoose.splice(state.rbmyFullStore[payload.index].modelsChoose.indexOf(payload.choose), 1);
    },
    SET_YEAR_FROM: (state, payload) => {
        let smartLink = state.rbmyFullStore[payload.index]
        if(smartLink.yearTo !== null && payload.choose > smartLink.yearTo){
            let temp = smartLink.yearTo;
            smartLink.yearTo = payload.choose;
            smartLink.yearFrom = temp;
        }
        else{
            state.rbmyFullStore[payload.index].yearFrom = payload.choose;
        }
    },
    DELETE_YEAR_FROM: (state, payload) => {
        state.rbmyFullStore[payload.index].yearFrom = null;
    },
    SET_YEAR_TO: (state, payload) => {
        let smartLink = state.rbmyFullStore[payload.index]
        if(smartLink.yearFrom !== null && payload.choose < smartLink.yearFrom){
            let temp = smartLink.yearFrom;
            smartLink.yearFrom = payload.choose;
            smartLink.yearTo = temp;
        }
        else{
            state.rbmyFullStore[payload.index].yearTo = payload.choose;
        }
    },
    DELETE_YEAR_TO: (state, payload) => {
        state.rbmyFullStore[payload.index].yearTo = null;
    },

    SET_MANUFACTURE_REGIONS_FROM_API: (state, payload) => {
        state.manufactureRegions = payload;
    },
    SET_BRANDS_FROM_API: (state, payload) => {
        state.brands = payload;
    },
    SET_MODELS_FROM_API: (state, payload) => {
        state.rbmyFullStore[payload.index].models = payload.models;
    },
    SET_YEAR_FROM_GENERATOR: (state, payload) => {
        state.years = payload;
    }



};

let actions = {
    MANUFACTURE_REGIONS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_MANUFACTURE_REGIONS_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },
    BRANDS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_BRANDS_FROM_API', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },
    MODELS_FROM_API: async (context, payload) => {
        HTTP.get(payload['url'])
            .then(response => {
                payload['models'] = response.data;
                context.commit('SET_MODELS_FROM_API', payload);
            })
            .catch(error =>{
                console.log('error', error)
            })
    },
    GENERATE_YEAR: (context, payload) => {
        let YearArr = [];
        for(let i = payload; i >= 1900; i--){
            YearArr.push({'name': '' + i, 'val': i});
        }
        context.commit('SET_YEAR_FROM_GENERATOR', YearArr);
    }

};

export default {
    state,
    getters,
    mutations,
    actions,
};
