<template>
    <div  class="ydropdown">
    <div
        class="value"
        v-model="itemSelected"
        @click="isOpen = !isOpen"
    >
        {{generatingPlaceholder || placeholder}}
    </div>
        <i
           class="ynav-list-toggle fas"
           :class="{'fa-chevron-up' :isOpen, 'fa-chevron-down':  !isOpen}"
           @click="isOpen = !isOpen"
        >
        </i>
        <div class="items" v-show="isOpen">
            <div class="item"
                 :class="{'checked' : itemSelected == item.name}"
                 v-for="(item, index) in filteredItems"
                 :key="index"
                 @click="setItem(item)"
            >
                {{ item.name }}
                <i v-if="itemSelected === item.name" class="fas fa-check"></i>
            </div>
        </div>
    </div>
</template>
<script>
    export default{
        props: ['items', 'placeholder','selectedItem' ],
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
            }
        },
        methods: {
            setItem(item) {
                this.itemSelected = item.name
                this.result = item
                this.isOpen = false

                this.$emit('setItem', item)
                //
                // this.$emit('setItem', {
                //     selectItem: item.name,
                //     selectId: item.id
                // })
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
                return this.itemSelected === null ? this.placeholder : this.itemSelected;
            },
        },
    }
</script>

