<template>
    <div class="yinput" :class="{error: status.code == 2, success: status.code == 1, helper: isMulty}">
        <div class="yinput-input-row" :class="{tg: toggled}">
            <input
                v-bind:type="type"
                v-bind:name="name"
                v-bind:ref="name"
                v-bind:placeholder="placeholder"
                v-model="model"
                @focus="Ytoggler(true)"
                @blur="Ytoggler(false)"
                v-on:keydown="doKeyEvent($event)"
                autocomplete="off"
                >
            <div class="yinput-icon">
                <img src="/img/system/icons/success.png" alt="" v-if="status.code == 1">
                <img src="/img/system/icons/error.png" alt="" v-else-if="status.code == 2">
            </div>
        </div>
        <div class="yinput-helper" v-if="isMulty">
            <b>+</b> для ввода номера телефона
        </div>
        <div class="yinput-alert-row" v-if="status.code == 2" v-html="status.message"></div>
    </div>
</template>

<script>
    import Inputmask from "inputmask";

    export default {
        props: ['type', 'name', 'placeholder', 'callback', 'status', 'yref', 'unique'],
        mounted() {
            if(this.type == 'tel') Inputmask({mask: "+380-(99)-99-99-999", keepStatic: true, 'autoUnmask': false}).mask(this.$refs[this.name])
        },
        data: function(){
            return{
                toggled: false,
                model: null,
            }
        },
        methods: {
            Ytoggler(toggle, ref = false){
                this.toggled = toggle;
                if(toggle){
                    if(this.type == 'tel' && this.model == null) this.model = '+380-(__)-__-__-___';
                }else{
                    let alias = (this.type == 'multy') ? (this.model !== null ? (this.model.indexOf('+') == 0 ? 'tel' : 'email') : 'email') : this.name;
                    let model = alias == 'tel' ? this.model.replace(/\D/g, '') : this.model;

                    this.$emit('yturn', {alias: alias, name: this.name, model: model, ref: ref, unique: this.unique});
                }
            },
            doKeyEvent(e){
                switch(e.key){
                    case 'Enter':
                        this.Ytoggler(false, true);
                        break;
                    case 'Backspace':
                    case 'Delete':
                        if(this.type == 'multy' && this.model == '+380-(__)-__-__-___' || this.model == ''){
                            this.model = null;
                            Inputmask.remove(this.$refs[this.name]);
                            this.$refs[this.name].placeholder = this.placeholder;
                        }
                        break;
                }
            }
        },
        computed: {
            isMulty(){
                return this.type == 'multy' && this.toggled && (this.model == null || this.model == '');
            }
        },
        watch: {
            callback(){
                this.Ytoggler(false, false);
            },
            yref(to, from){
                this.$refs[this.name].focus()
            },
            model(to){
                this.$emit('ywatch');
                if(this.type == 'multy' && this.model !== null && this.model.indexOf('+') == 0 && this.model.length == 1){
                    Inputmask({mask: "+380-(99)-99-99-999", 'autoUnmask': false}).mask(this.$refs[this.name])
                    this.model = '+380-(__)-__-__-___';
                }
            }
        }
    }
</script>
