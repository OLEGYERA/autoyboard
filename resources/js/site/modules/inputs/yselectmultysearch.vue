<template>
    <div class="yselectmultysearch" :class="{black: shade !== undefined, active: openResults}">
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

        <i @click="$refs.yselectsearch.focus()" class="yicon" :class="openResults ? 'search' : 'arrow-down'" ></i>
        <ul class="options-list" id="scrollContainer" ref="scrollContainer" v-show="openResults">
            <li v-if="(results.length == 0)">Такого нет</li>
            <li v-for="(result, i) in results"
                ref="options"
                @mouseenter="mouseSelected = i"
                @mouseleave="mouseSelected = null"
                @click="clickingResult(result.val)"
                :class="{
                    'selected': i === selected,
                    'selectedMouse': i === mouseSelected,
                    'checked': isPresent(result.val)
                }">
                {{ result.name || result  }}
                <span class="checkbox">
                    <i class="yicon success"></i>
                </span>
            </li>
        </ul>
    </div>
</template>
<script>
    export  default  {
        props: ['options', 'placeholder', 'choosedItems', 'shade'],
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
                    this.clickingResult(this.results[this.selected].val);
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
                        document.getElementsByTagName('header')[0].style.display = 'none';
                        document.getElementsByTagName('body')[0].style.overflow = 'hidden'
                    }
                    else{
                        document.getElementsByTagName('header')[0].style.display = 'flex';
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
                        let finded = this.options.find(op_el => {if(el ===  op_el.val) return true;})
                        if(finded !== undefined)
                            outputPlaceholder += arrLength - 1 == i ? finded.name : finded.name + '; ';
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
            },
            openResults(to){
                this.overflowDOM()
            }
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
            window.removeEventListener('resize', this.changeResize);
        },

    }
</script>

