<template>
    <div class="yanalitic">
        <ytitle :title="'Аналитика'"></ytitle>
        <Slick id="slick5" ref="slick" :options="slickOptions">
            <div class="analitics_content">
                <div class="analitics_desc">
                    <h3 class="analitics_subtitle">Проверенные авто</h3>
                    <p class="subtitle_desc">
                        С помощью нашего онлайн сервиса вы можете сравнить любой бу и новый автомобиль по любым параметрам, ценам и отзывам пользователей в Украине. Сравнивайте новые модели авто, оценивайте технические характеристики и выбирайте понравившийся автомобиль.
                    </p>
                    <button @click="click" class="yverify_btn">Проверить</button>
                </div>
                <figure class="analitics_prev">
                    <img src="img/system/static/analitics_prev.png" alt="">
                </figure>
            </div>
            <div class="analitics_content">
                <div class="analitics_desc">
                    <h3 class="analitics_subtitle">Цены на авто</h3>
                    <p class="subtitle_desc">
                        С помощью нашего онлайн сервиса вы можете сравнить любой бу и новый автомобиль по любым параметрам, ценам и отзывам пользователей в Украине. Сравнивайте новые модели авто, оценивайте технические характеристики и выбирайте понравившийся автомобиль.
                    </p>
                    <button @click="click" class="yverify_btn">Проверить</button>
                </div>
                <figure class="analitics_prev">
                    <img src="img/system/static/analitics_prev.png" alt="">
                </figure>
            </div>
        </Slick>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    export default {
        components:{Slick},
        data: function () {
            return {
                slickOptions: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: true,
                    speed: 600,
                    infinite: false,
                    dotsClass: "slick-dots custom-dot-class",

                },
            }
        },
        methods: {
            click(){
                console.log('click')
            }
        }
    }

</script>
