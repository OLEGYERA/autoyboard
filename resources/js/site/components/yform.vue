<template>
    <div class="yform mobile" v-if="mobile">
        <div class="another_options">
            <div class="yoption_btn">
                <button class="change_type active">Все</button>
                <button class="change_type">Новые</button>
                <button class="change_type">Б/у</button>
            </div>
            <div class="selector-rows">
<!--                <yselect :placeholder="'Тип авто'" :options="options"></yselect>-->
<!--                <yselect :placeholder="'Модель'" :options="options"></yselect>-->
<!--                <yselect :placeholder="'Марка'" :options="options"></yselect>-->
<!--                <yselect :placeholder="'Тип кузова'" :options="options"></yselect>-->
<!--                <yselect :placeholder="'Регион'" :options="options"></yselect>-->
            </div>
            <div class="yprice_options">
                <h3 class="ytitle_option">Цена, $</h3>
                <div class="change_price">
<!--                    <yrange></yrange>-->
                </div>
            </div>
            <div class="yresource_options">
                <ycheckbox
                    :name="'Поиск со всех ресурсов'">
                </ycheckbox>
                <ycheckbox
                    :name="'Провереные'">
                </ycheckbox>
                <ycheckbox
                    :name="'С фото'">
                </ycheckbox>
            </div>
        </div>
        <div class="left_options">
            <div class="yform-submit">
                <button>Поиск</button>
            </div>
        </div>
    </div>
    <div class="yform"  v-else>
        <div class="left_options">
            <div class="selector-rows">
                <yselectmultysearch :placeholder="'Тип авто'" :options="options"></yselectmultysearch>
                <yselectmultysearch :placeholder="'Модель'" :options="options"></yselectmultysearch>
                <yselectmultysearch :placeholder="'Марка'" :options="options"></yselectmultysearch>
                <yselectmultysearch :placeholder="'Тип кузова'" :options="options"></yselectmultysearch>
                <yselectmultysearch :placeholder="'Регион'" :options="options"></yselectmultysearch>
            </div>
            <div class="yform-submit">
                <button>Поиск</button>
            </div>
        </div>
        <div class="another_options">
            <div class="yoption_btn">
                <button class="change_type active">Все</button>
                <button class="change_type">Новые</button>
                <button class="change_type">Б/у</button>
            </div>
            <div class="yprice_options">
                <h3 class="ytitle_option">Цена, $</h3>
                <div class="change_price">
                    <yprice></yprice>
                </div>
            </div>
            <div class="yresource_options">
                <ycheckbox
                    :name="'Поиск со всех ресурсов'">
                </ycheckbox>
                <ycheckbox
                    :name="'Провереные'">
                </ycheckbox>
                <ycheckbox
                    :name="'С фото'">
                </ycheckbox>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: [],
        data: function(){
            return{
                mobile: false,
                catStatus: false,
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
                ]
            }
        },
        created() {
            window.addEventListener('resize', this.onResize);
            this.onResize();
        },
        destroyed() {
            window.removeEventListener('resize', this.onResize)
        },
        methods: {
            onOptionSelect(option) {
                console.log(option);
            },
            catSatusToggle(){
                this.catStatus = !this.catStatus;
            },
            setRangeSlider(){
                if(this.minPrice > this.maxPrice){
                    let temp = this.maxPrice
                    this.maxPrice = this.minPrice
                    this.minPrice = temp
                }
            },
            onResize() {
                this.mobile = window.innerWidth <= 425;
            }
        },


    }

</script>

