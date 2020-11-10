<template>
    <div class="ycheck">
        <div class="ycheck-container" @click="changeCheck()" :class="{checked: checked}">
            <span class="checkbox">
                <i class="yicon success"></i>
            </span>
            <span class="ycheck-label">{{name}}</span>
        </div>
    </div>
</template>
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
