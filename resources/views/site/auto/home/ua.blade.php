<main class="yb-content">
    <section class="yb-first_screen">
        <div class="yb-form">
            <div class="yb-form_left">
                <ul class="yb-main-links">
                    <li class="yb-main-link">
                        <a href="#">Б/у авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Нові авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Перевірка авто</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Моніторинг цін</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Авто новини</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Популярні запити</a>
                    </li>
                    <li class="yb-main-link">
                        <a href="#">Дивитися більше</a>
                    </li>
                </ul>
            </div>
            <yform></yform>
            <div class="yb-form_right">
                <yexpanded  :text_color="'white'" :utext="'Розширений пошук'" :text="'Расширеный поиск'"></yexpanded>
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
                    <a href="#">Легкові</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Мото</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Вантажівки</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Причепи</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Спецтехніка</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Сільгосптехніка</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Автобуси</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Водний</a>
                </li>
            </ul>
        </div>
        <div class="yrepeat_catalog">
            <h3 class="yrepeat_title">Автомобили б/у</h3>
            <ul class="yrepeat_list">
                <li class="item_repeat">
                    <a href="#">Автодилери</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Авто з Європи</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Розмитнені авто</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Нерозмитнені авто</a>
                </li>
            </ul>
        </div>
        <div class="yrepeat_catalog">
            <h3 class="yrepeat_title">Нові авто</h3>
            <ul class="yrepeat_list">
                <li class="item_repeat">
                    <a href="#">Автосалони</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Мотосалони</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Спецтехніка</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Електромобілі</a>
                </li>
            </ul>
        </div>
        <div class="yrepeat_catalog">
            <h3 class="yrepeat_title">Аналітика</h3>
            <ul class="yrepeat_list">
                <li class="item_repeat">
                    <a  href="#">Найкраща ціна</a>
                </li>
                <li class="item_repeat">
                    <a  href="#">Перевірені авто/a>
                </li>
                <li class="item_repeat">
                    <a  href="#">Статистика по містах</a>
                </li>
                <li class="item_repeat">
                    <a  href="#">Зміни цін</a>
                </li>
            </ul>
        </div>
        <div class="yrepeat_catalog">
            <h3 class="yrepeat_title">Сервіси</h3>
            <ul class="yrepeat_list">
                <li class="item_repeat">
                    <a href="#">Моніторинг цін</a>
                </li>
                <li class="item_repeat">
                    <a href="#">Перевірка авто</a>
                </li>
            </ul>
        </div>
        <div class="ysite_step">
            <h3 class="yrepeat_title">Партнерська програма</h3>
            <ul class="site_step-list">
                <li class="step_list">
                    <a href="" class="step">Відгуки про авто</a>
                </li>
                <li class="step_list">
                    <a href="" class="step">Авто Лідер</a>
                </li>
                <li class="step_list">
                    <a href="" class="step">Реклама на сайті</a>
                </li>
                <li class="step_list">
                    <a href="" class="step">Безпечні угоди</a>
                </li>
                <li class="step_list">
                    <a href="" class="step">Допомога по сайту</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

