<template>
    <div class="yratio">
        <div class="ratio-name">{{name}}</div>
        <div class="ratio-box" :class="{falseBox: ratioStatus == false, trueBox: ratioStatus == true}">
            <div title="Скрыть из поиска" @click="ratioStatus = false" class="ratio-item ratio-false"></div>
            <div title="Показывать с остальным" @click="ratioStatus = null" class="ratio-item ratio-default"></div>
            <div title="Показывать только это" @click="ratioStatus = true" class="ratio-item ratio-true"></div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['name', 'checked'],
    mounted() {
        this.ratioStatus = this.checked;
    },
    data(){
        return {
            ratioStatus: null,
        }
    },
    watch: {
        ratioStatus(to){
            this.$emit('checked', to);
        },
        checked(to){
            this.ratioStatus = this.checked;
        }
    }
}
</script>

