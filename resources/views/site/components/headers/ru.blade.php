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
        <div class="ylocation-box">
            <i class="fas fa-map-marker-alt"></i>
            <ylocation
                :container="'header'"
                :text="'Введите город...'"
                :list_style="'autocomplete-result'"
                :drop_style="'autocomplete-results'"
                :input_style="'dropdown-input'">
            </ylocation>
        </div>
        <div class="yb-lang-switcher">
            <button class="ylang">UA</button>
            <button class="ylang active">RU</button>
        </div>
        <div class="yb-favorite">
            <span class="yb_count_items">1</span>
            <i class="far fa-heart"></i>
        </div>
    </div>
</header>
