<template>
    <div class="yform mobile" v-if="mobile">
        <div class="another_options">
            <div class="ysearch_type_btn">
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(1)"
                        :class="{active: searchDeatils.autoConditionChoosed == 1}">
                    Все
                </button>
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(2)"
                        :class="{active: searchDeatils.autoConditionChoosed == 2}">
                    Новые
                </button>
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(3)"
                        :class="{active: searchDeatils.autoConditionChoosed == 3}">
                    Б/у
                </button>
            </div>
            <div class="selector-rows">
                <yselectsearch
                    @updateChoose='reInitFilterByClick($event)'
                    :shade="true"
                    :deleteDis="true"
                    :placeholder="'Выберите тип транспорта'"
                    :options="transportTypes"
                    :choosedItem="transportsArr.typeChoosed">
                </yselectsearch>
                <yselectsearch
                    @updateChoose='setBrandsAndGetModels({choose: $event, index: 0})'
                    @deleteChoose='DELETE_BRAND_CHOOSE({index: 0})'
                    :shade="true"
                    :placeholder="'Выберите марку'"
                    :options="rbmysArr[0].brands.length > 0 ? rbmysArr[0].brands : brands"
                    :choosedItem="rbmysArr[0].brandChoose"
                >
                </yselectsearch>
                <yselectmultysearch
                    @updateChoose='SET_MODELS_CHOOSE({choose: $event, index: 0})'
                    @deleteChoose='DELETE_MODELS_CHOOSE({choose: $event, index: 0})'
                    :shade="true"
                    :placeholder="'Выберите модель'"
                    :options="rbmysArr[0].models"
                    :choosedItems="rbmysArr[0].modelsChoose"></yselectmultysearch>
                <yselectmultysearch
                    @updateChoose='SET_CITIES_CHOOSE($event)'
                    @deleteChoose='DELETE_CITIES_CHOOSE($event)'
                    :shade="true"
                    :placeholder="'Выберите город'"
                    :options="cities"
                    :choosedItems="choosedCities"></yselectmultysearch>
                <div class="option-row">
                    <yselectsearch
                        @updateChoose="SET_YEAR_FROM({choose: $event, index: 0})"
                        @deleteChoose="DELETE_YEAR_FROM({choose: $event, index: 0})"
                        :shade="true"
                        :placeholder="'Год от'"
                        :options="years"
                        :choosedItem="rbmysArr[0].yearFrom"></yselectsearch>
                    <yselectsearch
                        @updateChoose="SET_YEAR_TO({choose: $event, index: 0})"
                        @deleteChoose="DELETE_YEAR_TO({choose: $event, index: 0})"
                        :shade="true"
                        :placeholder="'Год до'"
                        :options="years"
                        :choosedItem="rbmysArr[0].yearTo"></yselectsearch>
                </div>
            </div>

            <div class="ygroup-box">
                <h2 class="yfilter-aside-title">Цена</h2>
                <div class="yprice_filter-box">
                    <yprice :priceChoosed="price"></yprice>
                    <ycheckbox
                        :name="'Возможен торг'"
                        :checked="searchDeatils.searchPropsChoosed.bargain"
                        @checked="SET_SEARCH_PROPS_CHOOSED({name: 'bargain', val: $event})">
                    </ycheckbox>
                    <ycheckbox
                        :name="'Возможен обмен'"
                        :checked="searchDeatils.searchPropsChoosed.exchange"
                        @checked="SET_SEARCH_PROPS_CHOOSED({name: 'exchange', val: $event})">
                    </ycheckbox>
                </div>
            </div>
        </div>
        <div class="left_options">
            <div class="yform-submit">
                <a :href="generateLink">Поиск</a>
            </div>
        </div>
    </div>
    <div class="yform"  v-else>
        <div class="left_options">
            <div class="selector-rows">
                <yselectsearch
                    @updateChoose='reInitFilterByClick($event)'
                    :shade="true"
                    :deleteDis="true"
                    :placeholder="'Выберите тип транспорта'"
                    :options="transportTypes"
                    :choosedItem="transportsArr.typeChoosed">
                </yselectsearch>
                <yselectsearch
                    @updateChoose='setBrandsAndGetModels({choose: $event, index: 0})'
                    @deleteChoose='DELETE_BRAND_CHOOSE({index: 0})'
                    :shade="true"
                    :placeholder="'Выберите марку'"
                    :options="rbmysArr[0].brands.length > 0 ? rbmysArr[0].brands : brands"
                    :choosedItem="rbmysArr[0].brandChoose"
                >
                </yselectsearch>
                <yselectmultysearch
                    @updateChoose='SET_MODELS_CHOOSE({choose: $event, index: 0})'
                    @deleteChoose='DELETE_MODELS_CHOOSE({choose: $event, index: 0})'
                    :shade="true"
                    :placeholder="'Выберите модель'"
                    :options="rbmysArr[0].models"
                    :choosedItems="rbmysArr[0].modelsChoose"></yselectmultysearch>
                <yselectmultysearch
                    @updateChoose='SET_CITIES_CHOOSE($event)'
                    @deleteChoose='DELETE_CITIES_CHOOSE($event)'
                    :shade="true"
                    :placeholder="'Выберите город'"
                    :options="cities"
                    :choosedItems="choosedCities"></yselectmultysearch>

            </div>
            <div class="yform-submit">
                <a :href="generateLink">Поиск</a>
            </div>
        </div>
        <div class="another_options">
            <div class="ysearch_type_btn">
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(1)"
                        :class="{active: searchDeatils.autoConditionChoosed == 1}">
                    Все
                </button>
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(2)"
                        :class="{active: searchDeatils.autoConditionChoosed == 2}">
                    Новые
                </button>
                <button class="change_type"
                        @click="SET_AUTO_CONDITION_CHOOSED(3)"
                        :class="{active: searchDeatils.autoConditionChoosed == 3}">
                    Б/у
                </button>
            </div>
            <div class="ygroup-box">
                <div class="option-row">
                    <yselectsearch
                        @updateChoose="SET_YEAR_FROM({choose: $event, index: 0})"
                        @deleteChoose="DELETE_YEAR_FROM({choose: $event, index: 0})"
                        :shade="true"
                        :placeholder="'Год от'"
                        :options="years"
                        :choosedItem="rbmysArr[0].yearFrom"></yselectsearch>
                    <yselectsearch
                        @updateChoose="SET_YEAR_TO({choose: $event, index: 0})"
                        @deleteChoose="DELETE_YEAR_TO({choose: $event, index: 0})"
                        :shade="true"
                        :placeholder="'Год до'"
                        :options="years"
                        :choosedItem="rbmysArr[0].yearTo"></yselectsearch>
                </div>
                <h2 class="yfilter-aside-title">Цена</h2>
                <div class="yprice_filter-box">
                    <yprice :priceChoosed="price"></yprice>
                    <ycheckbox
                        :name="'Возможен торг'"
                        :checked="searchDeatils.searchPropsChoosed.bargain"
                        @checked="SET_SEARCH_PROPS_CHOOSED({name: 'bargain', val: $event})">
                    </ycheckbox>
                    <ycheckbox
                        :name="'Возможен обмен'"
                        :checked="searchDeatils.searchPropsChoosed.exchange"
                        @checked="SET_SEARCH_PROPS_CHOOSED({name: 'exchange', val: $event})">
                    </ycheckbox>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    import {routingSplicerBus} from "../routingSplicerBus";
    export default {
        props: ['validate_data'],
        beforeMount() {
            this.initFilterPage();
        },
        mounted() {
            window.addEventListener('resize', this.onResize);
            this.onResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.onResize)
        },
        data: function(){
            return{
                initPage: false,
                mobile: false,
                catStatus: false,
            }
        },
        methods: {
            initFilterPage() {
                if(this.validate_data.searchDetailFullStore !== undefined){
                    this.SET_SEARCHDETAIL_ARR(this.validate_data.searchDetailFullStore)
                }
                if(this.validate_data.transportFullStore !== undefined){
                    this.SET_TRANPORT_ARR(this.validate_data.transportFullStore)
                    this.GENERATE_YEAR(new Date().getFullYear());
                }
                if(this.validate_data.rbmyFullStore !== undefined){
                    if(this.validate_data.rbmyFullStore.rbmys !== undefined)
                        this.SET_NEW_RBMY(this.validate_data.rbmyFullStore.rbmys);
                    this.SET_NEW_RBMY_STATIC(this.validate_data.rbmyFullStore.static);
                }
                if(this.validate_data.regionFullStore !== undefined){
                    if(this.validate_data.regionFullStore.regions !== undefined)
                        this.SET_REGION_ARR(this.validate_data.regionFullStore.regions);
                    this.SET_REGION_ARR_STATIC(this.validate_data.regionFullStore.static);
                }
                this.initPage = true;
            },
            reInitFilterByClick(event){
                this.SET_TRANSPORT_TYPE(event);
                this.CLEAR_BRANDS_MODELS();
                this.BRANDS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/brands?langType=1&alias=1&manufactureID=1')
                this.BODIES_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/bodies?langType=3&alias=1')
                this.TRANSMISSIONS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/transmissions?langType=3&alias=1')
                this.GEARS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/gears?langType=3&alias=1')
                this.TECHS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/techs?langType=3&alias=1')
            },
            setBrandsAndGetModels(data){
                this.SET_BRAND_CHOSE(data);
                data['url'] = '/transport_types/' + this.transportsArr.typeChoosed + '/brands/' + data.choose + '/models?langType=1&alias=1';
                this.MODELS_FROM_API(data);
            },
            onOptionSelect(option) {
                console.log(option);
            },
            catSatusToggle(){
                this.catStatus = !this.catStatus;
            },
            setRangeSlider(){
                if(this.minPrice > this.maxPrice){
                    let temp = this.maxPrice
                    this.maxPrice = this.minPrice
                    this.minPrice = temp
                }
            },
            onResize() {
                this.mobile = window.innerWidth <= 425;
            },
            ...mapMutations([
                //search deataild
                'SET_SEARCHDETAIL_ARR', 'SET_AUTO_CONDITION_CHOOSED', 'SET_SEARCH_PROPS_CHOOSED', 'SET_SORTING_CHOOSED',
                'SET_PERIOD_CHOOSED', 'SET_RELEVANCE_CHOOSED', 'SET_SHOW_CHOOSED',
                'CLEAR_SEARCHDETAIL_MODULE',
                //regions
                'SET_REGION_ARR', 'SET_REGION_ARR_STATIC',
                'SET_CITIES_CHOOSE', 'DELETE_CITIES_CHOOSE',
                'CLEAR_REGION_MODULE',
                //RBMY
                'CREATE_NEW_RBMY', 'DELETE_RBMY', 'SET_NEW_RBMY',
                'SET_NEW_RBMY_STATIC',
                'SET_REGION_CHOOSE', 'DELETE_REGION_CHOOSE',
                'CLEAR_BRANDS_MODELS',
                'SET_BRAND_CHOSE', 'DELETE_BRAND_CHOOSE',
                'SET_MODELS_CHOOSE', 'DELETE_MODELS_CHOOSE',
                'SET_YEAR_FROM', 'DELETE_YEAR_FROM', 'SET_YEAR_TO', 'DELETE_YEAR_TO',
                'CLEAR_RBMY_MODULE',
                //TRANSPORT
                'SET_TRANSPORT_TYPE', 'SET_TRANPORT_ARR', 'SET_TRANSPORT_BODY_CHOOSE', 'SET_COLORS_CHOOSE', 'DELETE_COLORS_CHOOSE', 'SET_TRANSPORT_STATE_CHOOSE', 'SET_IMPORTERS_CHOOSE', 'DELETE_IMPORTERS_CHOOSE',
                'SET_FUELS_CHOOSE', 'DELETE_FUELS_CHOOSE', 'SET_TRANSMISSIONS_CHOOSE', 'DELETE_TRANSMISSIONS_CHOOSE', 'SET_GERAS_CHOOSE', 'DELETE_GEARS_CHOOSE',
                'CLEAR_TRANSPORT_MODULE',
                //FILTER
                'CLEAR_DATA_TRANSPORTS'
            ]),
            ...mapActions([
                //RBMY
                'BRANDS_FROM_API',
                'MODELS_FROM_API', 'GENERATE_YEAR',
                //TRANSPORT
                'TRANSPORT_TYPES_FROM_API', 'BODIES_FROM_API', 'TRANSMISSIONS_FROM_API', 'GEARS_FROM_API', 'TECHS_FROM_API',
                //FILTER
                'FILTER_TRANSPORT_FROM_API'
            ]),
        },
        computed: {
            generateQuery(){
                let SEARCHDETAILsProps = routingSplicerBus.$options.methods.creatingSEARCHDETAILsProps(this.searchDeatils),
                    TRANPORTsProps = routingSplicerBus.$options.methods.creatingTRANSPORTsProps(this.transportsArr),
                    RBMYsProps = routingSplicerBus.$options.methods.creatingRBMYsProps(this.rbmysArr),
                    REGIONProps = routingSplicerBus.$options.methods.creatingREGIONsProps(this.choosedRegions, this.choosedCities),
                    query = '';

                query += '?';
                query += SEARCHDETAILsProps != '' ? SEARCHDETAILsProps + '&' : '';
                query += TRANPORTsProps != '' ? TRANPORTsProps + '&' : '';
                query += RBMYsProps != '' ? RBMYsProps + '&' : '';
                query += REGIONProps != '' ? REGIONProps + '&' : '';
                query = query.substring(0, query.length - 1);

                return query;
            },
            generateLink() {
                let query = this.generateQuery;
                return document.location.origin + '/filter' + query
            },
            ...mapGetters({
                //search detail
                'searchDeatils': 'GET_SEARCHDETAILS',
                'price': 'GET_PRICE',

                //RBMY
                'rbmysArr': 'GET_RBMYS', 'manufactureRegions': 'GET_MANUFACTURE_REGIONS',
                'brands': 'GET_BRANDS', 'years': 'GET_YEARS',
                //TRANSPORT
                'transportsArr': 'GET_TRANSPORTS',
                'transportTypes': 'GET_TRANSPORT_TYPES',
                'transportBodies': 'GET_TRANSPORT_BODIES',
                'transportColors': 'GET_TRANSPORT_COLORS',
                'transportImporters': 'GET_TRANSPORT_IMPORTERS',
                'transportStates': 'GET_TRANSPORT_STATES',
                'transportFuels': 'GET_TRANSPORT_FUELS',
                'transportTransmissions': 'GET_TRANSPORT_TRANSMISSIONS',
                'transportGears': 'GET_TRANSPORT_GEARS',
                'transportTechs': 'GET_TRANSPORT_TECHS',
                //REGIONS
                'regionAndPart': 'GET_REGION_AND_PART_FROM_STORE',
                'cities': 'GET_CITIES',
                'choosedCities': 'GET_CHOOSED_CITIES',
                'choosedRegions': 'GET_CHOOSED_REGIONS',
                //FILTER
                'countTransport': 'GET_COUNT'
            }),
        }


    }

</script>
