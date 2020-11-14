<template>
    <div class="yprice">
        <input
            class="change"
            v-model="tempData.from"
            placeholder="От"
            :maxlength="9"
            @blur="watchPrice"
            @keypress="isNumber($event)">
        <input
            class="change"
            v-model="tempData.to"
            placeholder="До"
            :maxlength="9"
            @blur="watchPrice"
            @keypress="isNumber($event)">
        <ydropdown
            @updateChoosed="priceChoosed.currency = $event"
            :options="curencies"
            :placeholder="'Валюта'"
            :choosedItem="priceChoosed.currency"></ydropdown>
    </div>
</template>
<script>
import {mapGetters, mapActions, mapMutations} from 'vuex';
export default{
    props: ['priceChoosed'],
    mounted(){
        this.tempData.to = this.priceChoosed.to;
        this.tempData.from = this.priceChoosed.from;
    },
    data() {
        return{
            tempData: {
                from: null,
                to: null,
            }
        }
    },
    methods: {
        ...mapMutations([
            'SET_PRICE_CHOOSED'
        ]),
        watchPrice(type, model){
            if(Number(this.tempData.from) > Number(this.tempData.to) && this.tempData.to !== null && this.tempData.to !== ''){
                let tempVar = this.tempData.from;
                this.tempData.from = Number(this.tempData.to);
                this.tempData.to = Number(tempVar);
            }

            this.priceChoosed.from = this.tempData.from;
            this.priceChoosed.to = this.tempData.to;
        },
        isNumber: function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();
            } else {
                return true;
            }
        }
    },
    computed: {
        ...mapGetters({
            'curencies': 'GET_CURRENCIES',
        }),
    },
    watch: {
        priceChoosed(to){
            this.tempData.to = to.to;
            this.tempData.from = to.from;
        },
    }
}
</script>
