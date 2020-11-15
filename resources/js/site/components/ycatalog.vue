<template>
    <div class="ycatalog_block">
        <ytitle
            :title="'Каталог'"
            :uatitle="'Каталог'"
        ></ytitle>
        <div class="y-cat-bottom">
            <div class="cat_categories">
                    <h3 v-if="lang === 'ru'" class="title">Категории</h3>
                    <h3 v-else class="title">Категорії</h3>
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
            <div class="ydrop_down">
<!--                <ydropdown></ydropdown>-->
            </div>
            <div class="type_body-marks">
                <div class="car_body-type">
                    <div class="body-type_top">
                        <h3 v-if="lang ==='ru'" class="type-top_title">Популярные кузовы</h3>
                        <h3 v-else class="type-top_title">Популярні кузови</h3>
                        <yexpanded :text_color="'white'" :utext="'Дивитися більше'" :text="'Смотреть больше'"></yexpanded>
                    </div>
                    <div class="yb-slide_type">
                        <Slick id="slick3" :options="slickOptions" ref="slick">
                        <div class="yb_slide-body">
                            <figure class="slide small">
                                <img src="img/system/static/sedan.png" alt="">
                            </figure>
                            <span class="body_name">Седан</span>
                        </div>
                        <div class="yb_slide-body">
                            <figure class="slide large">
                                <img src="img/system/static/crossover.png" alt="">
                            </figure>
                            <span class="body_name bold">Кроссовер</span>
                        </div>
                        <div class="yb_slide-body">
                            <figure class="slide small">
                                <img src="img/system/static/cabriolet.png" alt="">
                            </figure>
                            <span class="body_name">Кабриолет</span>
                        </div>
                        </Slick>
                    </div>
                </div>
                <div class="yshow_more-body">
                    <button class="ymore_body">Смотреть еще</button>
                </div>
                <div class="yb-car_marks">
                    <div class="car_marks-title">
                        <h3 class="marks_title">Популярные марки</h3>
                        <yexpanded :text_color="'blue'" :utext="'Дивитися більше'" :text="'Смотреть больше'" :color="'blue'"  ></yexpanded>
                    </div>
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
                                <div class="yshow_more-marks">
                                    <button v-if="lang==='ru'" class="ymore_marks">Все марки</button>
                                    <button v-else class="ymore_marks">Всі марки</button>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Slick from "vue-slick";
export default  {
    props:['lang'],
    components: {
        Slick
    },
    data(){
        return{
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 3,
                arrows: false,
                dots: false,
                speed: 600,
                adaptiveHeight: false,
                infinite: false,
                responsive: [
                    {
                        breakpoint: 601,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: true,
                            speed: 600,
                        }
                    }
                ]
            },
        }
    }
}
</script>
