<template>
    <div class="selected-items">
        <!--bodies-->
        <div class="selected-item" v-for="body in GET_TRANSPORT_BODIES" v-if="isEqualBodies(body.val)">
            {{body.name}}<i class="yicon cancel" @click="SET_TRANSPORT_BODY_CHOOSE(body.val)"></i>
        </div>
        <div class="selected-item" v-for="body in GET_TRANSPORT_BODIES" v-if="isEqualBodies(body.val)">
            {{body.name}}<i class="yicon cancel" @click="SET_TRANSPORT_BODY_CHOOSE(body.val)"></i>
        </div>
    </div>
</template>
<script>
    import {mapState, mapGetters, mapActions, mapMutations} from 'vuex';
    export default{
        mounted() {
            console.log(this.type, 123)
        },
        methods: {
            ...mapMutations(['SET_TRANSPORT_BODY_CHOOSE']),
            isEqualBodies(val){
                let b = this.GET_TRANSPORTS.bodiesChoosed.find(el => {
                    if(el == val) {
                        console.log(el.val)
                        return true
                    }
                })

                if(b !== undefined){
                    return true;
                }
                return false;
            },
        },
        computed: {
            ...mapGetters([
                'GET_TRANSPORTS',
                'GET_TRANSPORT_BODIES'
            ]),
        },
        watch: {
            type(to, from){
                console.log(to)
            }
        }
    }
</script>

