<template>
    <div class="yselectmultysearch">
        <input
            type="text"
            class="input-dropdown"
            @mousedown="focusSelectSearch"
            @focus="focusSelectSearch"
            @keyup.enter="selectingResult"
            @keydown.down="onDown"
            @keydown.up="onUp"
            @keyup.esc="cleanTextField"
            ref="yselectsearch"
            v-model="search"
            :placeholder="generatingPlaceholder"
        />

        <i @click="$refs.yselectsearch.focus()" class="fas" :class="openResults ? 'fa-search' : 'fa-chevron-down'" ></i>
        <ul class="options-list" id="scrollContainer" ref="scrollContainer" v-show="openResults">
            <li v-if="(results.length == 0)">Такого нет</li>
            <li v-for="(result, i) in results"
                ref="options"
                @mouseenter="mouseSelected = i"
                @mouseleave="mouseSelected = null"
                @click="clickingResult(result)"
                :class="{
                    'selected': i === selected,
                    'selectedMouse': i === mouseSelected,
                    'checked': isPresent(result)
                }">
                <i class="fas" :class="isPresent(result) ? 'far fa-check-square' : 'far fa-square'"></i> {{ result.name || result  }}
            </li>
        </ul>
    </div>
</template>
<script>
    export  default  {
        props: ['options', 'placeholder', 'choosedItems'],
        mounted() {
            this.computingResults(''); // if data load rapid and doesn`t updated
            document.addEventListener('click', this.handleClickOutside);
        },
        data() {
            return {
                openResults: false,
                selected: null,
                mouseSelected: null,

                search: "",
                results: [],
            }
        },
        methods: {
            clickingResult(result){
                if(this.isPresent(result)){
                    this.$emit('deleteChoose', result);
                }
                else{
                    this.$emit('updateChoose', result)
                }
                this.search = '';
            },
            selectingResult() {
                if(this.results[this.selected] != undefined){
                    this.clickingResult(this.results[this.selected]);
                }
            },

            onDown() {
                this.selected = this.selected == null ? this.selected = 0 : (this.selected + 1) % this.results.length;
                this.fixScrolling()
            },
            onUp() {
                if (!this.openResults) { return; }
                this.selected =
                    this.selected - 1 < 0
                        ? this.results.length - 1
                        : this.selected - 1;
                this.fixScrolling()
            },
            fixScrolling(){
                const scroll = this.$refs.options[this.selected].scrollHeight + 1;
                this.$refs.scrollContainer.scrollTop = scroll * this.selected;
            },

            handleClickOutside(evt){
                if(!this.$el.contains(evt.target))this.cleanTextField();
            },
            focusSelectSearch(){
                this.selected = null;
                this.mouseSelected = null;
                this.arrowCounter = 0;
                this.$refs.scrollContainer.scrollTop = 0;
                this.openResults = true;
            },
            cleanTextField(){
                this.search = '';
                this.openResults = false;
            },

            isPresent(result){
                return this.choosedItems.indexOf(result) == -1 ? false : true
            },

            computingResults(text){
                this.results = this.options.filter((item)=>{
                    return text.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
                });
            },
        },
        computed: {
            generatingPlaceholder(){
                let outputPlaceholder = '',
                    arrLength = this.choosedItems.length;
                if(arrLength !== 0){
                    this.choosedItems.forEach((el, i) => {
                        if(arrLength - 1 == i){
                            outputPlaceholder += el.name;
                        } else{
                            outputPlaceholder += el.name + '; '
                        }
                    })

                }
                return outputPlaceholder !== '' ? outputPlaceholder : this.openResults ? 'Поиск...' : this.placeholder;
            },
        },
        watch: {
            search(to, from){
                if(to == null) return false;

                this.selected = 0;
                this.computingResults(to);
                this.arrowCounter = 0;
                this.$refs.scrollContainer.scrollTop = 0;
            },
            options(to){
                // if updating will be later
                this.computingResults('');
            }
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },

    }
</script>

