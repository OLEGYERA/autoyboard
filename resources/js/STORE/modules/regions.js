import {HTTP} from '../../http.js'

let state = {
    choosedCities: [],
    choosedRegions: [],
    regionAndParts: [],
    FULL_REGIONS: [],
    // VerifyPageName: null,
    // lastVerify: [], // data || isNew
    // teapotLogin: null,
    // user: [],
};

let getters = {
    // AUTH_VERIFY_ID_COUNTER: state => {
    //     return state.VerifyIDCounter;
    // },
    // AUTH_VERIFY: state => {
    //     return state.lastVerify;
    // },
    // AUTH_TEAPOT_LOGIN: state => {
    //     return state.teapotLogin;
    // },
    // AUTH_USER: state => {
    //     return state.user;
    // },
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

                // const condition = state.choosedRegions.find(function(chr, i){
                //     if(chr === reg_el.alias) return true
                // })
                // console.log(condition)
                //
                // let choosedRegionByCity = false;
                // state.choosedCities.forEach((chc, i) => {
                //     if(chc.parent === reg_el.val){
                //         choosedRegionByCity = true;
                //         if(condition == undefined){
                //             state.choosedCities.splice(i, 1);
                //         }
                //     } else if(condition != undefined){
                //         choosedRegionByCity = true;
                //     }
                // })


                regionNewArr.push({
                    'val': reg_el.val,
                    'alias': reg_el.alias,
                    'name': reg_el.name,
                    'choosed': choosedRegionByCity,
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
        })

        if(!condition){
            state.choosedCities.push(payload)
        }
    },

    SET_REGIONS: (state, payload) => {
        state.FULL_REGIONS = payload;
    },

    SET_CHOOSED_REGIONS: (state, payload) => {
        const condition = state.choosedRegions.find(function(el){
            if(payload.target.id === el) return true;
        })

        if(condition && condition !== undefined){
            state.choosedRegions.splice(state.choosedRegions.indexOf(condition), 1);
        } else{
            state.choosedRegions.push(payload.target.id)
        }
    }


    // SET_VERIFY_PAGE_NAME: (state, payload) => {
    //     state.VerifyPageName = payload;
    // },
    // SET_AUIH_VERIFY: (state, payload) => {
    //     state.lastVerify = payload;
    // },
    // SET_AUIH_VERIFY_CODE: (state, payload) => {
    //     state.lastVerify = payload;
    // },
    // SET_AUTH_TEAPOT_LOGIN: (state, payload) => {
    //     state.teapotLogin = payload;
    // },
    // SET_AUTH_USER: (state, payload) => {
    //     state.user = payload;
    // },
    // ADD_TODO: (state, payload) => {
    //     state.todos.push(payload);
    // },
};

let actions = {
    FULL_REGIONS_FROM_API: async (context, payload) => {
        HTTP.get(payload)
            .then(response => {
                context.commit('SET_REGIONS', response.data);
            })
            .catch(error =>{
                console.log('error', error)
            })
    }
    // GET_AUTH_VERIFY:  (context, payload) => {
    //     let verify_page_name = context.state.VerifyPageName;
    //     HTTP.post(`auth/verify`, payload).then(response => {
    //         context.commit('SET_AUIH_VERIFY', {verify_page_name: verify_page_name, status: 1, data: response.data, sended_data: payload});
    //     }).catch(error => {
    //         context.commit('SET_AUIH_VERIFY', {verify_page_name: verify_page_name, status: 0, data: error.response, sended_data: payload});
    //     })
    // },
    // GET_AUTH_VERIFY_CODE: async (context, payload) => {
    //     let verify_page_name = context.state.VerifyPageName;
    //     HTTP.post(`auth/verify/code`, payload).then(response => {
    //         context.commit('SET_AUIH_VERIFY_CODE', {verify_page_name: verify_page_name, status: 1, data: response.data, sended_data: payload});
    //     }).catch(error => {
    //         context.commit('SET_AUIH_VERIFY_CODE', {verify_page_name: verify_page_name, status: 0, data: error.response, sended_data: payload});
    //     })
    // },
    // GET_AUTH_USER: (context, payload) => {
    //     HTTP.post(`auth/get/user`, payload).then(response => {
    //         context.commit('SET_AUTH_USER', {status: 1, data: response.data, sended_data: payload});
    //     }).catch(error => {
    //         context.commit('SET_AUTH_USER', {status: 0, data: error.response, sended_data: payload});
    //     })
    // },
    // GET_TODO: async (context, payload) => {
    //     let {data} = await Axios.get('http://yourwebsite.com/api/todo');
    //     context.commit('SET_TODO', data);
    // },
    //
    // SAVE_TODO: async (context, payload) => {
    //     let {data} = await Axios.post('http://yourwebsite.com/api/todo');
    //     context.commit('ADD_TODO', payload);
    // },
};

export default {
    state,
    getters,
    mutations,
    actions,
};
