<template>
    <div class="yanalitic">
        <ytitle :title="'Аналитика'"></ytitle>
        <div class="yanalitics_nav">
            <ul class="ynavigation">
                <li tabindex="0" class="nav_item">Лучшая цена</li>
                <li tabindex="1" class="nav_item">Популярные авто</li>
                <li tabindex="2" class="nav_item">Проверенные авто</li>
                <li tabindex="3" class="nav_item">Поиск автомобилей</li>
                <li tabindex="4" class="nav_item">Сравнение автомобилей</li>
            </ul>
        </div>
        <div class="analitics_content">
            <div class="analitics_desc">
                <h3 class="analitics_subtitle">Заголовок</h3>
                <p class="subtitle_desc">
                    С помощью нашего онлайн сервиса вы можете сравнить любой бу и новый автомобиль по любым параметрам, ценам и отзывам пользователей в Украине. Сравнивайте новые модели авто, оценивайте технические характеристики и выбирайте понравившийся автомобиль.
                </p>
                <button class="yverify_btn">Проверить</button>
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
