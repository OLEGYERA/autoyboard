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
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <div v-if="showMenu = true" class="ydrop-menu_vis">
            <div class="yb_menu-collumn">
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
                    <li class="y-collumn_item active">Услуги для авто
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
        </div>
    </div>
</template>

<script>
    export  default {
        data(){
            return{
                showMenu: false,
            }
        }
    }
</script>
