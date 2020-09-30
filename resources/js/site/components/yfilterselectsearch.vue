<template>
    <div class="yfilter_select-search">
        <input
            class="yinput_search"
            :placeholder="placeholder"
            @click="openRes = !openRes"
            @keyup.esc="openRes = !openRes"
            @keydown.down="onArrowDown"
            @keydown.up="onArrowUp"
            v-model="search"
            type="text">
        <i
           class="fas"
           :class="{'fa-chevron-up' :openRes, 'fa-chevron-down':  !openRes}">
        </i>
        <div
            v-if="openRes"
            class="y_show-results"
        >
            <div
                v-for="(item, i) in options"
                class="select_option region_part_option"
                :class="{y_active : i === arrowCounter}"
            >
                <span class="option_name">{{item.name}}</span>
                <div class="select_option region_option"
                     v-for="(region, region_index) in item.childrens">
                    <span   class="option_name">
                        {{region.name}}
                    </span>
                    <div class="select_option city_option">
                        <span  ref="scroll" class="option_name" v-for="(city, city_index) in region.childrens">
                            {{city.name}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export  default {
    props: ['placeholder','options'],
    data(){
        return{
            openRes: false,
            result: [],
            search: '',
            arrowCounter: 0,
        }
    },
    computed:{

        // filterResults() {
        //     this.arrowCounter = 0;
        //     this.$refs.scrollContainer.scrollTop = 0;
        //     this.results = this.options.filter((item) => {
        //         return item.toLowerCase().indexOf(this.search.toLowerCase()) > -1;
        //     });
        // },

    },
    methods:{
        filteredCity(){
            // this.result = this.options.filter(function (r){
            //     console.log(r)
            //     return r.childrens.name.toLowerCase().indexOf(val.toLowerCase()) !== -1
            // })
        },
        handleClickOutside(evt) {
            if (!this.$el.contains(evt.target)) {
                this.openRes = false;
            }
        },
        // fixScrolling(){
        //     const scroll = this.$refs.scroll[this.arrowCounter].scrollHeight;
        //     this.$refs.scrollContainer.scrollTop = scroll * this.arrowCounter;
        //     console.log(this.$refs.scrollContainer.scrollTop);
        //     console.log(scroll * this.arrowCounter);
        // },
        onArrowDown: function (ev) {
            ev.preventDefault()
            if (this.arrowCounter < this.result.length - 1) {
                this.arrowCounter = this.arrowCounter + 1;
                this.fixScrolling();
            }
        },

        onArrowUp: function (ev) {
            ev.preventDefault()
            if (this.arrowCounter > 0) {
                this.arrowCounter = this.arrowCounter - 1;
                this.fixScrolling()
            }
        },
    },
    mounted() {
        document.addEventListener('click', this.handleClickOutside)
        this.filteredCity()
    },
    destroyed() {
        document.removeEventListener('click', this.handleClickOutside)
    }
}
</script>
