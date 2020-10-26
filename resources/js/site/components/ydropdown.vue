<template>
    <div class="ydropdown" :class="{black: shade !== undefined}">
        <div class="name-dropdown" @click="openResults = !openResults">
            {{generatingPlaceholder}}
            <i class="yicon" :class="{'arrow-up': openResults, 'arrow-down': !openResults}"></i>
        </div>

        <div class="items" v-show="openResults">
            <div class="item" v-if="options.length == 0">
                Такого нет
            </div>
            <div class="item" v-else ref="options"
                 :class="{'selected' : choosedItem === item.val}"
                 v-for="(item, index) in options"
                 @click="clickingResult(item.val)">
                {{ item.name }}
                <i v-if="choosedItem === item.val" class="yicon success"></i>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['options', 'placeholder', 'choosedItem', 'shade'],
        mounted() {
            document.addEventListener('click', this.handleClickOutside);
        },
        data(){
            return{
                openResults: false,
                mouseSelected: null,
            }
        },
        methods: {
            clickingResult(result) {
                this.openResults = false
                this.$emit('updateChoosed', result)
            },
            handleClickOutside(evt){
                if (!this.$el.contains(evt.target)) {
                    this.openResults = false;
                }
            },
        },

        computed: {
            getChoosedObject(){
                return this.options.find(el => {
                    if(el.val == this.choosedItem) return true;
                })
            },
            generatingPlaceholder(){
                return this.getChoosedObject !== undefined ? this.getChoosedObject.name : this.placeholder;
            },
        },
        watch: {
            selected(to){
                // console.log(to)
            }
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
    }
</script>

