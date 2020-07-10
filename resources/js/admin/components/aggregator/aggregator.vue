<template>
    <router-view v-if="1" :apiURL="'aggregator'"></router-view>
    <div v-else>
        123
    </div>
</template>

<script>

    export default {
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
