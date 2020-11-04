<template>
    <div class="yfilterextended">
        <!--v-else-->
        <div  class="yexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <section class="yexpanded_search_filter">
                <aside class="yexpanded_sidebar">
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
                    <div class="ygroup-box">
                        <h2 class="yfilter-aside-title">Цвет</h2>
                        <div class="ycolors_options">
                            <ycolors
                                @updateChoose="SET_COLORS_CHOOSE($event)"
                                @deleteChoose="DELETE_COLORS_CHOOSE($event)"
                                :options="transportColors"
                                :choosedItems="transportsArr.colorsChoosed"
                            >
                            </ycolors>
                        </div>
                    </div>
                    <div class="ygroup-box">
                        <h2 class="yfilter-aside-title">Скрыть / Показать только</h2>
                        <div class="ycheckbox_options">
                            <!--                            <ycheckbox-->
                            <!--                                :name="'Поиск со всех ресурсов'"-->
                            <!--                                :checked="searchDeatils.searchPropsChoosed.fullResource"-->
                            <!--                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'fullResource', val: $event})">-->
                            <!--                            </ycheckbox>-->
                            <!--                            <ycheckbox-->
                            <!--                                :name="'Провереные'"-->
                            <!--                                :checked="searchDeatils.searchPropsChoosed.verifiedAuto"-->
                            <!--                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'verifiedAuto', val: $event})">-->
                            <!--                            </ycheckbox>-->
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
                </aside>
                <div class="yexpanded_content">
                    <div class="option-row">
                        <div class="option-box mono-block">
                            <h2 class="option-title">Тип транспорта</h2>
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
                            <h2 class="option-title">Тип кузова</h2>
                            <div class="option-box hide-list">
                                <ycheck v-for="(body, i) in transportBodies" :key="i"
                                    v-if="bodyFullList ? true : i < 8"
                                    :name="body.name"
                                    :checked="body.choosed"
                                    @checked="SET_TRANSPORT_BODY_CHOOSE(body.val)"></ycheck>
                                <div v-if="transportBodies.length > 8" class="ycheck toggleHideKist" @click="bodyFullList = !bodyFullList">
                                    <span v-if="!bodyFullList">Просмотреть еще</span>
                                    <span v-else>Скрыть</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="option-row" v-for="(rbmy, i) in rbmysArr">
                        <div class="option-box rbmy">
                            <h2 v-if="i == 0" class="option-title">Страна производитель</h2>
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
                        <div class="option-box rbmy">
                            <h2 v-if="i == 0" class="option-title">Марка</h2>
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
                        <div class="option-box rbmy">
                            <h2 v-if="i == 0" class="option-title">Модель</h2>
                            <yselectmultysearch
                                @updateChoose='SET_MODELS_CHOOSE({choose: $event, index: i})'
                                @deleteChoose='DELETE_MODELS_CHOOSE({choose: $event, index: i})'
                                :shade="true"
                                :placeholder="'Выберите модель'"
                                :options="rbmy.models"
                                :choosedItems="rbmy.modelsChoose"></yselectmultysearch>
                        </div>
                        <div class="option-box rbmy">
                            <h2 v-if="i == 0" class="option-title">Год</h2>
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
<!--                                v-if="i != 0"-->
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
                        <div class="option-box mono-block">
                            <h2 class="option-title">Регион</h2>
                            <yselectmultysearch
                                @updateChoose='SET_CITIES_CHOOSE($event)'
                                @deleteChoose='DELETE_CITIES_CHOOSE($event)'
                                :shade="true"
                                :placeholder="'Выберите город'"
                                :options="cities"
                                :choosedItems="choosedCities"></yselectmultysearch>
                        </div>
                    </div>
                    <div class="option-row regions">
                        <div v-for="(item) in regionAndPart" class="option-box">
                            <h2 class="option-title">
                                <ycheck :name="item.name" :checked="item.choosed" :checkHide="true" @checked="SET_CHOOSED_REGION_PARTS(item.val)"></ycheck>
                            </h2>
                            <div class="regionsList">
                                <ycheck v-for="(child, i) in item.children" :key="i" :name="child.name" :checked="child.choosed" @checked="SET_CHOOSED_REGIONS(child.val)"></ycheck>
                            </div>
                        </div>
                    </div>
                    <div class="option-row">
                        <div class="option-box mono-block">
                            <h2 class="option-title">
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
                            <h2 class="option-title">
                                Cостояние транспорта
                            </h2>
                            <div class="option-box hide-list">
                                <ycheck v-for="(body, i) in transportStates" :key="i"
                                    :name="body.name"
                                    :checked="body.choosed"
                                    @checked="SET_TRANSPORT_STATE_CHOOSE(body.val)"></ycheck>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h2 class="category-title">Технические характеристики</h2>
                    <div class="option-row">
                        <div class="option-box tech">
                            <h2 class="option-title">
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
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Росход топлива, л./100 км
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.fuelConsumptionChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Пробег, тыс.км
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.mileageChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                    </div>
                    <div class="option-row">
                        <div class="option-box tech">
                            <h2 class="option-title">
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
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Объём, л.
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.volumeChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Количество дверей
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.doorsChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                    </div>
                    <div class="option-row">
                        <div class="option-box tech">
                            <h2 class="option-title">
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
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Мощность, л.с.
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.powerChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                        <div class="option-box tech">
                            <h2 class="option-title">
                                Количество мест
                            </h2>
                            <ydoublenuminput
                                :doubleChoosed="transportsArr.seatsChoosed"
                                :shade="true"
                            ></ydoublenuminput>
                        </div>
                    </div>
                    <div class="option-row">
                        <div class="option-box full-width mt">
                            <ychaccordion
                                :options="transportTechs"
                                :choosedItems="transportsArr.techsChoosed"
                            ></ychaccordion>
                        </div>
                    </div>
                </div>
            </section>
            {{generateLink}}
        </div>
    </div>
</template>
<script>
    import Vue from 'vue';
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    import {HTTP} from "../../http.js";
    import {routingSplicerBus} from '../../site/routingSplicerBus.js';
    export default {
        beforeMount() {
            this.initFilter();
        },
        mounted () {
            window.addEventListener('resize', this.changeResize)
            // this.changeResize();
            // this.getYears()
            // // this.getRegion()
            // this.getTransportType();
            // this.getManufactureCounries()
            // this.getCarBrands()
        },
        data(){
            return{
                //services
                bodyFullList: false,
                initPage: false,
                langType: 3,
            }
        },
        methods: {
            ...mapMutations([
                //search deataild
                'SET_SEARCHDETAIL_ARR', 'SET_AUTO_CONDITION_CHOOSED', 'SET_SEARCH_PROPS_CHOOSED', 'SET_SORTING_CHOOSED',
                'SET_PERIOD_CHOOSED', 'SET_RELEVANCE_CHOOSED', 'SET_SHOW_CHOOSED',
                //regions
                'SET_REGION_ARR', 'SET_CITIES_CHOOSE', 'DELETE_CITIES_CHOOSE', 'SET_CHOOSED_REGIONS', 'SET_CHOOSED_REGION_PARTS',
                //RBMY
                'CREATE_NEW_RBMY', 'DELETE_RBMY', 'SET_NEW_RBMY',
                'SET_REGION_CHOOSE', 'DELETE_REGION_CHOOSE',
                'CLEAR_BRANDS_MODELS',
                'SET_BRAND_CHOSE', 'DELETE_BRAND_CHOOSE',
                'SET_MODELS_CHOOSE', 'DELETE_MODELS_CHOOSE',
                'SET_YEAR_FROM', 'DELETE_YEAR_FROM', 'SET_YEAR_TO', 'DELETE_YEAR_TO',
                //TRANSPORT
                'SET_TRANSPORT_TYPE', 'SET_TRANPORT_ARR', 'SET_TRANSPORT_BODY_CHOOSE', 'SET_COLORS_CHOOSE', 'DELETE_COLORS_CHOOSE', 'SET_TRANSPORT_STATE_CHOOSE', 'SET_IMPORTERS_CHOOSE', 'DELETE_IMPORTERS_CHOOSE',
                'SET_FUELS_CHOOSE', 'DELETE_FUELS_CHOOSE', 'SET_TRANSMISSIONS_CHOOSE', 'DELETE_TRANSMISSIONS_CHOOSE', 'SET_GERAS_CHOOSE', 'DELETE_GEARS_CHOOSE',

            ]),
            ...mapActions([
                'FULL_REGIONS_FROM_API',

                //RBMY
                'MANUFACTURE_REGIONS_FROM_API', 'BRANDS_FROM_API',
                'MODELS_FROM_API', 'GENERATE_YEAR',
                //TRANSPORT
                'TRANSPORT_TYPES_FROM_API', 'BODIES_FROM_API', 'TRANSMISSIONS_FROM_API', 'GEARS_FROM_API', 'TECHS_FROM_API'
            ]),

            setBrandsAndGetModels(data){
                this.SET_BRAND_CHOSE(data);
                data['url'] = '/transport_types/' + this.transportsArr.typeChoosed + '/brands/' + data.choose + '/models?langType=1&alias=1';
                this.MODELS_FROM_API(data);
            },

            initFilter() {
                const UriSearch = window.location.search;
                let UriPromise = routingSplicerBus.$options.methods.ValidateUri(UriSearch);
                let lang = 3, query = "?langType=" + lang + '&alias=1' ;
                UriPromise().then(el => {
                    if(el.searchDetailFullStore !== undefined){
                        this.SET_SEARCHDETAIL_ARR(el.searchDetailFullStore)
                    }
                    if(el.transportFullStore !== undefined){
                        this.SET_TRANPORT_ARR(el.transportFullStore)
                        this.BRANDS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/brands?langType=1&alias=1&manufactureID=1');
                        this.MANUFACTURE_REGIONS_FROM_API('/manufacture_countries' + query)
                        this.GENERATE_YEAR(new Date().getFullYear());
                    }
                    if(el.rbmyFullStore !== undefined){
                        this.SET_NEW_RBMY(el.rbmyFullStore);
                    }
                    if(el.regionFullStore !== undefined){
                        this.SET_REGION_ARR(el.regionFullStore);
                    }
                    this.initPage = true;
                });
                this.FULL_REGIONS_FROM_API('/regions' + query);
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
        },
        computed: {
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
            generateLink() {
                const CurrentURI = 'extended';
                let SEARCHDETAILsProps = routingSplicerBus.$options.methods.creatingSEARCHDETAILsProps(this.searchDeatils);
                let TRANPORTsProps = routingSplicerBus.$options.methods.creatingTRANSPORTsProps(this.transportsArr);
                let RBMYsProps = routingSplicerBus.$options.methods.creatingRBMYsProps(this.rbmysArr);
                let REGIONProps = routingSplicerBus.$options.methods.creatingREGIONsProps(this.choosedRegions, this.choosedCities);
                if(this.initPage)
                    window.history.pushState('', '', document.location.origin + '/' + CurrentURI + '?' + SEARCHDETAILsProps + '&' + TRANPORTsProps + '&' + RBMYsProps + '&' + REGIONProps);
            },
        },
        watch: {
            transportArr(to) {
                // console.log(to, 'watch')
            }
        },
    }
</script>
