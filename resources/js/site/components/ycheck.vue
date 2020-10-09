<template>
    <div class="ycheck" @click="changeCheck()">
        <i class="fas" :class="checked ? 'far fa-check-square' : 'far fa-square'"></i>
        <span class="ycheck-label">{{name}}</span>
    </div>
</template>

<script>
    export default {
        props: ['name', 'checked'],
        methods: {
            changeCheck(){
                this.$emit('checked');
            }
        },
    }
</script>
