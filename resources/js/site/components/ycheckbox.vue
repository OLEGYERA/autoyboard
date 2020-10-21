<template>
    <div class="ycheckbox">
        <span class="title_change">{{name}}</span>
        <label class="ios7-switch">
            <input type="checkbox" v-model="checkerModel">
            <span></span>
        </label>
    </div>
</template>

<script>
export default {
    props: ['name', 'checked'],
    mounted() {
        this.checkerModel = this.checked;
    },
    data(){
        return {
            checkerModel: false,
        }
    },
    watch: {
        checkerModel(to){
            this.$emit('checked', to);
        },
        checked(to){
            this.checkerModel = this.checked;
        }
    }
}
</script>

