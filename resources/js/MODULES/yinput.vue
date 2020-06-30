<template>
    <div class="yinput" :class="{error: status.code == 2, success: status.code == 1}">
        <div class="yinput-input-row" :class="{tg: toggled}">
            <input
                v-bind:type="type"
                v-bind:name="name"
                v-bind:ref="name"
                v-bind:placeholder="placeholder"
                v-model="model"
                @focus="Ytoggler(true)"
                @blur="Ytoggler(false)"
                v-on:keyup.enter="Ytoggler(false, 1)"
                autocomplete="off"
                >
            <div class="yinput-icon">
                <img src="/img/system/icons/success.png" alt="" v-if="status.code == 1">
                <img src="/img/system/icons/error.png" alt="" v-else-if="status.code == 2">
            </div>
        </div>
        <div class="yinput-alert-row" v-if="status.code == 2" v-html="status.message"></div>
    </div>
</template>

<script>
    import Inputmask from "inputmask";

    export default {
        props: ['type', 'name', 'placeholder', 'status', 'yref'],
        mounted() {
            if(this.type == 'tel') Inputmask({mask: "+380-(99)-99-99-999", keepStatic: true, 'autoUnmask': false}).mask(this.$refs[this.name]);

        },
        data: function(){
            return{
                toggled: false,
                model: null,
            }
        },
        methods: {
            Ytoggler(e, ref = false){
                this.toggled = e;
                if(!e){
                    this.EmitInput(ref);
                }else{
                    if(this.type == 'tel' && this.model == null) this.model = '+380-(__)-__-__-___'
                }
            },
            EmitInput(ref){
                this.$emit('yturn', {model: this.model, ref: ref})
            },
        },
        watch: {
            yref(to, from){
                this.$refs[this.name].focus()
            }
        }
    }
</script>
