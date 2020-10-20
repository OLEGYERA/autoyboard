<template>
    <div class="yprice">
        <input
            class="change"
            v-model="minRange"
            type="number"
            placeholder="От">
        <input
            class="change"
            v-model="maxRange"
            type="number"
            placeholder="До">
        <ydropdown
            @updateChoosed="SET_CURRENCY_CHOOSED($event)"
            :options="curencies"
            :placeholder="'Валюта'"
            :choosedItem="searchDeatils.currencyChoosed"></ydropdown>
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
            'SET_CURRENCY_CHOOSED'
        ]),
    },
    computed: {
        ...mapGetters({
            'curencies': 'GET_CURRENCIES',
            'searchDeatils': 'GET_SEARCHDETAILS'
        }),
    }
}
</script>

