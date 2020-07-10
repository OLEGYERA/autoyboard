<template>
    <ul class="ynav-list" v-if="this.route_data.children">
        <li class="ynav-list-item" :class="{active: this.current_router.name == this.route_data.name}">
            <router-link :to="{name: this.route_data.name}"><i :class="this.route_data.meta.icon"></i> {{this.route_data.meta.title}}</router-link>
            <i class="ynav-list-toggle fas" @click="toggleList" :class="this.status ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
        </li>
        <ynav-list v-for="(route, key) in this.route_data.children" :key="key + '-router-id'" :route_data="route" v-if="status"></ynav-list>
    </ul>
    <ul class="ynav-list non-child" v-else-if="this.route_data.meta">
        <li class="ynav-list-item" :class="{active: this.current_router.name == this.route_data.name}">
            <router-link :to="{name: this.route_data.name}"><i :class="this.route_data.meta.icon"></i> {{this.route_data.meta.title}}</router-link>
        </li>
    </ul>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        props: ['route_data'],
        beforeMount() {
            this.current_router = this.$router.currentRoute;
        },
        mounted() {
            this.reInitNavListStatus();
        },
        data: function(){
            return{
                status: 0,
                current_router: null,
            }
        },
        methods: {
            toggleList(){
                this.status = !this.status;
            },
            reInitNavListStatus(){
                let self = this;
                self.status = 0;
                this.current_router.matched.forEach(function(el){
                    if(el.name == self.route_data.name) self.status = 1;
                });
            }
        },
        watch: {
            $route(to){
                this.current_router = to;
                this.reInitNavListStatus();
            }
        }
    }
</script>
