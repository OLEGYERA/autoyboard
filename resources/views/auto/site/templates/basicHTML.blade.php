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
                <img src="{{asset('img/system/logos/logo.png')}}" alt="logo">
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
{{--            <div class="yb_select-form">--}}
{{--                <yform></yform>--}}
{{--            </div>--}}
            <div class="yb-form_right">
                    <div class="yb-expanded_search">
                       <yexpanded></yexpanded>
                    </div>
                <div class="yb-status">
                    <ystatus></ystatus>
                </div>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</div>

<script src="{{asset('js/site.js')}}"></script>
</body>
</html>
