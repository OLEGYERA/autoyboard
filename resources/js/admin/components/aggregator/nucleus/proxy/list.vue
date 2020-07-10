<template>
    <div class="app-list" >
        <ytable
            :tableContent="tableContent"
            :apiURL="`${apiURL}/${modelURL}`"
        ></ytable>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        props: ['apiURL'],
        created() {
            console.log(this.apiURL)
        },
        data: function(){
            return{
                modelURL: 'proxy',
                tableContent: {
                    cols: [
                        {name: 'id', title: 'ID', size: 's'},
                        {name: 'status', title: 'Статаус', size: 'm'},
                        {name: 'address', title: 'Адрес', size: 'l', group: [
                            'country', 'city', 'ip'
                        ]},
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
