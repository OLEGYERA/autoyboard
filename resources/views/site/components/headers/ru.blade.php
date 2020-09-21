<header class="yb-header">
    <div class="yb-header-left">
        <div class="yb-logo">
            <a href="#">
                <img src="{{asset('img/system/logos/logo.png')}}" alt="logo">
            </a>
        </div>
        <ymenu></ymenu>
    </div>
    <div class="yb-header-right">
        <ysearch></ysearch>
        <div  class="ylocation-box">
            <i class="fas fa-map-marker-alt"></i>
            <ylocation
                :container="'header'"
                :text="'Вся Украина'"
                :list_style="'autocomplete-result'"
                :drop_style="'autocomplete-results'"
                :input_style="'dropdown-input'">
            </ylocation>
        </div>
        <div  class="yb-lang-switcher">
            <button class="ylang">UA</button>
            <button class="ylang active">RU</button>
        </div>
        <div class="yb-favorite">
            <span class="yb_count_items">1</span>
            <i class="far fa-heart"></i>
{{--            <div class="yb_favorite-null">--}}
{{--            <figure class="yb-image_null">--}}
{{--                <img src="{{asset('img/system/static/favorite_null.png')}}" alt="">--}}
{{--            </figure>--}}
{{--                <div class="yb_desc-null">--}}
{{--                    <h1>Список избранных пуст</h1>--}}
{{--                    <p>Добавляйте автомобили в список желаний,чтобы не потерять</p>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>
</header>

