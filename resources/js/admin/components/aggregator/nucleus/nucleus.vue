<template>
    <div class="yb-admin-app">
        <ytabs :parentName="'agg_nucleus'"></ytabs>
        <router-view :apiURL="`${apiURL}/nucleus`"></router-view>
    </div>
</template>

<script>

    export default {
        props: ['apiURL'],
        created() {
        },
        data: function(){
            return{

            }
        },
        methods: {

        },
        computed: {
        },
        watch: {

        }
    }
</script>
