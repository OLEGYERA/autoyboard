<template>
    <div class="yb-admin-app">
        <ytabs :links="links"></ytabs>
        <router-view></router-view>
    </div>
</template>

<script>

    export default {
        created() {
            this.identRouterName(this.$router.currentRoute);
        },
        data: function(){
            return{
                links: [
                    {title: 'Proxy', route: 'agg_nuc_proxy', status: 0},
                    {title: 'User-agent', route: 'agg_nuc_user_agent', status: 0}
                ],
            }
        },
        methods: {
            identRouterName(router){
                let self = this;
                Object.keys(self.links).forEach(function(key){
                    if(router.name.indexOf(self.links[key].route) !== -1){
                        self.links[key].status = 1;
                    }
                    else{
                        self.links[key].status = 0;
                    }
                })
            }
        },
        computed: {
        },
        watch: {
            $route(to, from){
                this.identRouterName(to);
            }
        }
    }
</script>
