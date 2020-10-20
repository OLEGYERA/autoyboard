<template>
    <div class="change_resource">
        <span class="title_change">{{name}}</span>
        <label class="ios7-switch">
            <input type="checkbox" v-bind:checked="checked == true">
            <span></span>
        </label>
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

