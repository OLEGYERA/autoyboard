<template>
    <aside class="yb-navigation">
        <header class="yb-navigation-header">
            <img class="yb-logo" src="/img/system/logos/logo.png" alt="">
        </header>

        <nav class="yb-navigation-lists">
            <ynav-list v-for="(route, key) in $router.options.routes" :key="key + '-router-id'" :route_data="route"></ynav-list>



            <div class="yb-navigation-list" v-for="(list, key) in navLists" :key="key">
                <a v-if="list.links" @click="list.status = !list.status" class="list-title">
                    <i :class="list.icon"></i> <span>{{list.title}}</span>
                    <i class="fas" :class="list.status ? 'fa-chevron-up' : 'fa-chevron-down'"></i></a>
                <a v-else class="list-title"><i :class="list.icon"></i> <span>{{list.title}}</span></a>
                <ul class="list-links" v-for="(link, subkey) in list.links" :key="subkey" v-if="list.status">
                    <li class="list-link-item">
                        <a :href="link.link">{{link.title}}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </aside>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        mounted() {
            console.log(this.$router.options.routes[1].children, 123);
        // .meta.title
        },
        data: function(){
            return{
                navLists: [
                    {title: 'Главаная', icon: 'fas fa-columns', link: 121},
                    {title: 'Агрегатор', icon: 'fas fa-atom', links: [
                            {title: 'Ядро', link: null},
                            {title: 'История', link: null}
                        ], status: 0
                    }
                ]
            }
        },
        methods: {

        },
        watch: {

        }
    }
</script>
