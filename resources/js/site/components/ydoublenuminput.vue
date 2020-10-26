<template>
    <div class="ydoublenuminput" :class="{black: shade !== undefined}">
        <input
            class="input-field"
            v-model="doubleData.from"
            placeholder="От"
            :maxlength="5"
            @change="watchData"
            @keypress="isNumber($event)">
        <input
            class="input-field"
            v-model="doubleData.to"
            placeholder="До"
            :maxlength="5"
            @change="watchData"
            @keypress="isNumber($event)">
    </div>
</template>
<script>
export default{
    props: ['doubleChoosed', 'shade'],
    mounted(){
        this.doubleData = this.doubleChoosed;
    },
    data() {
        return{
            doubleData: {
                from: null,
                to: null,
            }
        }
    },
    methods: {
        watchData(){
            if(Number(this.doubleData.from) > Number(this.doubleData.to) && this.doubleData.to !== null && this.doubleData.to !== ''){
                let tempVar = this.doubleData.from;
                this.doubleData.from = Number(this.doubleData.to);
                this.doubleData.to = Number(tempVar);
            }
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
    watch: {
        doubleChoosed(to){
            this.doubleData = to;
        },
    }
}
</script>

