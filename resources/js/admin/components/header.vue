<template>
    <header class="yb-header">
        <yinput :size="'l'"></yinput>
        <div class="yb-smart-helpers">
            <div class="notification">
                <i class="far fa-bell"></i>
            </div>
            <yavatar
                :fname="USER_DATA.first_name"
                :lname="USER_DATA.last_name"
                :path="USER_DATA.avatar_original"
            ></yavatar>
        </div>
    </header>
</template>

<script>
    import {mapGetters} from "vuex";
    export default {
        mounted() {
        },
        data: function(){
            return{

            }
        },
        methods: {

        },
        computed: {
          ...mapGetters(['USER_DATA'])
        },
        watch: {

        }
    }
</script>
