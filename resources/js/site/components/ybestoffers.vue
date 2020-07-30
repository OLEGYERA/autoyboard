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
                            <img src="data:image/jpeg;base64,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" alt="">
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
                            <img src="https://www.autocentre.ua/wp-content/uploads/2017/11/cross_Renault_CAPTUR.jpg" alt="">
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
                            <img src="https://imgctcf.aeplcdn.com/thumbs/p-nc-a-ver48/images/car-data/big/renault-kwid-default.jpg" alt="">
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
    // import VueSlickCarousel from  'vue-slick-carousel'
    // import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    import Slick from 'vue-slick';
    import '../../../../node_modules/slick-carousel/slick/slick.css'
export default {
    components: { Slick },
    data() {
        return {
            favorite: false,
            slickOptions: {
                dots: true,
                arrows: true,
                dotsClass: "slick-dots custom-dot-class",
                edgeFriction: 0,
                infinite: false,
                speed: 600,
                slidesToShow: 3,
                slidesToScroll: 3,
                responsive: [
                    {
                        breakpoint: 1920,
                        slickOptions: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: false,
                            dots: true,
                            arrows: true,
                        }
                    },
                    {
                        breakpoint: 945,
                        slickOptions: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: false,
                            dots: true,
                            arrows: true,
                        }
                    },
                    {
                        breakpoint: 320,
                        slickOptions: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            infinite: false,
                            dots: true,
                            arrows: true,
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

