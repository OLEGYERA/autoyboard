<template>
    <div class="ystickers">
        <Slick id="slick1" :options="slickOptions" ref="slick">
                    <div  class="yb-sticker">
                        <div class="yb-sticker_logo">
                            <span class="brand_title">Audi</span>
                            <img src="img/system/static/audi_logo.png" alt="">
                        </div>
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(255, 255, 255, 0.136) 16.67%, rgba(44, 133, 219, 0.8) 85.94%);"></div>
                        <figure class="img-context">
                            <img src="https://i.ytimg.com/vi/wVqgL8ly9BE/maxresdefault.jpg" alt="">
                        </figure>
                        <h4 class="yb-sticker_title" style="color: #fff;">Новая Audi TT RS</h4>
                    </div>

                    <div  class="yb-sticker">
                        <div class="yb-sticker_logo">
                            <span class="brand_title">Volkswagen</span>
                            <img src="img/system/static/vw_logo.png" alt="">
                        </div>
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(27, 27, 27, 0.096) 40.82%, rgba(227, 199, 120, 0.8) 71.23%);"></div>
                        <figure class="img-context">
                            <img src="https://carexpert.ru/img/foto600/vw/vwar001.jpg" alt="">
                        </figure>
                        <h4 class="yb-sticker_title" style="color: #1B1B1B;">Новый Volkswagen Arteon </h4>
                    </div>
                    <div  class="yb-sticker">
                        <div class="yb-sticker_logo">
                            <span class="brand_title">Mercedes-Benz</span>
                            <img src="img/brands_logo/mercedes-benz.png" alt="">
                        </div>
                        <div class="background_style" style="background:linear-gradient(180.17deg, rgba(27, 27, 27, 0.56) 57.5%, rgba(27, 27, 27, 0.85) 93.18%); "></div>
                        <figure class="img-context">
                            <img src="https://www.autocentre.ua/wp-content/uploads/2017/11/cls-3.jpg" alt="">
                        </figure>
                        <h4 class="yb-sticker_title" style="color: #fff;">Новый Mercedes-Benz </h4>
                    </div>
            <div  class="yb-sticker">
                <div class="yb-sticker_logo">
                    <span class="brand_title">Mercedes-Benz</span>
                    <img src="img/brands_logo/mercedes-benz.png" alt="">
                </div>
                <div class="background_style" style="background:linear-gradient(180.17deg, rgba(27, 27, 27, 0.56) 57.5%, rgba(27, 27, 27, 0.85) 93.18%); "></div>
                <figure class="img-context">
                    <img src="https://www.autocentre.ua/wp-content/uploads/2017/11/cls-3.jpg" alt="">
                </figure>
                <h4 class="yb-sticker_title" style="color: #fff;">Новый Mercedes-Benz </h4>
            </div>
        </Slick>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    // import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'

    export default {
        components: {
            Slick
        },
        data(){
            return{
                slickOptions: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    speed: 600,
                    infinite: false,
                },
            }
        }
    }
</script>
