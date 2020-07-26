<template>
    <div class="ylocation-visual">
        <figure class="country">
            <img :src="'img/system/flags/' + country[country_id].img" alt="">
        </figure>
        <div class="city">
            {{country[country_id].city[city_id].name}}
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";

    export default {
        props: ['country_id', 'city_id'],
        created() {
            console.log(this.country[this.country_id])
        },
        data: function(){
            return{
                country: [
                    {id: 0, name: 'Украина', img: 'ukraine.svg', city: [
                            {id: 0, name: 'Киев'}
                        ]
                    }
                ]
            }
        },
        methods: {

        },
        computed: {

        },
        watch: {

        }
    }
</script>
