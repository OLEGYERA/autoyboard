<template>
    <div class="ybutton" @click="catSatusToggle()">
        Категории
        <i class="ynav-list-toggle fas" :class="catStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
    </div>

</template>

<script>
    export default {
        // props: ['label', 'name', 'status', 'yref'],
        mounted() {
        },
        data: function(){
            return{
                catStatus: false,
            }
        },
        methods: {
            catSatusToggle(){
                this.catStatus = !this.catStatus;
            },
        },
        watch: {

        }
    }
</script>

