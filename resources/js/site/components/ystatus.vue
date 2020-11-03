<template>
    <div class="ystatus">
       <div class="status_item">
           <div class="count_number">
               + 5 246
           </div>
           <div v-if="lang === 'ru' " class="count_title">
               Последних поисков за день
           </div>
           <div v-else class="count_title">
               Останніх пошуків за день
           </div>
       </div>
       <div class="status_item">
           <div class="count_number">
               + 1100
           </div>
           <div v-if="lang === 'ru' " class="count_title">
               Последних поисков за час
           </div>
           <div v-else class="count_title">
               Останніх пошуків за годину
           </div>
       </div>
       <div class="status_item">
           <div class="count_number">
               + 8 600
           </div>
           <div v-if="lang === 'ru' " class="count_title">
               Проверено авто
               по VIN-коду
           </div>
           <div v-else class="count_title">
               Перевірено авто
               по VIN-коду
           </div>
       </div>
    </div>
</template>

<script>
    export default {
        props: ['lang'],
    }
</script>
