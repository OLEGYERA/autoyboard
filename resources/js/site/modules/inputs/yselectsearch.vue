<template>
    <div class="yselectsearch" :class="{black: shade !== undefined, active: openResults}">
        <div class="pre-header" v-if="currentWidth <= 768">
            <div class="modal-cancel" @click="openResults = false"><i class="yicon arrow-left"></i>Назад</div>
            <div class="modal-title">{{placeholder}}</div>
        </div>
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

        <i v-if="(search.length !== 0 && openResults) || (getChoosedObject !== undefined && deleteDis !== true)"
           @click.self="clearInput"
           class="yicon cancel"
           :class="{delete: (getChoosedObject !== undefined && deleteDis !== true)}"
        >
        </i>
        <i @click="$refs.yselectsearch.focus()" v-else="openResults" class="yicon" :class="openResults ? 'search' : 'arrow-down'"></i>
        <ul class="options-list" id="scrollContainer" ref="scrollContainer" v-show="openResults">
            <li v-if="getChoosedObject !== undefined" class="choosed">{{getChoosedObject.name}}<i class="yicon success"></i></li>
            <li v-if="(results.length == 0)">Такого нет</li>
            <li v-for="(result, i) in results"
                ref="options"
                @mouseenter="mouseSelected = i"
                @mouseleave="mouseSelected = null"
                @click="clickingResult(result.val)"
                :class="{
                    'selected': i === selected,
                    'selectedMouse': i === mouseSelected,
                    'faded': getChoosedObject !== undefined ? getChoosedObject.val == result.val : false
                }">
                {{ result.name || result  }}
            </li>
        </ul>
    </div>
</template>
<script>
    export  default  {
        props: ['options', 'placeholder', 'choosedItem', 'deleteDis', 'shade'],
        mounted() {
            this.computingResults(''); // if data load rapid and doesn`t updated
            document.addEventListener('click', this.handleClickOutside);
            window.addEventListener('resize', this.changeResize);
            this.changeResize();
        },
        data() {
            return {
                openResults: false,
                selected: null,
                mouseSelected: null,
                currentWidth: null,

                search: "",
                results: [],
            }
        },
        methods: {
            clickingResult(result) {
                this.cleanTextField();
                this.$emit('updateChoose', result)
            },
            selectingResult() {
                if(this.results[this.selected] != undefined){
                    this.clickingResult(this.results[this.selected].val)
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
            changeResize(){
                this.currentWidth = window.innerWidth;
                this.overflowDOM();
            },
            overflowDOM(){
                if(this.currentWidth <= 768){
                    if(this.openResults){
                        document.getElementsByTagName('body')[0].style.overflow = 'hidden'
                    }
                    else{
                        document.getElementsByTagName('body')[0].style.overflow = 'auto'
                    }
                }
            },
            focusSelectSearch(){
                this.selected = null;
                this.mouseSelected = null;
                this.arrowCounter = 0;
                this.$refs.scrollContainer.scrollTop = 0;
                this.openResults = true;
            },
            clearInput(){
                this.search = '';
                if(this.choosedItem !== null && this.deleteDis !== true) this.$emit('deleteChoose');
                if(this.openResults == true) this.$refs.yselectsearch.focus()
            },
            cleanTextField(){
                this.search = '';
                this.openResults = false;
                this.$refs.yselectsearch.blur();
            },
            computingResults(text){
                this.results = this.options.filter((item)=>{
                    return text.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
                });
            },
        },
        computed: {
            getChoosedObject(){
                return this.options.find(el => {
                    if(el.val == this.choosedItem) return true;
                })
            },
            generatingPlaceholder(){
                return this.getChoosedObject !== undefined ? this.getChoosedObject.name : this.openResults ? 'Поиск...' : this.placeholder;
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
            },
            openResults(to){
                this.overflowDOM()
            }
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside);
            window.removeEventListener('resize', this.changeResize);
        },

    }
</script>

