<template>
    <div class="ybestoffer">
        <div class="ytitle">
            <h2>
                Лучшие предложения
            </h2>
        </div>
        <div class="ybest-items">
            <Slick ref="slick" :options="slickOptions">
                <a :href="'/card/' + dataTransport.id" class="filter-card" v-for="dataTransport in dataTransports">
                    <div class="img-box">
                        <picture v-if="dataTransport.photo">
                            <img v-lazy="dataTransport.photo.path">
                        </picture>
                    </div>
                    <div class="content-box">
                        <h3 class="card-title">{{ dataTransport.brand }} {{ dataTransport.modification }}  {{ dataTransport.model }} <span class="sp-num" v-if="dataTransport.year !== null">{{ dataTransport.year }}</span></h3>
                        <div class="price-row">
                            <div class="usd">{{prettify(Math.trunc(generateCurrency(dataTransport.price_currency, dataTransport.price_value, 1)))}}<span class="symb">$</span></div>
                            <div class="uah">{{prettify(Math.trunc(generateCurrency(dataTransport.price_currency, dataTransport.price_value, 2)))}}<span class="symb">₴</span></div>
                        </div>
                        <div class="option-list">
                            <div class="option-item">
                                <i class="yicon engine"></i>
                                <div class="option-title" v-if="dataTransport.mileage !== null"><span class="sp-num">{{dataTransport.mileage}}</span> тыс. км</div>
                                <div class="option-title" v-else>Не указано</div>
                            </div>
                            <div class="option-item">
                                <i class="yicon transmission"></i>
                                <div class="option-title" v-if="dataTransport.transmission !== null">{{dataTransport.transmission}}</div>
                                <div class="option-title" v-else>Не указано</div>
                            </div>
                            <div class="option-item">
                                <i class="yicon full-location"></i>
                                <div class="option-title">{{dataTransport.city}}</div>
                            </div>
                            <div class="option-item">
                                <i class="yicon fuel"></i>
                                <div class="option-title" v-if="dataTransport.fuel !== null && dataTransport.volume !== null">{{dataTransport.fuel}}, <span class="sp-num">{{dataTransport.volume}}</span> л.</div>
                                <div class="option-title" v-else-if="dataTransport.fuel !== null && dataTransport.volume == null">{{dataTransport.fuel}}</div>
                                <div class="option-title" v-else-if="dataTransport.fuel == null && dataTransport.volume !== null"><span class="sp-num">{{dataTransport.volume}}</span> л.</div>
                                <div class="option-title" v-else>Не указано</div>
                            </div>
                        </div>
                        <div class="other-row">
                            <time class="date" :date="dataTransport.created_at" v-html="generateDate(dataTransport.created_at)"></time>
                        </div>
                    </div>
                </a>
            </Slick>
        </div>
    </div>
</template>


<script>
    import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
    import Slick from 'vue-slick';
export default {
    props: ['data-transports', 'currency'],
    components: { Slick },
    mounted () {
        window.addEventListener('resize', this.onResize)
        this.onResize();
    },
    data() {
        return {
            favorite: false,
            windowWidth: 0,
            status: false,
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 3,
                dotsClass: "slick-dots custom-dot-class",
                edgeFriction: 0,
                infinite: true,
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
                        breakpoint: 476,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 426,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            arrows: false,
                        }
                    },
                ]
            },
        }
    },
    methods:{
        changeStatus(s){
            this.status = s;
        },
        onResize(event) {
            this.windowWidth = document.documentElement.clientWidth;
        },
        generateCurrency(curr, val, toConvert){
            switch (curr){
                case 1:
                    if(toConvert == 1) return val;
                    if(toConvert == 2) return val * this.currency.USD;
                    if(toConvert == 3) return val * this.currency.USD / this.currency.EUR;
                    break;
                case 2:
                    if(toConvert == 1) return val / this.currency.USD;
                    if(toConvert == 2) return val;
                    if(toConvert == 3) return val / this.currency.EUR;
                    break;
                case 3:
                    if(toConvert == 1) return val * this.currency.EUR / this.currency.USD;
                    if(toConvert == 2) return val * this.currency.EUR;
                    if(toConvert == 3) return val;
            }
        },
        generateDate(date){
            let millisecondsPerMinute = 1000 * 60,
                millisecondsPerHour = 1000 * 60 * 60,
                millisecondsPerDay = millisecondsPerHour * 24,
                currentDate = new Date(),
                choosedDate = new Date(date);
            let diff = currentDate.getTime() - choosedDate.getTime(),
                diffDay = Math.trunc(diff/millisecondsPerDay),
                diffHour = Math.trunc(diff/millisecondsPerHour),
                diffMinute = Math.trunc(diff/millisecondsPerMinute);
            if(diffDay > 0  || currentDate.getDay() - choosedDate.getDay() == 1){
                if(diffDay == 1 || currentDate.getDay() - choosedDate.getDay() == 1){
                    return 'Вчера, ' + '<span class="sp-num">' + choosedDate.getHours() + ':' + choosedDate.getMinutes() + '</span>';
                } else if(diffDay == 2){
                    return 'Позавчера, ' + '<span class="sp-num">' + choosedDate.getHours() + ':' + choosedDate.getMinutes() + '</span>';
                } else {
                    return '<span class="sp-num">' + choosedDate.getDate() + '.' + choosedDate.getMonth() + '.' + choosedDate.getFullYear() + '</span>';

                }

            } else if(diffHour > 0){
                switch (diffHour) {
                    case 1:
                    case 21:
                        return '<span class="sp-num">' + diffHour + '</span> час назад';
                        break;
                    case 2:
                    case 3:
                    case 4:
                    case 22:
                    case 23:
                        break;
                        return '<span class="sp-num">' + diffHour + '</span> часа назад';
                    default:
                        return '<span class="sp-num">' + diffHour + '</span> часов назад';
                        break;
                }

            } else{
                switch (diffMinute) {
                    case 1:
                    case 21:
                    case 31:
                    case 41:
                    case 51:
                        return '<span class="sp-num">' + diffMinute + '</span> минуту назад';
                        break;
                    case 2:
                    case 3:
                    case 4:
                    case 22:
                    case 23:
                    case 24:
                    case 32:
                    case 33:
                    case 34:
                    case 42:
                    case 43:
                    case 44:
                    case 52:
                    case 53:
                    case 54:
                        return '<span class="sp-num">' + diffMinute + '</span> минуты назад';
                        break;
                    default:
                        return '<span class="sp-num">' + diffMinute + '</span> минут назад';
                        break;
                }
            }
        },
        prettify(num){
            var n = num.toString();
            return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ' ');
        },
    }
}
</script>



