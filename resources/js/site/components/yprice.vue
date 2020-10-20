<template>
    <div class="yprice">
        <input
            class="change"
            v-model="searchDeatils.priceChoosed.from"
            placeholder="От"
            :maxlength="10"
            @keypress="isNumber($event)">
        <input
            class="change"
            v-model="searchDeatils.priceChoosed.to"
            placeholder="До"
            :maxlength="10"
            @keypress="isNumber($event)">
        <ydropdown
            @updateChoosed="SET_PRICE_CHOOSED({name: 'currency', val: $event})"
            :options="curencies"
            :placeholder="'Валюта'"
            :choosedItem="searchDeatils.priceChoosed.currency"></ydropdown>
    </div>
</template>
<script>
import {mapGetters, mapActions, mapMutations} from 'vuex';
export default{
    data() {
        return{
            minRange: null,
            maxRange: null,
        }
    },
    methods: {
        ...mapMutations([
            'SET_PRICE_CHOOSED'
        ]),
        isNumber: function(evt) {
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
                evt.preventDefault();;
            } else {
                return true;
            }
        }
    },
    computed: {
        ...mapGetters({
            'curencies': 'GET_CURRENCIES',
            'searchDeatils': 'GET_SEARCHDETAILS'
        }),
    },
}
</script>

