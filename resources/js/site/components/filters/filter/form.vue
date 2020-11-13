<template>
    <div class="filter-form">
        <div class="filter_search">
            <section class="filter_search_filter">
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
                    <h2 class="yfilter-aside-title">Цена</h2>
                    <div class="yprice_filter-box">
                        <yprice></yprice>
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
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">Тип транспорта</h2>
                        <yselectsearch
                            @updateChoose='reInitFilterByClick($event)'
                            :shade="true"
                            :deleteDis="true"
                            :placeholder="'Выберите тип транспорта'"
                            :options="transportTypes"
                            :choosedItem="transportsArr.typeChoosed">
                        </yselectsearch>
                    </div>
                </div>
                <div class="option-row">
                    <div class="option-box full-width">
                        <h2 class="yfilter-aside-title">Тип кузова</h2>
                        <div class="option-box hide-list">
                            <ycheck v-for="(body, i) in transportBodies" :key="i"
                                    v-if="bodyFullList ? true : i < 5"
                                    :name="body.name"
                                    :checked="body.choosed"
                                    @checked="SET_TRANSPORT_BODY_CHOOSE(body.val)"></ycheck>
                            <div v-if="transportBodies.length > 5" class="ycheck toggleHideKist" @click="bodyFullList = !bodyFullList">
                                <span v-if="!bodyFullList">Просмотреть еще</span>
                                <span v-else>Скрыть</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="option-row rbmy" v-for="(rbmy, i) in rbmysArr">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">Страна производитель</h2>
                        <yselectsearch
                            @updateChoose='SET_REGION_CHOOSE({choose: $event, index: i})'
                            @deleteChoose='DELETE_REGION_CHOOSE({index: i})'
                            :shade="true"
                            :placeholder="'Выберите страну'"
                            :options="manufactureRegions"
                            :choosedItem="rbmy.regionChoose"
                        >
                        </yselectsearch>
                    </div>
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">Марка</h2>
                        <yselectsearch
                            @updateChoose='setBrandsAndGetModels({choose: $event, index: i})'
                            @deleteChoose='DELETE_BRAND_CHOOSE({index: i})'
                            :shade="true"
                            :placeholder="'Выберите марку'"
                            :options="rbmy.brands.length > 0 ? rbmy.brands : (rbmy.regionChoose !== null ? [] : brands)"
                            :choosedItem="rbmy.brandChoose"
                        >
                        </yselectsearch>
                    </div>
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">Модель</h2>
                        <yselectmultysearch
                            @updateChoose='SET_MODELS_CHOOSE({choose: $event, index: i})'
                            @deleteChoose='DELETE_MODELS_CHOOSE({choose: $event, index: i})'
                            :shade="true"
                            :placeholder="'Выберите модель'"
                            :options="rbmy.models"
                            :choosedItems="rbmy.modelsChoose"></yselectmultysearch>
                    </div>
                    <div class="option-box years">
                        <h2 class="yfilter-aside-title">Год</h2>
                        <div class="option-row">
                            <yselectsearch
                                @updateChoose="SET_YEAR_FROM({choose: $event, index: i})"
                                @deleteChoose="DELETE_YEAR_FROM({choose: $event, index: i})"
                                :shade="true"
                                :placeholder="'От'"
                                :options="years"
                                :choosedItem="rbmy.yearFrom"></yselectsearch>
                            <yselectsearch
                                @updateChoose="SET_YEAR_TO({choose: $event, index: i})"
                                @deleteChoose="DELETE_YEAR_TO({choose: $event, index: i})"
                                :shade="true"
                                :placeholder="'До'"
                                :options="years"
                                :choosedItem="rbmy.yearTo"></yselectsearch>
                            <button class="delRbmy">
                                <i v-if="i !== 0" @click="DELETE_RBMY(i)" class="yicon trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="option-row">
                    <button class="addRbmy" @click="CREATE_NEW_RBMY()">Добавить еще</button>
                </div>
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">Город</h2>
                        <yselectmultysearch
                            @updateChoose='SET_CITIES_CHOOSE($event)'
                            @deleteChoose='DELETE_CITIES_CHOOSE($event)'
                            :shade="true"
                            :placeholder="'Выберите город'"
                            :options="cities"
                            :choosedItems="choosedCities"></yselectmultysearch>
                    </div>
                </div>
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">
                            Транспорт пригнан из
                        </h2>
                        <yselectmultysearch
                            @updateChoose='SET_IMPORTERS_CHOOSE($event)'
                            @deleteChoose='DELETE_IMPORTERS_CHOOSE($event)'
                            :shade="true"
                            :placeholder="'Выберите страну'"
                            :options="transportImporters"
                            :choosedItems="transportsArr.importersChoosed"></yselectmultysearch>
                    </div>
                </div>
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">
                            Топливо
                        </h2>
                        <yselectmultysearch
                            @updateChoose='SET_FUELS_CHOOSE($event)'
                            @deleteChoose='DELETE_FUELS_CHOOSE($event)'
                            :shade="true"
                            :placeholder="'Выберите топливо'"
                            :options="transportFuels"
                            :choosedItems="transportsArr.fuelsChoosed"></yselectmultysearch>
                    </div>
                </div>
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">
                            КПП
                        </h2>
                        <yselectmultysearch
                            @updateChoose='SET_TRANSMISSIONS_CHOOSE($event)'
                            @deleteChoose='DELETE_TRANSMISSIONS_CHOOSE($event)'
                            :shade="true"
                            :placeholder="'Выберите КПП'"
                            :options="transportTransmissions"
                            :choosedItems="transportsArr.transmissionsChoosed"></yselectmultysearch>
                    </div>
                </div>
                <div class="option-row">
                    <div class="option-box">
                        <h2 class="yfilter-aside-title">
                            Тип привода
                        </h2>
                        <yselectmultysearch
                            @updateChoose='SET_GERAS_CHOOSE($event)'
                            @deleteChoose='DELETE_GEARS_CHOOSE($event)'
                            :shade="true"
                            :placeholder="'Выберите привод'"
                            :options="transportGears"
                            :choosedItems="transportsArr.gearsChoosed"></yselectmultysearch>
                    </div>
                </div>
                <div class="ygroup-box">
                    <h2 class="yfilter-aside-title">Скрыть / Показать только</h2>
                    <div class="ycheckbox_options">
                        <ycheckbox
                            :name="'Только с фото'"
                            :checked="searchDeatils.searchPropsChoosed.withPhoto"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'withPhoto', val: $event})">
                        </ycheckbox>

                        <ycheckbox
                            :name="'Авто не в Украине'"
                            :checked="searchDeatils.searchPropsChoosed.abroad"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'abroad', val: $event})">
                        </ycheckbox>
                        <ycheckbox
                            :name="'В кредите'"
                            :checked="searchDeatils.searchPropsChoosed.credit"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'credit', val: $event})">
                        </ycheckbox>
                        <ycheckbox
                            :name="'Нерастаможеные'"
                            :checked="searchDeatils.searchPropsChoosed.customsСleared"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'customsСleared', val: $event})">
                        </ycheckbox>
                        <ycheckbox
                            :name="'После ДТП'"
                            :checked="searchDeatils.searchPropsChoosed.accident"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'accident', val: $event})">
                        </ycheckbox>
                        <ycheckbox
                            :name="'Не на ходу'"
                            :checked="searchDeatils.searchPropsChoosed.noMotion"
                            @checked="SET_SEARCH_PROPS_CHOOSED({name: 'noMotion', val: $event})">
                        </ycheckbox>
                    </div>
                </div>
                <div class="ygroup-box">
                    <h2 class="yfilter-aside-title">Выдача результата</h2>
                    <div class="ysearch_options">
                    <div class="ygroup-col-box">
                        <h3 class="sidebar-title">
                            Сортировка
                        </h3>
                        <yselectsearch
                            @updateChoose="SET_SORTING_CHOOSED($event)"
                            :deleteDis="true"
                            :placeholder="'Выберите сортировку'"
                            :options="searchDeatils.systemSorting"
                            :choosedItem="searchDeatils.sortingChoosed">
                        </yselectsearch>
                    </div>
                    <div class="ygroup-col-box">
                        <h3 class="sidebar-title">
                            Период подачи
                        </h3>
                        <yselectsearch
                            @updateChoose="SET_PERIOD_CHOOSED($event)"
                            :deleteDis="true"
                            :placeholder="'Выберите период подачи'"
                            :options="searchDeatils.systemPeriod"
                            :choosedItem="searchDeatils.periodChoosed">
                        </yselectsearch>
                    </div>
                    <div class="ygroup-col-box">
                        <h3 class="sidebar-title">
                            Актуальность
                        </h3>
                        <yselectsearch
                            @updateChoose="SET_RELEVANCE_CHOOSED($event)"
                            :deleteDis="true"
                            :placeholder="'Выберите актуальность'"
                            :options="searchDeatils.systemRelevance"
                            :choosedItem="searchDeatils.relevanceChoosed">
                        </yselectsearch>
                    </div>
                    <div class="ygroup-col-box">
                        <h3 class="sidebar-title">
                            Показать
                        </h3>
                        <yselectsearch
                            @updateChoose="SET_SHOW_CHOOSED($event)"
                            :deleteDis="true"
                            :placeholder="'Выберите показать'"
                            :options="searchDeatils.systemShow"
                            :choosedItem="searchDeatils.showChoosed">
                        </yselectsearch>
                    </div>
                </div>
                </div>
            </section>
            <div class="search-helper-station">
                <div class="search-helper" :class="{pin: pinOrderPanel}">
                    <div class="searched-transport">
                        <h3 class="searcher-title">Найдено транспорта:</h3>
                        <div class="searcher-counter">{{prettify(countTransport)}}</div>
                    </div>
                    <div class="btn-cols">
                        <button class="goto_full-filter" @click="clearFilter">Расширенный поиск</button>
                        <div class="one-row">
                            <button class="search-btn">Поиск</button>
                            <button class="clear-filter" @click="clearFilter">Очистить фильтр</button>
                        </div>
                    </div>
                </div>
            </div>
            {{generateLink}}
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    import {HTTP} from "../../../../http.js";
    import {routingSplicerBus} from '../../../../site/routingSplicerBus.js';
    export default {
        props: ['validate_data'],
        beforeMount() {
            this.initFilterPage();
        },
        mounted(){
            window.addEventListener('resize', this.changeResize);
            this.changeResize();
            window.addEventListener('scroll',  this.handleScroll);
            this.handleScroll();
        },
        destroyed() {
            window.removeEventListener('resize', this.changeResize);
            window.removeEventListener('scroll', this.handleScroll);
        },
        data(){
            return{
                //services
                langType: 3,
                initPage: false,
                bodyFullList: false,
                currentWidth: null,

                countTransport: 0,
                pinOrderPanel: false,
                uriName: 'filter'
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
            clearFilter(){
                this.CLEAR_TRANSPORT_MODULE();
                this.CLEAR_RBMY_MODULE();
                this.CLEAR_REGION_MODULE();
                this.CLEAR_SEARCHDETAIL_MODULE();
                this.reInitFilterByClick(this.transportsArr.typeChoosed)

            },
            setBrandsAndGetModels(data){
                this.SET_BRAND_CHOSE(data);
                data['url'] = '/transport_types/' + this.transportsArr.typeChoosed + '/brands/' + data.choose + '/models?langType=1&alias=1';
                this.MODELS_FROM_API(data);
            },
            getTransportCount(query){
                HTTP.get('count_transport' + query).then(response => {
                    this.countTransport = response.data;
                })
            },
            changeResize(){
                this.currentWidth = window.innerWidth;
            },
            handleScroll(){
                let heperStation = document.getElementsByClassName('search-helper-station')[0];
                const checkWindow = window !== undefined && heperStation !== undefined;
                if (checkWindow && window.innerHeight + window.scrollY - 60 < heperStation.offsetTop + heperStation.offsetHeight) {
                    this.pinOrderPanel = true;
                } else{
                    this.pinOrderPanel = false;
                }
            },
            prettify(num){
                var n = num.toString();
                return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ' ');
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
                'CLEAR_TRANSPORT_MODULE'
            ]),
            ...mapActions([
                //RBMY
                'BRANDS_FROM_API',
                'MODELS_FROM_API', 'GENERATE_YEAR',
                //TRANSPORT
                'TRANSPORT_TYPES_FROM_API', 'BODIES_FROM_API', 'TRANSMISSIONS_FROM_API', 'GEARS_FROM_API', 'TECHS_FROM_API'
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
                this.getTransportCount(query);
                window.history.pushState('', '', document.location.origin + '/' + this.uriName + query);
            },
            ...mapGetters({
                //search detail
                'searchDeatils': 'GET_SEARCHDETAILS',

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

                'regionAndPart': 'GET_REGION_AND_PART_FROM_STORE',
                'cities': 'GET_CITIES',
                'choosedCities': 'GET_CHOOSED_CITIES',
                'choosedRegions': 'GET_CHOOSED_REGIONS',
            }),
        },
        watch: {
            transportArr(to) {
                // console.log(to, 'watch')
            }
        },
    }
</script>
