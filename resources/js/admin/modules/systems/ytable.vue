<template>
    <div class="ytable" >
        <header class="ytable-header">
            <yinput :size="'m'"></yinput>
            <yselector :size="'m'"></yselector>
            <ybutton :size="'m'" :color="'purple'" :icon="'fas fa-plus'" :title="'Добавить'"></ybutton>
        </header>
        <div class="ytable-cols-header">
            <div
                v-for="(col, key) in tableContent.cols"
                class="ytable-col"
                :class="col.size"
            >
                <span class="content">{{col.title}}</span>
            </div>
        </div>
        <div class="ytable-body">
            <div
                v-for="(data, key) in ALL_DATA"
                class="ytable-row">
                <div
                    v-for="(col, key) in tableContent.cols"
                    class="ytable-col"
                    :class="col.size">
                    <span class="group" v-if="col.group">
                        <span v-if="col.group == 'ip_address'" :class="[col.group]">
                            <ylocation-visual :country_id="data.country" :city_id="data.city"></ylocation-visual>
                            <span class="ip">{{data.ip}}</span>
                        </span>
                    </span>
                    <span class="content">{{data[col.name]}}</span>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        props: ['tableContent', 'apiURL'],
        beforeMount() {
            this.GET_ALL_DATA({
                url: this.apiURL
            });
        },
        data: function(){
            return{

            }
        },
        methods: {
            // ...mapMutations(['SET_USER_DATA']),
            ...mapActions(['GET_ALL_DATA']),
            generateView(type, prop){
                switch (type) {
                    case 'ip_address':
                        switch (prop) {
                            case 'country':
                                return '<ylocation></ylocation>';
                        }
                        break;
                }
            }
        },
        computed: {
            ...mapGetters(['ALL_DATA']),
        },
        watch: {
            ALL_DATA(to, from){
                console.log(to);
            }
        }
    }
</script>
