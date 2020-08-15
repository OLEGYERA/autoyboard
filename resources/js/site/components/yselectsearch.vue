<template>
        <div class="autocomplete">
                <input
                    type="text"
                    class="input-dropdown"
                    @input="onChange"
                    @blur="isOpened = true"
                    @keyup.enter="select"
                    @keyup.tab="select"
                    @keydown.down="onDown"
                    @keydown.up="onUp"
                    @click="onChange"
                    @keyup.esc="isOpen = false"
                    ref="dropdown"
                    v-model="search"
                    :placeholder="generatingPlaceholder"
                />
                <i v-if="search.length != 0 && isOpened"
                   @click="clearInput"
                   class="fas fa-times">
                </i>
                <i v-else-if="isOpened" class="fas fa-search"></i>
                <i v-else
                   @click="toggle"
                   class="ynav-list-toggle fas"
                   :class="{'fa-chevron-up' :isOpened, 'fa-chevron-down':  !isOpened}">
                </i>


        <ul class="options-list"  ref="scrollContainer" v-show="isOpened">
            <li v-for="(result, i) in results"
                ref="options"
                @mouseenter="selected = i"
                @click="setResult(result)"
                :class="{'selected': i === selected}">
                {{ result.name || result }}
                <slot name="item" :title="result"></slot>
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
            this.results =  this.options.filter(item => item.name.match(condition));
        },
        generatingPlaceholder(){
            return this.isOpened ? 'Поиск...' : this.placeholder;
        }
    },
    methods: {
        setResult(result) {
            this.search = result.name;
            this.results = result;
            this.isOpened = false;
            this.selected = null;
        },
        onChange() {
            this.isOpened = true;
            this.filteredItems;
            console.log(this.isOpened)
        },

        select() {
            const searchName = this.results[this.selected];
            this.search = searchName.name;
            this.results = searchName.name;
            this.selected = null;
            if(this.results.length > 0){
                this.selected = null
            }
            this.isOpened = false;
        },
        onDown() {
            if (!this.isOpened) { return; }
            this.selected = (this.selected + 1) % this.results.length;
            this.fixScrolling()
            },
        onUp() {
            if (!this.isOpened) { return; }
            this.selected =
                this.selected - 1 < 0
                    ? this.results.length - 1
                    : this.selected - 1;
            this.fixScrolling()
            },
        toggle() {
            this.isOpened = !this.isOpened;
            if (this.isOpened) {
                this.$refs.dropdown.focus();
            }
            console.log(this.isOpened)
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
            this.isOpened = true;
        }
    },

}
</script>

