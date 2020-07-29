<template>
    <div class="yb_auto_news">
        <ytitle :title="'Новости'"></ytitle>
        <div class="ynews_item">
            <div class="y_item-left">
                <div
                    @mouseover="isHovering = true"
                    @mouseout="isHovering = false"
                    class="ynews_left">
                    <div class="news_decs">
                        <h2  class="title">Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                        <p :class="{'hovering': isHovering, 'desc': !isHovering}">Компания Acura представила обновленный вариант компактного кроссовера</p>
                        <button class="read_more">
                            Читать дальше
                            <img src="img/system/icons/arrow_right.png" alt="">
                        </button>
                    </div>
                    <figure class="news_image">
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);"></div>
                        <img src="https://images.unsplash.com/photo-1542362567-b07e54358753?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=1080&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9" alt="">
                    </figure>
                </div>
            </div>
            <div class="y_item_right">
                <div
                     @mouseover="isHovering = true"
                     @mouseout="isHovering = false"
                     class="ynews_right">
                    <div class="news_decs">
                        <h2 class="title">Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                        <p :class="{'hovering': isHovering, 'desc': !isHovering}">Компания Acura представила обновленный вариант компактного кроссовера</p>
                        <button class="read_more">
                            Читать дальше
                            <img src="img/system/icons/arrow_right.png" alt="">
                        </button>
                    </div>
                    <figure class="news_image">
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);"></div>
                        <img src="https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/bugatti-chiron-pur-sport-106-1582836604.jpg" alt="">
                    </figure>
                </div>
                <div class="ynews_right-block">
                    <div
                         @mouseover="isHovering = true"
                         @mouseout="isHovering = false"
                         class="item_news">
                         <div class="news_decs">
                        <h2 class="title">Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                        <p :class="{'hovering': isHovering, 'desc': !isHovering}">Компания Acura представила обновленный вариант компактного кроссовера</p>
                        <button class="read_more">
                            Читать дальше
                            <img src="img/system/icons/arrow_right.png" alt="">
                        </button>
                    </div>
                    <figure class="news_image">
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);"></div>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTnXDmd0w9tZ4dacXnYiXWDnFnPFjVbIsxYTA&usqp=CAU" alt="">
                    </figure>
                    </div>
                    <div
                        @mouseover="isHovering = true"
                        @mouseout="isHovering = false"
                        class="item_news">
                         <div class="news_decs">
                        <h2 class="title">Opel продолжает понемногу рассекречивать кроссовер Mokka</h2>
                        <p :class="{'hovering': isHovering, 'desc': !isHovering}">Компания Acura представила обновленный вариант компактного кроссовера</p>
                        <button class="read_more">
                            Читать дальше
                            <img src="img/system/icons/arrow_right.png" alt="">
                        </button>
                    </div>
                    <figure class="news_image">
                        <div class="background_style" style="background: linear-gradient(180deg, rgba(34, 34, 34, 0) 31.93%, rgba(34, 34, 34, 0.81) 63.48%);"></div>
                        <img src="https://cdn.vox-cdn.com/thumbor/WiYWlj5FK_KGMOyvJEr3axdonVY=/0x0:2040x1360/1200x800/filters:focal(857x517:1183x843)/cdn.vox-cdn.com/uploads/chorus_image/image/66946920/akrales_170324_1554_A_0028.0.0.jpg" alt="">
                    </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="ybtn_show_more">
            <button class="show_more">Смотреть еще</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            isHovering: false
        }
    },
    methods: {

    }
}
</script>
