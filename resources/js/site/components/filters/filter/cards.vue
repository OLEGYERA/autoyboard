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
        <div class="filter-cards-box" :class="{rows: isRowView}" ref="filterCard">
            <div class="filter-card" v-for="dataTransport in dataTransports">
                <div class="img-box">
                    <picture v-if="dataTransport.photo">
                        <img v-lazy="dataTransport.photo.path">
                    </picture>
                </div>
                <div class="content-box">
                    <h3 class="card-title">{{ dataTransport.main.brand.title }} {{ dataTransport.main.modification }}  {{ dataTransport.main.model.title }} {{ dataTransport.main.year }}</h3>
                    <div class="price-row">
                        <div class="usd">{{prettify(Math.trunc(generateCurrency(dataTransport.main.price_currency, dataTransport.main.price_value, 1)))}}<span class="symb">$</span></div>
                        <div class="uah">{{prettify(Math.trunc(generateCurrency(dataTransport.main.price_currency, dataTransport.main.price_value, 2)))}}<span class="symb">₴</span></div>
                    </div>
                    <div class="option-list">
                        <div class="option-item">
                            <i class="yicon engine"></i>
                            <div class="option-title" v-if="dataTransport.body.mileage !== null"><span class="sp-num">{{dataTransport.body.mileage}}</span> тыс. км</div>
                            <div class="option-title" v-else>Не указано</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon transmission"></i>
                            <div class="option-title" v-if="dataTransport.body.type_transmission !== null">{{dataTransport.body.type_transmission.rtitle}}</div>
                            <div class="option-title" v-else>Не указано</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon full-location"></i>
                            <div class="option-title">{{dataTransport.main.city.rtitle}}</div>
                        </div>
                        <div class="option-item">
                            <i class="yicon fuel"></i>
                            <div class="option-title" v-if="dataTransport.body.type_fuel !== null && dataTransport.body.volume !== null">{{dataTransport.body.type_fuel.rtitle}}, <span class="sp-num">{{dataTransport.body.volume}}</span> л.</div>
                            <div class="option-title" v-else-if="dataTransport.body.type_fuel !== null && dataTransport.body.volume == null">{{dataTransport.body.type_fuel.rtitle}}</div>
                            <div class="option-title" v-else-if="dataTransport.body.type_fuel == null && dataTransport.body.volume !== null"><span class="sp-num">{{dataTransport.body.volume}}</span> л.</div>
                            <div class="option-title" v-else>Не указано</div>
                        </div>
                    </div>
                    <div class="description-row" v-if="isRowView == true && dataTransport.main.description !== null">
                        {{dataTransport.main.description}}
                    </div>
                    <div class="description-row" v-else-if="isRowView == true"></div>
                    <div class="other-row">
                        <time class="date" :date="dataTransport.created_at" v-html="generateDate(dataTransport.created_at)"></time>
                    </div>
                </div>
            </div>
        </div>
        <ypaginaton v-model="page" :length="Math.trunc(countTransport/10)" :total-visible="8"></ypaginaton>
    </div>
</template>
<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';

    export default {
        props: ['lang', 'currency'],
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
                totalVisible: 10,
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
            generateCurrency(curr, val, toConvert){
                switch (curr){
                    case 1:
                        if(toConvert == 1) return val;
                        if(toConvert == 2) return val * this.currency.USD;
                        if(toConvert == 3) return val * this.currency.USD / this.currency.EUR;
                        break;
                    case 2:
                        if(toConvert == 1) return val / this.currency.USD;
                        if(toConvert == 2) return val;
                        if(toConvert == 3) return val / this.currency.EUR;
                        break;
                    case 3:
                        if(toConvert == 1) return val * this.currency.EUR / this.currency.USD;
                        if(toConvert == 2) return val * this.currency.EUR;
                        if(toConvert == 3) return val;
                }
            },
            generateDate(date){
                let millisecondsPerMinute = 1000 * 60,
                    millisecondsPerHour = 1000 * 60 * 60,
                    millisecondsPerDay = millisecondsPerHour * 24,
                    currentDate = new Date(),
                    choosedDate = new Date(date);

                let diff = currentDate.getTime() - choosedDate.getTime(),
                    diffDay = Math.trunc(diff/millisecondsPerDay),
                    diffHour = Math.trunc(diff/millisecondsPerHour),
                    diffMinute = Math.trunc(diff/millisecondsPerMinute);

                if(diffDay > 0  || currentDate.getDay() - choosedDate.getDay() == 1){
                    if(diffDay == 1 || currentDate.getDay() - choosedDate.getDay() == 1){
                        return 'Вчера, ' + '<span class="sp-num">' + choosedDate.getHours() + ':' + choosedDate.getMinutes() + '</span>';
                    } else if(diffDay == 2){
                        return 'Позавчера, ' + '<span class="sp-num">' + choosedDate.getHours() + ':' + choosedDate.getMinutes() + '</span>';
                    } else {
                        return '<span class="sp-num">' + choosedDate.getDate() + '.' + choosedDate.getMonth() + '.' + choosedDate.getFullYear() + '</span>';

                    }

                } else if(diffHour > 0){
                    switch (diffHour) {
                        case 1:
                        case 21:
                            return '<span class="sp-num">' + diffHour + '</span> час назад';
                            break;
                        case 2:
                        case 3:
                        case 4:
                        case 22:
                        case 23:
                            break;
                            return '<span class="sp-num">' + diffHour + '</span> часа назад';
                        default:
                            return '<span class="sp-num">' + diffHour + '</span> часов назад';
                            break;
                    }

                } else{
                    switch (diffMinute) {
                        case 1:
                        case 21:
                        case 31:
                        case 41:
                        case 51:
                            return '<span class="sp-num">' + diffMinute + '</span> минуту назад';
                            break;
                        case 2:
                        case 3:
                        case 4:
                        case 22:
                        case 23:
                        case 24:
                        case 32:
                        case 33:
                        case 34:
                        case 42:
                        case 43:
                        case 44:
                        case 52:
                        case 53:
                        case 54:
                            return '<span class="sp-num">' + diffMinute + '</span> минуты назад';
                            break;
                        default:
                            return '<span class="sp-num">' + diffMinute + '</span> минут назад';
                            break;
                    }
                }
            },
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
        },
        computed: {
            ...mapGetters({
                'searchDeatils': 'GET_SEARCHDETAILS',
                'dataTransports': 'GET_DATA_TRANSPORTS',
                'countTransport': 'GET_COUNT'
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

