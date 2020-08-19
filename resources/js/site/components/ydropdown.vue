<template>
    <div  class="ydropdown">
    <div
        class="value"
        @blur="isOpen = true"
        v-model="value"
        @click="isOpen = !isOpen">{{generatingPlaceholder || placeholder}}</div>
        <i
           class="ynav-list-toggle fas"
           :class="{'fa-chevron-up' :isOpen, 'fa-chevron-down':  !isOpen}"
           @click="isOpen = !isOpen"
        >
        </i>
        <div class="items" v-show="isOpen">
            <div class="item"
                 :class="{'checked' : value == item}"
                 v-for="(item, key) in filteredItems"
                 :key="key"
                 @click="setItem(item)"
            >
                {{ item }}
                <i v-if="value == item" class="fas fa-check"></i>
            </div>

        </div>
    </div>
</template>
<script>
    export default{
        props: ['items', 'placeholder'],
        mounted() {
            document.addEventListener('click', this.handleClickOutside);

        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data(){
            return{
                isOpen: false,
                result: [],
                value: '',
            }
        },
        methods: {
            setItem(item) {
                this.value = item
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
                if(this.value === ""){
                    return this.placeholder
                }
                else {
                    return this.value
                }
            },
        },
    }
</script>

