<template>
    <div class="yb-page" v-if="authAccess">
        <ynavigation></ynavigation>
        <div class="yb-content">
            <yheader></yheader>
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        created() {
            this.GET_USER_DATA();
            console.log(this.$router.options.routes);
        },
        data: function(){
            return{
                authAccess: null,
            }
        },
        methods: {
            ...mapMutations(['SET_USER_DATA']),
            ...mapActions(['GET_USER_DATA']),
        },
        computed: {
            ...mapGetters(['USER_DATA']),
        },
        watch: {
            USER_DATA(to){
                if(to.id == null){
                    alert('Access denied')
                }
                else{
                    this.authAccess = true;
                }
            }
        }
    }
</script>
