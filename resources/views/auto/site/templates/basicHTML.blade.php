<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Главная</title>
    <link rel="stylesheet" href="{{asset('css/site.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/AlegreyaSans/alegreyasans.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/Raleway/raleway.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
<div id="yb-site">
    <header class="yb-header">
        <div class="yb-header-left">
            <div class="yb-logo">
                <a href="#">
                    <img src="{{asset('img/system/logos/logo.png')}}" alt="logo">
                </a>
            </div>
            <ycats></ycats>
        </div>
        <div class="yb-header-right">
                <ysearch></ysearch>
            <div class="ylocation">
                <i class="fas fa-map-marker-alt"></i>
                <ylocation
                    :container="'ylocations'"
                    :text="'Вся Украина'"
                    :list_style="'autocomplete-result'"
                    :drop_style="'autocomplete-results'"
                    :input_style="'dropdown-input'">
                </ylocation>
                <div class="yb-lang-switcher">
                    <button class="ylang">UA</button>
                    <button class="ylang">RU</button>
                </div>
            </div>

            <div class="yb_user-menu">
                <ymenu></ymenu>
            </div>
        </div>
    </header>

    <main class="yb_content">
        <section class="yform">
            <div class="yb_container">
            <div class="yb-form_left">
                <h3 class="form_title">Актуальные</h3>
                <yreguests></yreguests>
            </div>
                <div class="yb_select-form">
                    <yform></yform>
                </div>
            <div class="yb-form_right">
                    <yexpanded :text_color="'white'" :text="'Расширеный поиск'"></yexpanded>
                    <div class="yb-status">
                        <ystatus></ystatus>
                    </div>
            </div>
            </div>
        </section>
        <section class="yb_sticker">
                <div class="yb_st-item">
                    <div class="yb-st_logo">
                        <span class="brand_title">Audi</span>
                        <img src="{{asset('img/system/static/audi_logo.png')}}" alt="">
                    </div>
                    <div class="background_style" style="background: linear-gradient(180deg, rgba(255, 255, 255, 0.136) 16.67%, rgba(44, 133, 219, 0.8) 85.94%);"></div>
                    <img src="https://i.ytimg.com/vi/wVqgL8ly9BE/maxresdefault.jpg" alt="">
                    <h4 class="yb-st_title">Новая Audi TT RS</h4>
                </div>
                <div class="yb_st-item">
                    <div class="yb-st_logo">
                        <span class="brand_title">Volkswagen</span>
                        <img src="{{asset('img/system/static/vw_logo.png')}}" alt="">
                    </div>
                    <div class="background_style" style="background: linear-gradient(180deg, rgba(27, 27, 27, 0.096) 40.82%, rgba(227, 199, 120, 0.8) 71.23%);"></div>
                    <img src="https://carexpert.ru/img/foto600/vw/vwar001.jpg" alt="">
                    <h4 class="yb-st_title">Новый Volkswagen Arteon </h4>
                </div>
                <div class="yb_st-item">
                    <div class="yb-st_logo">
                        <img src="{{asset('img/brands_logo/mercedes-benz.png')}}" alt="">
                        <span class="brand_title">Mercedes-Benz</span>
                    </div>
                    <div class="background_style" style="background:linear-gradient(180.17deg, rgba(27, 27, 27, 0.56) 57.5%, rgba(27, 27, 27, 0.85) 93.18%); "></div>
                    <img src="https://www.autocentre.ua/wp-content/uploads/2017/11/cls-3.jpg" alt="">
                    <h4 class="yb-st_title">Новый Mercedes-Benz </h4>
                </div>
        </section>

        <section class="best_offers">
            <ybestoffer></ybestoffer>
        </section>

        <section class="ycatalog">
            <ycatalog></ycatalog>
        </section>

        <section class="yanalytics">
            <yanalitics></yanalitics>
        </section>

        <section class="ynews">
            <ynews></ynews>
        </section>

    </main>

    <footer class="yfooter_content">

                    <div class="logo_social">
                        <div class="yb_logo_white">
                            <a href="#">
                                <img src="{{asset('img/system/logos/logo_white.png')}}" alt="logo">
                            </a>
                        </div>
                            <div class="social_link">
                                <a class="social_logo" href="">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a class="social_logo" href="">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a class="social_logo" href="">
                                    <i class="fab fa-youtube"></i>
                                </a>
                                <a class="social_logo" href="">
                                    <i class="fab fa-telegram"></i>
                                </a>
                            </div>
                    </div>
                    <div class="footer_list">
                    <div class="yrepeat_catalog">
                        <h3 class="yrepeat_title">Каталог</h3>
                        <ul class="yrepeat_list">
                            <li class="item_repeat">
                                <a href="#">Легковые</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Мото</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Грузовики</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Прицепы</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Спецтехника</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Сельхозтехника</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Автобусы</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Водный</a>
                            </li>
                        </ul>
                    </div>
                    <div class="yrepeat_catalog">
                        <h3 class="yrepeat_title">Автомобили б/у</h3>
                        <ul class="yrepeat_list">
                            <li class="item_repeat">
                                <a href="#">Автодилеры</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Авто из Европы</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Растаможенные авто</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Нерастаможенные авто</a>
                            </li>
                        </ul>
                    </div>
                    <div class="yrepeat_catalog">
                        <h3 class="yrepeat_title">Новые авто</h3>
                        <ul class="yrepeat_list">
                            <li class="item_repeat">
                                <a href="#">Автосалоны</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Мотосалоны</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Спецтехника</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Электромобили</a>
                            </li>
                        </ul>
                    </div>
                    <div class="yrepeat_catalog">
                        <h3 class="yrepeat_title">Аналитика</h3>
                        <ul class="yrepeat_list">
                            <li class="item_repeat">
                                <a  href="#">Лучшая цена</a>
                            </li>
                            <li class="item_repeat">
                                <a  href="#">Провереные авто</a>
                            </li>
                            <li class="item_repeat">
                                <a  href="#">Статистика по городам</a>
                            </li>
                            <li class="item_repeat">
                                <a  href="#">Изменения цен</a>
                            </li>
                        </ul>
                    </div>
                    <div class="yrepeat_catalog">
                        <h3 class="yrepeat_title">Сервисы</h3>
                        <ul class="yrepeat_list">
                            <li class="item_repeat">
                                <a href="#">Мониторинг цен</a>
                            </li>
                            <li class="item_repeat">
                                <a href="#">Проверка авто</a>
                            </li>
                        </ul>
                    </div>
                    <div class="ysite_step">
                        <h3 class="yrepeat_title">Партнерская программа</h3>
                        <ul class="site_step-list">
                            <li class="step_list">
                                <a href="" class="step">Отзывы об авто</a>
                            </li>
                            <li class="step_list">
                                <a href="" class="step">Авто Лидер</a>
                            </li>
                            <li class="step_list">
                                <a href="" class="step">Реклама на сайте</a>
                            </li>
                            <li class="step_list">
                                <a href="" class="step">Безопасные сделки</a>
                            </li>
                            <li class="step_list">
                                <a href="" class="step">Помощь по сайту</a>
                            </li>
                        </ul>
                    </div>
                    </div>


    </footer>
</div>

<script src="{{asset('js/site.js')}}"></script>
</body>
</html>
<script>


</script>
