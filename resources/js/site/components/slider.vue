<template>
    <div class="ycard_image">
        <div class="ycard_image-vis">
            <div class="y-image_items">
                <span class="sold_car" v-if="soldCar">Продано</span>
                <figure
                    :class="{'blur' : soldCar}"
                    class="y-image_large"
                    v-if="withPhotos === true">
                    <div :class="{'yb-sold_carout' : soldCar}"></div>
                    <img v-lazy="'/' + options[currImgIdx].path" alt="">
                    <div class="yb-count_increase-img">
                        <div class="yb_count-img">
                            <i class="far fa-image"></i>
                            <div class="yb_count">
                                <span class="count">{{ currImgIdx + 1 }}</span>
                                <span v-if="lang == 'ru' ">из</span>
                                <span v-else>з</span>
                                <span class="count">{{ options.length }}</span>
                            </div>
                        </div>
                        <button @click="showSlider = true" class="yb-increase">
                            <i class="fas fa-search-plus"></i>
                        </button>
                    </div>
                </figure>
                <figure class="y-image_large without_photos" v-if="withPhotos === false">
                    <img alt="" src="../../../../public/img/system/static/withoutPhoto.png">
                    <h2>Без фото</h2>
                </figure>
                <div :class="{'blur' : soldCar}"
                     class="y_vis-image "
                     v-if="withPhotos"
                >
                    <div class="y-image_small">
                        <figure :key="i"
                                @click="currImgIdx = i"
                                class="y-item_image"
                                v-for="(item, i) in options"
                                v-if="imgFullList ? true : i < 5"
                        >
                            <div :class="{'yb-sold_carout' : soldCar}"></div>
                            <img v-lazy="'/' + item.path" alt="">
                        </figure>
                    </div>
                    <div class="yb_img-fulllist" v-if="options.length > 5">
                            <span class="y-image_all" @click="imgFullList = !imgFullList"
                                  v-if="!imgFullList">
                                <span v-if="lang == 'ru' ">Смотреть все фото</span>
                                <span v-else>Дивитися всі фото</span>
                                 <i
                                     @click="!imgFullList"
                                     class="fas fa-chevron-down"
                                 >
                            </i>
                            </span>
                            <span class="y-image_all" @click="imgFullList = !imgFullList" v-else>
                                <span v-if="lang == 'ru' ">Скрыть</span>
                                <span v-else>Приховати</span>
                                   <i
                                       @click="imgFullList = !imgFullList"
                                       class="fas fa-chevron-up"
                                   >
                            </i>
                            </span>
                    </div>
                </div>
            </div>
        </div>
        <div  class="yb_fullpage-visual" v-if="showSlider">
            <div :class="{'yb_slide-landscape' : landscape}"  class="yb_slide-header ">
                <div class="yb-slide_left" >
                    <h2 class="yb_car-name">{{ fullname.brand }} {{ fullname.model }} {{fullname.mod}}</h2>
                    <div class="yb_header-price">
                        <span class="yb_price-car">{{fullname.price}} $</span>
                        <div class="yb_location-car" > {{region.region}} обл, {{region.city}} </div>
                    </div>
                </div>
                <i
                    @click="showSlider = false"
                    class="fas fa-times">
                </i>
            </div>
            <div class="yb-full_img" :class="{'yb_full-landscape' : landscape}">
                <section class="banner-section">
                    <div class="container">
                        <div class="vehicle-detail-banner banner-content clearfix">
                            <div class="banner-slider">
                                <div class="slider slider-for " v-if="options.length > 0">
                                    <Slick id="slick1" :options="slickOptions" ref="slickSetting1">
                                    <div v-for="(item,j) in options" class="slider-banner-image">
                                        <img v-lazy="'/' + item.path" alt="Car-Image">
                                    </div>
                                    </Slick>
                                </div>
                                <div class="slider slider-nav thumb-image" v-if="options.length > 0">
                                    <div class="thumbnail-image">
                                        <Slick id="slick2" :options="slickOptions2" ref="slickSetting2">
                                        <div v-for="(item,j) in options" class="thumbImg">
                                            <div class="yb_count-img" v-if="item === j">
                                                <span>{{ j+1 }}</span>
                                                <span v-if="lang === 'ru'">из</span>
                                                <span v-else>з</span>

                                                <span>{{ options.length }}</span>
                                            </div>
                                            <img v-lazy="'/' + item.path" alt="">
                                        </div>
                                        </Slick>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</template>
<style scoped>
 .banner-slider .slider.slider-for,
.banner-slider .slider.slider-nav {
    width: 76%;
}

</style>
<script>
    import Slick from 'vue-slick';
    import vuescroll from "vuescroll";
    export default {
        components: {vuescroll, Slick, },
        props: ['fullname', 'options', 'lang','region'],

        mounted() {
            window.addEventListener('orientationchange', this.changeOrientation);
            window.addEventListener('resize', this.onResize)
            this.onResize();
            document.addEventListener("keydown", (event) => {
                if (event.which === 37) this.prevChunk()
                if (event.which === 39) this.nextChunk()
            });
        },
        computed: {
            slickOptions() {
                return {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    fade: false,
                    zIndex: 11,
                    adaptiveHeight: true,
                    asNavFor: "#slick2",
                    prevArrow: '                    ' +
                        '<svg  class="yb_prev" fill="none" height="50" viewBox="0 0 26 50" width="26"\n' +
                        '     xmlns="http://www.w3.org/2000/svg">\n' +
                        '    <path\n' +
                        'd="M24.1396 3.8147e-06C25.1652 -0.00198038 25.9981 0.858079 26 1.9207C26.0009 2.43299 25.8045 2.92452 25.4544 3.28637L4.47682 25.0129L25.4544 46.7393C26.1668 47.5035 26.1464 48.7216 25.4088 49.4599C24.689 50.18 23.5481 50.18 22.8286 49.4599C14.1258 40.4432 0.543716 26.3712 0.543716 26.3712C-0.181238 25.6199 -0.181238 24.402 0.543716 23.6505L22.8286 0.561714C23.1764 0.202034 23.6479 3.8147e-06 24.1396 3.8147e-06Z"\n' +
                        'fill="rgba(255, 255, 255, 0.44)"/>\n' +
                        '                    </svg>\n',
                    nextArrow: '                    <svg  class="yb_next" fill="none" height="57" viewBox="0 0 30 57" width="30"\n' +
                        '                         xmlns="http://www.w3.org/2000/svg">-->\n' +
                        '                        <path\n' +
                        '                            d="M2.14666 57C0.963249 57.0023 0.00221306 56.0218 3.32498e-06 54.8104C-0.0010011 54.2264 0.225598 53.666 0.629578 53.2535L24.8344 28.4853L0.629578 3.71725C-0.192444 2.84598 -0.168942 1.45733 0.682209 0.615669C1.51267 -0.205223 2.82907 -0.205223 3.65933 0.615669C13.701 10.8947 29.3726 26.9369 29.3726 26.9369C30.2091 27.7933 30.2091 29.1818 29.3726 30.0384L3.65933 56.3596C3.25796 56.7697 2.71396 57 2.14666 57Z"\n' +
                        '                            fill="rgba(255, 255, 255, 0.44)"/>\n' +
                        '                    </svg>\n',
                }
            },
            slickOptions2() {
                return {
                    slidesToShow:3,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    vertical: true,
                    zIndex: 12,
                    verticalSwiping: true,
                    infinite: true,
                    // cssEase: "linear",
                    focusOnSelect: true,
                    asNavFor: "#slick1",
                    adaptiveHeight: false
                }
            }
        },

        updated() {
            this.scrollY();
            this.onResize();
        },
        data() {
            return {
                settings:{
                    "accessibility": false,
                    "dots": true,
                    "infinite": true,
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "adaptiveHeight": true
                },
                landscape: false,
                ops: {
                    vuescroll: {
                        mode: 'native',
                        sizeStrategy: 'percent',
                        detectResize: true
                    },
                    scrollPanel: {
                        initialScrollY: false,
                        initialScrollX: false,
                        scrollingX: true,
                        scrollingY: true,
                        speed: 500,
                        easing: undefined,
                        verticalNativeBarPos: 'right'
                    },
                    rail: {
                        background: 'rgba(255, 255, 255, 0.24)',
                        opacity: 1,
                        size: '11px',
                        specifyBorderRadius: '16px',
                        gutterOfEnds: null,
                        gutterOfSide: '2px',
                        keepShow: true,
                        border: '1px solid rgba(255, 255, 255, 0.13)'
                    },
                    bar: {
                        showDelay: 500,
                        onlyShowBarOnScroll: false,
                        keepShow: true,
                        background: 'rgb(255,255,255)',
                        opacity: 1,
                        hoverStyle: true,
                        specifyBorderRadius: false,
                        minSize: 0.2,
                        size: '9px',
                        disable: false,
                    },
                    scrollButton: {
                        enable: false,
                        background: 'rgb(238,17,17)',
                        opacity: 1,
                        step: 180,
                        mousedownStep: 30
                    }
                },
                //start slider fullPage
                imgShow: 6,
                currSlide: 0,
                currImgIdx: 0,
                transition_name: "slide_next",
                touch: {
                    startX: 0,
                    endX: 0
                }, // obj from touch slider in mobile visible
                //end slider fullPage
                showSlider: false,
                imgFullList: false, //show all small img
                windowWidth: 0,
                verifiedCar: true,
                withPhotos: true,
                soldCar: false,
                refuseScroll: false,
                responsive: [
                    {
                        breakpoint: 600,
                        settings: {
                            vertical: true,
                            verticalSwiping: true
                        }
                    },
                ]

            }
        },
        methods: {
            touchStart(event) {
                this.touch.startX = event.touches[0].clientX;
                this.touch.endX = 0;
            },
            touchMove(event) {
                this.touch.endX = event.touches[0].clientX;
            },
            touchEnd() {
                if (!this.touch.endX || Math.abs(this.touch.endX - this.touch.startX) < 20)
                    return;

                if (this.touch.endX < this.touch.startX)
                    this.nextImage()
                else
                    this.prevImage()
            },
            onResize() {
                this.windowWidth = document.documentElement.clientWidth;
                if (this.windowWidth <= 1024) this.imgShow = 4;
            },
            changeOrientation(){
                switch(window.orientation)
                {
                    case -90:
                    case 90:
                        this.landscape = true
                        console.log('landscape');
                        break;
                    default:
                        console.log('portrait');
                        break;
                }
            },
            scrollY() {
                if (this.showSlider === true) {
                    document.body.classList.add('scroll-disallowed');
                } else {
                    document.body.classList.remove('scroll-disallowed');
                }
            },
            goToChunk(idx) {
                this.transition_name = (idx < this.currSlide) ? "slide_prev" : "slide_next";
                this.currSlide = idx;
            },

            prevImage() {
                this.currImgIdx = (this.currImgIdx - 1 >= 0 ? this.currImgIdx - 1 : this.options.length - 1)
                if (!((this.currImgIdx + 1) % this.imgShow)) {
                    this.prevChunk()
                }
                if (this.currImgIdx === this.options.length - 1) {
                    this.prevChunk()
                }
            },
            nextImage() {
                this.currImgIdx = (this.currImgIdx + 1 < this.options.length ? this.currImgIdx + 1 : 0)
                if (!((this.currImgIdx) % this.imgShow)) {
                    this.nextChunk()
                }
            },
        },

    }
</script>


