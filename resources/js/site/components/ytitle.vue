<template>
    <div class="ytitle">
        <h2>{{title}}</h2>
        <div class="change_visible">
            <button class="change_view active">
                <i class="fas fa-th"></i>
            </button>
            <button class="change_view">
                <i class="fas fa-th-list"></i>
            </button>
        </div>
    </div>
</template>

<script>
export default{
    props: ['title']
}
</script>
