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
        <div @click.stop v-if="showMenu && windowWidth > 768" class="ydrop-menu_vis">
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
                <ul class="y-menu-collumn_items">
                    <li v-for="subitem in topmenu[idxShowItem].submenu"
                        class="y-collumn_item"
                    > {{ subitem.title }}
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
        </div>
        <div @click.stop v-else-if="showMenu && windowWidth <= 768" class="ydrop-menu_vis mobile">
            <div v-if="showSubItem === false" class="yheader_item-menu">
                <div  class="ylocation-box">
                    <i class="loc_icon fas fa-map-marker-alt"></i>
                    <ylocation
                        :container="'header'"
                        :text="'Вся Украина'"
                        :list_style="'autocomplete-result'"
                        :drop_style="'autocomplete-results'"
                        :input_style="'dropdown-input'">
                    </ylocation>
                    <i
                        class="list-toggle fas fa-chevron-down"
                    >
                    </i>
                </div>
                <div  class="yb-lang-switcher yvis_menu">
                    <button class="ylang">UA</button>
                    <button class="ylang active">RU</button>
                </div>
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
        mounted() {
            document.addEventListener('click', this.handleClickOutside)
            this.onResize();
            console.log(this.windowWidth)
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data(){
            return{
                showMenu: false,
                windowWidth: 0,
                idxShowItem: 0,
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
                console.log(this.windowWidth)
            },
            openSub: function (index, item) {
                this.idxShowItem = index;
                this.showSubItem = true;
                this.selectedItem = item
                console.log(this.showSubItem)
                console.log('click')
            },
            closeSub(){
                this.showSubItem = false;
            }
        },
    }
</script>
