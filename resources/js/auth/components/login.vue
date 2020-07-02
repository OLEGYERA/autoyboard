<template>
    <div class="yb-auth">
        <div class="yb-header">
            <img src="/img/system/logos/logo.png" alt="">
        </div>
        <div class="yb-auth-box yb-tm-box">
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
            <form class="yb-auth-form" @submit.prevent="formValidation" :class="{'sign-teapot-alert': teapot}">
                <yinput :type="'multy'" :name="'login'" :placeholder="'E-mail или телефон'" :callback="callback" :status="{message: form.login.message, code: form.login.code}" :unique="form.login.unique" @yturn="loginYturn" @ywatch="loginYwatch"></yinput>
                <div class="sign-teapot-btn" v-if="teapot" @click="teapotCreation">Создать аккаунт</div>
                <div class="yb-auth-submiters">
                    <button type="submit" class="ybtn">Продолжить</button>
                    <div class="submit-changer">
                        <div class="changer-title">Ещё нет аккаунта?</div>
                        <router-link :to="'/'" class="changer-link">Зарегистрируйтесь</router-link>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    import {mapGetters, mapActions, mapMutations} from 'vuex';
    export default {
        mounted() {
            console.log(this.$store.getters.AUTH_VERIFY, this.AUTH_VERIFY)
        },
        data: function(){
            return{
                form: {
                    login: {value:null, code:0, message:null, next:null, ref:false, unique: false},
                },
                callback: false,
                teapot: false,
                isformSendedSuccess: false,
            }
        },
        methods: {
            ...mapActions(['GET_AUTH_VERIFY']),
            ...mapMutations(['SET_AUTH_TEAPOT_LOGIN']),
            loginYturn(data){
                this.GET_AUTH_VERIFY(data)
            },
            loginYwatch(){
                if(this.teapot) this.teapot = false;
            },
            formValidation(){
                let self = this,
                    item_count = 0, // .length dont work
                    success_count = 0;
                self.callback = !self.callback;  //verify all yinput

                setTimeout(function(){
                    Object.keys(self.form).forEach(function(key) {
                        self.form[key].code == 1 ? success_count++ : '';
                        item_count++;
                    });
                    success_count == item_count ? self.formSubmission() : '';
                }, 150);
            },
            formSubmission(){
                HTTP.post(`auth/auth`, this.form)
                    .then(response => {
                    })
                    .catch(error => {
                        console.log(error.response);
                    })
            },
            teapotCreation(){
                this.SET_AUTH_TEAPOT_LOGIN(this.form.login);
                console.log(this.AUTH_TEAPOT_LOGIN)
            }
        },
        computed: {
            ...mapGetters(['AUTH_VERIFY', 'AUTH_TEAPOT_LOGIN']),
        },
        watch: {
            AUTH_VERIFY(to, from){
                if(to.status){
                    this.form[to.sended_data.name].code = 1;
                    this.form[to.sended_data.name].message = to.data;
                    this.form[to.sended_data.name].value = to.sended_data.model;
                    if(to.sended_data.ref && this.form[to.sended_data.name].next){
                        let reverse = !this.form[this.form[to.sended_data.name].next].ref;
                        this.form[this.form[to.sended_data.name].next].ref = reverse;
                    }
                }else{
                    if(to.data.status == 418) this.teapot = true;
                    this.form[to.sended_data.name].code = 2;
                    this.form[to.sended_data.name].message = to.data.data;
                    this.form[to.sended_data.name].value = to.sended_data.model;
                }
            }
        }
    }
</script>
