<template>
    <div class="ycatalog_block">
        <ytopcontent :title="'Каталог'"></ytopcontent>
        <div class="y-cat-bottom">
            <div class="cat_categories">
                <div class="y-bt_title">
                    <h3 class="title">Категории</h3>
                </div>
                <div class="cat_list-items">
                    <ul class="list_items">
                        <li  tabindex="0" class="cat_item">Легковые</li>
                        <li  tabindex="1" class="cat_item">Мото</li>
                        <li  tabindex="2"  class="cat_item">Автобусы</li>
                        <li  tabindex="3" class="cat_item">Водный</li>
                        <li  tabindex="4" class="cat_item">Сельхозтехника</li>
                        <li  tabindex="5" class="cat_item">Спецтехника</li>
                        <li  tabindex="6"  class="cat_item">Прицепы</li>
                    </ul>
                </div>
            </div>
            <div class="type_body-marks">
                <div class="car_body-type">
                    <div class="body-type_top">
                        <h3 class="type-top_title">Популярные кузовы</h3>
                        <yexpanded :text_color="'white'" :text="'Смотреть больше'"></yexpanded>
                    </div>
                    <div class="yb-slide_type">
                        <div class="yb_clide-body">
                            <figure class="slide">
                                <img src="img/system/static/sedan.png" alt="">
                            </figure>
                            <span class="body_name">Седан</span>
                        </div>
                        <div class="yb_clide-body">
                            <figure class="slide">
                                <img src="img/system/static/crossover.png" alt="">
                            </figure>
                            <span class="body_name bold">Кроссовер</span>
                        </div>
                        <div class="yb_clide-body">
                            <figure class="slide">
                                <img src="img/system/static/cabriolet.png" alt="">
                            </figure>
                            <span class="body_name">Кабриолет</span>
                        </div>
                    </div>
                </div>
                <div class="yb-car_marks">
                    <div class="car_marks-title">
                        <h3 class="marks_title">Популярные марки</h3>
                        <yexpanded :text_color="'blue'" :text="'Смотреть больше'" :color="'blue'"  ></yexpanded>
                    </div>
                    <div class="yb_list">
                            <div class="yb_marks_list">
                                <ul class="marks-list_body">
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/audi.png" alt="">
                                    </a>
                                    </li>
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/audi.png" alt="">
                                        </a>
                                    </li>
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/audi.png" alt="">
                                        </a>
                                    </li>
                                    <li  class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/acura.png" alt="">
                                    </a>
                                    </li>
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/austin.png" alt="">
                                    </a>
                                    </li>
                                    <li  class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/dacia.png" alt="">
                                    </a>
                                    </li>
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/maserati.png" alt="">
                                    </a>
                                    </li>
                                    <li  class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/mercedes-benz.png" alt="">
                                    </a>
                                    </li>
                                    <li class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/kia.png" alt="">
                                    </a>
                                    </li>
                                    <li  class="mark_list">
                                        <a class="marks" href="#">
                                            <img src="img/brands_logo/peugeot.png" alt="">
                                    </a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

</script>
