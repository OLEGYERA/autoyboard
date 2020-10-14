import {HTTP} from '../../http.js'

let state = {
    choosedCities: [],
    choosedRegions: [],
    regionAndParts: [],
    FULL_REGIONS: [],
};

let getters = {
    GET_CHOOSED_CITIES_FROM_STORE: state => {
        const sortedCities = state.choosedCities.sort(function (a, b){
            var nameA=a.name.toLowerCase(), nameB=b.name.toLowerCase()
            if (nameA < nameB) return -1
            if (nameA > nameB) return 1
            return 0
        })
        return sortedCities;
    },
    GET_FULL_REGION_FROM_STORE: state => {
        return state.FULL_REGIONS;
    },

    GET_REGION_AND_PART_FROM_STORE: state => {
        state.regionAndParts = [];
        state.FULL_REGIONS.forEach((el, i) => {
            let regionNewArr = [];
            el.children.forEach((reg_el, reg_i) => {
                //функция включения регионов, если регион включен принудительно

                const condition = state.choosedRegions.find(function(chr, i){
                    if(chr === reg_el.val){
                        console.log(reg_el.name)
                        return true
                    }
                })

                //функция включения регионов, если город включен, а регион нет
                let choosedRegionByCity = false;
                state.choosedCities.forEach((chc, i) => {
                    if(chc.parent === reg_el.val){
                        choosedRegionByCity = true;
                    }
                })

                regionNewArr.push({
                    'val': reg_el.val,
                    'alias': reg_el.alias,
                    'name': reg_el.name,
                    'choosed': choosedRegionByCity || condition !== undefined,
                })
            })

            state.regionAndParts.push({
                'val': el.val,
                'alias': el.alias,
                'name': el.name,
                'choosed': false,
                'children': regionNewArr
            })
        })

        return state.regionAndParts
    }
};

let mutations = {
    SET_CITIES_TO_STORE: (state, payload) => {
        const condition = state.choosedCities.find(function(el, i){
            if(payload.val === el.val) return true
            console.log(payload.val === el.val)
        })
        if(!condition){
            state.choosedCities.push(payload)
        }
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

    SET_REGIONS_FROM_API: (state, payload) => {
        state.FULL_REGIONS = payload;
    },
};

let actions = {
    FULL_REGIONS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_REGIONS_FROM_API', response.data);
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
