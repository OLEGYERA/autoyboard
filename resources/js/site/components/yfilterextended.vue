<template>
    <div class="yfilterextended">
<!--        <div v-if="selectDropDown.length > 0"  class="yfilter_selected-item">-->
<!--            <div class="yb-items_selected">-->
<!--                <div-->
<!--                    v-for="(item, index) in selectDropDown.slice(0, showSelected)"-->
<!--                    class="item_selected"-->
<!--                >-->
<!--                    <span>{{item.name}}</span>-->
<!--                    <i-->
<!--                        @click="removeSelectedItem(index)"-->
<!--                       class="fas fa-times"-->
<!--                    >-->
<!--                    </i>-->
<!--                </div>-->
<!--            </div>-->
<!--            <i-->
<!--                @click="showSelectedItem = !showSelectedItem"-->
<!--               :class="{'fa-chevron-up' :showSelectedItem, 'fa-chevron-down':  !showSelectedItem}"-->
<!--               class="fas"-->
<!--            >-->
<!--            </i>-->
<!--            <div-->
<!--                 v-if="showSelectedItem === true"-->
<!--                class="yfilter_selected-item show-drop_down"-->
<!--            >-->
<!--                <div class="yb-items_selected">-->
<!--                    <div-->
<!--                        class="item_selected"-->
<!--                        v-for="(item, index) in selectDropDown"-->
<!--                    >-->
<!--                        <span>{{item.name}}</span>-->
<!--                        <i-->
<!--                            @click="removeSelectedItem(index)"-->
<!--                            class="fas fa-times"-->
<!--                        >-->
<!--                        </i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div  v-if="windowWidth <= 601" class="ybexpanded_search show_mobile">-->
<!--            <h1 class="ytitle-exp">Расширенный поиск</h1>-->
<!--            <div class="yb-carsearch_items">-->
<!--                <div class="yoptions_items">-->
<!--                    <div class="yoptions_items_mobile">-->
<!--                        <div class="yoption_btn">-->
<!--                            <button class="change_type active">Все</button>-->
<!--                            <button class="change_type">Новые</button>-->
<!--                            <button class="change_type">Б/у</button>-->
<!--                        </div>-->
<!--                        <div class="ycheckbox_options">-->
<!--                            <ycheckbox-->
<!--                                :text="'Поиск со всех ресурсов'">-->
<!--                            </ycheckbox>-->
<!--                            <ycheckbox-->
<!--                                :text="'Провереные'">-->
<!--                            </ycheckbox>-->
<!--                            <ycheckbox-->
<!--                                :text="'С фото'">-->
<!--                            </ycheckbox>-->
<!--                        </div>-->
<!--                        <div class="y-transport_options">-->
<!--                            <h2>Тип транспорта</h2>-->
<!--                            <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'"  :items="transportType"></ydropdown>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="ychecked_options-mobile">-->
<!--                        <h3>Тип кузова</h3>-->
<!--                        <div class="yb-checked_type">-->
<!--                            <div class="yl-vis checkbox">-->
<!--                                <div v-for="(item, id) in bodyType" class="yvis_checkbox">-->
<!--                                    <input-->
<!--                                        @change="selectedItem(item)"-->
<!--                                        class="ycheck"-->
<!--                                        :value="item.name"-->
<!--                                        :id="item.name"-->
<!--                                        type="checkbox"-->
<!--                                    >-->
<!--                                    <label-->
<!--                                        class="y-body_name"-->
<!--                                        :for="item.name"-->
<!--                                    >-->
<!--                                        {{item.name}}-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <h4>Страна производитель</h4>-->
<!--                <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="manufactureCountries"></ydropdown>-->
<!--                <div class="add-cars_items">-->
<!--                    <div class="yflex_car-item">-->
<!--                        <div class="ycars-item marks">-->
<!--                            <h2>Марка</h2>-->
<!--                            <yselectsearch-->
<!--                                :placeholder="'Выберите марку'"-->
<!--                                :options="carBrandsArr"></yselectsearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item model">-->
<!--                            <h2>Модель</h2>-->
<!--                            <yselectmultysearch-->
<!--                                :placeholder="'Выберите модель'"-->
<!--                                :options="carBrandsArr"></yselectmultysearch>-->
<!--                        </div>-->
<!--                        <div class="ycars-item years">-->
<!--                            <h2>Год</h2>-->
<!--                            <div class="ydrop_down-years">-->
<!--                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>-->
<!--                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="y-cut_added-item">-->
<!--                        <button class="car-items_btn y-added ">Добавить марку</button>-->
<!--                        <button class="car-items_btn y-сut">Исключить марку</button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-region_price-items">-->
<!--                <div class="ychange_price-container">-->
<!--                    <h2>Цена</h2>-->
<!--                    <div class="yrange_slider-container">-->
<!--                        <yrange></yrange>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен торг'">-->
<!--                        </ycheckbox>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен обмен на автомобиль'">-->
<!--                        </ycheckbox>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен обмен на недвижимость'">-->
<!--                        </ycheckbox>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yreg_container">-->
<!--                    <h2>Регион</h2>-->
<!--                    <yselectsearch @setItem='selectedItem' :placeholder="'Выберите область'" :options="ukSityName"></yselectsearch>-->
<!--                    <yselectsearch @setItem='selectedItem' :placeholder="'Выберите город'" :options="ukSityName"></yselectsearch>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-condition_cars">-->
<!--                <h2>Состояние</h2>-->
<!--                <div class="yb-status_car-items">-->
<!--                    <div class="status_items">-->
<!--                        <h2>Авто не в Украине</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>В кредите</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Нерастаможеные</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Конфискат</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>После ДТП</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Не на ходу</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Продавец</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class="btn_s large active">Частное лицо</button>-->
<!--                            <button class=" btn_s ">Компания</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-status_checked-items">-->
<!--                    <h2>Пригнан из</h2>-->
<!--                    <div class="yb-select_items">-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>-->
<!--                        <div class="yb-cheked_items">-->
<!--                            <div class="ycheked vis_l">-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="1" type="checkbox">-->
<!--                                    <label for="1">Гаражное хранение</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="2" type="checkbox">-->
<!--                                    <label for="2">Индивидуальная комплектация</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="3" type="checkbox">-->
<!--                                    <label for="3">Не бит</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="4" type="checkbox">-->
<!--                                    <label for="4">Не крашен</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="10" type="checkbox">-->
<!--                                    <label for="10">Требует ремонта</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="ycheked vis_c">-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="5" type="checkbox">-->
<!--                                    <label for="5">Первая регистрация</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="6" type="checkbox">-->
<!--                                    <label for="6">Первый владелец</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="7" type="checkbox">-->
<!--                                    <label for="7">Пригоню под заказ</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="8" type="checkbox">-->
<!--                                    <label for="8">Сервисная книжка</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="9" type="checkbox">-->
<!--                                    <label for="9">Ручное управление для инвалдов</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-specifications_cars">-->
<!--                <h2>Технические характеристики</h2>-->
<!--                <div class="yselectsearch_specifications">-->
<!--                    <div class="vis_l-specifications">-->
<!--                        <h2>Топливо</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="fuel"></ydropdown>-->
<!--                        <h2>КПП</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="transmission"></ydropdown>-->
<!--                        <h2>Тип привода</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="typeofdrive"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="vis_c-specifications y-double">-->
<!--                        <h3>Росход топлива, л./100 км</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Объём, л.</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'" ></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Мощность</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yselectsearch_specifications vis_mobile">-->
<!--                    <div class="vis_r-specifications y-double">-->
<!--                        <h3>Пробег, тыс.км</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Количество дверей</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Количество мест</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="yother_specifications">-->
<!--                        <h3>Цвет</h3>-->
<!--                        <div class="yvis_other">-->
<!--                            <div class="yvis_other-left">-->
<!--                                <div class="ycheck_color">-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input  class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: #742D05"  for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: #FFCB11" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: rgba(80, 83, 83, 0.92)" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #FFFFFF" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #000000" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #0B3F8D" for=""></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="ycheck_color">-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: #5100B8" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: #E30000" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #1D8D0B" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked"  type="checkbox">-->
<!--                                        <label style="background-color: #0066FF" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #FFF504" for=""></label>-->
<!--                                    </div>-->
<!--                                    <div class="ylabel_visible">-->
<!--                                        <input class="" v-model="picked" type="checkbox">-->
<!--                                        <label style="background-color: #FF007A" for=""></label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <button @click="colorOpen = !colorOpen" class="ycolor_more">-->
<!--                                    <i class="fas"-->
<!--                                       :class="{'fa-chevron-up' : colorOpen, 'fa-chevron-down':  !colorOpen}"></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                            <div class="yvis_other-right">-->
<!--                                <div  class="yother_visl-btn">-->
<!--                                    <li-->
<!--                                        class="yb_list-options"-->
<!--                                        v-for="(accordion, idx) in accordionItems"-->
<!--                                        :key="idx">-->
<!--                                        <button-->
<!--                                            @click="otherShowID = idx">-->
<!--                                            {{accordion.title}}-->
<!--                                            <i class="fas "-->
<!--                                               :class="{'fa-chevron-up' : otherShowID === idx, 'fa-chevron-down':  otherShowID !== idx}"-->
<!--                                            ></i>-->
<!--                                        </button>-->
<!--&lt;!&ndash;                                        <div&ndash;&gt;-->
<!--&lt;!&ndash;                                            v-if="otherShowID == idx"&ndash;&gt;-->
<!--&lt;!&ndash;                                            v-for="(accordion) in accordionItems[otherShowID].items"&ndash;&gt;-->
<!--&lt;!&ndash;                                            class="yoption"&ndash;&gt;-->
<!--&lt;!&ndash;                                        >&ndash;&gt;-->
<!--&lt;!&ndash;                                            <input  :id="accordion.title" type="checkbox">&ndash;&gt;-->
<!--&lt;!&ndash;                                            <label  :for="accordion.title">{{accordion.title}}</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                        </div>&ndash;&gt;-->
<!--                                    </li>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--            </div>-->
<!--            <div class="yspecification_results">-->
<!--                <h3>Результаты поиска</h3>-->
<!--                <div class="yvisual_results">-->
<!--                    <div class="yvis_res-select">-->
<!--                        <h2>Сортировка</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="sortBy"></ydropdown>-->
<!--                        <h2>Период подачи</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="deliveryPeriod"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="yvis_res-select">-->
<!--                        <h2>Актуальность</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="isActual" ></ydropdown>-->
<!--                        <h2>Показывать</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="amountShow" ></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="yseach_card-id">-->
<!--                        <h3>Поиск по ID</h3>-->
<!--                        <input-->
<!--                            class="y_seach-id"-->
<!--                            type="text"-->
<!--                            placeholder="Введите ID объявления"-->
<!--                        />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="ysearch_results">-->
<!--                <h2>Вы ищите:</h2>-->
<!--                <div class="yb-repeat_selected">-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <button class="yclear_form">Сбросить все фильтры</button>-->
<!--                <div class="yb-count_result"> Найдено 178 978 авто</div>-->
<!--                <div class="y_form-search">-->
<!--                    <button>Поиск</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div  v-else-if="windowWidth <= 946" class="ybexpanded_search show_tablet">-->
<!--            <h1 class="ytitle-exp">Расширенный поиск</h1>-->
<!--            <div class="yb-carsearch_items">-->
<!--                <div class="yoptions_items">-->
<!--                    <div class="yoptions_items_mobile">-->
<!--                        <div class="yoption_btn">-->
<!--                            <button class="change_type active">Все</button>-->
<!--                            <button class="change_type">Новые</button>-->
<!--                            <button class="change_type">Б/у</button>-->
<!--                        </div>-->
<!--                        <div class="ycheckbox_options">-->
<!--                            <ycheckbox-->
<!--                                :text="'Поиск со всех ресурсов'">-->
<!--                            </ycheckbox>-->
<!--                            <ycheckbox-->
<!--                                :text="'Провереные'">-->
<!--                            </ycheckbox>-->
<!--                            <ycheckbox-->
<!--                                :text="'С фото'">-->
<!--                            </ycheckbox>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="y-transport_options">-->
<!--                        <h2>Тип транспорта</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'"  :items="transportType"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="ychecked_options-mobile">-->
<!--                        <h3>Тип кузова</h3>-->
<!--                        <div class="yb-checked_type">-->
<!--                            <div class="yl-vis checkbox">-->
<!--                                <div v-for="(item, id) in bodyType" class="yvis_checkbox">-->
<!--                                    <input-->
<!--                                        class="ycheck"-->
<!--                                        :value="item.name"-->
<!--                                        :id="item.name"-->
<!--                                        @change="selectedItem(item)"-->
<!--                                        type="checkbox"-->
<!--                                    >-->
<!--                                    <label-->
<!--                                        class="y-body_name"-->
<!--                                        :for="item.name"-->
<!--                                    >-->
<!--                                        {{item.name}}-->
<!--                                    </label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="add-cars_items">-->
<!--                    <div class="yflex_car-item">-->
<!--                        <div class="ycars-item countries">-->
<!--                            <h2>Страна производитель</h2>-->
<!--                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="manufactureCountries"></ydropdown>-->
<!--                        </div>-->
<!--                        <div class="ycars-item marks">-->
<!--                            <h2>Марка</h2>-->
<!--                            <yselectsearch-->
<!--                                :placeholder="'Выберите марку'"-->
<!--                                :options="carBrandsArr"></yselectsearch>-->
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
<!--                    <div class="yflex_car-item remove">-->
<!--                        <div class="ycars-item countries">-->
<!--                            <h2>Страна производитель</h2>-->
<!--                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="manufactureCountries"></ydropdown>-->
<!--                        </div>-->
<!--                        <div class="ycars-item marks">-->
<!--                            <h2>Марка</h2>-->
<!--                            <yselectsearch-->
<!--                                :placeholder="'Выберите марку'"-->
<!--                                :options="carBrandsArr"></yselectsearch>-->
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
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="manufactureCountries"></ydropdown>-->
<!--                    </div>-->
<!--                    <button class="yadded-car-item exclude_counry">Добавить страну</button>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-region_price-items">-->
<!--                <div class="ychange_price-container">-->
<!--                    <h2>Цена</h2>-->
<!--                    <div class="yrange_slider-container">-->
<!--                        <yrange></yrange>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен торг'">-->
<!--                        </ycheckbox>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен обмен на автомобиль'">-->
<!--                        </ycheckbox>-->
<!--                        <ycheckbox-->
<!--                            :text="'Возможен обмен на недвижимость'">-->
<!--                        </ycheckbox>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yreg_container" v-if="regionArr.length != 0">-->
<!--                    <h2>Регион</h2>-->
<!--                    <yfsearch-->
<!--                        :placeholder="'Выберите город'"-->
<!--                        :options="regionArr"-->
<!--                        @responseResult="computeCityResult"-->
<!--                    ></yfsearch>-->
<!--                    <div class="yselectsearch_region">-->
<!--                        <div v-for="(city, city_idx) in choosedCities"class="yselectsearch_region-item">-->
<!--                            {{city.name}}-->
<!--                            <svg @click="removeChoosedCities(city_idx)" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                <circle cx="6" cy="6" r="6" fill="white"/>-->
<!--                                <g clip-path="url(#clip0)">-->
<!--                                    <path d="M6.54969 6.00707L8.88597 3.67072C9.03801 3.51875 9.03801 3.27303 8.88597 3.12106C8.734 2.96909 8.48829 2.96909 8.33632 3.12106L5.99997 5.45741L3.66369 3.12106C3.51164 2.96909 3.266 2.96909 3.11403 3.12106C2.96199 3.27303 2.96199 3.51875 3.11403 3.67072L5.45031 6.00707L3.11403 8.34342C2.96199 8.49539 2.96199 8.7411 3.11403 8.89307C3.18977 8.96888 3.28935 9.00696 3.38886 9.00696C3.48837 9.00696 3.58788 8.96888 3.66369 8.89307L5.99997 6.55672L8.33632 8.89307C8.41213 8.96888 8.51164 9.00696 8.61115 9.00696C8.71066 9.00696 8.81017 8.96888 8.88597 8.89307C9.03801 8.7411 9.03801 8.49539 8.88597 8.34342L6.54969 6.00707Z" fill="#0B3F8D"/>-->
<!--                                </g>-->
<!--                                <defs>-->
<!--                                    <clipPath id="clip0">-->
<!--                                        <rect width="6" height="6" fill="white" transform="translate(3 3)"/>-->
<!--                                    </clipPath>-->
<!--                                </defs>-->
<!--                            </svg>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="yreg-checkbox">-->
<!--                        <div class="yflex_dir">-->
<!--                            <div v-for="(item) in regionAndPart"  class="yside_country">-->
<!--                                <h2>{{item.name}}</h2>-->
<!--                                <div class="yside_check">-->
<!--                                    <div v-for="(child) in item.children"  class="y-check ">-->
<!--                                        <input :id="child.alias" type="checkbox" @change="SET_CHOOSED_REGIONS(child.val)" v-bind="{'checked': child.choosed == true}">-->
<!--                                        <label :for="child.alias">{{child.name}}</label>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-condition_cars">-->
<!--                <h2>Состояние</h2>-->
<!--                <div class="yb-status_car-items">-->
<!--                    <div class="status_items">-->
<!--                        <h2>Авто не в Украине</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>В кредите</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Нерастаможеные</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Конфискат</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>После ДТП</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Не на ходу</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class=" btn_s  active">Показать</button>-->
<!--                            <button class=" btn_s ">Скрыть</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="status_items">-->
<!--                        <h2>Продавец</h2>-->
<!--                        <div class="change_vis-btn">-->
<!--                            <button class="btn_s large active">Частное лицо</button>-->
<!--                            <button class=" btn_s ">Компания</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-status_checked-items">-->
<!--                    <h2>Пригнан из</h2>-->
<!--                    <div class="yb-select_items">-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>-->
<!--                        <div class="yb-cheked_items">-->
<!--                            <div class="ycheked vis_l">-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="1" type="checkbox">-->
<!--                                    <label for="1">Гаражное хранение</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="2" type="checkbox">-->
<!--                                    <label for="2">Индивидуальная комплектация</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="3" type="checkbox">-->
<!--                                    <label for="3">Не бит</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_l checkbox">-->
<!--                                    <input id="4" type="checkbox">-->
<!--                                    <label for="4">Не крашен</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="ycheked vis_c">-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="5" type="checkbox">-->
<!--                                    <label for="5">Первая регистрация</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="6" type="checkbox">-->
<!--                                    <label for="6">Первый владелец</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="7" type="checkbox">-->
<!--                                    <label for="7">Пригоню под заказ</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_c checkbox">-->
<!--                                    <input id="8" type="checkbox">-->
<!--                                    <label for="8">Сервисная книжка</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="ycheked vis_r">-->
<!--                                <div class="yvis_r checkbox">-->
<!--                                    <input id="9" type="checkbox">-->
<!--                                    <label for="9">Ручное управление для инвалдов</label>-->
<!--                                </div>-->
<!--                                <div class="yvis_r checkbox">-->
<!--                                    <input id="10" type="checkbox">-->
<!--                                    <label for="10">Требует ремонта</label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yb-specifications_cars">-->
<!--                <h2>Технические характеристики</h2>-->
<!--                <div class="yselectsearch_specifications">-->
<!--                    <div class="vis_l-specifications">-->
<!--                        <h2>Топливо</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="fuel"></ydropdown>-->
<!--                        <h2>КПП</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="transmission"></ydropdown>-->
<!--                        <h2>Тип привода</h2>-->
<!--                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="typeofdrive"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="vis_c-specifications y-double">-->
<!--                        <h3>Росход топлива, л./100 км</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Объём, л.</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'" ></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Мощность</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="vis_r-specifications y-double">-->
<!--                        <h3>Пробег, тыс.км</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Количество дверей</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                        <h3>Количество мест</h3>-->
<!--                        <div class="ydouble_dropdown">-->
<!--                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>-->
<!--                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yother_specifications">-->
<!--                    <h3>Цвет</h3>-->
<!--                    <div class="yvis_other">-->
<!--                        <div class="yvis_other-left">-->
<!--                            <div class="ycheck_color">-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input  class=""  type="checkbox">-->
<!--                                    <label style="background-color: #742D05"  for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class=""  type="checkbox">-->
<!--                                    <label style="background-color: #FFCB11" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class=""  type="checkbox">-->
<!--                                    <label style="background-color: rgba(80, 83, 83, 0.92)" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #FFFFFF" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #000000" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #0B3F8D" for=""></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="ycheck_color">-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class=""  type="checkbox">-->
<!--                                    <label style="background-color: #5100B8" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class=""  type="checkbox">-->
<!--                                    <label style="background-color: #E30000" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #1D8D0B" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class=""  type="checkbox">-->
<!--                                    <label style="background-color: #0066FF" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #FFF504" for=""></label>-->
<!--                                </div>-->
<!--                                <div class="ylabel_visible">-->
<!--                                    <input class="" type="checkbox">-->
<!--                                    <label style="background-color: #FF007A" for=""></label>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <button @click="colorOpen = !colorOpen" class="ycolor_more">-->
<!--                                <i class="fas"-->
<!--                                   :class="{'fa-chevron-up' : colorOpen, 'fa-chevron-down':  !colorOpen}"></i>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="yvis_other-right">-->
<!--                            <div class="yother_visl-btn">-->
<!--                                <button-->
<!--                                    v-for="(accordion, idx) in accordionItems"-->
<!--                                    @click="otherShowID = idx"-->
<!--                                >-->
<!--                                    {{accordion.title}}-->
<!--                                    <i class="fas "-->
<!--                                       :class="{'fa-angle-right' : otherShowID === idx, 'fa-angle-left':  otherShowID != idx}"-->
<!--                                    ></i>-->
<!--                                </button>-->
<!--                            </div>-->
<!--                            <div class="yother_visr-options">-->
<!--&lt;!&ndash;                                <div class="ycars_options">&ndash;&gt;-->
<!--&lt;!&ndash;                                    <div&ndash;&gt;-->
<!--&lt;!&ndash;                                        v-for="(accordion) in accordionItems[otherShowID].items"&ndash;&gt;-->
<!--&lt;!&ndash;                                        class="yoption">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <input :id="accordion.title" type="checkbox">&ndash;&gt;-->
<!--&lt;!&ndash;                                        <label :for="accordion.title">{{accordion.title}}</label>&ndash;&gt;-->
<!--&lt;!&ndash;                                    </div>&ndash;&gt;-->
<!--&lt;!&ndash;                                </div>&ndash;&gt;-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="yspecification_results">-->
<!--                <h3>Результаты поиска</h3>-->
<!--                <div class="yvisual_results">-->
<!--                    <div class="yvis_res-select">-->
<!--                        <h2>Сортировка</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="sortBy"></ydropdown>-->
<!--                        <h2>Период подачи</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="deliveryPeriod"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="yvis_res-select">-->
<!--                        <h2>Актуальность</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="isActual" ></ydropdown>-->
<!--                        <h2>Показывать</h2>-->
<!--                        <ydropdown :placeholder="'Не выбрано'" :items="amountShow"></ydropdown>-->
<!--                    </div>-->
<!--                    <div class="yseach_card-id">-->
<!--                        <h3>Поиск по ID</h3>-->
<!--                        <input-->
<!--                            class="y_seach-id"-->
<!--                            type="text"-->
<!--                            placeholder="Введите ID объявления"-->
<!--                        />-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="ysearch_results">-->
<!--                <h2>Вы ищите:</h2>-->
<!--                <div class="yb-repeat_selected">-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="item_selected">-->
<!--                        <span>Легковые</span>-->
<!--                        <i class="fas fa-times"></i>-->
<!--                    </div>-->
<!--                    <div class="yb-count_result"> Найдено 178 978 авто</div>-->
<!--                </div>-->
<!--                <button class="yclear_form">Сбросить все фильтры</button>-->
<!--                <div class="y_form-search">-->
<!--                    <button>Поиск</button>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <!--v-else-->
        <div  class="ybexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yfilter_view-option">
                        <div class="yoption_btn">
                            <button class="change_type active">Все</button>
                            <button class="change_type">Новые</button>
                            <button class="change_type">Б/у</button>
                        </div>
                        <div class="ycheckbox_options">
                            <ycheckbox
                                :text="'Поиск со всех ресурсов'">
                            </ycheckbox>
                            <ycheckbox
                                :text="'Провереные'">
                            </ycheckbox>
                            <ycheckbox
                                :text="'С фото'">
                            </ycheckbox>
                        </div>
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
<!--                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>-->
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
                <div class="ychange_price-container">
                    <h2>Цена</h2>
                    <div class="yrange_slider-container">
                        <yrange></yrange>
                        <ycheckbox
                            :text="'Возможен торг'">
                        </ycheckbox>
                        <ycheckbox
                            :text="'Возможен обмен на автомобиль'">
                        </ycheckbox>
                        <ycheckbox
                            :text="'Возможен обмен на недвижимость'">
                        </ycheckbox>
                    </div>
                </div>
                <div class="yreg_container" v-if="regionArr.length != 0">
                    <h2>Регион</h2>
                    <yfsearch
                        :placeholder="'Выберите город'"
                        :options="regionArr"
                        @responseResult="computeCityResult"
                    ></yfsearch>
                    <div class="yselectsearch_region">
                        <div v-for="(city, city_idx) in choosedCities" class="yselectsearch_region-item">
                            {{city.name}}
                            <svg @click="removeChoosedCities(city_idx)" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="6" cy="6" r="6" fill="white"/>
                                <g clip-path="url(#clip0)">
                                    <path d="M6.54969 6.00707L8.88597 3.67072C9.03801 3.51875 9.03801 3.27303 8.88597 3.12106C8.734 2.96909 8.48829 2.96909 8.33632 3.12106L5.99997 5.45741L3.66369 3.12106C3.51164 2.96909 3.266 2.96909 3.11403 3.12106C2.96199 3.27303 2.96199 3.51875 3.11403 3.67072L5.45031 6.00707L3.11403 8.34342C2.96199 8.49539 2.96199 8.7411 3.11403 8.89307C3.18977 8.96888 3.28935 9.00696 3.38886 9.00696C3.48837 9.00696 3.58788 8.96888 3.66369 8.89307L5.99997 6.55672L8.33632 8.89307C8.41213 8.96888 8.51164 9.00696 8.61115 9.00696C8.71066 9.00696 8.81017 8.96888 8.88597 8.89307C9.03801 8.7411 9.03801 8.49539 8.88597 8.34342L6.54969 6.00707Z" fill="#0B3F8D"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect width="6" height="6" fill="white" transform="translate(3 3)"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="yreg-checkbox">
                        <div class="yflex_dir">
                            <div v-for="(item) in regionAndPart"  class="yside_country">
                                <h2>{{item.name}}</h2>
                                <div class="yside_check">
                                    <ycheck v-for="(child, i) in item.children" :key="i" :name="child.name" :checked="child.choosed" @checked="SET_CHOOSED_REGIONS(child.val)"></ycheck>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yb-condition_cars">
                <h2>Состояние</h2>
                <div class="yb-status_car-items">
                    <div class="status_items">
                        <h2>Авто не в Украине</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>В кредите</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>Нерастаможеные</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>Конфискат</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>После ДТП</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>Не на ходу</h2>
                        <div class="change_vis-btn">
                            <button class=" btn_s  active">Показать</button>
                            <button class=" btn_s ">Скрыть</button>
                        </div>
                    </div>
                    <div class="status_items">
                        <h2>Продавец</h2>
                        <div class="change_vis-btn">
                            <button class="btn_s large active">Частное лицо</button>
                            <button class=" btn_s ">Компания</button>
                        </div>
                    </div>
                </div>
                <div class="yb-status_checked-items">
                        <h2>Пригнан из</h2>
                    <div class="yb-select_items">
                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                        <div class="yb-cheked_items">
                            <div class="ycheked vis_l">
                                <div class="yvis_l checkbox">
                                    <input id="1" type="checkbox">
                                    <label for="1">Гаражное хранение</label>
                                </div>
                                <div class="yvis_l checkbox">
                                    <input id="2" type="checkbox">
                                    <label for="2">Индивидуальная комплектация</label>
                                </div>
                                <div class="yvis_l checkbox">
                                    <input id="3" type="checkbox">
                                    <label for="3">Не бит</label>
                                </div>
                                <div class="yvis_l checkbox">
                                    <input id="4" type="checkbox">
                                    <label for="4">Не крашен</label>
                                </div>
                            </div>
                            <div class="ycheked vis_c">
                                <div class="yvis_c checkbox">
                                    <input id="5" type="checkbox">
                                    <label for="5">Первая регистрация</label>
                                </div>
                                <div class="yvis_c checkbox">
                                    <input id="6" type="checkbox">
                                    <label for="6">Первый владелец</label>
                                </div>
                                <div class="yvis_c checkbox">
                                    <input id="7" type="checkbox">
                                    <label for="7">Пригоню под заказ</label>
                                </div>
                                <div class="yvis_c checkbox">
                                    <input id="8" type="checkbox">
                                    <label for="8">Сервисная книжка</label>
                                </div>
                            </div>
                            <div class="ycheked vis_r">
                                <div class="yvis_r checkbox">
                                    <input id="9" type="checkbox">
                                    <label for="9">Ручное управление для инвалдов</label>
                                </div>
                                <div class="yvis_r checkbox">
                                    <input id="10" type="checkbox">
                                    <label for="10">Требует ремонта</label>
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
                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="fuel"></ydropdown>
                        <h2>КПП</h2>
                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="transmission"></ydropdown>
                        <h2>Тип привода</h2>
                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'" :items="typeofdrive"></ydropdown>
                    </div>
                    <div class="vis_c-specifications y-double">
                        <h3>Росход топлива, л./100 км</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
                        </div>
                        <h3>Объём, л.</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'" ></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
                        </div>
                        <h3>Мощность</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
                        </div>
                    </div>
                    <div class="vis_r-specifications y-double">
                        <h3>Пробег, тыс.км</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
                        </div>
                        <h3>Количество дверей</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
                        </div>
                        <h3>Количество мест</h3>
                        <div class="ydouble_dropdown">
                            <ydropdown :items="test" :placeholder="'От'"></ydropdown>
                            <ydropdown :items="test2" :placeholder="'До'"></ydropdown>
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
                        <ydropdown :placeholder="'Не выбрано'" :items="sortBy"></ydropdown>
                        <h2>Период подачи</h2>
                        <ydropdown :placeholder="'Не выбрано'" :items="deliveryPeriod"></ydropdown>
                    </div>
                    <div class="yvis_res-select">
                        <h2>Актуальность</h2>
                        <ydropdown  :placeholder="'Не выбрано'" :items="isActual"></ydropdown>
                        <h2>Показывать</h2>
                        <ydropdown  :placeholder="'Не выбрано'" :items="amountShow" ></ydropdown>
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
                transmission: [
                    {name: 'Механическая', id: 'mechanical'},
                    {name: 'Автоматическая', id: 'automatic'},
                    {name: 'Роботизированная', id: 'robotic'},
                    {name: 'Вариативная', id: 'variable'},
                    {name: 'Типтроник', id: 'tiptronic'}
                ],
                typeofdrive: [
                    {name: 'Задний привод',
                        id: 'rear_drive_unit'
                    },
                    {name: 'Передний привод',
                        id: 'front_drive_unit'
                    },
                    {name: 'Полный привод',
                        id: 'full_drive_unit'
                    }
                ],
                ukSityName:[
                    {name: 'Поляна', id: 1},
                    {name: 'Славское', id: 2},
                    {name: 'Тернополь', id: 3},
                    {name: 'Трускавец', id: 4 },
                    {name: 'Хмельницкий', id: 5},
                    {name: 'Чайковка', id:6 },
                    {name: 'Чубинское,', id: 7},
                    {name: 'Шаян', id:8 },
                    {name: 'Шешоры', id: 9},
                    {name: 'Яремче', id:10 },
                    {name: 'Петровское', id: 11},
                    {name: 'Приморское', id: 12},
                    {name: 'Черновцы', id: 13},
                    {name: 'Днепропетровск', id: 14},
                    {name: 'Донецк', id:15 },
                    {name: 'Ивано-Франковск', id:16 },
                    {name: 'Каменец-Подольский', id: 17},
                    {name: 'Харьков', id: 18},
                    {name: 'Херсон', id:19 },
                    {name: 'Киев', id: 20},
                    {name: 'Кривой Рог', id: 30},
                    {name: 'Луганск', id: 31 },
                    {name: 'Львов', id:32 },
                    {name: 'Николаев', id:33 },
                    {name: 'Одесса', id:34},
                    {name: 'Полтава', id:35 },
                    {name: 'Сумы', id: 36},
                    {name: 'Ужгород', id: 37},
                    {name: 'Запорожье', id:38 },
                    {name: 'Винница', id:39 },
                    {name: 'Черкассы', id:40 },
                    {name: 'Чернигов', id:41 },
                    {name: 'Ильичевск', id:42 },
                    {name: 'Луцк', id:43},
                    {name: 'Малехов', id: 44},
                    {name: 'Микуличин', id: 45},
                    {name: 'Ровно', id: 46},
                    {name: 'Стрый', id: 47},
                    {name: 'Ахтырка', id: 48},
                    {name: 'Белогородка', id: 49},
                    {name: 'Бердянск', id:50 },
                    {name: 'Борисполь', id:51 },
                    {name: 'Бояны', id:52 },
                    {name: 'Бровары', id: 53},
                    {name: 'Буковель', id: 54},
                    {name: 'Бурлачья Балка', id: 55},
                    {name: 'Верховина', id: 56},
                    {name: 'Винники', id:57 },
                    {name: 'Жденево', id:58 },
                    {name: 'Житомир', id:59 },
                    {name: 'Жовтневое', id: 60},
                    {name: 'Затока', id: 61},
                    {name: 'Кировоград', id:62 },
                    {name: 'Коблево', id: 63},
                    {name: 'Козин', id: 64},
                    {name: 'Колоденка', id: 65},
                    {name: 'Коропово', id: 66},
                    {name: 'Кременчуг', id: 67},
                    {name: 'Макеевка', id: 68},
                    {name: 'Мукачево', id: 69},
                ],
                countryName: [
                    {
                        name: "Китай",
                        id: "1",
                    },
                    {
                        name: "США",
                        id: "2",
                    },
                    {
                        name: "Япония",
                        id: "3",
                    },
                    {
                        name: "Германия",
                        id: "4",
                    },
                    {
                        name: "Индия",
                        id: "5",
                    },
                    {
                        name: "ЮжнаяКорея",
                        id: "6",
                    },
                    {
                        name: "Мексика",
                        id: "7",
                    },
                    {
                        name: "Бразилия",
                        id: "8",
                    },
                    {
                        name: "Испания",
                        id: "9",
                    },
                    {
                        name: "Таиланд",
                        id: "10",
                    },
                ],
                typeCars: [
                    {
                        name: 'Легковые',
                        id: 'passenger',
                    },
                    {
                        name: 'Мото',
                        id: 'moto',
                    },
                    {
                        name: 'Автобусы',
                        id: 'bus',
                    },
                    {
                        name: 'Водный',
                        id: 'aqueous',
                    },
                    {
                        name: 'Сельхозтехника',
                        id: 'agricultural_machinery',
                    },
                    {
                        name: 'Спецтехника',
                        id: 'special_equipment',
                    },
                    {
                        name: 'Прицепы',
                        id: '',
                    },
                ],
                bodyType:[
                    {
                        id: 'station_wagon',
                        name:'Универсал' ,
                    },
                    {
                        id: 'crossover',
                        name: 'Кроссовер',
                    },
                    {
                        id: 'minivan',
                        name: 'Минивэн',
                    },
                    {
                        id: 'liftback',
                        name: 'Лифтбек',
                    },
                    {
                        id: 'hatchback',
                        name: 'Хэтчбек',
                    },
                    {
                        id: 'cabriolet',
                        name: 'Кабриолет',
                    },
                    {
                        id: 'sedan',
                        name:'Седан' ,
                    },
                    {
                        id: 'coupe',
                        name: 'Купе',
                    },
                    {
                        id: 'pikap',
                        name: 'Пикап',
                    },
                    {
                        id: 'roadster',
                        name: 'Ростер' ,
                    },
                    {
                        id: 'limousine',
                        name: 'Лимузин',
                    },
                    {
                        id: 'anouther_body',
                        name: 'Другой',
                    },
                ],
            }
        },
        methods: {
            ...mapMutations([
                'SET_CITIES_TO_STORE', 'SET_CHOOSED_REGIONS',
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
            computeCityResult(city){
                this.SET_CITIES_TO_STORE(city);
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
            removeChoosedCities(city_idx){
                this.$delete(this.choosedCities, city_idx)
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
                UriPromise().then(el => {
                    console.log(el, el.transportFullStore  !== undefined);
                    if(el.transportFullStore !== undefined){

                        this.SET_TRANPORT_ARR(el.transportFullStore)
                        this.getRegion();
                    }
                    if(el.rbmyFullStore !== undefined){
                        this.SET_NEW_RBMY(el.rbmyFullStore);
                    }
                    this.initPage = true;
                });
            },
            reInitFilterByClick(event){
                this.SET_TRANSPORT_TYPE(event);
                this.CLEAR_BRANDS_MODELS();
                this.BRANDS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/brands?langType=1&alias=1&manufactureID=1')
                this.BODIES_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/bodies?langType=3&alias=1')
            },
            getRegion(){
                let lang = 3, query = "?langType=" + lang + '&alias=1' ;
                this.FULL_REGIONS_FROM_API('/regions' + query);
                this.MANUFACTURE_REGIONS_FROM_API('/manufacture_countries' + query)
                this.GENERATE_YEAR(new Date().getFullYear());
                this.BRANDS_FROM_API('/transport_types/' + this.transportsArr.typeChoosed + '/brands?langType=1&alias=1&manufactureID=1')
            },
        },
        computed: {
            ...mapGetters({
                //RBMY
                'rbmysArr': 'GET_RBMYS', 'manufactureRegions': 'GET_MANUFACTURE_REGIONS',
                'brands': 'GET_BRANDS', 'years': 'GET_YEARS',
                //TRANSPORT
                'transportsArr': 'GET_TRANSPORTS',
                'transportTypes': 'GET_TRANSPORT_TYPES',
                'transportBodies': 'GET_TRANSPORT_BODIES',

                'regionArr': 'GET_FULL_REGION_FROM_STORE',
                'choosedCities': 'GET_CHOOSED_CITIES_FROM_STORE',
                'regionAndPart': 'GET_REGION_AND_PART_FROM_STORE',
            }),
            generateLink() {
                const CurrentURI = 'extended';
                let TRANPORTsProps = routingSplicerBus.$options.methods.creatingTRANSPORTsProps(this.transportsArr);
                let RBMYsProps = routingSplicerBus.$options.methods.creatingRBMYsProps(this.rbmysArr);
                if(this.initPage)
                    window.history.pushState('', '', document.location.origin + '/' + CurrentURI + '?' + TRANPORTsProps + '&' + RBMYsProps);
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
