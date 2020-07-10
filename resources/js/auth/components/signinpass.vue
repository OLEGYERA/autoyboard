<template>
    <div class="yb-auth">
        <div class="yb-header">
            <img src="/img/system/logos/logo.png" alt="">
        </div>
        <div class="yb-auth-box yb-tm-box">
            <h1 class="yb-main-title">Вход</h1>
            <div class="yb-login-info">
                <figure class="login-avatar">
                    <img v-bind:src="user.avatar_original" alt="">
                </figure>
                <div class="login-name">
                    {{user.last_name}} {{user.first_name}}
                </div>
            </div>
            <form class="yb-auth-form" @submit.prevent>
                <yinput :type="'password'" :name="'password'" :value="form.password.value" :placeholder="'Пароль'" :callback="callback" :status="{message: form.password.message, code: form.password.code}" @yturn="passwordYturn"></yinput>
                <div class="yb-auth-submiters">
                    <div class="ybtn" @click="formValidation">Продолжить</div>
                    <div class="submit-changer">
                        <div class="changer-title">Ещё нет аккаунта?</div>
                        <router-link :to="{name: 'signup'}" class="changer-link">Зарегистрируйтесь</router-link>
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
            this.GET_AUTH_USER({login: this.$route.params.login})
        },
        data: function(){
            return{
                form: {
                    password: {value:null, code:0, message:null},
                },
                user: [],
                callback: false,
            }
        },
        methods: {
            // ...mapMutations(['SET_VERIFY_PAGE_NAME', 'SET_AUIH_VERIFY', 'SET_AUTH_TEAPOT_LOGIN']),
            ...mapActions(['GET_AUTH_VERIFY', 'GET_AUTH_USER']),
            passwordYturn(data){
                this.GET_AUTH_VERIFY(data)
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
            },
        },
        computed: {
            ...mapGetters(['AUTH_USER', 'AUTH_VERIFY']),
        },
        watch: {
            AUTH_USER(to, from){
                console.log(to);
                if(to.status == 0){
                    this.$router.push({name: 'signin'})
                }else{
                    this.user = to.data;
                }
            },
            AUTH_VERIFY(to, from){
                if(to.verify_page_name == this.$router.currentRoute.name){
                    if(to.status){
                        this.form[to.sended_data.name].code = 1;
                        this.form[to.sended_data.name].message = to.data;
                        this.form[to.sended_data.name].value = to.sended_data.model;
                        this.form[to.sended_data.name].alias = to.sended_data.alias;
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
    }
</script>
