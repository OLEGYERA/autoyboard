<template>
    <div class="ydropdown" :class="{black: shade !== undefined}">
        <div class="name-dropdown" @click="isOpen = !isOpen">
            {{generatingPlaceholder}}
            <i class="yicon" :class="{'arrow-up' :isOpen, 'arrow-down':  !isOpen}" @click="isOpen = !isOpen"></i>
        </div>

        <div class="items" v-show="isOpen">
            <div class="item"
                 :class="{'checked' : itemSelected == item.name}"
                 v-for="(item, index) in options"
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
        props: ['options', 'placeholder', 'selectedItem', 'shade'],
        mounted() {
            document.addEventListener('click', this.handleClickOutside);

            document.addEventListener('keydown', this.test);


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
            test(e){
                console.log(e)
            },
            handleClickOutside(evt){
                console.log(evt)
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

