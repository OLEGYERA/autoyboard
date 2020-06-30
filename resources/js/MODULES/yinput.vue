<template>
    <div class="yinput" :class="{error: status.code == 2, success: status.code == 1, helper: isMulty}">
        <div class="yinput-input-row" :class="{tg: toggled}">
            <input
                v-bind:type="type"
                v-bind:name="name"
                v-bind:ref="name"
                v-bind:placeholder="yplaceholder"
                v-model="model"
                @focus="Ytoggler(true)"
                @blur="Ytoggler(false)"
                v-on:keyup="doKeyEvent($event)"
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
        props: ['type', 'name', 'placeholder', 'status', 'yref'],
        mounted() {
            this.initMask(this.type)
            this.yplaceholder = this.placeholder;
        },
        data: function(){
            return{
                toggled: false,
                model: null,
                yplaceholder: null,
            }
        },
        methods: {
            Ytoggler(e, ref = false){
                this.toggled = e;
                if(!e){
                    if(this.type == 'multy'){
                        let type = null;
                        if(this.model !== null){
                            type = this.model.indexOf('+') == 0 ? 'tel' : 'email';
                        }
                        else{
                            type = 'email';
                        }
                        this.EmitInput({alias: 'login', name: type, model: this.model, ref: ref});
                    }
                    else{
                        this.EmitInput({alias: this.name, name: this.name, model: this.model, ref: ref});
                    }
                }else{
                    switch (this.type) {
                        case 'tel':
                            if(this.model == null){
                                this.model = '+380-(__)-__-__-___';
                            }
                            break;
                        case 'multy':
                           break;

                    }
                }
            },
            EmitInput(data){
                this.$emit('yturn', data)
            },
            initMask(type, force = false){
                switch (type) {
                    case 'tel':
                        Inputmask({mask: "+380-(99)-99-99-999", keepStatic: true, 'autoUnmask': false}).mask(this.$refs[this.name])
                        break;
                    case 'multy':
                        if(force){
                            if(this.model!== null && this.model.indexOf('+') == 0 && this.model.length == 1){
                                Inputmask({mask: "+380-(99)-99-99-999", 'autoUnmask': false}).mask(this.$refs[this.name])
                                this.model = '+380-(__)-__-__-___';
                            }
                        }
                        break;
                }
            },
            doKeyEvent(e){
                switch(e.key){
                    case 'Enter':
                        this.Ytoggler(false, 1);
                        break;
                    case 'Backspace':
                    case 'Delete':
                        if(this.model == '+380-(__)-__-__-___' || this.model == ''){
                            this.model = null;
                            Inputmask.remove(this.$refs[this.name]);
                        }
                        break;
                }
                console.log(e.key);
            }
        },
        computed: {
            isMulty(){
                return this.type == 'multy' && this.toggled && (this.model == null || this.model == '');
            }
        },
        watch: {
            yref(to, from){
                this.$refs[this.name].focus()
            },
            model(to){
                this.initMask(this.type, true);
                console.log(this.$refs[this.name].placeholder = 12021212);
            }
        }
    }
</script>
