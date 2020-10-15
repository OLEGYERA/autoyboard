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
            :shade="true"
            :options="currency"
            :placeholder="12"></ydropdown>

    </div>
</template>
<script>

export default{
    mounted() {

    },
    data() {
        return{
            currency: [{name: '$'}, {name: '₴'}, {name: '€'} ],
            minRange: null,
            maxRange: null,
        }
    },


}
</script>

