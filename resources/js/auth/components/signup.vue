<template>
    <div class="yb-page">
        <section class="yb-presentation">
            <img src="/img/animation.png" alt="">
        </section>
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

<!--                    <yinput :type="'text'" :name="'first_name'" :placeholder="'Имя'" :status="form.first_name" @yturn="fnameYturn"></yinput>-->
<!--                    <yinput :type="'text'" :name="'last_name'" :placeholder="'Фамилия'" :status="form.last_name" :yref="form.last_name.ref" @yturn="lnameYturn"></yinput>-->
<!--                    <yinput :type="'tel'" :name="'tel'" :placeholder="'Телефон'" :status="form.tel" :yref="form.tel.ref" @yturn="telYturn"></yinput>-->
<!--                    <yinput :type="'email'" :name="'email'" :placeholder="'E-mail'" :status="form.email" :yref="form.email.ref" @yturn="emailYturn"></yinput>-->
<!--                    <ycheck :label="'Я принимаю условия “Соглашения о предоставлении онлайн-сервисов”'" :name="'agreement'" :status="form.agreement" :yref="form.agreement.ref" @yturn="agreementYturn" ></ycheck>-->

                    <button type="submit" class="ybtn" :class="{disabled: !isformSuccess}">Продолжить</button>
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
    </div>
</template>

<script>
    import {HTTP} from '../../http.js'
    export default {
        mounted() {
        },
        data: function(){
            return{
                form: {
                    login: {value:null, code:0, message:null, next:null, ref:false},
                },
                // form: {
                //     first_name: {value:null, code:0, message:null, next:'last_name', ref:false},
                //     last_name: {value:null, code:0, message:null, next:'tel', ref:false},
                //     tel: {value:null, code:0, message:null, next:'email', ref:false},
                //     email: {value:null, code:0, message:null, next:'agreement', ref:false},
                //     agreement: {value:false, code:0, message:null, next:null, ref:false},
                // },
                isformSuccess: false,
                isformSendedSuccess: false,
            }
        },
        methods: {
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
                this.verifyYturn(data);
            },
            fnameYturn(data){
                this.verifyYturn(data);
            },
            lnameYturn(data){
                this.verifyYturn(data);
            },
            telYturn(data){
                if(data.model !== null){
                    data['model'] = data.model.replace(/\D/g, '');
                    this.verifyYturn( data);
                }
            },
            emailYturn(data){
                this.verifyYturn( data);
            },

            //except without http verification
            agreementYturn(data){
                this.form.agreement.code = data ? 1 : 2;
                this.form.agreement.value = data ? true : false;
                this.checkSuccessingForm()
            }
        },
        computed: {

        }
    }
</script>
