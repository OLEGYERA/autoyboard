<template>
    <div class="app-list" >
        <ytable
            :tableContent="tableContent"
        ></ytable>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        created() {
        },
        data: function(){
            return{
                tableContent: {
                    cols: [
                        {name: 'id', title: 'ID', size: 's'},
                        {name: 'status', title: 'Статаус', size: 'm'},
                        {name: 'address', title: 'Адрес', size: 'l'},
                        {name: 'ban', title: 'Бан-статус', size: 'm'},
                        {name: 'timeLife', title: 'Срок действия', size: 'l'},
                    ],
                }
            }
        },
        methods: {
            // ...mapMutations(['SET_USER_DATA']),
            // ...mapActions(['GET_USER_DATA']),
        },
        computed: {
            // ...mapGetters(['USER_DATA']),
        },
        watch: {

        }
    }
</script>
