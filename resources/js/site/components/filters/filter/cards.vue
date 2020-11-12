<template>
    <div class="filter-cards">
        <div class="option-line">
            <div class="selectors-group">
                <div class="ygroup-row-box">
                    <h3 class="sidebar-title">
                        Сортировка
                    </h3>
                    <yselectsearch
                        @updateChoose="SET_SORTING_CHOOSED($event)"
                        :deleteDis="true"
                        :placeholder="'Выберите сортировку'"
                        :options="searchDeatils.systemSorting"
                        :choosedItem="searchDeatils.sortingChoosed">
                    </yselectsearch>
                </div>
                <div class="ygroup-row-box">
                    <h3 class="sidebar-title">
                        Период подачи
                    </h3>
                    <yselectsearch
                        @updateChoose="SET_PERIOD_CHOOSED($event)"
                        :deleteDis="true"
                        :placeholder="'Выберите период подачи'"
                        :options="searchDeatils.systemPeriod"
                        :choosedItem="searchDeatils.periodChoosed">
                    </yselectsearch>
                </div>
            </div>
           <div class="icon-group">
               <i class="yicon grid-1 active"></i>
               <i class="yicon grid-2"></i>
           </div>
        </div>
        <div class="filter-cards-box">
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Ford Fiesta St line 219 2009</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_passat-b8__361470968fx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(102000)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(12400000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">5</span> мая, <span class="sp-num">2020</span></time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Range Rover Evoque Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Ford Fiesta St line 219 2009</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_passat-b8__361470968fx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(102000)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(12400000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">5</span> мая, <span class="sp-num">2020</span></time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Range Rover Evoque Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Ford Fiesta St line 219 2009</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn3.riastatic.com/photosnew/auto/photo/volkswagen_passat-b8__361470968fx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(102000)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(12400000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">5</span> мая, <span class="sp-num">2020</span></time>
                    </div>
                </div>
            </div>
            <div class="filter-card">
                <div class="img-box">
                    <picture>
                        <img src="https://cdn1.riastatic.com/photosnew/auto/photo/skoda_kodiaq__361451026bx.jpg" alt="">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">Land Rover Range Rover Evoque Black Edition</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(8200)}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(124000)}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title"><span class="sp-num">331</span> тыс. км</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title">Автомат</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">Киев</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title"> Дизель, <span class="sp-num">2</span> л.</div>
                        </div>
                    </div>
                    <div class="other-row">
                        <time class="date"><span class="sp-num">30</span> минут назад</time>
                    </div>
                </div>
            </div>
        </div>
        <div class="yb-page_pagination">



            <button @click="prevPage" class="yb_pagination_btn l">
                <i class="fas fa-chevron-left"></i>
            </button>
            <ul class="yb-pagination_items">
                <li class="yb-pagination_item"
                    v-for="pageNumber in totalPages"
                    v-if="Math.abs(pageNumber - currentPage) < 3 || pageNumber == totalPages || pageNumber == 1"
                    :class="{current: currentPage === pageNumber}"
                >
                        <span class="yb-pagination_number"
                              v-bind:key="pageNumber"
                              @click="setPage(pageNumber)"
                              :class="{ last: (pageNumber == totalPages && Math.abs(pageNumber - currentPage) > 3), first:(pageNumber == 1 && Math.abs(pageNumber - currentPage) > 3)}">{{ pageNumber }}</span>
                </li>
            </ul>
            <button  @click="nextPage" class="yb_pagination_btn r">
                <i class="fas fa-chevron-right"></i>
            </button>
        </div>
        <ypaginaton v-model="page" :length="length" :total-visible="totalVisible"></ypaginaton>
    </div>
</template>
<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';

    export default {
        props: ['lang'],
        mounted() {
            window.addEventListener('resize', this.onResize)
            this.onResize();
            document.addEventListener('click', this.handleClickOutside)
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data() {
            return {
                page: 1,
                length: 10,
                totalVisible: 5,

                //////////
                sortByOpen: false,
                itemSort: [],
                windowWidth: 0,
                status: false,
                left: ['Обычная', 'По рейтингу', 'По к-ву просмотров', 'По цене', 'По дате добавления', 'Пробег, по взрастанию', 'Пробег, по убыванию',],
                right: ['Все', 'За час', 'За 3 часа', 'За 6 часов', 'За 12 часов', 'За сегодня', 'За сутки', 'За Неделю'],
                users: [
                    {"id":1, "name":"Tom"},
                    {"id":2, "name":"Kate"},
                    {"id":3, "name":"Jack"},
                    {"id":4, "name":"Jill"},
                    {"id":5, "name":"bill"},
                    {"id":6, "name":"aill"},
                    {"id":7, "name":"cill"},
                    {"id":8, "name":"dill"},
                    {"id":9, "name":"eill"},
                    {"id":10, "name":"cill"},
                    {"id":11, "name":"dill"},
                    {"id":12, "name":"eill"},
                    {"id":13, "name":"cill"},
                    {"id":14, "name":"dill"},
                    {"id":15, "name":"eill"},
                    {"id":16, "name":"cill"},
                    {"id":17, "name":"dill"},
                    {"id":18, "name":"eill"},
                    {"id":19, "name":"cill"},
                    {"id":10, "name":"dill"},
                    {"id":11, "name":"eill"}

                ],
                currentPage: 1,
                itemsPerPage: 1,
                resultCount: 0,
                //end pagination
            }
        },
        methods: {
            prettify(num){
                var n = num.toString();
                return n.replace(/(\d{1,3}(?=(?:\d\d\d)+(?!\d)))/g, "$1" + ' ');
            },
            prevPage(){
                this.currentPage = ( this.currentPage-1 >= 0 ? this.currentPage-1 : this.users.length-1 )
            },
            nextPage(){
                this.currentPage = ( this.currentPage+1 < this.users.length ? this.currentPage+1 : 0 )
                // if(this.currentPage === 0) this.currentPage = 1
                // if(this.currentPage === this.users.length-1){
                //     this.currentPage = 1
                // }
            },
            setPage: function(pageNumber) {
                this.currentPage = pageNumber
            },
            changeStatus(s) {
                this.status = s;
            },
            onResize() {
                this.windowWidth = document.documentElement.clientWidth;
            },
            openSortBy() {
                this.sortByOpen = true
            },
            setItem(item) {
                this.itemSort = item
                this.sortByOpen = false
            },
            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.sortByOpen = false;
                }
            },
        },
        computed: {
            ...mapGetters({
                'searchDeatils': 'GET_SEARCHDETAILS',
            }),
            totalPages: function() {
                return Math.ceil(this.resultCount / this.itemsPerPage)
            },
            paginate: function() {
                if (!this.users || this.users.length != this.users.length) {
                    return
                }
                this.resultCount = this.users.length
                if (this.currentPage >= this.totalPages) {
                    this.currentPage = this.totalPages
                }
                var index = this.currentPage * this.itemsPerPage - this.itemsPerPage
                return this.users.slice(index, index + this.itemsPerPage)
            },
            filterSortItems() {
                return this.left
            },
        }
    }
</script>

