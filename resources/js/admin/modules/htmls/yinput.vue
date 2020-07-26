<template>
    <div class="yinput" :class="size">
        <input type="text" placeholder="Поиск">
        <i class="fas fa-search"></i>
    </div>
</template>

<script>
    export default {
        props: ['size'],
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
