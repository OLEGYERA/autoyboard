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
                {{col.title}}
            </div>
        </div>
    </div>
</template>


<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        props: ['tableContent'],
        created() {
        },
        data: function(){
            return{

            }
        },
        methods: {
            // ...mapMutations(['SET_USER_DATA']),
            // ...mapActions(['GET_USER_DATA']),
        },
        computed: {
            // ...mapGetters(['USER_DATA']),
        },
        watch: {

        }
    }
</script>
