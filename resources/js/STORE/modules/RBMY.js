import {HTTP} from '../../http.js'

let state = {
    rbmyFullStore: [{
        regionChoose: null,
        brandChoose: null,
        modelsChoose: [],
        yearFrom: null,
        yearTo: null,
        brands: []
    }],
    manufactureRegions: [], //one load
    brands: [],
    modelsChoose: null,
};

let getters = {
    GET_RBMYS: state => {
        return state.rbmyFullStore;
    },
    GET_RBMY_NEW_INDEX: state => {
        return state.rbmyFullStore.length;
    },

    GET_MANUFACTURE_REGIONS: state => {
        return state.manufactureRegions;
    },
    GET_BRANDS: state => {
        return state.brands;
    }
};

let mutations = {
    CREATE_NEW_RBMY: (state, payload) => {
        state.rbmyFullStore.push({
            regionChoose: null,
            brandChoose: null,
            modelsChoose: [],
            yearFrom: null,
            yearTo: null,
            brands: []
        });
    },
    DELETE_RBMY: (state, payload) => {
        state.rbmyFullStore.splice(payload, 1);
    },
    SET_REGION_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].regionChoose = payload.choose;
        let manufactureBrands = [];
        state.brands.forEach(el => {
            if(el.manufacture == payload.choose.val){
                manufactureBrands.push(el);
            }
        });
        state.rbmyFullStore[payload.index].brands = manufactureBrands;
    },
    DELETE_REGION_CHOOSE: (state, payload) => {
        state.rbmyFullStore[payload.index].regionChoose = null;
        state.rbmyFullStore[payload.index].brands = [];
    },


    SET_MANUFACTURE_REGIONS_FROM_API: (state, payload) => {
        state.manufactureRegions = payload;
    },
    SET_BRANDS_FROM_API: (state, payload) => {
        state.brands = payload;
    },

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
    }

};

export default {
    state,
    getters,
    mutations,
    actions,
};
