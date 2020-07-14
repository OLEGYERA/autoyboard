<template>
    <div class="y-best_top">
        <div class="top_title">
            <h3 class="title">{{title}}</h3>
        </div>
        <div class="change_visible">
            <button class="change_view">
                <i class="fas fa-th-list"></i>
            </button>
            <button  class="change_view">
                <i class="fas fa-th"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default{
    props: ['title']
}
</script>
