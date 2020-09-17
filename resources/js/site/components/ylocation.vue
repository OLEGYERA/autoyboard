<template>
    <div class="ylocation" :class="container">
        <input
            :class="input_style"
            @input="onChange"
            v-model="search"
            @keydown.down="onArrowDown"
            @keydown.up="onArrowUp"
            @keydown.enter="onEnter"
            @keydown.esc="isOpen = false"
            @click="showAll"
            :placeholder="text"
            type="text"
        />
        <div
            v-show="isOpen"
            ref="scrollContainer"
            id="autocomplete-results"
            :class="drop_style"
        >
            <div
                ref="options"
                v-for="(result, i) in results"
                :key="i"
                v-if="results.length > 0"
                @click="setResult(result)"
                :class="[list_style, {'is-active': i === arrowCounter}]"
            >
                {{result}}
            </div>
            <div class="autocomplete-result" v-if="results.length === 0">Не найдено</div>
        </div>
    </div>
</template>

<script>
import vuescroll from "vuescroll";
    export default {
        components: {vuescroll},
            props: ['input_style', 'drop_style', 'text', 'container', 'list_style'],
        data() {
            return {
                ops: {
                    vuescroll: {
                        mode: 'native',
                        sizeStrategy: 'percent',
                        detectResize: true
                    },
                    scrollPanel: {
                        initialScrollY: false,
                        initialScrollX: false,
                        scrollingX: true,
                        scrollingY: true,
                        speed: 600,
                        easing: undefined,
                        verticalNativeBarPos: 'right'
                    },
                    rail: {
                        background: 'rgba(229, 229, 229, 0.51)',
                        opacity: 0,
                        size: '7px',
                        specifyBorderRadius: false,
                        gutterOfEnds: null,
                        gutterOfSide: '2px',
                        keepShow: false
                    },
                    bar: {
                        showDelay: 500,
                        onlyShowBarOnScroll: false,
                        keepShow: true,
                        background: '#0B3F8D',
                        opacity: 1,
                        hoverStyle: false,
                        specifyBorderRadius: false,
                        minSize: 0.3,
                        size: '7px',
                        disable: false
                    }
                },
                isOpen: false,
                results: [],
                search: '',
                arrowCounter: 0,
                items: ['Поляна', 'Славское',
                    'Тернополь',
                    'Трускавец',
                    'Хмельницкий',
                    'Чайковка',
                    'Чубинское',
                    'Шаян',
                    'Шешоры',
                    'Яремче',
                    'Петровское',
                    'Приморское',
                    'Черновцы',
                    'Днепропетровск',
                    'Донецк',
                    'Ивано-Франковск',
                    'Каменец-Подольский',
                    'Харьков',
                    'Херсон',
                    'Киев',
                    'Кривой Рог',
                    'Луганск',
                    'Львов',
                    'Николаев',
                    'Одесса',
                    'Полтава',
                    'Сумы',
                    'Ужгород',
                    'Запорожье',
                    'Винница',
                    'Черкассы',
                    'Чернигов',
                    'Ильичевск',
                    'Луцк',
                    'Малехов',
                    'Микуличин',
                    'Ровно',
                    'Стрый',
                    'Ахтырка',
                    'Белогородка',
                    'Бердянск',
                    'Борисполь',
                    'Бояны',
                    'Бровары',
                    'Буковель',
                    'Бурлачья Балка',
                    'Верховина',
                    'Винники',
                    'Жденево',
                    'Житомир',
                    'Жовтневое',
                    'Затока',
                    'Кировоград',
                    'Коблево',
                    'Козин',
                    'Колоденка',
                    'Коропово',
                    'Кременчуг',
                    'Макеевка',
                    'Мукачево',
                ],
            }
        },
        computed:{
            filterResults() {
                this.arrowCounter = 0;
                this.$refs.scrollContainer.scrollTop = 0;
                this.results = this.items.filter((item) => {
                    return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                });
            },

        },

        methods: {
            onChange() {
                this.isOpen = true;
                this.filterResults;
            },
            setResult(result) {
                this.search = result;
                this.isOpen = false;
                this.onArrowDown()
                this.onArrowUp()
            },

            onArrowDown(ev) {
                ev.preventDefault()
                if (this.arrowCounter < this.results.length-1) {
                    this.arrowCounter = this.arrowCounter + 1;
                    this.fixScrolling();
                }
            },

            onArrowUp(ev) {
                ev.preventDefault()
                if (this.arrowCounter > 0) {
                    this.arrowCounter = this.arrowCounter - 1;
                    this.fixScrolling()
                }
            },

            fixScrolling(){
                const scroll = this.$refs.options[this.arrowCounter].scrollHeight;
                this.$refs.scrollContainer.scrollTop = scroll * this.arrowCounter;
                console.log(this.$refs.scrollContainer.scrollTop);
                console.log(scroll * this.arrowCounter);
            },

            showAll() {
                this.isOpen = !this.isOpen;
                (this.isOpen) ? this.results = this.items : this.results = [];
                console.log(this.isOpen)
            },

            onEnter() {
                this.search = this.results[this.arrowCounter];
                this.isOpen = false;
                this.arrowCounter = -1;
                if(this.results.length > 0){
                    this.arrowCounter = 0
                }
            },

            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.isOpen = false;
                    this.arrowCounter = -1;
                }
            }
        },
        watch: {
            items: function (val, oldValue) {
                if (val.length !== oldValue.length) {
                    this.results = val;
                    this.isLoading = false;
                }
            }
        },
        mounted() {
            document.addEventListener('click', this.handleClickOutside)
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        }
    }
</script>
