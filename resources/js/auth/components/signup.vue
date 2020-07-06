<template>
    <div class="yb-auth">
        <div class="yb-header">
            <img src="/img/system/logos/logo.png" alt="">
        </div>
        <div class="yb-auth-box yb-tm-box" v-if="!isformSendedSuccess">
            <h1 class="yb-main-title">Регистрация</h1>
            <div class="yb-additional-auth">
                <h2><span>через</span></h2>
                <div class="yb-auth-links">
                    <a href="/authentication/facebook" class="yb-auth-link">
                        <img src="/img/system/icons/Facebook.png" alt="">
                    </a>
                    <a href="/authentication/google" class="yb-auth-link">
                        <img src="/img/system/icons/Google.png" alt="">
                    </a>
                </div>
                <h2><span>или</span></h2>
            </div>
            <form class="yb-auth-form" @submit.prevent>
                <yinput :type="'multy'" :name="'login'" :value="form.login.value" :placeholder="'E-mail или телефон'" :yref="form.login.ref" :callback="callback" :status="{message: form.login.message, code: form.login.code}" :unique="form.login.unique" @yturn="loginYturn" @ywatch="loginYwatch"></yinput>
                <div class="sign-teapot-btn" v-if="teapot" @click="teapotAuth">Ваш логин?</div>
                <yinput :type="'text'" :name="'first_name'" :placeholder="'Имя'" :status="{message: form.first_name.message, code: form.first_name.code}" :yref="form.first_name.ref" :callback="callback" @yturn="fnameYturn"></yinput>
                <yinput :type="'text'" :name="'last_name'" :placeholder="'Фамилия'" :status="{message: form.last_name.message, code: form.last_name.code}" :yref="form.last_name.ref" :callback="callback" @yturn="lnameYturn"></yinput>
                <ycheck :label="'Я принимаю условия “Соглашения о предоставлении онлайн-сервисов”'" :name="'agreement'" :status="{code: form.agreement.code}" :yref="form.agreement.ref" :callback="callback" @yturn="agreementYturn" ></ycheck>
                <div class="yb-auth-submiters">
                    <div class="ybtn" @click="formValidation">Продолжить</div>
                    <div class="submit-changer">
                        <div class="changer-title">Уже есть аккаунта?</div>
                        <router-link :to="{name: 'signin'}" class="changer-link">Войдите</router-link>
                    </div>
                </div>
            </form>
        </div>
        <div class="yb-success-box yb-tm-box" v-else>
            <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" viewBox="0 0 512 512"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/></svg>
            <div class="success-alert">
                Ключ подтверждения отправлен на почту.
            </div>
            <div class="manage-links">
                <a href="/">Войти</a>
            </div>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        mounted() {
            this.SET_VERIFY_PAGE_NAME(this.$router.currentRoute.name);
            if(this.AUTH_TEAPOT_LOGIN !== null && this.AUTH_TEAPOT_LOGIN.isNew){
                this.form.login.value = '';
                let self = this;
                setTimeout(function(){
                }, 0);
            }
        },
        data: function(){
            return{
                form: {
                    login: { value:null, code:0, message:null, next:'first_name', ref:false, unique: true},
                    first_name: {value:null, code:0, message:null, next:'last_name', ref:false},
                    last_name: {value:null, code:0, message:null, next:'agreement', ref:false},
                    agreement: {value:false, code:0, message:null, next:null, ref:false},
                },
                callback: false,
                teapot: false,


                isformSendedSuccess: false,
            }
        },
        methods: {
            ...mapMutations(['SET_VERIFY_PAGE_NAME', 'SET_AUIH_VERIFY', 'SET_AUTH_TEAPOT_LOGIN']),
            ...mapActions(['GET_AUTH_VERIFY']),

            loginYturn(data){
                this.GET_AUTH_VERIFY(data)
            },
            loginYwatch(){
                if(this.teapot) this.teapot = false;
            },
            fnameYturn(data){
                this.GET_AUTH_VERIFY(data)
            },
            lnameYturn(data){
                this.GET_AUTH_VERIFY(data)
            },
            //except without http verification
            agreementYturn(data){
                this.form.agreement.code = data ? 1 : 2;
                this.form.agreement.value = data ? true : false;
                // this.checkSuccessingForm()
            },
            teapotAuth(){
                this.SET_AUTH_TEAPOT_LOGIN({data: this.form.login, isNew: false});
                this.$router.push({name: 'signin'})
            },

            formValidation(){
                let self = this,
                    item_count = 0, // .length dont work
                    success_count = 0;
                self.callback = !self.callback;  //verify all yinput

                //check validator
                if(this.form.agreement.code != 1) this.form.agreement.code = 2

                setTimeout(function(){
                    Object.keys(self.form).forEach(function(key) {
                        self.form[key].code == 1 ? success_count++ : '';
                        item_count++;
                    });
                    success_count == item_count ? self.formSubmission() : '';
                }, 150);
            },
            formSubmission(){
                HTTP.post(`auth/signup`, this.form).then(response => {
                    this.$router.push({name: 'telver', params: {user: response.data.id}})
                })
            },
        },
        computed: {
            ...mapGetters(['AUTH_VERIFY', 'AUTH_TEAPOT_LOGIN']),
        },
        watch: {
            AUTH_VERIFY(to, from){
                if(to.verify_page_name == this.$router.currentRoute.name) {
                    if (to.status) {
                        console.log(to);
                        this.form[to.sended_data.name].code = 1;
                        this.form[to.sended_data.name].message = to.data;
                        this.form[to.sended_data.name].value = to.sended_data.model;
                        this.form[to.sended_data.name].alias = to.sended_data.alias;
                        if (to.sended_data.ref && this.form[to.sended_data.name].next !== null) {
                            let reverse = !this.form[this.form[to.sended_data.name].next].ref;
                            this.form[this.form[to.sended_data.name].next].ref = reverse;
                            console.log(this.form[this.form[to.sended_data.name].next].ref)
                        }
                    } else {
                        if (to.data.status == 418) this.teapot = true;
                        this.form[to.sended_data.name].code = 2;
                        this.form[to.sended_data.name].message = to.data.data;
                        this.form[to.sended_data.name].value = to.sended_data.model;
                    }
                }
            }
        }
    }
</script>
