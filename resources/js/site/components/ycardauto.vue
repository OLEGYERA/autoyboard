<template>
    <div class="ycard_image">
        <div class="ycard_image-vis">
            <div class="y-image_items">
                <span class="sold_car" v-if="soldCar">Продано</span>
                <figure
                    :class="{'blur' : soldCar}"
                    class="y-image_large"
                    v-if="withPhotos === true">
                    <div class="yb-icon_check" v-if="verifiedCar">
                        <div class="icon check">
                            <svg fill="none" height="40" viewBox="0 0 40 40" width="40"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0)">
                                    <path
                                        d="M38.3729 11.3872C38.2235 11.3872 38.0706 11.4087 37.9177 11.4507L36.1889 11.9268L34.3934 7.5532C33.8849 6.31429 32.3814 5.3064 31.0421 5.3064H14.24C12.9009 5.3064 11.3972 6.31429 10.8886 7.5532L9.0957 11.9208L7.38833 11.4507C7.2355 11.4087 7.08251 11.3872 6.9332 11.3872C6.11616 11.3872 5.52322 12.0114 5.52322 12.8715V13.8908C5.52322 13.9325 5.52659 13.9734 5.52951 14.0146C4.81777 14.4633 4.14972 14.9919 3.54023 15.6014C1.39782 17.7436 0.217773 20.5924 0.217773 23.6225C0.217773 26.6528 1.39782 29.5015 3.54039 31.6437C5.68311 33.7863 8.53174 34.9665 11.5617 34.9665C14.5917 34.9665 17.4405 33.7864 19.583 31.6437C20.8319 30.395 21.7509 28.9051 22.3028 27.2802H32.8703V29.4499C32.8703 30.4539 33.687 31.2706 34.6909 31.2706H37.0686C38.0726 31.2706 38.8893 30.4539 38.8893 29.4499V20.7613C38.8893 19.5169 38.505 17.5681 38.0324 16.417L37.7425 15.7113H37.9623C38.9662 15.7113 39.783 14.8945 39.783 13.8906V12.8714C39.783 12.0114 39.1899 11.3872 38.3729 11.3872ZM13.1169 8.10736C13.421 7.36619 14.3256 6.75992 15.1265 6.75992H30.1555C30.9566 6.75992 31.861 7.36619 32.1651 8.10736L34.881 14.7225C35.1851 15.4637 34.7786 16.07 33.9775 16.07H20.0242C19.8815 15.9106 19.7353 15.7536 19.5829 15.6011C17.44 13.4583 14.5914 12.2784 11.5616 12.2784C11.5084 12.2784 11.4559 12.2815 11.4029 12.2823L13.1169 8.10736ZM11.5617 31.5712C9.43861 31.5712 7.4426 30.7442 5.94125 29.2428C4.43991 27.7417 3.6132 25.7458 3.6132 23.6225C3.6132 21.4993 4.44006 19.5034 5.94125 18.0021C7.4426 16.5009 9.43861 15.674 11.5617 15.674C13.6848 15.674 15.6808 16.5009 17.1822 18.0021C18.6834 19.5034 19.5102 21.4993 19.5102 23.6225C19.5102 25.7458 18.6835 27.7417 17.1822 29.2428C15.6807 30.7442 13.6848 31.5712 11.5617 31.5712ZM35.385 23.0898C35.385 23.4904 35.0573 23.8181 34.6567 23.8181H29.498C29.0974 23.8181 28.7697 23.4904 28.7697 23.0898V20.6139C28.7697 20.2133 29.0974 19.8856 29.498 19.8856H34.6567C35.0573 19.8856 35.385 20.2133 35.385 20.6139V23.0898Z"
                                        fill="white"/>
                                    <path
                                        d="M16.7972 19.0032C16.1481 18.5268 15.2356 18.6663 14.7589 19.3155L10.5959 24.9842L8.04726 23.1305C7.39622 22.6566 6.48414 22.8006 6.01046 23.4521C5.53679 24.1033 5.68073 25.0152 6.33207 25.4889L9.7396 27.9671C10.0667 28.2054 10.4472 28.3202 10.8246 28.3202C11.3939 28.3202 11.9564 28.059 12.3175 27.5669L17.1096 21.0417C17.5862 20.3927 17.4464 19.4799 16.7972 19.0032Z"
                                        fill="white"/>
                                </g>
                                <defs>
                                    <clipPath id="clip0">
                                        <rect fill="white" height="39.5652" transform="translate(0.217773 0.35376)"
                                              width="39.5652"/>
                                    </clipPath>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div :class="{'yb-sold_carout' : soldCar}"></div>
                    <img :src="'/' + options[currImgIdx].path" alt="">
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
                            <img :src="'/' + item.path" alt="">
                        </figure>
                    </div>
                    <div @click="imgFullList = !imgFullList" class="yb_img-fulllist" v-if="options.length > 5">
                            <span class="y-image_all"
                                  v-if="!imgFullList">
                                <span v-if="lang == 'ru' ">Смотреть все фото</span>
                                <span v-else>Дивитися всі фото</span>
                                 <i
                                     @click="!imgFullList"
                                     class="fas fa-chevron-down"
                                 >
                            </i>
                            </span>
                        <span class="y-image_all" v-else>
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
                                        <img :src="'/' + item.path" alt="Car-Image">
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
                                            <img :src="'/' + item.path" alt="">
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








/*.vehicle-detail-banner .car-slider-desc {*/
/*    max-width: 180px;*/
/*    margin: 0 auto;*/
/*}*/



.banner-slider .slider.slider-for,
.banner-slider .slider.slider-nav {
    width: 76%;
    /*overflow: hidden;*/
    /*float: left;*/
}
.banner-slider .slider.slider-nav {
    /*height: 610px;*/
    /*overflow: hidden;*/

}
.slider-banner-image {
    /*height: 610px;*/
}

.slider-nav .slick-slide.thumbnail-image .thumbImg{
    /*max-width: 178px;*/
    /*height: 110px;*/
    /*margin: 0 auto;*/
    /*border: 1px solid #EBEBEB;*/
}
.slider-banner-image img,
.slider-nav .slick-slide.thumbnail-image .thumbImg img {
    /*height: 100%;*/
    /*width:100%;*/
    /*object-fit: contain;*/
}
.slick-vertical .slick-slide:active,
.slick-vertical .slick-slide:focus,
.slick-arrow:hover,
.slick-arrow:focus {
    border: 0;
    outline: 0;
}
.slider-nav .slick-slide.slick-current.thumbnail-image .thumbImg {
    /*border: 2px solid #196DB6;*/
}
.slider-nav .slick-slide.slick-current span {
    /*color: #196DB6;*/
}
.slider-nav .slick-slide {
    /*text-align: center;*/
}
.slider-nav .slick-slide span {
    /*font-size: 14px;*/
    /*display: block;*/
    /*padding: 5px 0 15px;*/
}
/*.slick-arrow {*/
/*    width: 100%;*/
/*    background-color: transparent;*/
/*    border: 0;*/
/*    background-position: center;*/
/*    background-repeat: no-repeat;*/
/*    font-size: 0;*/
/*    height: 18px;*/
/*    position: absolute;*/
/*    left: 0;*/
/*    right: 0;*/
/*    z-index: 99;*/
/*}*/
/*.slick-prev {*/
/*    top: 0;*/
/*}*/
/*.slick-next {*/
/*    bottom: 0;*/
/*    background-color: #fff;*/
/*}*/
.slick-prev.slick-arrow {
}
.slick-next.slick-arrow {
}
/*End USE CSS for Slider*/

/*@media screen and (max-width : 991px) {*/

/*    .banner-slider .slider.slider-for,*/
/*    .banner-slider .slider.slider-nav {*/
/*        max-width: 100%;*/
/*        float: none;*/
/*    }*/
/*    .banner-slider .slider.slider-for {*/
/*        padding-right: 0;*/
/*    }*/
/*    .banner-slider .slider.slider-nav {*/
/*        height: auto;*/
/*    }*/
/*    .slider-banner-image {*/
/*        height: 500px;*/
/*    }*/
/*    .slider.slider-nav.thumb-image {*/
/*        padding: 10px 30px 0;*/
/*    }*/
/*    .slider-nav .slick-slide span {*/
/*        padding: 5px 0;*/
/*    }*/
/*    .slick-arrow {*/
/*        padding: 0;*/
/*        width: 30px;*/
/*        height: 30px;*/
/*        top: 50%;*/
/*        bottom: 0;*/
/*        -webkit-transform: translateY(-50%) rotate(-90deg);*/
/*        -moz-transform: translateY(-50%) rotate(-90deg);*/
/*        -ms-transform: translateY(-50%) rotate(-90deg);*/
/*        transform: translateY(-50%) rotate(-90deg);*/
/*    }*/
/*    .slick-prev {*/
/*        left: 0;*/
/*        right: unset;*/
/*    }*/
/*    .slick-next {*/
/*        left: unset;*/
/*        right: 0;*/
/*        background-color: transparent;*/
/*    }*/
/*    .vehicle-detail-banner .car-slider-desc {*/
/*        max-width: 340px;*/
/*    }*/
/*    .bid-tag {*/
/*        padding: 10px 0 15px;*/
/*    }*/
/*    .slider.slider-nav.thumb-image {*/
/*        white-space: nowrap;*/
/*    }*/
/*    .thumbnail-image.slick-slide {*/
/*        padding: 0px 5px;*/
/*        min-width: 75px;*/
/*        display: inline-block;*/
/*        float: none;*/
/*    }*/
/*}*/

/*@media screen and (max-width : 767px) {*/
/*    .slider-banner-image {*/
/*        height: 400px;*/
/*    }*/
/*    .slider.slider-nav.thumb-image {*/
/*        padding: 0px 20px 0;*/
/*        margin: 10px 0px 0;*/
/*    }*/
/*    .slider-nav .slick-slide.thumbnail-image .thumbImg {*/
/*        max-width: 140px;*/
/*        height: 80px;*/
/*    }*/
/*    .slick-prev.slick-arrow {*/
/*        background-position: center 10px;*/
/*    }*/
/*    .slick-next.slick-arrow {*/
/*        background-position: center 10px, center;*/
/*    }*/
/*    .slider-nav .slick-slide span {*/
/*        font-size: 12px;*/
/*        white-space: normal;*/
/*    }*/
/*}*/

/*@media screen and (max-width: 580px) {*/
/*    .slider-banner-image {*/
/*        height:340px;*/
/*    }*/
/*}*/

/*@media screen and (max-width : 480px) {*/
/*    .slider-banner-image {*/
/*        height:280px;*/
/*    }*/
/*}*/

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


