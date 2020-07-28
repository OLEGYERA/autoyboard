<template>
        <div class="autocomplete">
                <input
                    type="text"
                    class="input-dropdown"
                    @input="onInput($event.target.value)"
                    @blur="isOpened = true"
                    @keyup.enter="select"
                    @keyup.tab="select"
                    @keydown.down="onDown"
                    @keydown.up="onUp"
                    @click="toggle"
                    @keyup.esc="isOpen = false"
                    ref="dropdown"
                    v-model="search"
                    :placeholder="generatingPlaceholder"
                />
                <i @click="clearInput" v-if="search.length != 0 && isOpened" class="fas fa-times"></i>
                <i v-else-if="isOpened" class="fas fa-search"></i>
                <i v-else  class="ynav-list-toggle fas"
                   @click="toggle"
                   :class="{'fa-chevron-up' :isOpened, 'fa-chevron-down':  !isOpened}">
                </i>


        <ul class="options-list"  ref="scrollContainer" v-show="isOpened">
            <li v-for="(option, i) in filteredItems"
                ref="options"
                @mouseenter="selected = i"
                @mousedown="select"
                :class="{'selected': i === selected}">
                {{ option.name }}, {{option.lastname}}
                <slot name="item" :title="option"></slot>
            </li>
        </ul>

    </div>
</template>

<script>
export  default  {
    props: ['options', 'placeholder'],
    mounted() {
        document.addEventListener('click', this.handleClickOutside);
    },
    destroyed() {
        document.removeEventListener('click', this.handleClickOutside)
    },
    data() {
        return {
            isOpened: false,
            selected: null,
            search: "",
            results: [],
        }
    },
    computed: {
        filteredItems() {
            this.selected = null
            if(this.$refs.scrollContainer){
                this.$refs.scrollContainer.scrollTop = 0;
            }
            const condition = new RegExp(this.search, "i");
            return this.options.filter(item => item.name.match(condition));
        },
        generatingPlaceholder(){
            return this.isOpened ? 'Поиск...' : this.placeholder;
        }
    },
    methods: {
        onInput(value) {

            this.isOpened = !!value;
            this.selected = null;
            this.onDown();
            this.onUp()
        },
        select() {
            const selectedOption = this.filteredItems[this.selected];
            this.$emit("select-item", selectedOption);
            this.search = selectedOption.name;
            this.results = selectedOption.name;
            this.isOpened = false;
            this.selected = null;
        },
        onDown(ev) {
            if (!this.isOpened) {
                return;
            }
            this.selected = (this.selected + 1) % this.filteredItems.length;
            this.fixScrolling()
            },
        onUp() {
            if (!this.isOpened) {
                return;
            }
            this.selected =
                this.selected - 1 < 0
                    ? this.filteredItems.length - 1
                    : this.selected - 1;
            this.fixScrolling()
            },
        toggle() {
            this.isOpened = !this.isOpened;
            if (this.isOpened) {
                this.$refs.dropdown.focus();
            }
        },
        fixScrolling(){
            const scroll = this.$refs.options[this.selected].scrollHeight;
            this.$refs.scrollContainer.scrollTop = scroll * this.selected;
            console.log(this.$refs.scrollContainer.scrollTop);
            console.log(scroll * this.arrowCounter);
        },
        handleClickOutside(evt){
            if (!this.$el.contains(evt.target)) {
                this.isOpened = false;
                this.selected = null;
            }
        },
        clearInput(){
            this.search = "";
            this.selected = null;
        }
    },

}
</script>

