<template>
    <div @click="showMenu = !showMenu" class="ymenu">
        <div class="ymenu-visual">
            <div class="vis-l">
               <div class="vis-burger">
                   <span></span>
                   <span></span>
                   <span></span>
               </div>
                <span class="ymenu-title">Меню: Авто</span>
            </div>
            <div class="vis-r">
                <i
                    :class="{'fa-chevron-up' :showMenu, 'fa-chevron-down':  !showMenu}"
                    class="fas"></i>
            </div>
        </div>
        <div @click.stop v-if="showMenu  && windowWidth > 768" class="ydrop-menu_vis">
            <div class="yb_menu-collumn first_choice">
                <ul class="y-menu-collumn_items">
                    <li
                        v-for="(item, index) in topmenu"
                        @click="openSub(index, item)"
                        :class="{'active' : idxShowItem === index}"
                        class="y-collumn_item"
                    >
                        {{item.title}}
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="yb_menu-collumn second_choice">
                <ul v-if="idxShowItem != null" class="y-menu-collumn_items">
                    <li  v-for="subitem in topmenu[idxShowItem].submenu"
                        class="y-collumn_item"
                    > {{ subitem.title }}
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
        </div>
        <div @click.stop v-else-if="showMenu && windowWidth <= 768" class="ydrop-menu_vis mobile">
            <div v-if="showSubItem === false" class="yheader_item-menu">
                <div  class="yb-lang-switcher yvis_menu">
                    <button class="ylang">UA</button>
                    <button class="ylang active">RU</button>
                </div>
                <svg @click="showMenu = false" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.46585 7.99996L15.6959 1.76969C16.1014 1.36443 16.1014 0.709193 15.6959 0.30394C15.2907 -0.101313 14.6354 -0.101313 14.2302 0.30394L7.99991 6.53421L1.76983 0.30394C1.36438 -0.101313 0.709336 -0.101313 0.304082 0.30394C-0.101361 0.709193 -0.101361 1.36443 0.304082 1.76969L6.53417 7.99996L0.304082 14.2302C-0.101361 14.6355 -0.101361 15.2907 0.304082 15.696C0.506045 15.8981 0.771595 15.9997 1.03696 15.9997C1.30232 15.9997 1.56768 15.8981 1.76983 15.696L7.99991 9.4657L14.2302 15.696C14.4323 15.8981 14.6977 15.9997 14.9631 15.9997C15.2284 15.9997 15.4938 15.8981 15.6959 15.696C16.1014 15.2907 16.1014 14.6355 15.6959 14.2302L9.46585 7.99996Z" fill="#0B3F8D"/>
                </svg>
            </div>
            <div class="ymenu_item-row">
                <div v-if="showSubItem === false"  class="yb_menu-collumn first_choice">
                    <ul class="y-menu-collumn_items">
                        <li
                            v-for="(item, index) in topmenu"
                            @click="openSub(index, item)"
                            :class="{'active' : idxShowItem === index}"
                            class="y-collumn_item"
                        >
                            {{item.title}}
                            <i class="fas fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
                <div v-else class="yb_menu-collumn second_choice">
                    <span @click="closeSub()" class="yselect_hide">
                        <i class="fas fa-angle-left"></i>
                        {{selectedItem.title}}
                    </span>
                    <ul class="y-menu-collumn_items">
                        <li class="y-collumn_item"
                            v-for="subitem in topmenu[idxShowItem].submenu"
                        >{{ subitem.title }}
                            <i class="fas fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export  default {
        props: ['lang'],
        mounted() {
            document.addEventListener('click', this.handleClickOutside)
            this.onResize();
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data(){
            return{
                showMenu: false,
                windowWidth: 0,
                idxShowItem: null,
                showSubItem: false,
                selectedItem: '',

                topmenu: [
                    { title: "Поиск авто и автотоваров",
                        submenu: [
                            {title: 'Ремонт авто 1'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Ремонт авто'},
                        ]
                    },
                    {
                        title: "Услуги для авто",
                        submenu: [
                            {title: 'Поиск авто и автотоваров 2'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Ремонт авто'},
                        ],
                    },
                    {
                        title: 'Ремонт авто',
                        submenu: [
                            {title: 'Ремонт авто 3'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Услуги для авто'},
                            {title: 'Поиск авто и автотоваров'},
                            {title: 'Ремонт авто'},
                        ],
                    },
                    {
                        title: 'Каталог СТО',
                        submenu: [
                            { title: "Стол заказа запчастей 4"},
                            { title: "Автозапчасти"},
                            { title: "Каталог СТО"},
                            { title: "Каталог авторазборок"},
                            { title: "Поиск авто и автотоваров"},
                            { title: "Каталог СТО"},
                            { title: "Поиск авто и автотоваров"},
                        ],
                    },
                    {
                        title: 'Автозапчасти',
                        submenu: [
                            { title: "Стол заказа запчастей 5"},
                            { title: "Автозапчасти"},
                            { title: "Каталог СТО"},
                            { title: "Каталог авторазборок"},
                            { title: "Поиск авто и автотоваров"},
                            { title: "Каталог СТО"},
                            { title: "Поиск авто и автотоваров"},
                        ],
                    },
                    {
                        title: 'Каталог авторазборок',
                        submenu: [
                            { title: "Стол заказа запчастей 6"},
                            { title: "Автозапчасти"},
                            { title: "Каталог СТО"},
                            { title: "Каталог авторазборок"},
                            { title: "Поиск авто и автотоваров"},
                            { title: "Каталог СТО"},
                            { title: "Поиск авто и автотоваров"},
                        ],
                    },
                ],
            }
        },
        methods: {
            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.showMenu = false;
                }
            },
            onResize() {
                this.windowWidth = document.documentElement.clientWidth;
            },
            openSub(index, item) {
                this.idxShowItem = index;
                this.showSubItem = true;
                this.selectedItem = item
            },
            closeSub(){
                this.showSubItem = false;
                this.selectedItem = ''
                this.idxShowItem = null;
            }
        },
        watch:{
            windowWidth: function(res){
            },
            showMenu: function (to){
                to ? $('#yb-site').addClass('y_shadow-absolute') : $('#yb-site').removeClass('y_shadow-absolute')
            }
        }
    }
</script>
