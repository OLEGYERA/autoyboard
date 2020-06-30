<template>
    <div class="ycheck" :class="{error: status.code == 2}">
        <input
            type="checkbox"
            id="ycheck-box"
            v-bind:name="name"
            v-bind:ref="name"
            v-model="model"
            v-on:keyup.enter="YCheking"
        >
        <label for="ycheck-box" class="ycheck-label">{{label}}</label>
    </div>
</template>

<script>
    export default {
        props: ['label', 'name', 'status', 'yref'],
        mounted() {
        },
        data: function(){
            return{
                toggled: false,
                model: null,
            }
        },
        methods: {
            YCheking(){
                console.log(this.status.code, 123)
                this.$emit('yturn', this.model)
            },
        },
        watch: {
            yref(to, from){
                this.$refs[this.name].focus()
            },
            model(to, from){
                this.YCheking();
            }
        }
    }
</script>
