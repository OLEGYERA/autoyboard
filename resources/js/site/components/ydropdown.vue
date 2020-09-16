<template>
    <div  class="ydropdown">
    <div
        class="value"
        @blur="isOpen = true"
        v-model="itemSelected"
        @click="isOpen = !isOpen">{{generatingPlaceholder || placeholder}}</div>
        <i
           class="ynav-list-toggle fas"
           :class="{'fa-chevron-up' :isOpen, 'fa-chevron-down':  !isOpen}"
           @click="isOpen = !isOpen"
        >
        </i>
        <div class="items" v-show="isOpen">
            <div class="item"
                 :class="{'checked' : itemSelected == item}"
                 v-for="(item, key) in testItem"
                 :key="key"
                 @click="setItem(item)"
            >
                {{ item }}
                <i v-if="itemSelected == item" class="fas fa-check"></i>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['items', 'placeholder', ],
        mounted() {
            document.addEventListener('click', this.handleClickOutside);

        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data(){
            return{
                itemSelected: null,
                isOpen: false,
                result: [],
                testItem:['По цене','По дате добавление', 'По цене','По дате добавление', 'По цене',]
            }
        },
        methods: {
            setItem(item) {
                this.itemSelected = item
                this.result = item
                this.isOpen = false
            },
            handleClickOutside(evt){
                if (!this.$el.contains(evt.target)) {
                    this.isOpen = false;
                }
            },
        },

        computed: {
            filteredItems() {
                return this.items
            },
            generatingPlaceholder(){
                if(this.itemSelected === null){
                    return this.placeholder
                }
                else {
                    return this.itemSelected
                }
            },
        },
    }
</script>

