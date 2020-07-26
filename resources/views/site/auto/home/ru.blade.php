<main class="yb-content">
    <section class="yb-firsr_screen">
        <div class="yb-form">
            <div class="yb-form_left">
                <ul class="yb-main-links">
                    <li class="yb-main-link">
                        <a href="#">Б/у авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Новые авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Проверка авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Мониторинг цен</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">АвтоНовости</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Популярные запросы</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Смотреть больше</a>
                    </li>
                </ul>
            </div>
            <yform></yform>
            <div class="yb-form_right">
                <yexpanded :text_color="'white'" :text="'Расширеный поиск'"></yexpanded>
                <ystatus></ystatus>
            </div>
        </div>
    </section>
    <section class="yb-stickers">
        <div class="yb-sticker">
            <div class="yb-sticker_logo">
                <span class="brand_title">Audi</span>
                <img src="{{asset('img/system/static/audi_logo.png')}}" alt="">
            </div>
            <div class="background_style" style="background: linear-gradient(180deg, rgba(255, 255, 255, 0.136) 16.67%, rgba(44, 133, 219, 0.8) 85.94%);"></div>
            <figure class="img-context">
                <img src="https://i.ytimg.com/vi/wVqgL8ly9BE/maxresdefault.jpg" alt="">
            </figure>
            <h4 class="yb-sticker_title" style="color: #fff;">Новая Audi TT RS</h4>
        </div>
        <div class="yb-sticker">
            <div class="yb-sticker_logo">
                <span class="brand_title">Volkswagen</span>
                <img src="{{asset('img/system/static/vw_logo.png')}}" alt="">
            </div>
            <div class="background_style" style="background: linear-gradient(180deg, rgba(27, 27, 27, 0.096) 40.82%, rgba(227, 199, 120, 0.8) 71.23%);"></div>
            <figure class="img-context">
                <img src="https://carexpert.ru/img/foto600/vw/vwar001.jpg" alt="">
            </figure>
            <h4 class="yb-sticker_title" style="color: #1B1B1B;">Новый Volkswagen Arteon </h4>
        </div>
        <div class="yb-sticker">
            <div class="yb-sticker_logo">
                <span class="brand_title">Mercedes-Benz</span>
                <img src="{{asset('img/brands_logo/mercedes-benz.png')}}" alt="">
            </div>
            <div class="background_style" style="background:linear-gradient(180.17deg, rgba(27, 27, 27, 0.56) 57.5%, rgba(27, 27, 27, 0.85) 93.18%); "></div>
            <figure class="img-context">
                <img src="https://www.autocentre.ua/wp-content/uploads/2017/11/cls-3.jpg" alt="">
            </figure>
            <h4 class="yb-sticker_title" style="color: #fff;">Новый Mercedes-Benz </h4>
        </div>
    </section>
    <section class="yb-best_offers">
        <ybestoffer></ybestoffer>
    </section>

{{--    <section class="ycatalog">--}}
{{--        <ycatalog></ycatalog>--}}
{{--    </section>--}}

{{--    <section class="yanalytics">--}}
{{--        <yanalitics></yanalitics>--}}
{{--    </section>--}}

{{--    <section class="ynews">--}}
{{--        <ynews></ynews>--}}
{{--    </section>--}}
</main>

{{--<footer class="yfooter_content">--}}

{{--    <div class="logo_social">--}}
{{--        <div class="yb_logo_white">--}}
{{--            <a href="#">--}}
{{--                <img src="{{asset('img/system/logos/logo_white.png')}}" alt="logo">--}}
{{--            </a>--}}
{{--        </div>--}}
{{--        <div class="social_link">--}}
{{--            <a class="social_logo" href="">--}}
{{--                <i class="fab fa-instagram"></i>--}}
{{--            </a>--}}
{{--            <a class="social_logo" href="">--}}
{{--                <i class="fab fa-facebook"></i>--}}
{{--            </a>--}}
{{--            <a class="social_logo" href="">--}}
{{--                <i class="fab fa-youtube"></i>--}}
{{--            </a>--}}
{{--            <a class="social_logo" href="">--}}
{{--                <i class="fab fa-telegram"></i>--}}
{{--            </a>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <div class="footer_list">--}}
{{--        <div class="yrepeat_catalog">--}}
{{--            <h3 class="yrepeat_title">Каталог</h3>--}}
{{--            <ul class="yrepeat_list">--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Легковые</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Мото</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Грузовики</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Прицепы</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Спецтехника</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Сельхозтехника</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Автобусы</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Водный</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="yrepeat_catalog">--}}
{{--            <h3 class="yrepeat_title">Автомобили б/у</h3>--}}
{{--            <ul class="yrepeat_list">--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Автодилеры</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Авто из Европы</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Растаможенные авто</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Нерастаможенные авто</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="yrepeat_catalog">--}}
{{--            <h3 class="yrepeat_title">Новые авто</h3>--}}
{{--            <ul class="yrepeat_list">--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Автосалоны</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Мотосалоны</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Спецтехника</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Электромобили</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="yrepeat_catalog">--}}
{{--            <h3 class="yrepeat_title">Аналитика</h3>--}}
{{--            <ul class="yrepeat_list">--}}
{{--                <li class="item_repeat">--}}
{{--                    <a  href="#">Лучшая цена</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a  href="#">Провереные авто</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a  href="#">Статистика по городам</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a  href="#">Изменения цен</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="yrepeat_catalog">--}}
{{--            <h3 class="yrepeat_title">Сервисы</h3>--}}
{{--            <ul class="yrepeat_list">--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Мониторинг цен</a>--}}
{{--                </li>--}}
{{--                <li class="item_repeat">--}}
{{--                    <a href="#">Проверка авто</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--        <div class="ysite_step">--}}
{{--            <h3 class="yrepeat_title">Партнерская программа</h3>--}}
{{--            <ul class="site_step-list">--}}
{{--                <li class="step_list">--}}
{{--                    <a href="" class="step">Отзывы об авто</a>--}}
{{--                </li>--}}
{{--                <li class="step_list">--}}
{{--                    <a href="" class="step">Авто Лидер</a>--}}
{{--                </li>--}}
{{--                <li class="step_list">--}}
{{--                    <a href="" class="step">Реклама на сайте</a>--}}
{{--                </li>--}}
{{--                <li class="step_list">--}}
{{--                    <a href="" class="step">Безопасные сделки</a>--}}
{{--                </li>--}}
{{--                <li class="step_list">--}}
{{--                    <a href="" class="step">Помощь по сайту</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}


{{--</footer>--}}
