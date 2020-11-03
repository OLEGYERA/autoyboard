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
            strProps += arr.searchPropsChoosed.withPhoto !== true ? 'sch[wph]=false&' : '';

            strProps += arr.searchPropsChoosed.abroad !== false ? 'sch[ab]=true&' : '';
            strProps += arr.searchPropsChoosed.credit !== false ? 'sch[cr]=true&' : '';
            strProps += arr.searchPropsChoosed.customsСleared !== false ? 'sch[cc]=true&' : '';
            strProps += arr.searchPropsChoosed.accident !== false ? 'sch[acc]=true&' : '';
            strProps += arr.searchPropsChoosed.noMotion !== false ? 'sch[nom]=true&' : '';

            strProps += arr.searchPropsChoosed.bargain ? 'sch[b]=true&' : '';
            strProps += arr.searchPropsChoosed.exchange ? 'sch[e]=true&' : '';

            strProps += 'sch[curr]=' + arr.priceChoosed.currency + '&'
            strProps += arr.priceChoosed.from ? 'sch[priceF]=' + arr.priceChoosed.from + '&' : '';
            strProps += arr.priceChoosed.to ? 'sch[priceT]=' + arr.priceChoosed.to + '&' : '';

            strProps += arr.sortingChoosed ? 'sch[sort]=' + arr.sortingChoosed + '&' : '';
            strProps += arr.periodChoosed ? 'sch[period]=' + arr.periodChoosed + '&' : '';
            strProps += arr.relevanceChoosed ? 'sch[rel]=' + arr.relevanceChoosed + '&' : '';
            strProps += arr.showChoosed ? 'sch[show]=' + arr.showChoosed + '&' : '';


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
            if(arr.colorsChoosed.length > 0){
                arr.colorsChoosed.forEach((el, i) =>{
                    strProps += 'transport[colors][' + i + ']=' + el + '&';
                });
            }
            if(arr.importersChoosed.length > 0){
                arr.importersChoosed.forEach((el, i) =>{
                    strProps += 'transport[imp][' + i + ']=' + el + '&';
                });
            }
            if(arr.statesChoosed.length > 0){
                arr.statesChoosed.forEach((el, i) =>{
                    strProps += 'transport[states][' + i + ']=' + el + '&';
                });
            }

            if(arr.fuelsChoosed.length > 0){
                arr.fuelsChoosed.forEach((el, i) =>{
                    strProps += 'transport[fuels][' + i + ']=' + el + '&';
                });
            }

            strProps += arr.fuelConsumptionChoosed.from ? 'transport[fuelsF]=' + arr.fuelConsumptionChoosed.from + '&' : '';
            strProps += arr.fuelConsumptionChoosed.to ? 'transport[fuelsT]=' + arr.fuelConsumptionChoosed.to + '&' : '';

            strProps += arr.mileageChoosed.from ? 'transport[mileageF]=' + arr.mileageChoosed.from + '&' : '';
            strProps += arr.mileageChoosed.to ? 'transport[mileageT]=' + arr.mileageChoosed.to + '&' : '';

            if(arr.transmissionsChoosed.length > 0){
                arr.transmissionsChoosed.forEach((el, i) =>{
                    strProps += 'transport[trans][' + i + ']=' + el + '&';
                });
            }
            strProps += arr.volumeChoosed.from ? 'transport[volF]=' + arr.volumeChoosed.from + '&' : '';
            strProps += arr.volumeChoosed.to ? 'transport[volT]=' + arr.volumeChoosed.to + '&' : '';

            strProps += arr.doorsChoosed.from ? 'transport[doorsF]=' + arr.doorsChoosed.from + '&' : '';
            strProps += arr.doorsChoosed.to ? 'transport[doorsT]=' + arr.doorsChoosed.to + '&' : '';

            if(arr.gearsChoosed.length > 0){
                arr.gearsChoosed.forEach((el, i) =>{
                    strProps += 'transport[gears][' + i + ']=' + el + '&';
                });
            }
            strProps += arr.powerChoosed.from ? 'transport[powF]=' + arr.powerChoosed.from + '&' : '';
            strProps += arr.powerChoosed.to ? 'transport[powT]=' + arr.powerChoosed.to + '&' : '';

            strProps += arr.seatsChoosed.from ? 'transport[seatsF]=' + arr.seatsChoosed.from + '&' : '';
            strProps += arr.seatsChoosed.to ? 'transport[seatsT]=' + arr.seatsChoosed.to + '&' : '';

            if(arr.techsChoosed.security.length > 0){
                arr.techsChoosed.security.forEach((el, i) =>{
                    strProps += 'transport[secur][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.comfort.length > 0){
                arr.techsChoosed.comfort.forEach((el, i) =>{
                    strProps += 'transport[comf][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.multimedia.length > 0){
                arr.techsChoosed.multimedia.forEach((el, i) =>{
                    strProps += 'transport[mult][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.others.length > 0){
                arr.techsChoosed.others.forEach((el, i) =>{
                    strProps += 'transport[oth][' + i + ']=' + el + '&';
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
