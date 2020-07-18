<template>
    <div class="change_resource">
        <span class="title_change">{{text}}</span>
        <label class="ios7-switch">
            <input type="checkbox" checked>
            <span ></span>
        </label>
    </div>
</template>

<script>
export default {
    props: ['text',]
}
</script>
