import Vue from "vue";
import {HTTP} from "../http.js";

export const routingSplicerBus = new Vue({
    methods: {
        //constructor
        creatingSEARCHDETAILsProps(arr) {
            let strProps = '';
            strProps += arr.autoConditionChoosed !== 1 ? 's[autoCond]=' + arr.autoConditionChoosed + '&': '';
            // strProps += arr.searchPropsChoosed.fullResource ? 's[fr]=true&' : '';
            // strProps += arr.searchPropsChoosed.verifiedAuto ? 's[va]=true&' : '';
            strProps += arr.searchPropsChoosed.withPhoto !== true ? 's[wph]=false&' : '';

            strProps += arr.searchPropsChoosed.abroad ? 's[ab]=true&' : '';
            strProps += arr.searchPropsChoosed.credit ? 's[cr]=true&' : '';
            strProps += arr.searchPropsChoosed.customsСleared ? 's[cc]=true&' : '';
            strProps += arr.searchPropsChoosed.accident ? 's[acc]=true&' : '';
            strProps += arr.searchPropsChoosed.noMotion ? 's[nom]=true&' : '';

            strProps += arr.searchPropsChoosed.bargain ? 's[b]=true&' : '';
            strProps += arr.searchPropsChoosed.exchange ? 's[e]=true&' : '';

            strProps += arr.priceChoosed.currency !== 1 ?  's[curr]=' + arr.priceChoosed.currency + '&' : '';
            strProps += arr.priceChoosed.from ? 's[priceF]=' + arr.priceChoosed.from + '&' : '';
            strProps += arr.priceChoosed.to ? 's[priceT]=' + arr.priceChoosed.to + '&' : '';

            strProps += arr.sortingChoosed !== 1 ? 's[sort]=' + arr.sortingChoosed + '&' : '';
            strProps += arr.periodChoosed !== 1 ? 's[period]=' + arr.periodChoosed + '&' : '';
            strProps += arr.relevanceChoosed !== 1 ? 's[rel]=' + arr.relevanceChoosed + '&' : '';
            strProps += arr.showChoosed !== 1 ? 's[show]=' + arr.showChoosed + '&' : '';


            return strProps.substring(0, strProps.length - 1);
        },
        creatingTRANSPORTsProps(arr) {
            let strProps = '';
            strProps += arr.typeChoosed !== 1 ? 't[type]=' + arr.typeChoosed + '&' : '';
            if(arr.bodiesChoosed.length > 0){
                arr.bodiesChoosed.forEach((el, i) =>{
                    strProps += 't[bodies][' + i + ']=' + el + '&';
                });
            }
            if(arr.colorsChoosed.length > 0){
                arr.colorsChoosed.forEach((el, i) =>{
                    strProps += 't[colors][' + i + ']=' + el + '&';
                });
            }
            if(arr.importersChoosed.length > 0){
                arr.importersChoosed.forEach((el, i) =>{
                    strProps += 't[imp][' + i + ']=' + el + '&';
                });
            }
            if(arr.statesChoosed.length > 0){
                arr.statesChoosed.forEach((el, i) =>{
                    strProps += 't[states][' + i + ']=' + el + '&';
                });
            }

            if(arr.fuelsChoosed.length > 0){
                arr.fuelsChoosed.forEach((el, i) =>{
                    strProps += 't[fuels][' + i + ']=' + el + '&';
                });
            }

            strProps += arr.fuelConsumptionChoosed.from ? 't[fuelsF]=' + arr.fuelConsumptionChoosed.from + '&' : '';
            strProps += arr.fuelConsumptionChoosed.to ? 't[fuelsT]=' + arr.fuelConsumptionChoosed.to + '&' : '';

            strProps += arr.mileageChoosed.from ? 't[mileageF]=' + arr.mileageChoosed.from + '&' : '';
            strProps += arr.mileageChoosed.to ? 't[mileageT]=' + arr.mileageChoosed.to + '&' : '';

            if(arr.transmissionsChoosed.length > 0){
                arr.transmissionsChoosed.forEach((el, i) =>{
                    strProps += 't[trans][' + i + ']=' + el + '&';
                });
            }
            strProps += arr.volumeChoosed.from ? 't[volF]=' + arr.volumeChoosed.from + '&' : '';
            strProps += arr.volumeChoosed.to ? 't[volT]=' + arr.volumeChoosed.to + '&' : '';

            strProps += arr.doorsChoosed.from ? 't[doorsF]=' + arr.doorsChoosed.from + '&' : '';
            strProps += arr.doorsChoosed.to ? 't[doorsT]=' + arr.doorsChoosed.to + '&' : '';

            if(arr.gearsChoosed.length > 0){
                arr.gearsChoosed.forEach((el, i) =>{
                    strProps += 't[gears][' + i + ']=' + el + '&';
                });
            }
            strProps += arr.powerChoosed.from ? 't[powF]=' + arr.powerChoosed.from + '&' : '';
            strProps += arr.powerChoosed.to ? 't[powT]=' + arr.powerChoosed.to + '&' : '';

            strProps += arr.seatsChoosed.from ? 't[seatsF]=' + arr.seatsChoosed.from + '&' : '';
            strProps += arr.seatsChoosed.to ? 't[seatsT]=' + arr.seatsChoosed.to + '&' : '';

            if(arr.techsChoosed.security.length > 0){
                arr.techsChoosed.security.forEach((el, i) =>{
                    strProps += 't[secur][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.comfort.length > 0){
                arr.techsChoosed.comfort.forEach((el, i) =>{
                    strProps += 't[comf][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.multimedia.length > 0){
                arr.techsChoosed.multimedia.forEach((el, i) =>{
                    strProps += 't[mult][' + i + ']=' + el + '&';
                });
            }
            if(arr.techsChoosed.others.length > 0){
                arr.techsChoosed.others.forEach((el, i) =>{
                    strProps += 't[oth][' + i + ']=' + el + '&';
                });
            }

            return strProps.substring(0, strProps.length - 1);
        },
        creatingRBMYsProps(arr) {
            let strProps = '';
            arr.forEach((el, i) => {
                if (el.regionChoose !== null || el.brandChoose !== null || el.yearFrom !== null || el.yearTo !== null) {
                    strProps += el.regionChoose !== null ? 'rbmy[' + i + '][r]=' + el.regionChoose + '&' : '';
                    strProps += el.brandChoose !== null ? 'rbmy[' + i + '][b]=' + el.brandChoose + '&' : '';
                    if (el.brandChoose !== null && el.modelsChoose.length > 0) {
                        el.modelsChoose.forEach((el_model, i_model) => {
                            strProps += 'rbmy[' + i + '][m][' + i_model + ']=' + el_model + '&';
                        })
                    }
                    strProps  += el.yearFrom !== null ? 'rbmy[' + i + '][f]='+ el.yearFrom + '&' : '';
                    strProps  += el.yearTo !== null ? 'rbmy[' + i + '][t]='+ el.yearTo + '&' : '';
                }
            })
            return strProps.substring(0, strProps.length - 1);
        },
        creatingREGIONsProps(regions, cities) {
            let strProps = '';
            if(regions.length > 0){
                regions.forEach((el, i) => {
                    strProps += 'r[reg][' + i + ']=' + el + '&';
                })
            }
            if(cities.length > 0){
                cities.forEach((el, i) => {
                    strProps += 'r[city][' + i + ']=' + el + '&';
                })
            }
            return strProps.substring(0, strProps.length - 1);
        },
    },
})
