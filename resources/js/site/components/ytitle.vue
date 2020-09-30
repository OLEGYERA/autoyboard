<template>
    <div class="ytitle">
        <h2>{{title}}</h2>
        <div class="change_visible">
            <button class="change_view active">
                <i class="fas fa-th"></i>
            </button>
            <button class="change_view">
                <i class="fas fa-th-list"></i>
            </button>
        </div>
    </div>
</template>

<script>
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
    }
}
</script>
