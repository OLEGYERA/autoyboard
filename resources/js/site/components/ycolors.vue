<template>
    <div class="ycolors">
        <div class="ycolor" v-for="(option, i) in options" @click="selectingResult(option.val)" :class="{selected: isPresent(option.val)}">
            <span class="ycolor-label">{{option.name}}</span>
            <div class="color-checkbox">
                <div class="color-bg" :style="{'background-color': option.bg}"></div>
                <i class="yicon success" :style="{'color': option.color}"></i>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['options', 'choosedItems'],
        mounted(){
        },
        data() {
            return{

            }
        },
        methods: {
            selectingResult(result){
                console.log(result)
                if(this.isPresent(result)){
                    this.$emit('deleteChoose', result);
                }
                else{
                    this.$emit('updateChoose', result)
                }
            },
            isPresent(result){
                return this.choosedItems.indexOf(result) == -1 ? false : true
            },
        },
        watch: {

        }
    }
</script>

