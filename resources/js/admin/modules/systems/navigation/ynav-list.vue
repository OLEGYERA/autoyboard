<template>
    <ul class="ynav-list" v-if="this.route_data.children">
        <li class="ynav-list-item">
<!--            <router-link> </router-link>-->
            <i class="fas" @click="toggleList" :class="this.status ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
        </li>
        {{this.route_data.meta.title}}
        <ynav-list v-for="(route, key) in this.route_data.children" :key="key + '-router-id'" :route_data="route" @uncoverParent="uncoverParent"></ynav-list>
    </ul>
    <ul class="ynav-list" v-else-if="this.route_data.meta">
        {{this.route_data.meta.title}}
    </ul>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        props: ['route_data'],
        mounted() {
        },
        data: function(){
            return{
                status: 0
            }
        },
        methods: {
            toggleList(){
                this.status = !this.status;
                if(this.status){
                    this.$emit('uncoverParent')
                }
            },
            uncoverParent(){
                this.status = 1;
            }
        },
        watch: {

        }
    }
</script>
