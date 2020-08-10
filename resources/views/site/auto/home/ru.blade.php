<main class="yb-content">
    <section class="yb-first_screen">
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
        <ystickers></ystickers>
    </section>
    <section class="yb-stickers-mobile">
        <ymobilesticker></ymobilesticker>
    </section>
    <section class="yb-best_offers">
        <ybestoffer></ybestoffer>
    </section>
    <section class="yb-catalog">
        <ycatalog></ycatalog>
    </section>
    <section class="ymobilecatalog">
        <ymobilecatalog></ymobilecatalog>
    </section>

    <section class="yb-analytics">
        <yanalitics></yanalitics>
    </section>
    <section class="ymobileanalitics">
        <ymobileanalitics></ymobileanalitics>
    </section>

    <section class="yb-news">
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

