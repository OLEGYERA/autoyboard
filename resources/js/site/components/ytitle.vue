<template>
    <div class="ytitle">
        <h2>{{title}}</h2>
        <div class="change_visible">
            <button
                @click="changeVisible = false"
                class="change_view "
                :class="{'active': changeVisible == false}"
            >
                <i class="fas fa-th"></i>
            </button>
            <button
                @click="changeVisible = true"
                class="change_view"
                :class="{'active' : changeVisible}"
            >
                <i class="fas fa-th-list"></i>
            </button>
        </div>
    </div>
</template>

<script>
<<<<<<< HEAD
    import {HTTP} from "../../http.js";
    export default{
    props: ['title'],
    mounted(){
      this.test();
    },
    methods: {
        test(){
            HTTP.get(`/transport_type`)
                .then(response => {

                }).catch(error =>{
            })
        }
=======
export default{
    props: ['title'],
    data(){
        return{
            changeVisible: false,
        }
    },
    watch: {
        changeVisible(to){
            this.$emit('getStatus', to)
            console.log(this.changeVisible)
        },
>>>>>>> origin/frontArtur
    }
}
</script>
