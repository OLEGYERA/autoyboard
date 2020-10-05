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
                v-for="(item, i) in clearRegions"
                class="select_option region_part_option"
                :class="{y_active : i === arrowCounter}"
                v-if="item != undefined"
            >
                <span class="option_name">{{item.regionPart.name}}</span>
                <div class="select_option region_option"
                     v-for="(region, region_index) in item.children">
                    <span class="option_name">
                        {{region.region.name}}
                    </span>
                    <div class="select_option city_option">
                        <span  ref="scroll" class="option_name" v-for="(city, city_index) in region.children">
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
    props: ['placeholder','options'], // options is a predator variable func
    beforeMount() {
        document.addEventListener('click', this.handleClickOutside);
    },
    data(){
        return{
            regionParts: [],
            regions: [],
            cities: [],
            openRes: false,
            result: [],
            search: '',
            arrowCounter: 0,
        }
    },
    methods: {
        destructRegionPart() {
            this.regionParts = [];
            this.regions = [];
            this.cities = [];
            let self = this;
            this.options.forEach(function(el){
                self.regionParts[el.val] = {'alias': el.alias, 'name': el.name};
                el.children.forEach(function(sub_el){
                    self.regions[sub_el.val] = {'alias': sub_el.alias, 'name': sub_el.name, 'parent': el.val};
                    sub_el.children.forEach(function(city){
                        self.cities.push({'alias': city.alias, 'name': city.name, 'parent': sub_el.val});
                    })
                })
            });

            this.result = this.cities;
        },
        handleClickOutside(evt) {
            if (!this.$el.contains(evt.target)) {
                this.openRes = false;
            }
        },
        fixScrolling(){
            const scroll = this.$refs.scroll[this.arrowCounter].scrollHeight;
            this.$refs.scrollContainer.scrollTop = scroll * this.arrowCounter;
            console.log(this.$refs.scrollContainer.scrollTop);
            console.log(scroll * this.arrowCounter);
        },
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
    computed: {
        clearRegions(){
            let clearArr = [],
                regionArr = []
                self = this;


            this.result.forEach(function (el){

                if(regionArr[el.parent] == undefined){
                    regionArr[el.parent] = {'region': self.regions[el.parent], 'children': []};
                }
                regionArr[el.parent]['children'].push(el);
            });

            console.log(regionArr);

            regionArr.forEach(function (el){
                if(clearArr[el.region.parent] == undefined){
                    clearArr[el.region.parent] = {'regionPart': self.regionParts[el.region.parent], 'children': []};
                }
                clearArr[el.region.parent]['children'].push(el);
            });
            return clearArr;
        }
    },
    watch: {
        options(to){
            this.destructRegionPart();
        },
        search(to, from){
            this.result = this.cities.filter((item)=>{
                return to.toLowerCase().split(' ').every(v => item.name.toLowerCase().includes(v))
            })
        }
    },
    destroyed() {
        document.removeEventListener('click', this.handleClickOutside)
    }
}
</script>
