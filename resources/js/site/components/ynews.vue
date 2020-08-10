<template>
    <div class="yb_auto_news">
        <ytitle
            :title="'Новости'"
            @getStatus="changeStatus">
        >
        </ytitle>
        <div v-if="status || ynewsWidth < 946"
             class="y-news_items">
            <article class="news none">
                <figure class="news-image" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);">
                    <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/bugatti-chiron-pur-sport-106-1582836604.jpg" alt="">
                </figure>
                <div class="news_desc">
                    <h2>Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                    <p class="hovering">Компания Acura представила обновленный вариант компактного кроссовера</p>
                    <button class="read_more">
                        Читать дальше
                        <img src="img/system/icons/arrow_right.png" alt="">
                    </button>
                </div>
            </article>
            <div class="right_items">
                <article class="news" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);">
                    <figure class="news-image" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);">
                        <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/bugatti-chiron-pur-sport-106-1582836604.jpg" alt="">
                    </figure>
                    <div class="news_desc">
                        <h2>Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                        <p class="hovering">Компания Acura представила обновленный вариант компактного кроссовера</p>
                        <button class="read_more">
                            Читать дальше
                            <img src="img/system/icons/arrow_right.png" alt="">
                        </button>
                    </div>
                </article>
                <div class="flex_bottom">
                    <article class="news">
                        <figure class="news-image" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);">
                            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/bugatti-chiron-pur-sport-106-1582836604.jpg" alt="">
                        </figure>
                        <div class="news_desc">
                            <h2>Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                            <p class="hovering">Компания Acura представила обновленный вариант компактного кроссовера</p>
                            <button class="read_more">
                                Читать дальше
                                <img src="img/system/icons/arrow_right.png" alt="">
                            </button>
                        </div>
                    </article>
                    <article class="news">
                        <figure class="news-image" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);">
                            <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/bugatti-chiron-pur-sport-106-1582836604.jpg" alt="">
                        </figure>
                        <div class="news_desc">
                            <h2>Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                            <p class="hovering">Компания Acura представила обновленный вариант компактного кроссовера</p>
                            <button class="read_more">
                                Читать дальше
                                <img src="img/system/icons/arrow_right.png" alt="">
                            </button>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div v-else class="ychange-news_item">
            <ynewschange></ynewschange>
        </div>
        <div class="ybtn_show_more">
            <button class="show_more">Смотреть еще</button>
        </div>
    </div>
</template>

<script>
export default {
    mounted () {
        window.onresize = (event) => {
            this.ynewsWidth = window.innerWidth;
            console.log(this.ynewsWidth, 'news');
        };
    },
    data(){
        return{
            ynewsWidth: window.innerWidth,
            status: false,
        }
    },
    methods: {
        changeStatus(s){
            this.status = s;
        }
    }
}
</script>
