<template>
    <div class="yfilterextended">
        <div class="yfilter_selected-item">
            <div class="yb-items_selected">
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
            <i class="fas fa-chevron-down"></i>
        </div>
        <div class="ybexpanded_search">
            <h1 class="ytitle-exp">Расширенный поиск</h1>
            <div class="yb-carsearch_items">
                <div class="yoptions_items">
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
                        <ydropdown :items="typeCars"></ydropdown>
                        <h3>Тип кузова</h3>
                        <div class="yb-checked_type">
                            <div class="yl-vis checkbox">
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check1" type="checkbox">
                                    <label class="y-body_name" for="check1">Универсал</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check2"  type="checkbox">
                                    <label class="y-body_name" for="check2">Кроссовер</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check3" type="checkbox">
                                    <label class="y-body_name" for="check3">Минивэн</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check4" type="checkbox">
                                    <label class="y-body_name" for="check4">Лифтбек</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check5" type="checkbox">
                                    <label class="y-body_name" for="check5">Хэтчбек</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check6" type="checkbox">
                                    <label class="y-body_name" for="check6">Кабриолет</label>
                                </div>
                            </div>
                            <div class="yr-vis checkbox">
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check7" type="checkbox">
                                    <label class="y-body_name" for="check7">Седан</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check8" type="checkbox">
                                    <label class="y-body_name" for="check8">Купе</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check9" type="checkbox">
                                    <label class="y-body_name" for="check9">Пикап</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check10" type="checkbox">
                                    <label class="y-body_name" for="check10">Ростер</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check11" type="checkbox">
                                    <label class="y-body_name" for="check11">Лимузин</label>
                                </div>
                                <div class="yvis_checkbox">
                                    <input class="ycheck" id="check12" type="checkbox">
                                    <label class="y-body_name" for="check12">Другой</label>
                                </div>
                            </div>
                        </div>
                        <h4>Страна производитель</h4>
                        <ydropdown :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
                    </div>
                </div>
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
                                <ydropdown :placeholder="'От'" :items="years"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="years"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <div class="yflex_car-item remove">
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
                                <ydropdown :placeholder="'От'" :items="years"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="years"></ydropdown>
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
                                <ydropdown :placeholder="'От'" :items="years"></ydropdown>
                                <ydropdown :placeholder="'До'" :items="years"></ydropdown>
                            </div>
                        </div>
                    </div>
                    <button class="yadded-car-item exclude">Добавить марку</button>
                    <div class="yexclude_country-car">
                        <h2>Исключить страну</h2>
                        <ydropdown :placeholder="'Выберите страну'" :items="countryName"></ydropdown>
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
                    <yselect :placeholder="'Выберите город'" :options="ukSityName"></yselect>
                    <div class="yreg-checkbox">
                        <div class="yflex_dir">
                            <div class="yside_country">
                                <h2>Центральная Украина</h2>
                                <div class="yside_check">
                                    <div class="y-check ">
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Киевская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Полтавская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Винницкая</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Житомирская</label>
                                        </div>
                                    </div>
                                    <div class="y-check">
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Сумская</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Черкасская</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Черниговская</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Кировоградская</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="yside_country">
                                <h2>Западная Украина</h2>
                                <div class="yside_check">
                                    <div class="y-check ">
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Львовская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Волынская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Закарпатская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Ровенская</label>
                                        </div>
                                    </div>
                                    <div class="y-check">
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Ивано-Франковская</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Тернопольская</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Хмельницкая</label>
                                        </div>
                                        <div class="check_vis_r central">
                                            <input type="checkbox">
                                            <label for="">Черновицкая</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="yflex_dir">
                            <div class="yside_country">
                                <h2>Восточная Украина</h2>
                                <div class="yside_check">
                                    <div class="y-check ">
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Харьковская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Донецкая</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Запорожская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Луганская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Днепропетровская</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="yside_country">
                                <h2>Южная Украина</h2>
                                <div class="yside_check">
                                    <div class="y-check ">
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Херсконская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Николаевская</label>
                                        </div>
                                        <div class="check-vis_l central">
                                            <input type="checkbox">
                                            <label for="">Одесская</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
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
                countryName: ["Китай",
                            "США",
                            "Япония",
                            "Германия",
                            "Индия",
                            "ЮжнаяКорея",
                            "Мексика",
                            "Бразилия",
                            "Испания",
                            "Таиланд",],
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
                typeCars: ['Легковые', 'Мото', 'Автобусы', 'Водный', 'Сельхозтехника', 'Спецтехника', 'Прицепы',],
                years: ['2020' , '2019' , '2018' , '2017' , '2016' , '2015' , '2014' , '2013' , '2012' , '2011' , '2010' , '2009' , '2008' , '2007' , '2006' , '2005' , '2004' , '2003' , '2002' , '2001', '2000', '1999',  '1998', ' 1997', '1996', '1995',  '1994',  '1993',  '1992' , '1991',  '1990' , '1989' , '1988' , '1987' , '1986' , '1985' , '1984' , '1983' , '1982' , '1981' , '1980' , '1979' , '1978' , '1977' , '1976' , '1975' , '1974' , '1973' , '1972' , '1971' , '1970' , '1969' , '1968' , '1967' , '1966' , '1965' , '1964' , '1963' , '1962' , '1961' , '1960' , '1959' , '1958' , '1957' , '1956' , '1955' , '1954' , '1953' , '1952' , '1951' , '1950' ,'1949' , '1948' , '1947' , '1946' , '1945' , '1944' , '1943' , '1942' , '1941' , '1940' , '1939' , '1938' , '1937' , '1936' , '1935' , '1934' , '1933' , '1932' , '1931' , '1930' , '1929' , '1928' , '1927' , '1926' , '1925' , '1924' , '1923' , '1922' , '1921' , '1920', '1919' , '1918' , '1917' , '1916' ,'1915' , '1914' , '1913' , '1912' , '1911' , '1910' , '1909' , '1908' , '1907' , '1906' , '1905' , '1904' , '1903' , '1902',  '1901','1900']
            }
        }
    }
</script>
