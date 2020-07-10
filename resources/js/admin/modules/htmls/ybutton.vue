<template>
    <div class="ybutton" :class="[size, color]">
        <i v-if="icon" :class="icon"></i>
        {{title}}
    </div>
</template>

<script>
    export default {
        props: ['size', 'color', 'icon', 'title'],
    }
</script>
