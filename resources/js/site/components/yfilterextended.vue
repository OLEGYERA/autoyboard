<template>
    <div class="yfilterextended">
        <!--v-else-->
        <div  class="yexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <section class="yexpanded_search_filter">
                <aside class="yexpanded_sidebar">
                    <div class="ysearch_filter">
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
                                :name="'С фото'"
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
                                :name="'Конфискат'"
                                :checked="searchDeatils.searchPropsChoosed.confiscated"
                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'confiscated', val: $event})">
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
                    <div class="yprice_filter">
                        <h2 class="yfilter-aside-title">Цена</h2>
                        <div class="yprice_filter-box">
                            <yprice></yprice>
                            <ycheckbox
                                :name="'Возможен торг'"
                                :checked="searchDeatils.searchPropsChoosed.bargain"
                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'bargain', val: $event})">
                            </ycheckbox>
                            <ycheckbox
                                :name="'Возможен обмен на автомобиль'"
                                :checked="searchDeatils.searchPropsChoosed.exchangeCar"
                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'exchangeCar', val: $event})">
                            </ycheckbox>
                            <ycheckbox
                                :name="'Возможен обмен на недвижимость'"
                                :checked="searchDeatils.searchPropsChoosed.exchangeHouse"
                                @checked="SET_SEARCH_PROPS_CHOOSED({name: 'exchangeHouse', val: $event})">
                            </ycheckbox>
                        </div>
                    </div>
.                </aside>
                <div class="yexpanded_content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam atque beatae cupiditate debitis deleniti dignissimos et eum, eveniet impedit ipsum iusto, minus officia omnis quae qui suscipit voluptatem voluptatum!
                </div>
            </section>

            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yfilter_view-option">

                    </div>
                    <div class="y-transport_options">
                        <h2>Тип транспорта</h2>
                        <yselectsearch
                            @updateChoose='reInitFilterByClick($event)'
                            :deleteDis="true"
                            :placeholder="'Выберите тип транспорта'"
                            :options="transportTypes"
                            :choosedItem="transportsArr.typeChoosed">
                        </yselectsearch>
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <ycheck v-for="(body, i) in transportBodies" :key="i"
                                        :name="body.name"
                                        :checked="body.choosed"
                                        @checked="SET_TRANSPORT_BODY_CHOOSE(body.val)"></ycheck>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="add-cars_items">
                    <div
                        v-for="(rbmy, i) in  rbmysArr"
                        class="yflex_car-item">
                        <div class="ycars-item countries">
                            <h2>Страна производитель</h2>
                            <yselectsearch
                                @updateChoose='SET_REGION_CHOOSE({choose: $event, index: i})'
                                @deleteChoose='DELETE_REGION_CHOOSE({index: i})'
                                :placeholder="'Выберите страну'"
                                :options="manufactureRegions"
                                :choosedItem="rbmy.regionChoose"
                            >
                            </yselectsearch>
                        </div>
                        <div class="ycars-item marks">
                            <h2>Марка</h2>

                            <yselectsearch
                                @updateChoose='setBrandsAndGetModels({choose: $event, index: i})'
                                @deleteChoose='DELETE_BRAND_CHOOSE({index: i})'
                                :placeholder="'Выберите марку'"
                                :options="rbmy.brands.length > 0 ? rbmy.brands : (rbmy.regionChoose !== null ? [] : brands)"
                                :choosedItem="rbmy.brandChoose"
                            >
                            </yselectsearch>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselectmultysearch
                                @updateChoose='SET_MODELS_CHOOSE({choose: $event, index: i})'
                                @deleteChoose='DELETE_MODELS_CHOOSE({choose: $event, index: i})'
                                :placeholder="'Выберите модель'"
                                :options="rbmy.models"
                                :choosedItems="rbmy.modelsChoose"></yselectmultysearch>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <yselectsearch
                                    @updateChoose="SET_YEAR_FROM({choose: $event, index: i})"
                                    @deleteChoose="DELETE_YEAR_FROM({choose: $event, index: i})"
                                    :placeholder="'От'"
                                    :options="years"
                                    :choosedItem="rbmy.yearFrom"></yselectsearch>
                                <yselectsearch
                                    @updateChoose="SET_YEAR_TO({choose: $event, index: i})"
                                    @deleteChoose="DELETE_YEAR_TO({choose: $event, index: i})"
                                    :placeholder="'До'"
                                    :options="years"
                                    :choosedItem="rbmy.yearTo"></yselectsearch>
                            </div>
                        </div>
                        <button class="yremove_car-items" v-if="i != 0" @click="DELETE_RBMY(i)">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <button
                        @click="CREATE_NEW_RBMY({'regionChoose': 1})"
                        class="yadded-car-item">Добавить марку</button>
                    {{generateLink}}
<!--                    <div class="yflex_car-item remove">-->
<!--                        <div class="ycars-item countries">-->
<!--                            <h2>Страна производитель</h2>-->
<!--                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="manufactureCountries"></ydropdown>-->
<!--                        </div>-->
<!--                        <div class="ycars-item marks">-->
<!--                            <h2>Марка</h2>-->
<!--                            <yselectsearch-->
<!--                                @setItem='selectedItem'-->
<!--                                :placeholder="'Выберите марку'"-->
<!--                                :options="carBrandsArr"></yselectsearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item model">-->
<!--                            <h2>Модель</h2>-->
<!--                            <yselectsearch-->
<!--                                @setItem='selectedItem'-->
<!--                                :placeholder="'Выберите модель'"-->
<!--                                :options="cars"></yselectsearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item years">-->
<!--                            <h2>Год</h2>-->
<!--                            <div class="ydrop_down-years">-->
<!--                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>-->
<!--                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <button class="yremove_car-items">-->
<!--                            <i class="fas fa-trash-alt"></i>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                    <button class="yadded-car-item">Добавить марку</button>-->
<!--                    <div class="yflex_car-item exclude">-->
<!--                        <div class="ycars-item marks">-->
<!--                            <h2>Исключить марку</h2>-->
<!--                            <yselectsearch-->
<!--                                :placeholder="'Выберите марку'"-->
<!--                                :options="cars"></yselectsearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item model">-->
<!--                            <h2>Модель</h2>-->
<!--                            <yselectsearch-->
<!--                                :placeholder="'Выберите модель'"-->
<!--                                :options="cars"></yselectsearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item years">-->
<!--                            <h2>Год</h2>-->
<!--                            <div class="ydrop_down-years">-->
<!--                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>-->
<!--                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <button class="yadded-car-item exclude">Добавить марку</button>-->
<!--                    <div class="yexclude_country-car">-->
<!--                        <h2>Исключить страну</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>-->
<!--                    </div>-->
<!--                    <button class="yadded-car-item exclude_counry">Добавить страну</button>-->
                </div>
            </div>
            <div class="yb-region_price-items">
                <div class="yreg_container">
                    <h2>Регион</h2>
                    <yselectmultysearch
                        @updateChoose='SET_CITIES_CHOOSE($event)'
                        @deleteChoose='DELETE_CITIES_CHOOSE($event)'
                        :placeholder="'Выберите город'"
                        :options="cities"
                        :choosedItems="choosedCities"></yselectmultysearch>

                    <div class="yreg-checkbox">
                        <div class="yflex_dir">
                            <div v-for="(item) in regionAndPart"  class="yside_country">
                                <h2>
                                    <ycheck :name="item.name" :checked="item.choosed" :checkHide="true" @checked="SET_CHOOSED_REGION_PARTS(item.val)"></ycheck>
                                </h2>
                                <div class="yside_check">
                                    <ycheck v-for="(child, i) in item.children" :key="i" :name="child.name" :checked="child.choosed" @checked="SET_CHOOSED_REGIONS(child.val)"></ycheck>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yb-specifications_cars">
                <h2>Технические характеристики</h2>
                <div class="yselectsearch_specifications">
                    <div class="vis_l-specifications">
                        <h2>Топливо</h2>
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="fuel"></ydropdown>-->
                        <h2>КПП</h2>
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="transmission"></ydropdown>-->
                        <h2>Тип привода</h2>
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="typeofdrive"></ydropdown>-->
                    </div>
                    <div class="vis_c-specifications y-double">
                        <h3>Росход топлива, л./100 км</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                        <h3>Объём, л.</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'" ></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                        <h3>Мощность</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                    </div>
                    <div class="vis_r-specifications y-double">
                        <h3>Пробег, тыс.км</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                        <h3>Количество дверей</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                        <h3>Количество мест</h3>
                        <div class="ydouble_dropdown">
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
                        </div>
                    </div>
                </div>
                <div class="yother_specifications">
                    <h3>Цвет</h3>
                    <div class="yvis_other">
                        <div class="yvis_other-left">
                            <div class="ycheck_color">
                                <div class="ylabel_visible">
                                    <input  class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: #742D05"  for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: #FFCB11" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: rgba(80, 83, 83, 0.92)" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #FFFFFF" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #000000" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #0B3F8D" for=""></label>
                                </div>
                            </div>
                            <div class="ycheck_color">
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: #5100B8" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: #E30000" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #1D8D0B" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked"  type="checkbox">
                                    <label style="background-color: #0066FF" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #FFF504" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" v-model="picked" type="checkbox">
                                    <label style="background-color: #FF007A" for=""></label>
                                </div>
                            </div>
                            <button @click="colorOpen = !colorOpen" class="ycolor_more">
                                <i class="fas"
                                   :class="{'fa-chevron-up' : colorOpen, 'fa-chevron-down':  !colorOpen}"></i>
                            </button>
                        </div>
                        <div class="yvis_other-right">
                            <div class="yother_visl-btn">
                                <button
                                    v-for="(accordion, idx) in accordionItems"
                                    @click="otherShowID = idx"
                                >
                                    {{accordion.title}}
                                    <i class="fas "
                                       :class="{'fa-angle-right' : otherShowID === idx, 'fa-angle-left':  otherShowID != idx}"
                                    ></i>
                                </button>
                            </div>
                            <div class="yother_visr-options">
<!--                                <div class="ycars_options" >-->
<!--                                    <div-->
<!--                                        class="yoption"-->
<!--                                        v-for="(accordion) in accordionItems[otherShowID].items"-->
<!--                                    >-->
<!--                                        <input :id="accordion.title" type="checkbox">-->
<!--                                        <label :for="accordion.title">{{accordion.title}}</label>-->
<!--                                    </div >-->
<!--                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yspecification_results">
                <h3>Результаты поиска</h3>
                <div class="yvisual_results">
                    <div class="yvis_res-select">
                        <h2>Сортировка</h2>
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="sortBy"></ydropdown>-->
                        <h2>Период подачи</h2>
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="deliveryPeriod"></ydropdown>-->
                    </div>
                    <div class="yvis_res-select">
                        <h2>Актуальность</h2>
<!--                        <ydropdown  :placeholder="'Не выбрано'" :items="isActual"></ydropdown>-->
                        <h2>Показывать</h2>
<!--                        <ydropdown  :placeholder="'Не выбрано'" :items="amountShow" ></ydropdown>-->
                    </div>
                    <div class="yseach_card-id">
                        <h3>Поиск по ID</h3>
                            <input
                                class="y_seach-id"
                                type="text"
                                placeholder="Введите ID объявления"
                            />
                    </div>
                </div>
            </div>
            <div class="ysearch_results">
                <h2>Вы ищите:</h2>
                <div class="yb-repeat_selected">
                    <div class="item_selected">
                        <span>Легковые</span>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="item_selected">
                        <span>Легковые</span>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="item_selected">
                        <span>Легковые</span>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="item_selected">
                        <span>Легковые</span>
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="yb-count_result"> Найдено 178 978 авто</div>
                </div>
                <button class="yclear_form">Сбросить все фильтры</button>
                <div class="y_form-search">
                    <button>Поиск</button>
                </div>
            </div>
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
            document.addEventListener('click', this.clickOutside);
            window.addEventListener('resize', this.changeResize)
            this.changeResize();
            this.getYears()
            // this.getRegion()
            this.getTransportType();
            this.getManufactureCounries()
            this.getCarBrands()
        },
        data(){
            return{
                initPage: false,
                langType: 3,

                yearsList: [],
                manufactureCountries: [],
                carBrandsArr: [],


                showSelected: 6,
                selectDropDown: [], /// accepts data from child component <dropdown></dropdown> && <select></select>
                picked: [],
                selectedTypeBody: [],
                showSelectedItem: false,
                windowWidth: 0,
                colorOpen: false,
                otherShowID: 0,
                test: [{name: '100'}],
                test2: [{name: '200'}],
                accordionItems: [
                    {
                        title: 'Безопасность',
                        items:[
                            {title: 'Бронированный автомобиль'},
                            {title: 'ABS'},
                            {title: 'ASP'},
                            {title: 'Датчики движения'},
                            {title: 'Бронированный автомобиль'},
                            {title: 'Датчики движения'},
                            {title: 'ABS'},
                            {title: 'Бронированный автомобиль'},
                            {title: 'ABS'},
                            {title: 'ASP'},
                        ]
                    },
                    {
                        title: 'Комфорт',
                        items:[
                            {title: 'Бортовой компьютер'},
                            {title: 'Електропакет'},
                            {title: 'Запуск кнопкой '},
                            {title: 'Кондиционер '},
                            {title: 'Люк '},
                            {title: 'Обогрев руля'},
                            {title: 'Память сидений'},
                            {title: 'Подогрев зеркал'},
                            {title: 'Усилитель руля'},
                            {title: 'Кожаный сайлон '},
                            {title: 'Датчик света'},
                            {title: 'Электростеклоподьемники'},
                            {title: 'Климат контроль'},
                            {title: 'Мультируль'},
                            {title: 'Омыватель фар'},
                            {title: 'Парктроник'},
                            {title: 'Подогрев сидений'},
                            {title: 'Датчик дождя'},
                        ]
                    },
                    {
                        title: 'Мультимедия',
                        items:[
                            {title: 'Магнитола'},
                            {title: 'есть'},
                            {title: 'и збс'},
                        ]
                    },
                    {
                        title: 'Прочее',
                        items:[
                            {title: 'Понты'},
                            {title: 'для'},
                            {title: 'Приезжих'},
                            {title: 'Магнитола'},
                            {title: 'есть'},
                            {title: 'и збс'},
                            {title: 'AUX'},
                            {title: 'и ты'},
                            {title: 'царь'},
                        ]
                    }
                ],
                isActual: [{name:'Все'}, {name:'Скрыть проданные'}, {name:'Только проданные'}],
                amountShow: [{name:'По 10'}, {name:'По 20'}, {name:'По 30'}, {name:'По 50'}, {name:'По 100'}],
                sortBy:[
                    {name:'Обычная'},
                    {name:'От дешевых к дорогим'},
                    {name:'От дорогих к дешевым'},
                    {name:'Дата добавления'},
                    {name:'Год выпуска, по возрастанию'},
                    {name:'Год выпуска, по убыванию'},
                    {name:'Пробег, по возрастанию'},
                    {name:'Пробег, по убыванию'},
                ],
                deliveryPeriod: [
                    {id:'all', name:'Все'},
                    {id:'one_hour', name:'За час'},
                    {id:'three_hour', name:'За 3 часа'},
                    {id:'six_hour', name:'За 6 часов'},
                    {id:'twelve_hour', name:'За 12 часов'},
                    {id:'today', name:'За сегодня'},
                    {id:'for_day', name:'За сутки'},
                    {id:'for_two_day', name:'За 2 дня'},
                    {id:'for_three_day', name:'За 3 дня'},
                    {id:'for_week', name:'За неделю'},
                    {id:'for_mounth', name:'За месяц'},
                    {id:'for_three_mounth', name:'За 3 месяца'}
                ],
                fuel: [
                    {
                        id:'gasoline',
                        name: 'Бензин',
                    },
                    {
                        id:'diesel',
                        name: 'Дизель',
                    },
                    {
                        id:'gas',
                        name: 'Газ',
                    },
                    {
                        id:'electro',
                        name: 'Электро',
                    },
                    {
                        id:'hybrid',
                        name: 'Гибрид',
                    },
                    {
                        id:'gas_gasoline',
                        name: 'Газ/Бензин',
                    },
                    {
                        id:'methane_gas',
                        name: 'Газ метан',
                    },
                    {
                        id:'propane_butane_gas',
                        name: 'Газ пропан-бутан',
                    },
                ],
            }
        },
        methods: {
            ...mapMutations([
                //search deataild
                'SET_SEARCHDETAIL_ARR', 'SET_AUTO_CONDITION_CHOOSED', 'SET_SEARCH_PROPS_CHOOSED',
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
                'SET_TRANSPORT_TYPE', 'SET_TRANPORT_ARR', 'SET_TRANSPORT_BODY_CHOOSE'

            ]),
            ...mapActions([
                'FULL_REGIONS_FROM_API',

                //RBMY
                'MANUFACTURE_REGIONS_FROM_API', 'BRANDS_FROM_API',
                'MODELS_FROM_API', 'GENERATE_YEAR',
                //TRANSPORT
                'TRANSPORT_TYPES_FROM_API', 'BODIES_FROM_API',
            ]),
            check(e){
            },
            addToArray(item, index){
                this.selectDropDown.push({
                    name: item.name,
                    id: index
                })
            },
            removeSelectedItem(index){
                this.$delete(this.selectDropDown, index)
            },
            selectedItem(e){
                const select = this.selectDropDown.find(item =>{
                    if(item.name === e.name) return  true
                })
                if(!select){
                    this.selectDropDown.push(e)
                }
            },
            changeResize(event) {
                this.windowWidth = document.documentElement.clientWidth;
                if(this.windowWidth <= 1024) this.showSelected = 5
                if(this.windowWidth <= 945) this.showSelected = 4
                if(this.windowWidth <= 600) this.showSelected = 3
                if(this.windowWidth <= 425) this.showSelected = 2
                if(this.windowWidth <= 320) this.showSelected = 1
            },
            clickOutside(evt){
                if (!this.$el.contains(evt.target)) {
                    this.otherShowID = null;
                }
            },
            getYears(){
                var y1 = new Date("1900").getFullYear();
                var y2 = new Date().getFullYear();
                if(y1 < y2){
                    for(let i = y1; i <= y2; i++){
                        this.yearsList.push({
                            name: i
                        });
                    }
                }else{
                    for(let i = y2; i <= y1; i++){
                        this.yearsList.push({
                            name: i
                        })
                    }
                }
            },
            getCarBrands(){
            },
            getManufactureCounries(){
                let lang = 3,
                    query = "?langType=" + lang ;

                HTTP.get('/manufacture_countries' + query)
                    .then(response => {
                        this.manufactureCountries = response.data;
                    }).catch(error =>{
                    console.log('error', error)

                })
            },
            getTransportType(){
            },
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
                    }
                    if(el.rbmyFullStore !== undefined){
                        this.MANUFACTURE_REGIONS_FROM_API('/manufacture_countries' + query)
                        this.GENERATE_YEAR(new Date().getFullYear());
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
                console.log(to, 'watch')
            }
        },
        destroyed() {
            document.removeEventListener('click', this.clickOutside)
        },
    }
</script>
