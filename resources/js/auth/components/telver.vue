<template>
    <div class="yb-auth">
        <div class="yb-header">
            <img src="/img/system/logos/logo.png" alt="">
        </div>
        <div class="yb-auth-box yb-tm-box">
            <h1 class="yb-main-title">Подтверждение телефона</h1>
            <div class="yb-additional-auth">
                <div class="yb-auth-links"></div>
            </div>
            <form class="yb-auth-form" @submit.prevent>
                <yinput :type="'text'" :name="'tel_code'" :placeholder="'6 - значный код'" :callback="callback" :status="{message: form.tel_code.message, code: form.tel_code.code}" @yturn="telCodeYturn"></yinput>
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
        data: function(){
            return{
                form: {
                    tel_code: {value:null, code:0, message:null},
                },
                callback: false,
            }
        },
        methods: {
            ...mapActions(['GET_AUTH_VERIFY_CODE']),
            telCodeYturn(data){
                data['user'] = this.$route.params.user;
                this.GET_AUTH_VERIFY_CODE(data)
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
        },
        computed: {
            ...mapGetters(['AUTH_VERIFY']),
        },
        watch: {
            AUTH_VERIFY(to, from){
                if(to.status){
                    this.form[to.sended_data.name].code = 1;
                    this.form[to.sended_data.name].message = to.data;
                    this.form[to.sended_data.name].value = to.sended_data.model;
                }else{
                    if(to.data.status == 400){
                        this.form[to.sended_data.name].code = 2;
                        this.form[to.sended_data.name].message = to.data.data;
                        this.form[to.sended_data.name].value = to.sended_data.model;
                    }
                    else{
                        this.form[to.sended_data.name].code = 2;
                        this.form[to.sended_data.name].message = to.data.data.message;
                        this.form[to.sended_data.name].value = to.sended_data.model;
                    }

                }
            }
        }
    }
</script>
