<template>
    <div class="yanalitic">
        <ytitle
            :title="'Аналитика'"
            :uatitle="'Аналітика'"
        ></ytitle>
        <div class="yanalitics_nav">
            <ul class="ynavigation">
                <li v-if="lang == 'ru' " tabindex="0" class="nav_item">Лучшая цена</li>
                <li v-else tabindex="0" class="nav_item">Найкраща ціна</li>
                <li v-else v-if="lang == 'ru' " tabindex="1" class="nav_item">Популярные авто</li>
                <li v-else tabindex="1" class="nav_item">Популярні авто</li>
                <li v-if="lang == 'ru' " tabindex="2" class="nav_item">Проверенные авто</li>
                <li v-else tabindex="2" class="nav_item">Перевірені авто</li>
                <li v-if="lang == 'ru' " tabindex="3" class="nav_item">Поиск автомобилей</li>
                <li v-else tabindex="3" class="nav_item">Пошук автомобілів</li>
                <li v-if="lang == 'ru' " tabindex="4" class="nav_item">Сравнение автомобилей</li>
                <li v-else tabindex="4" class="nav_item">Порівняння автомобілів</li>
            </ul>
        </div>
        <div class="analitics_content">
            <div class="analitics_desc">
                <h3 v-if="lang == 'ru'" class="analitics_subtitle">Заглавие</h3>
                <h3 v-else class="analitics_subtitle">Назва</h3>
                <p v-if="lang == 'ru' " class="subtitle_desc">
                    С помощью нашего онлайн сервиса вы можете сравнить любой бу и новый автомобиль по любым параметрам, ценам и отзывам пользователей в Украине. Сравнивайте новые модели авто, оценивайте технические характеристики и выбирайте понравившийся автомобиль.
                </p>
                <p v-else  class="subtitle_desc">
                    За допомогою нашого онлайн сервісу ви можете порівняти будь-бу і новий автомобіль по будь-якими параметрами, цінами і відгуками користувачів в Україні. Порівнюйте нові моделі авто, оцінюйте технічні характеристики і вибирайте вподобаний автомобіль.
                </p>
                <button v-if="lang == 'ru' " class="yverify_btn">Проверить</button>
                <button v-else class="yverify_btn">Перевірити</button>
            </div>
            <figure class="analitics_prev">
                <img src="img/system/static/analitics_prev.png" alt="">
            </figure>
        </div>
    </div>
</template>

<script>
    import Slick from "vue-slick";
    export default {
        props:['lang'],
        components:{Slick},
        data(){
            return{
                slickOptions: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: false,
                    speed: 600,
                    adaptiveHeight: true,
                    infinite: false,
                    cssEase: 'linear',
                    responsive: [
                        {
                            breakpoint: 769,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                arrows: true,
                                speed: 600,
                                dots: false,
                            }
                        }
                    ]
                },
            }
        }
    }

</script>
