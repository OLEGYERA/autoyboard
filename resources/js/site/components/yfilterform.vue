<template>
    <vuescroll :ops="ops">
    <div class="yfilter">
    <div class="yfilterform">
        <div class="yoption_btn">
            <button class="change_type active">Все</button>
            <button class="change_type">Новые</button>
            <button class="change_type">Б/у</button>
        </div>
        <div class="yresource_options">
            <ycheckbox
                :text="'Поиск со всех ресурсов'">
            </ycheckbox>
            <ycheckbox
                :text="'Провереные'">
            </ycheckbox>
            <ycheckbox
                :text="'С фото'">
            </ycheckbox>
        </div>
        <div class="y-selector_rows">
            <yselect :placeholder="'Тип авто'" :options="options"></yselect>
            <yselect :placeholder="'Модель'" :options="options"></yselect>
            <yselect :placeholder="'Марка'" :options="options"></yselect>
            <div class="yb-add_marks">
                <button class="yadd_mark" @click="repeat++">Добавить марку</button>
            </div>
            <yselect :placeholder="'Тип кузова'" :options="options"></yselect>
            <yselect :placeholder="'Регион'" :options="options"></yselect>
        </div>
        <div class="yprice_options">
            <h3 class="ytitle_option">Цена, $</h3>
            <div class="change_price">
                <yrange></yrange>
            </div>
        </div>
        <div class="y-selector_rows">
            <yselect :placeholder="'Топливо'" :options="options"></yselect>
            <yselect :placeholder="'Тип привода'" :options="options"></yselect>
            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>
            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>
            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>
            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>
            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>

            <yselect :placeholder="'Коробка передач'" :options="options"></yselect>

        </div>
        <div class="yselect-car_colors">
            <h3 class="color_title">Цвет</h3>
                <div class="ycheck_color">
                    <div class="ylabel_visible">
                        <input  class="" @click="check" type="checkbox">
                        <label style="background-color: #742D05"  for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #FFCB11" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: rgba(80, 83, 83, 0.92)" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #FFFFFF" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #000000" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #0B3F8D" for=""></label>
                    </div>
                </div>
                <div class="ycheck_color">
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #5100B8" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #E30000" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #1D8D0B" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #0066FF" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #FFF504" for=""></label>
                    </div>
                    <div class="ylabel_visible">
                        <input class="" @click="check" type="checkbox">
                        <label style="background-color: #FF007A" for=""></label>
                    </div>
                </div>
        </div>
        <div class="yb-confirm_btn">
            <button>Поиск</button>
        </div>
    </div>
    </div>
    </vuescroll>
</template>

<script>
    import vuescroll from "vuescroll";
    export default {
        components: {vuescroll},
        data(){
            return{
                options: [
                    {
                        id: 1,
                        name: "Одесса",
                        lastname: "Одесская обл"
                    },
                    {
                        id: 2,
                        name: "Киев",
                        lastname: "Киевская обл"
                    },
                    {
                        id: 3,
                        name: "Харьков",
                        lastname: "Харьковская обл"
                    },
                    {
                        id: 4,
                        name: "Луцк",
                        lastname: "Волынская обл"
                    },
                    {
                        id: 5,
                        name: "Запорожье",
                        lastname: "Запорожская обл"
                    },
                    {
                        id: 6,
                        name: "Полтава",
                        lastname: "Полставская обл"
                    },
                    {
                        id: 7,
                        name: "Севастополь",
                        lastname: ""
                    },
                    {
                        id: 7,
                        name: "Симферополь",

                    },
                ],
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
                        speed: 600,
                        easing: undefined,
                        verticalNativeBarPos: 'right'
                    },
                    rail: {
                        background: 'rgba(229, 229, 229, 0.51)',
                        opacity: 0,
                        size: '7px',
                        specifyBorderRadius: false,
                        gutterOfEnds: null,
                        gutterOfSide: '2px',
                        keepShow: false
                    },
                    bar: {
                        showDelay: 500,
                        onlyShowBarOnScroll: false,
                        keepShow: true,
                        background: '#0B3F8D',
                        opacity: 1,
                        hoverStyle: false,
                        specifyBorderRadius: false,
                        minSize: 0.3,
                        size: '7px',
                        disable: false
                    }
                }

            }
        },
        methods: {
            check(){
                console.log('check')
            }
        }
    }
</script>
