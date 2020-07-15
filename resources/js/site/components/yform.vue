<template>
    <div class="yb_form">
        <div class="left_options">
            <div @click="catSatusToggle()" class="yinput_list" >
                <ylocation
                    :container="'yselect'"
                    :text="'Тип авто'"
                    :drop_style="'ynav_drop'"
                    :list_style="'y_nav_list'"
                    :input_style="'select_form'">
                </ylocation>
                <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </div>
            <div @click="catSatusToggle()" class="yinput_list" >
                <ylocation
                    :container="'yselect'"
                    :text="'Модель'"
                    :drop_style="'ynav_drop'"
                    :list_style="'y_nav_list'"
                    :input_style="'select_form'">
                </ylocation>
                <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </div>
            <div @click="catSatusToggle()" class="yinput_list" >
                <ylocation
                    :container="'yselect'"
                    :text="'Марка'"
                    :drop_style="'ynav_drop'"
                    :list_style="'y_nav_list'"
                    :input_style="'select_form'">
                </ylocation>
                <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </div>
            <div @click="catSatusToggle()" class="yinput_list" >
                <ylocation
                    :container="'yselect'"
                    :text="'Тип кузова'"
                    :drop_style="'ynav_drop'"
                    :list_style="'y_nav_list'"
                    :input_style="'select_form'">
                </ylocation>
                <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </div>
            <div @click="catSatusToggle()" class="yinput_list" >
                <ylocation
                    :container="'yselect'"
                    :text="'Регион'"
                    :drop_style="'ynav_drop'"
                    :list_style="'y_nav_list'"
                    :input_style="'select_form'">
                </ylocation>
                <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
            </div>
            <div class="ysuccess_btn">
                <button class="success">Поиск</button>
            </div>
        </div>
        <div class="another_options">
            <div class="yoption_btn">
                <button class="change_type">Все</button>
                <button class="change_type">Новые</button>
                <button class="change_type">Автомобили б/у</button>
            </div>
            <div class="yprice_options">
                <h3 class="ytitle_option">Цена</h3>
                <div class="change_price">
                    <div class="input_change">
                        <input class="change" type="text" placeholder="От">
                        <input class="change" type="text" placeholder="До">
                    </div>
                    <div class="range_slider">
                        <input
                            min="0"
                            max="1000"
                            step="10"
                            type="range"
                            v-model.number="minPrice"
                            @change="setRangeSlider"
                        >
                        <input
                            min="0"
                            max="1000"
                            step="10"
                            type="range"
                            v-model.number="maxPrice"
                            @change="setRangeSlider"
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        mounted() {
        },
        data: function(){
            return{
                catStatus: false,
                minPrice: 0,
                maxPrice: 1000,
            }
        },
        methods: {
            catSatusToggle(){
                this.catStatus = !this.catStatus;
            },
            setRangeSlider(){
                if(this.minPrice > this.maxPrice){
                    let temp = this.maxPrice
                    this.maxPrice = this.minPrice
                    this.minPrice = temp
                }
            }
        },
        watch: {

        }
    }

</script>

<style>
    .select_form{
        width: 100%;
    }
</style>
