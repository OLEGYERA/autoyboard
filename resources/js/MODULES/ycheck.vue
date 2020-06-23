<template>
    <div class="ycheck">
        <input type="checkbox" id="ycheck-box">
        <label for="ycheck-box" class="ycheck-label">{{label}}</label>
    </div>
</template>

<script>
    export default {
        props: ['label', 'status'],
        mounted() {
        },
        data: function(){
            return{
                toggled: false,
            }
        },
        methods: {
            Ytoggler: function(e){
                this.toggled = e;
            },
        },
        watch: {

        }
    }
</script>
