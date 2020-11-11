import {HTTP} from '../../http.js'

let state = {
    choosedCities: [],
    choosedRegions: [],
    choosedRegionParts: [],
    cities: [],
    FULL_REGIONS: [],
};

let getters = {
    GET_CITIES: state => {
        const sortedCities = state.cities.sort(function (a, b){
            var nameA=a.name.toLowerCase(), nameB=b.name.toLowerCase()
            if (nameA < nameB) return -1
            if (nameA > nameB) return 1
            return 0
        })
        return sortedCities;
    },
    GET_CHOOSED_CITIES: state => state.choosedCities,
    GET_CHOOSED_REGIONS: state => state.choosedRegions,
    GET_REGION_AND_PART_FROM_STORE: state => {
        let regionAndParts = [];
        state.FULL_REGIONS.forEach((el, i) => {
            let regionNewArr = [],
                partsChoosed = state.choosedRegionParts.indexOf(el.val) !== -1,
                countChoosed = 0;
            el.children.forEach((reg_el, reg_i) => {
                let choosed = state.choosedRegions.indexOf(reg_el.val) !== -1;
                if(choosed) countChoosed++;
                regionNewArr.push({'val': reg_el.val, 'alias': reg_el.alias, 'name': reg_el.name,
                    'choosed': choosed,
                })
            })
            if(el.children.length == countChoosed && !partsChoosed){
                state.choosedRegionParts.push(el.val);
            }
            else if(el.children.length !== countChoosed && partsChoosed){
                state.choosedRegionParts.splice(state.choosedRegionParts.indexOf(el.val), 1);
            }
            partsChoosed = state.choosedRegionParts.indexOf(el.val) !== -1

            regionAndParts.push({'val': el.val, 'alias': el.alias, 'name': el.name, 'choosed': partsChoosed, 'children': regionNewArr})
        })

        return regionAndParts
    },
};

let mutations = {
    SET_REGION_ARR: (state, payload) => {
        state.choosedRegions = payload.choosedRegions,
        state.choosedCities = payload.choosedCities
    },
    SET_REGION_ARR_STATIC: (state, payload) => {
        state.FULL_REGIONS = payload;
        payload.forEach(el => {
            el.children.forEach(el_reg => {
                el_reg.children.forEach(el_city => {
                    state.cities.push(el_city);
                })
            })
        })
    },
    SET_CITIES_CHOOSE: (state, payload) => {
        state.choosedCities.push(payload);
    },
    DELETE_CITIES_CHOOSE: (state, payload) => {
        state.choosedCities.splice(state.choosedCities.indexOf(payload), 1);
    },
    SET_CHOOSED_REGIONS: (state, payload) => {
        const condition = state.choosedRegions.find(function(el){
            if(payload === el) return true;
        })

        if(condition !== undefined){
            state.choosedRegions.splice(state.choosedRegions.indexOf(condition), 1);
        } else{
            state.choosedRegions.push(payload)
        }
    },
    SET_CHOOSED_REGION_PARTS: (state, payload) =>{
        let choosedPartPos = state.choosedRegionParts.indexOf(payload),
            regionPartID = payload - 1;

        if(state.choosedRegionParts.indexOf(payload) !== -1){
            state.choosedRegionParts.splice(choosedPartPos, 1);

            state.FULL_REGIONS[regionPartID].children.forEach(el => {
                 state.choosedRegions.splice(state.choosedRegions.indexOf(el.val), 1);
            })
        } else{
            state.FULL_REGIONS[regionPartID].children.forEach(el => {
                if(state.choosedRegions.indexOf(el.val) == -1)
                    state.choosedRegions.push(el.val);
            })
            state.choosedRegionParts.push(payload)
        }
    },
    CLEAR_REGION_MODULE: (state, payload) => {
        state.choosedCities = [];
        state.choosedRegions = [];
        state.choosedRegionParts = [];
    }
};

export default {
    state,
    getters,
    mutations,
};
