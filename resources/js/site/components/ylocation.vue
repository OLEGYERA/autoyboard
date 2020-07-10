<template>
    <div class="ylocations">
        <i class="fas fa-map-marker-alt"></i>
        <input
            class="dropdown-input"
            @input="onChange"
            v-model="search"
            @keydown.down="onArrowDown"
            @keydown.up="onArrowUp"
            @keydown.enter="onEnter"
            @click="showAll"
            placeholder="Вся Украина"
            type="text"
        />
        <ul
            id="autocomplete-results"
            v-show="isOpen"
            ref="scrollContainer"
            class="autocomplete-results">

            <li
                ref="options"
                v-for="(result, i) in results"
                :key="i"
                @click="setResult(result)"
                class="autocomplete-result"
                :class="{ 'is-active': i === arrowCounter }">
                {{result}}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {

        data() {
            return {
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

        methods: {

            onChange() {
                this.isOpen = true;
                this.filterResults();
            },

            filterResults() {
                this.results = this.items.filter((item) => {
                    return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
                    console.log(this.results)
                    console.log(this.items)
                });
            },

            setResult(result) {
                this.search = result;
                this.isOpen = false;
                console.log(result)
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
