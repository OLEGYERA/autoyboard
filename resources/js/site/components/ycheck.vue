<template>
    <div class="ycheck" @click="changeCheck()">
        <i  class="fas" :class="checked ? 'far fa-check-square' : 'far fa-square'"></i>
        <span class="ycheck-label">{{name}}</span>
    </div>
</template>
<!--v-if="checkHide == undefined"-->
<script>
    export default {
        props: ['name', 'checked', 'checkHide'],
        methods: {
            changeCheck(){
                this.$emit('checked');
            }
        },
    }
</script>
