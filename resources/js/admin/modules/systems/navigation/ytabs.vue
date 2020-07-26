<template>
    <ul class="ytabs">
        <li v-for="tab in tabs" class="ytab-item" :class="{active: tab.name == currentRouteName}">
            <router-link :to="{name: tab.name}" class="item-link">{{tab.meta.title}}</router-link>
        </li>
    </ul>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        props: ['parentName'],
        mounted() {
            this.currentRouteName = this.$router.currentRoute.name;
            this.initChildrenRoutePath();
        },
        data: function(){
            return{
                tabs: [],
                currentRouteName: null,
            }
        },
        methods: {
            initChildrenRoutePath(){
                let self = this;
                this.getChildrenRoutePath.find(function(child){
                    if(child.meta !== undefined){
                        child['status'] =  0;
                        self.tabs.push(child)
                    }
                });
            }
        },
        computed: {
            getParentRoutePath(){
                const parentRoute = this.$router.resolve({name: this.parentName});
                return parentRoute.route.matched[parentRoute.route.matched.length - 1].path;
            },
            getChildrenRoutePath(){
                let children = this.$router.options.routes,
                    path = this.getParentRoutePath;
                if (path) {
                    let chunks = path.split('/').filter((chunk) => chunk !== '');
                    if (chunks.length) {
                        chunks.forEach((chunk, index) => {
                            if (children) {
                                const found = children.find((child) => child.path === (index === 0 ?  `/${chunk}` : chunk));
                                if (found) {
                                    children = found.children;
                                }
                            }
                        });
                    }
                }
                return children;
            },
        },
        watch: {
            $route(to){
                this.currentRouteName = to.name;
            }
        }
    }
</script>
