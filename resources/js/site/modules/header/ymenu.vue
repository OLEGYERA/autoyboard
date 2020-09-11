<template>
    <div @click="showMenu = true" class="ymenu">
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
        <div v-if="showMenu" class="ydrop-menu_vis">
            <div class="yb_menu-collumn first_choice">
                <ul class="y-menu-collumn_items">
                    <li class="y-collumn_item active">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Услуги для авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item ">Услуги для авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item"> Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item ">Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="yb_menu-collumn second_choice">
                <ul class="y-menu-collumn_items">
                    <li class="y-collumn_item ">Каталог СТО
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Каталог авторазборок
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Автозапчасти
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item active"> Стол заказа запчастей
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Автозапчасти
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item"> Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item ">Каталог авторазборок
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="yb_menu-collumn second_choice">
                <ul class="y-menu-collumn_items">
                    <li class="y-collumn_item ">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Услуги для авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item ">Услуги для авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item"> Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                    <li class="y-collumn_item active">Поиск авто и автотоваров
                        <i class="fas fa-angle-right"></i>
                    </li>
                </ul>
            </div>
            <div class="yb_menu-collumn second_choice">
                <ul class="y-menu-collumn_items">
                    <li class="y-collumn_item ">Ремонт авто
                    </li>
                    <li class="y-collumn_item active">Услуги для авто
                    </li>
                    <li class="y-collumn_item">Поиск авто и автотоваров
                    </li>
                    <li class="y-collumn_item ">Услуги для авто
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                    </li>
                    <li class="y-collumn_item">Ремонт авто
                    </li>
                    <li class="y-collumn_item"> Поиск авто и автотоваров
                    </li>
                    <li class="y-collumn_item">Поиск авто и автотоваров
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export  default {
        mounted() {
            document.addEventListener('click', this.handleClickOutside)
        },
        destroyed() {
            document.removeEventListener('click', this.handleClickOutside)
        },
        data(){
            return{
                showMenu: false,
            }
        },
        methods: {
            handleClickOutside(evt) {
                if (!this.$el.contains(evt.target)) {
                    this.showMenu = false;
                }
            }
        }
    }
</script>
