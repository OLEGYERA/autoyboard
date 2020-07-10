<template>
    <aside class="yb-navigation">
        <header class="yb-navigation-header">
            <img class="yb-logo" src="/img/system/logos/logo.png" alt="">
        </header>

        <nav class="yb-navigation-lists">
            <ynav-list v-for="(route, key) in $router.options.routes" :key="key + '-router-id'" :route_data="route"></ynav-list>
        </nav>
    </aside>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        mounted() {
        },
        data: function(){
            return{

            }
        },
        methods: {

        },
        watch: {

        }
    }
</script>
