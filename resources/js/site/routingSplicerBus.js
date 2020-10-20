import Vue from "vue";
import {HTTP} from "../http.js";

export const routingSplicerBus = new Vue({
    methods: {
        //deconstrucot
        ValidateUri(search){
            return async() => HTTP.post('/validateSearch', {uri: search.substring(1)}).then(response => response.data)
        },

        //constructor
        creatingSEARCHDETAILsProps(arr) {
            let strProps = '';
            strProps += 'sch[autoCond]=' + arr.autoConditionChoosed + '&';
            // strProps += arr.searchPropsChoosed.fullResource ? 'sch[fr]=true&' : '';
            // strProps += arr.searchPropsChoosed.verifiedAuto ? 'sch[va]=true&' : '';
            strProps += arr.searchPropsChoosed.withPhoto ? 'sch[wph]=true&' : '';

            strProps += arr.searchPropsChoosed.abroad ? 'sch[ab]=true&' : '';
            strProps += arr.searchPropsChoosed.credit ? 'sch[cr]=true&' : '';
            strProps += arr.searchPropsChoosed.customsСleared ? 'sch[cc]=true&' : '';
            strProps += arr.searchPropsChoosed.confiscated ? 'sch[cf]=true&' : '';
            strProps += arr.searchPropsChoosed.accident ? 'sch[acc]=true&' : '';
            strProps += arr.searchPropsChoosed.noMotion ? 'sch[nom]=true&' : '';


            strProps += arr.searchPropsChoosed.bargain ? 'sch[b]=true&' : '';
            strProps += arr.searchPropsChoosed.exchangeCar ? 'sch[ec]=true&' : '';
            strProps += arr.searchPropsChoosed.exchangeHouse ? 'sch[eh]=true&' : '';

            strProps += 'sch[curr]=' + arr.priceChoosed.currency + '&'
            strProps += arr.priceChoosed.from ? 'sch[priceF]=' + arr.priceChoosed.from + '&' : '';
            strProps += arr.priceChoosed.to ? 'sch[priceT]=' + arr.priceChoosed.to + '&' : '';

            // strProps += 'transport[type]=' + arr.typeChoosed + '&';
            // if(arr.bodiesChoosed.length > 0){
            //     arr.bodiesChoosed.forEach((el, i) =>{
            //         strProps += 'transport[bodies][' + i + ']=' + el + '&';
            //     });
            // }
            return strProps.substring(0, strProps.length - 1);
        },
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
        creatingREGIONsProps(regions, cities) {
            let strProps = '';
            if(regions.length > 0){
                regions.forEach((el, i) => {
                    strProps += 'region[reg][' + i + ']=' + el + '&';
                })
            }
            if(cities.length > 0){
                cities.forEach((el, i) => {
                    strProps += 'region[city][' + i + ']=' + el + '&';
                })
            }
            return strProps.substring(0, strProps.length - 1);
        },
    },
})
