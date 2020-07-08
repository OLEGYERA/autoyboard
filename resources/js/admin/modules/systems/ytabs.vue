<template>
    <ul class="ytabs">
        <li v-for="link in links" class="ytab-item" :class="{active: link.status}">
            <router-link :to="{name: link.route + '-list'}" class="item-link">{{link.title}}</router-link>
        </li>
    </ul>
</template>

<script>
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        props: ['links'],
        mounted() {

        },
        data: function(){
            return{

            }
        },
        methods: {

        },
        watch: {

        }
    }
</script>
