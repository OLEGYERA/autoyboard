<template>
    <div class="yfilterextended">
        <div v-if="selectDropDown.length > 0"  class="yfilter_selected-item">
            <div class="yb-items_selected">
                <div
                    v-for="(item, index) in selectDropDown.slice(0, showSelected)"
                    class="item_selected"
                >
                    <span>{{item.name}}</span>
                    <i
                        @click="removeSelectedItem(index)"
                       class="fas fa-times"
                    >
                    </i>
                </div>
            </div>
            <i
                @click="showSelectedItem = !showSelectedItem"
               :class="{'fa-chevron-up' :showSelectedItem, 'fa-chevron-down':  !showSelectedItem}"
               class="fas"
            >
            </i>
            <div
                 v-if="showSelectedItem === true"
                class="yfilter_selected-item show-drop_down"
            >
                <div class="yb-items_selected">
                    <div
                        class="item_selected"
                        v-for="(item, index) in selectDropDown"
                    >
                        <span>{{item.name}}</span>
                        <i
                            @click="removeSelectedItem(index)"
                            class="fas fa-times"
                        >
                        </i>
                    </div>
                </div>
            </div>
        </div>
        <div  v-if="windowWidth <= 601" class="ybexpanded_search show_mobile">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yoptions_items_mobile">
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
                        <div class="y-transport_options">
                            <h2>Тип транспорта</h2>
                            <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'"  :items="transportType"></ydropdown>
                        </div>
                    </div>
                    <div class="ychecked_options-mobile">
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <div v-for="(item, id) in bodyType" class="yvis_checkbox">
                                    <input
                                        @change="selectedItem(item)"
                                        class="ycheck"
                                        :value="item.name"
                                        :id="item.name"
                                        type="checkbox"
                                    >
                                    <label
                                        class="y-body_name"
                                        :for="item.name"
                                    >
                                        {{item.name}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>Страна производитель</h4>
                <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                <div class="add-cars_items">
                    <div class="yflex_car-item">
                        <div class="ycars-item marks">
                            <h2>Марка</h2>
                            <yselect
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <div class="y-cut_added-item">
                        <button class="car-items_btn y-added ">Добавить марку</button>
                        <button class="car-items_btn y-сut">Исключить марку</button>
                    </div>
                </div>
            </div>
            <div class="yb-carsearch_price-items">
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
                <div class="yreg_container">
                    <h2>Регион</h2>
                    <yselect @setItem='selectedItem' :placeholder="'Выберите область'" :options="ukSityName"></yselect>
                    <yselect @setItem='selectedItem' :placeholder="'Выберите город'" :options="ukSityName"></yselect>
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
                                <div class="yvis_l checkbox">
                                    <input id="10" type="checkbox">
                                    <label for="10">Требует ремонта</label>
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
                                <div class="yvis_c checkbox">
                                    <input id="9" type="checkbox">
                                    <label for="9">Ручное управление для инвалдов</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="yb-specifications_cars">
                <h2>Технические характеристики</h2>
                <div class="yselect_specifications">
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
                </div>
                <div class="yselect_specifications vis_mobile">
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
                                <div  class="yother_visl-btn">
                                    <li
                                        class="yb_list-options"
                                        v-for="(accordion, idx) in accordionItems"
                                        :key="idx">
                                        <button
                                            @click="otherShowID = idx">
                                            {{accordion.title}}
                                            <i class="fas "
                                               :class="{'fa-chevron-up' : otherShowID === idx, 'fa-chevron-down':  otherShowID !== idx}"
                                            ></i>
                                        </button>
                                        <div
                                            v-if="otherShowID == idx"
                                            v-for="(accordion) in accordionItems[otherShowID].items"
                                            class="yoption"
                                        >
                                            <input  :id="accordion.title" type="checkbox">
                                            <label  :for="accordion.title">{{accordion.title}}</label>
                                        </div>
                                    </li>
                                </div>
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
                        <ydropdown :placeholder="'Не выбрано'" :items="isActual" ></ydropdown>
                        <h2>Показывать</h2>
                        <ydropdown :placeholder="'Не выбрано'" :items="amountShow" ></ydropdown>
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
                </div>
                <button class="yclear_form">Сбросить все фильтры</button>
                <div class="yb-count_result"> Найдено 178 978 авто</div>
                <div class="y_form-search">
                    <button>Поиск</button>
                </div>
            </div>
        </div>
        <div  v-else-if="windowWidth <= 946" class="ybexpanded_search show_tablet">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yoptions_items_mobile">
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
                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'"  :items="transportType"></ydropdown>
                    </div>
                    <div class="ychecked_options-mobile">
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <div v-for="(item, id) in bodyType" class="yvis_checkbox">
                                    <input
                                        class="ycheck"
                                        :value="item.name"
                                        :id="item.name"
                                        @change="selectedItem(item)"
                                        type="checkbox"
                                    >
                                    <label
                                        class="y-body_name"
                                        :for="item.name"
                                    >
                                        {{item.name}}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="add-cars_items">
                    <div class="yflex_car-item">
                        <div class="ycars-item countries">
                            <h2>Страна производитель</h2>
                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                        </div>
                        <div class="ycars-item marks">
                            <h2>Марка</h2>
                            <yselect
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <div class="yflex_car-item remove">
                        <div class="ycars-item countries">
                            <h2>Страна производитель</h2>
                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                        </div>
                        <div class="ycars-item marks">
                            <h2>Марка</h2>
                            <yselect
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                        <button class="yremove_car-items">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <button class="yadded-car-item">Добавить марку</button>
                    <div class="yflex_car-item exclude">
                        <div class="ycars-item marks">
                            <h2>Исключить марку</h2>
                            <yselect
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <button class="yadded-car-item exclude">Добавить марку</button>
                    <div class="yexclude_country-car">
                        <h2>Исключить страну</h2>
                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                    </div>
                    <button class="yadded-car-item exclude_counry">Добавить страну</button>
                </div>
            </div>
            <div class="yb-carsearch_price-items">
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
                <div class="yreg_container">
                    <h2>Регион</h2>
                    <yselect @setItem='selectedItem' :placeholder="'Выберите город'" :options="ukSityName"></yselect>
                    <div class="yreg-checkbox">
                        <div class="yflex_dir">
                            <div v-for="(item) in regionArr"  class="yside_country">
                                <h2>{{item.name}}</h2>
                                <div class="yside_check">
                                    <div v-for="(child) in item.childrens"  class="y-check ">
                                        <input :id="child.alias" type="checkbox">
                                        <label :for="child.alias">{{child.name}}</label>                                    </div>
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
                <div class="yselect_specifications">
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
                                    <input  class=""  type="checkbox">
                                    <label style="background-color: #742D05"  for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class=""  type="checkbox">
                                    <label style="background-color: #FFCB11" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class=""  type="checkbox">
                                    <label style="background-color: rgba(80, 83, 83, 0.92)" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
                                    <label style="background-color: #FFFFFF" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
                                    <label style="background-color: #000000" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
                                    <label style="background-color: #0B3F8D" for=""></label>
                                </div>
                            </div>
                            <div class="ycheck_color">
                                <div class="ylabel_visible">
                                    <input class=""  type="checkbox">
                                    <label style="background-color: #5100B8" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class=""  type="checkbox">
                                    <label style="background-color: #E30000" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
                                    <label style="background-color: #1D8D0B" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class=""  type="checkbox">
                                    <label style="background-color: #0066FF" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
                                    <label style="background-color: #FFF504" for=""></label>
                                </div>
                                <div class="ylabel_visible">
                                    <input class="" type="checkbox">
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
                                <div class="ycars_options">
                                    <div
                                        v-for="(accordion) in accordionItems[otherShowID].items"
                                        class="yoption">
                                        <input :id="accordion.title" type="checkbox">
                                        <label :for="accordion.title">{{accordion.title}}</label>
                                    </div>
                                </div>
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
                        <ydropdown :placeholder="'Не выбрано'" :items="isActual" ></ydropdown>
                        <h2>Показывать</h2>
                        <ydropdown :placeholder="'Не выбрано'" :items="amountShow"></ydropdown>
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
        <div v-else class="ybexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
                    <div class="yoption_btn">
                        <button  class="change_type active">Все</button>
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
                    <div class="y-transport_options">
                        <h2>Тип транспорта</h2>
                        <ydropdown @setItem='selectedItem' :placeholder="'Не выбрано'"  :items="transportType"></ydropdown>
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <div v-for="(item, index) in bodyType" class="yvis_checkbox">
                                    <input
                                        class="ycheck"
                                        v-model="transportTypeChecked[index]"
                                        :value="item.name"
                                        @click="addToArray(item, index)"
                                        :id="item.name"
                                        type="checkbox">
                                    <label
                                        class="y-body_name"
                                        :for="item.name"
                                    >
                                        {{item.name}}
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="add-cars_items">
                    <div class="yflex_car-item">
                        <div class="ycars-item countries">
                            <h2>Страна производитель</h2>
                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                        </div>
                        <div class="ycars-item marks">
                            <h2>Марка</h2>
                            <yselect
                                @setItem='selectedItem'
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                @setItem='selectedItem'
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <div class="yflex_car-item remove">
                        <div class="ycars-item countries">
                            <h2>Страна производитель</h2>
                            <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                        </div>
                        <div class="ycars-item marks">
                            <h2>Марка</h2>
                            <yselect
                                @setItem='selectedItem'
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                @setItem='selectedItem'
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                        <button class="yremove_car-items">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                    <button class="yadded-car-item">Добавить марку</button>
                    <div class="yflex_car-item exclude">
                        <div class="ycars-item marks">
                            <h2>Исключить марку</h2>
                            <yselect
                                :placeholder="'Выберите марку'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item model">
                            <h2>Модель</h2>
                            <yselect
                                :placeholder="'Выберите модель'"
                                :options="cars"></yselect>
                        </div>
                        <div class="ycars-item years">
                            <h2>Год</h2>
                            <div class="ydrop_down-years">
                                <ydropdown :placeholder="'От'" :items="reversedYears"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="reversedYears"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <button class="yadded-car-item exclude">Добавить марку</button>
                    <div class="yexclude_country-car">
                        <h2>Исключить страну</h2>
                        <ydropdown @setItem='selectedItem' :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                    </div>
                    <button class="yadded-car-item exclude_counry">Добавить страну</button>
                </div>
            </div>
            <div class="yb-carsearch_price-items">
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
                <div class="yreg_container">
                    <h2>Регион</h2>
                    <yfsearch @setItem='selectedItem' :placeholder="'Выберите город'" :options="regionArr"></yfsearch>
                    <div class="yreg-checkbox">
                        <div class="yflex_dir">
                            <div v-for="(item) in regionArr"  class="yside_country">
                                <h2>{{item.name}}</h2>
                                <div class="yside_check">
                                    <div v-for="(child) in item.children"  class="y-check ">
                                        <input :id="child.alias" type="checkbox">
                                        <label :for="child.alias">{{child.name}}</label>                                    </div>
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
                <div class="yselect_specifications">
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
                                <div class="ycars_options" >
                                    <div
                                        class="yoption"
                                        v-for="(accordion) in accordionItems[otherShowID].items"
                                    >
                                        <input :id="accordion.title" type="checkbox">
                                        <label :for="accordion.title">{{accordion.title}}</label>
                                    </div>
                                </div>
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
    import {HTTP} from "../../http.js";
    export default {
        computed: {
            reversedYears() {
                return this.yearsList.slice().reverse();
            },
        },
        mounted () {
            document.addEventListener('click', this.clickOutside);
            window.addEventListener('resize', this.changeResize)
            this.changeResize();
            this.getYears()
            this.getRegion()
            this.getTransportType()
        },
        destroyed() {
            document.removeEventListener('click', this.clickOutside)
        },
        data(){
            return{
                transportTypeChecked: [], // true or false checkbox
                transportType:[],
                yearsList: [],
                regionArr:[],

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
                cars: [
                {
                    id: 1,
                    name: "Ford",
                },
                {
                    id: 2,
                    name: "Toyota",
                },
                {
                    id: 3,
                    name: "Fiat",
                },
                {
                    id: 4,
                    name: "Mazda",
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
                years: [{name :'2020', id: '2020'} , {name :'2019', id: '2019'} , {name :'2018', id: '2018'} , {name :'2017', id: '2017'} , {name :'2016', id: '2016'} , {name :'2015', id: '2015'} , {name :'2014', id: '2014'} , {name :'2013', id: '2013'} , {name :'2012', id: '2012'} , {name :'2011', id: '2011'} , {name :'2010', id: '2010'} , {name :'2009', id: '2009'} , {name: '2008', id:'2008'} , {name: '2007', id:'2007'} , {name: '2006', id:'2006'} , {name: '2005', id:'2005'} , {name: '2004', id:'2004'} , {name: '2003', id:'2003'} , {name: '2002', id:'2002'} , {name: '2001', id:'2001'}, {name: '2000', id:'2000'}, {name: '1999', id:'1999'}, {name: '1998', id:'1998'}, {name: '1997', id:'1997'}, {name:'1996', id:'1996'}, {name:'1995', id:'1995'},],
            }
      },
        methods: {
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
                this.selectDropDown.push(e)
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
            getTransportType(){
                let lang = 3,
                    query = "?langType=" + lang ;


                HTTP.get('/transport_types' + query)
                    .then(response => {
                        this.transportType = response.data;
                    }).catch(error =>{
                    console.log('error', error)

                })
            },
            getRegion(){
                let lang = 3,
                    query = "?langType=" + lang + '&alias=1' ;
                HTTP.get('/regions' + query)
                    .then(response => {
                        this.regionArr = response.data;
                    }).catch(error =>{
                    console.log('error', error)

                })
            }
        },
    }
</script>
