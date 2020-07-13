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
                <ylocation></ylocation>
            <div class="yb-lang-switcher">
                    <button class="ylang">UA</button>
                    <button class="ylang">RU</button>
            </div>
            <div class="yb_user-menu">
                <ymenu></ymenu>
            </div>
        </div>
    </header>

    <main class="yb_content">
        <section class="yform">
            <div class="yb-form_left">
                <div class="yb-block_reg">
                    <div class="form_title">
                        <h3>Актуальные</h3>
                    </div>
                    <div class="yreguest">
                        <yreguests></yreguests>
                    </div>
                </div>
                <div class="yb_select-form">
                    <yform></yform>
                </div>
            </div>
            <div class="yb-form_right">
                    <div class="yb-expanded_search">
                       <yexpanded></yexpanded>
                    </div>
                <div class="yb-status">
                    <ystatus></ystatus>
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
    </main>

    <footer>

    </footer>
</div>

<script src="{{asset('js/site.js')}}"></script>
</body>
</html>
