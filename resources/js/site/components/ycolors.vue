<template>
    <div class="ycolors">
        <div class="ycolor"
             :class="{selected: isPresent(option.val)}"
             v-for="(option, i) in options"
             v-if="openResults ? true : i < 8"
             @click="selectingResult(option.val)">
            <span class="ycolor-label">{{option.name}}</span>
            <div class="color-checkbox">
                <div class="color-bg" :style="{'background-color': option.bg}"></div>
                <i class="yicon success" :style="{'color': option.color}"></i>
            </div>
        </div>
        <div class="ycolors-toggler" @click="openResults = !openResults">
            <i class="yicon" :class="{'arrow-down': !openResults, 'arrow-up': openResults}"></i>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['options', 'choosedItems'],
        mounted(){
            document.addEventListener('click', this.handleClickOutside);
        },
        data() {
            return{
                openResults: true,
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
            handleClickOutside(evt){
                let parent = document.getElementsByClassName('ycolors_options');
                if(!parent[0].contains(evt.target)) this.openResults = false;
            },
            isPresent(result){
                return this.choosedItems.indexOf(result) == -1 ? false : true
            },
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        }
    }
</script>

