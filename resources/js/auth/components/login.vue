<template>
    <div class="yb-signup">
        <div class="yb-header">
            <img src="/img/system/logos/logo.png" alt="">
        </div>
        <div class="yb-signup-box yb-tm-box" v-if="!isformSendedSuccess">
            <h1 class="yb-main-title">Авторизация</h1>
            <div class="yb-additional-auth">
                <h2><span>через</span></h2>
                <div class="yb-auth-links">
                    <div class="yb-auth-link">
                        <img src="/img/system/icons/Facebook.png" alt="">
                    </div>
                    <div class="yb-auth-link">
                        <img src="/img/system/icons/Google.png" alt="">
                    </div>
                </div>
                <h2><span>или</span></h2>
            </div>
            <form class="yb-signup-form" @submit.prevent="signData">
                <yinput :type="'multy'" :name="'login'" :placeholder="'E-mail или телефон'" :status="form.login" @yturn="loginYturn"></yinput>
                <button type="submit" class="ybtn" :class="{disabled: !isformSuccess}">Продолжить</button>
            </form>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    import {mapGetters, mapActions} from 'vuex';
    export default {
        mounted() {
            console.log(this.$store.getters.SIGN_VERIFY, this.SIGN_VERIFY)
        },
        data: function(){
            return{
                form: {
                    login: {value:null, code:0, message:null, next:null, ref:false},
                },
                isformSuccess: false,
                isformSendedSuccess: false,
            }
        },
        methods: {
            ...mapActions(['GET_SIGN_VERIFY']),
            signData(e){
                this.checkSuccessingForm();
                if(this.isformSuccess){
                    HTTP.post(`auth/signup`, this.form)
                        .then(response => {
                            this.isformSendedSuccess = true;
                        })
                        .catch(error => {
                            console.log(error.response);
                        })
                }
            },
            checkSuccessingForm(){
                let self = this,
                    item_count = 0, // .length dont work
                    success_count = 0;
                setTimeout(function(){
                    Object.keys(self.form).forEach(function(key){
                        self.form[key].code == 1 ? success_count++ : '';
                        item_count++;
                    })
                    self.isformSuccess = success_count == item_count ? true : false;
                }, 150)
            },
            verifyYturn(data){
                HTTP.post(`auth/verify`, {
                    name: data.name,
                    data: data.model,
                })
                    // asdas@sadwa.asd
                    .then(response => {
                        console.log(type);
                        this.form[data.alias].code = 1;
                        this.form[data.alias].message = response.data;
                        this.form[data.alias].value = data.model;
                        if(data.ref && this.form[data.alias].next){
                            let reverse = !this.form[this.form[data.alias].next].ref;
                            this.form[this.form[data.alias].next].ref = reverse;
                        }
                    })
                    .catch(error => {
                        console.log(error.response);
                        this.form[data.alias].code = 2;
                        this.form[data.alias].message = error.response.data;
                    })
                this.checkSuccessingForm()
            },
            loginYturn(data){
                console.log(data);
                this.verifyYturn(data);
            },

            //except without http verification
            agreementYturn(data){
                this.form.agreement.code = data ? 1 : 2;
                this.form.agreement.value = data ? true : false;
                this.checkSuccessingForm()
            },
        },
        computed: {
            ...mapGetters(['SIGN_IS_LOGIN', 'SIGN_VERIFY']),
        }
    }
</script>
