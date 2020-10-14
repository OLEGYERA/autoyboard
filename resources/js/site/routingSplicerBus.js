import Vue from "vue";
import {HTTP} from "../http.js";

export const routingSplicerBus = new Vue({
    methods: {
        //deconstrucot
        ValidateUri(search){
            return async() => HTTP.post('/validateSearch', {uri: search.substring(1)}).then(response => response.data)
        },

        //constructor
        creatingTRANSPORTsProps(arr) {
            let strProps = '';
            strProps += 'transport[type]=' + arr.typeChoosed + '&';
            if(arr.bodiesChoosed.length > 0){
                arr.bodiesChoosed.forEach((el, i) =>{
                    strProps += 'transport[bodies][' + i + ']=' + el + '&';
                });
            }
            return strProps.substring(0, strProps.length - 1);
        },
        creatingRBMYsProps(arr) {
            let strProps = '';
            arr.forEach((el, i) => {
                if (el.regionChoose !== null || el.brandChoose !== null || el.yearFrom !== null || el.yearTo !== null) {
                    strProps += el.regionChoose !== null ? 'rbmy[' + i + '][reg]=' + el.regionChoose + '&' : '';
                    strProps += el.brandChoose !== null ? 'rbmy[' + i + '][brand]=' + el.brandChoose + '&' : '';
                    if (el.brandChoose !== null && el.modelsChoose.length > 0) {
                        el.modelsChoose.forEach((el_model, i_model) => {
                            strProps += 'rbmy[' + i + '][model][' + i_model + ']=' + el_model + '&';
                        })
                    }
                    strProps  += el.yearFrom !== null ? 'rbmy[' + i + '][yearF]='+ el.yearFrom + '&' : '';
                    strProps  += el.yearTo !== null ? 'rbmy[' + i + '][yearT]='+ el.yearTo + '&' : '';
                }
            })
            return strProps.substring(0, strProps.length - 1);
        },
    },
})
