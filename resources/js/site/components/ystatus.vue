<template>
    <div class="ystatus">
       <div class="status_item">
           <div class="count_number">
               + 1100
           </div>
           <div class="count_title">
               Последних поисков за час
           </div>
       </div>
        <div class="status_item">
            <div class="count_number">
                + 5 246
            </div>
            <div class="count_title">
                Транспорта за день
            </div>
        </div>
        <div class="status_item">
            <div class="count_number">
                + 5 246
            </div>
            <div class="count_title">
                Транспорта за все время
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['lang'],
    }
</script>
