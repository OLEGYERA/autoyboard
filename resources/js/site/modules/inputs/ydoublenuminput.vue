<template>
    <div class="ydoublenuminput" :class="{black: shade !== undefined}">
        <input
            class="input-field"
            v-model="tempData.from"
            placeholder="От"
            :maxlength="5"
            @blur="watchData"
            @keypress="isNumber($event)">
        <input
            class="input-field"
            v-model="tempData.to"
            placeholder="До"
            :maxlength="5"
            @blur="watchData"
            @keypress="isNumber($event)">
    </div>
</template>
<script>
export default{
    props: ['doubleChoosed', 'shade'],
    mounted(){
        this.tempData.to = this.doubleChoosed.to;
        this.tempData.from = this.doubleChoosed.from;
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
        watchData(){
            if(Number(this.tempData.from) > Number(this.tempData.to) && this.tempData.to !== null && this.tempData.to !== ''){
                let tempVar = this.tempData.from;
                this.tempData.from = Number(this.tempData.to);
                this.tempData.to = Number(tempVar);
            }

            this.doubleChoosed.from = this.tempData.from;
            this.doubleChoosed.to = this.tempData.to;
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
            this.tempData.to = to.to;
            this.tempData.from = to.from;
        },
    }
}
</script>

