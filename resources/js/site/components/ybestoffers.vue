<template>
    <div class="ybestoffer">
        <ytitle :title="'Лучшие предложения'"></ytitle>
        <div class="ybest-items">
                <Slick ref="slick" :options="slickOptions">
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://vis.iaai.com/resizer?imageKeys=28196525~SID~B818~S1~I2~RW2592~H1944~TH0&width=845&height=633" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://vis.iaai.com/resizer?imageKeys=28196525~SID~B818~S1~I2~RW2592~H1944~TH0&width=845&height=633" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://vis.iaai.com/resizer?imageKeys=28196525~SID~B818~S1~I2~RW2592~H1944~TH0&width=845&height=633" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://vis.iaai.com/resizer?imageKeys=28196525~SID~B818~S1~I2~RW2592~H1944~TH0&width=845&height=633" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://insurance-guidelines.com/wp-content/uploads/2019/03/car-rental.jpeg" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="ybest-item">
                        <div class="yb-icon_check">
                            <button class="item_check">
                                <img src="img/system/icons/car_check.svg" alt="">
                            </button>
                            <button class="new_item">
                                NEW
                            </button>
                        </div>
                        <figure class="item_image">
                            <img src="https://autoworld.files.wordpress.com/2010/01/peugeot-sr1-concept-car-img_1.jpg" alt="">
                            <yfavorite :favorite="favorite"></yfavorite>
                        </figure>
                        <div class="item_desc">
                            <h2 class="item_name">Mercedes-Benz E 220 2009</h2>
                            <span class="sity-name_item">Киев</span>
                            <div class="price_more">
                                <span class="item_price">8 200 $</span>
                                <button class="show_more">
                                    Подробнее
                                    <svg class="arrow_right" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                         width="40" height="40"
                                         viewBox="0 0 172 172"
                                         style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                        <path d="M0,172v-172h172v172z" fill="none"></path><g fill="#111e6c"><path d="M130.84094,48.11969c-1.3975,-0.02687 -2.67406,0.80625 -3.23844,2.08281c-0.55094,1.29 -0.26875,2.78156 0.71219,3.77594l27.43938,28.58156h-148.79344c-1.23625,-0.01344 -2.39188,0.63156 -3.01,1.70656c-0.63156,1.075 -0.63156,2.39187 0,3.46687c0.61812,1.075 1.77375,1.72 3.01,1.70656h148.79344l-27.43938,28.58156c-1.31687,1.37062 -1.26312,3.5475 0.1075,4.86437c1.37063,1.31688 3.5475,1.27656 4.86438,-0.1075l35.31375,-36.77844l-35.31375,-36.77844c-0.63156,-0.68531 -1.51844,-1.075 -2.44563,-1.10188z"></path></g></g></svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </Slick>
        </div>
    </div>
</template>


<script>

    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    import Slick from 'vue-slick';
    // import "slick-carousel/slick/slick.css";
    // import '../../../../node_modules/slick-carousel/slick/slick.css'
export default {
    components: { Slick },
    data() {
        return {
            favorite: false,
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 3,
                dotsClass: "slick-dots custom-dot-class",
                edgeFriction: 0,
                infinite: false,
                speed: 600,
                dots: true,
                arrows: true,
                adaptiveHeight: true,
                ZIndex: 1000,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 946,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 601,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 426,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ]
            },
        }
    }
}
</script>


<style >




</style>

