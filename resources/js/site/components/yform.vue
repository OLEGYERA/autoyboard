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
                    <yrange></yrange>
                </div>
            </div>
            <div class="yresource_options">
                <ycheckbox
                    v-model="selectedCheck"
                    :selectedCheck="selectedCheck"
                    :text="'Поиск со всех ресурсов'">
                </ycheckbox>
                <ycheckbox
                    :text="'Провереные'">
                </ycheckbox>
                <ycheckbox
                    :text="'С фото'">
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
                catStatus: false,
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

</style>
