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
