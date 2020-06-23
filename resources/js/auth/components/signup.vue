<template>
    <div class="yb-page">
        <section class="yb-presentation">
            <img src="/img/animation.png" alt="">
        </section>
        <div class="yb-signup">
            <div class="yb-header">
                <img src="/img/system/logos/logo.png" alt="">
            </div>
            <div class="yb-signup-box yb-tm-box">
                <h1 class="yb-main-title">Регистрация на сайте <span class="yb-gradient">AutoYBoard</span></h1>
                <div class="yb-additional-auth">
                    <h2>Зарегистрироваться через</h2>
                    <div class="yb-auth-links">
                        <div class="yb-auth-link">
                            <img src="/img/system/icons/Facebook.png" alt="">
                        </div>
                        <div class="yb-auth-link">
                            <img src="/img/system/icons/Google.png" alt="">
                        </div>
                    </div>
                </div>
                <form class="yb-signup-form" @submit.prevent>
                    <yinput
                        :type="'text'"
                        :name="'first_name'"
                        :placeholder="'Имя'"
                        :status="form.first_name"
                        @yturn="fnameYturn"
                    ></yinput>
                    <yinput
                        :type="'text'"
                        :name="'last_name'"
                        :placeholder="'Фамилия'"
                        :status="form.last_name"
                        :yref="form.last_name.ref"
                        @yturn="lnameYturn"
                    ></yinput>
                    <yinput
                        :type="'tel'"
                        :name="'tel'"
                        :placeholder="'Телефон'"
                        :status="form.tel"
                        :yref="form.tel.ref"
                        @yturn="telYturn"
                    ></yinput>
                    <yinput
                        :type="'email'"
                        :name="'email'"
                        :placeholder="'E-mail'"
                        :status="form.email"
                        :yref="form.email.ref"
                        @yturn="emailYturn"
                    ></yinput>
<!--                    <yinput-->
<!--                        :type="'loc'"-->
<!--                        :name="'country'"-->
<!--                        :placeholder="'Страна'"-->
<!--                        :status="form.country"-->
<!--                        :yref="form.country.ref"-->
<!--                        @yturn="countryYturn"-->
<!--                    ></yinput>-->
<!--                    <yinput-->
<!--                        :type="'loc'"-->
<!--                        :name="'city'"-->
<!--                        :placeholder="'Город'"-->
<!--                        :status="form.city"-->
<!--                        :yref="form.city.ref"-->
<!--                        @yturn="cityYturn"-->
<!--                    ></yinput>-->

                    <ycheck
                        :label="'Я принимаю условия “Соглашения о предоставлении онлайн-сервисов”'"
                        :status="0"
                    ></ycheck>

                    <button class="ybtn">
                        Продолжить
                    </button>
                </form>
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
                    first_name: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: 'last_name',
                        ref: false
                    },
                    last_name: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: 'tel',
                        ref: false
                    },
                    tel: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: 'email',
                        ref: false
                    },
                    email: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: 'country',
                        ref: false
                    },
                    country: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: 'city',
                        ref: false
                    },
                    city: {
                        //status
                        code: 0,
                        message: null,
                        //ref
                        next: null,
                        ref: false
                    }
                }
            }
        },
        methods: {
            verifyYturn(type, data){
                console.log(data)

                HTTP.post(`auth/verify`, {
                    type: type,
                    data: data.model,
                })
                    .then(response => {
                        this.form[type].code = 1;
                        this.form[type].message = response.data;
                        if(data.ref){
                            let reverse = !this.form[this.form[type].next].ref;
                            this.form[this.form[type].next].ref = reverse;
                        }
                    })
                    .catch(error => {
                        this.form[type].code = 2;
                        this.form[type].message = error.response.data;
                    })
            },
            fnameYturn(data){
                this.verifyYturn('first_name', data);
            },
            lnameYturn(data){
                this.verifyYturn('last_name', data);
            },
            telYturn(data){
                if(data.model !== null){
                    data['model'] = data.model.replace(/\D/g, '');
                    this.verifyYturn('tel', data);
                }
            },
            emailYturn(data){
                this.verifyYturn('email', data);
            },
            countryYturn(data){
                this.verifyYturn('country', data);
            },
            cityYturn(data){
                this.verifyYturn('city', data);
            },
        },
        watch: {

        }
    }
</script>
