<template>
    <div class="yselector" :class="size">
        <h2 class="yselector-title" @click="menuStatus = !menuStatus" :class="{active: menuStatus}">
            <span v-if="optionSelID === null || optionSelID == 0 ">Сортировка</span>
            <span v-else>{{optionSelData.title}}</span>
            <i class="ynav-list-toggle fas" :class="menuStatus ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
        </h2>
        <ul class="yselector-menu" v-if="menuStatus">
            <li v-for="(option, key) in options"
                class="menu-option"
                :class="{active: option.id == optionSelID}"
                @click="selectOption(option.id)"
            >
                {{option.title}}
            </li>
        </ul>
    </div>
</template>


<script>
    export default {
        props: ['size'],
        mounted() {
        },
        data: function(){
            return{
                menuStatus: 0,
                optionSelID: 0,
                options: [
                    {id:0, title: 'По Умолчанию'},
                    {id:1, title: 'По Старым'},
                    {id:2, title: 'По Новым'}
                ]
            }
        },
        methods: {
            selectOption(id){
                this.optionSelID = id;
                this.menuStatus = 0;
            }
        },
        computed: {
            optionSelData(){
                let self = this;
                return this.options.find((option) => option.id === this.optionSelID)
            }
        },
        watch: {

        }
    }
</script>
