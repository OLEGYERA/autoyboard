<template>
    <div class="filter-cards">
        <div class="option-line" v-if="currentWidth > 768">
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
           <div class="icon-group" v-if="currentWidth > 900">
               <i class="yicon grid-2" :class="{active: !isRowView}" @click="[setRowViewtoStorage(false), isRowView = false]"></i>
               <i class="yicon grid-1" :class="{active: isRowView}" @click="[setRowViewtoStorage(true), isRowView = true]"></i>
           </div>
        </div>
        <div class="filter-cards-box" :class="{rows: isRowView}">
            <div class="filter-card" v-for="dataIdTransport in dataIdTransports">
                <div class="img-box">
                    <picture v-if="dataIdTransport.photo">
                        <img v-lazy="dataIdTransport.photo.path" alt="">
                    </picture>
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
                    <div class="description-row" v-if="isRowView == true">
                        Действительно НОВЫЙ АВТОМОБИЛЬ ! КОЛЛЕКЦИОННОЕ СОСТОЯНИЕ Достался по наследству от родителей БЕЗ ЕДИНОГО ПОДКРАСА !!! Ни одна деталь кузова .включая бампера, НЕ БИТАЯ !!! НЕ КРАШЕНАЯ !!! НЕ ПОДКРАШЕННАЯ !!!
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
                    <div class="description-row" v-if="isRowView == true"></div>
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
                    <h3 class="card-title">Renault Fluence 1.5DCi OFFiCiAL GPS 2014</h3>
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
            window.addEventListener('resize', this.changeResize);
            this.changeResize();
            document.addEventListener('click', this.handleClickOutside)
        },
        destroyed() {
            window.removeEventListener('resize', this.changeResize);
            document.removeEventListener('click', this.handleClickOutside)
        },
        data() {
            return {
                currentWidth: 0,
                isRowView: false,
                page: 1,
                length: 10,
                totalVisible: 5,
                test: [],
                //////////
                sortByOpen: false,
                itemSort: [],
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
            reciveTransportData(id){
                let findingTransport = this.dataTransports.find(el => {
                    if(el.id == id) return true
                });
                if(findingTransport == undefined) {
                    this.dataTransports.push({id: id, ping: true})
                    this.FILTER_TRANSPORT_FROM_API('data_transport/' + id);
                    return null;
                }else {
                    return findingTransport;
                }

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
            getRowViewFromStorage(){
                let rowStorage = localStorage.getItem('rowStorage');
                if(rowStorage == null || rowStorage == 'false'){
                    localStorage.setItem('rowStorage', 'false');
                    this.isRowView = false;
                }
                else{
                    this.isRowView = true;
                }
            },
            setRowViewtoStorage(bool){
                localStorage.setItem('rowStorage', bool);
            },
            changeResize(){
                this.currentWidth = window.innerWidth;
            },
            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.sortByOpen = false;
                }
            },
            ...mapActions([
                'FILTER_TRANSPORT_FROM_API'
            ]),
        },
        computed: {
            ...mapGetters({
                'searchDeatils': 'GET_SEARCHDETAILS',
                'dataIdTransports': 'GET_DATA_ID',
                'dataTransports': 'GET_DATA_TRANSPORTS'
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
        },
        watch:{
            currentWidth(to){
                // this.$forceUpdate();
                if(to < 900){
                    this.isRowView = false;
                }
                else{
                    this.getRowViewFromStorage();
                }
            },
        }
    }
</script>

