<template>
    <ul :class="['pagination', { disabled: disabled }]" v-show="length > 1">
        <li ref="navPrev">
            <button
                :class="['pagination-navigation', { disabled: isValueFirst }]"
                v-on="isValueFirst ? {} : { click: goPrevious }"
            >
                <i class="fas fa-chevron-left"></i>
            </button>
        </li>

        <li v-for="(item, index) in items" :key="'paging_' + index">
                <span
                    v-if="isNaN(Number(item))"
                    class="pagination-more"
                >{{ item }}</span>

            <button
                v-else
                type="button"
                :class="['pagination-item', { active: item === value }]"
                @click="$emit('input', item)"
            >{{ item }}</button>
        </li>

        <li ref="navNext">
            <button
                type="button"
                :class="['pagination-navigation', { disabled: isValueLast }]"
                v-on="isValueLast ? {} : { click: goNext }"
            >
                <i class="fas fa-chevron-right"></i>
            </button>
        </li>
    </ul>
</template>
<script>
    export default {
        props: {
            value: {
                type: Number,
                required: true,
            },
            length: {
                type: Number,
                default: 0,
                validator: (val) => val % 1 === 0,
            },
            // когда количество кнопок страницы превышает родительский контейнер,
            // он автоматически обрежет кнопки
            totalVisible: Number,
            disabled: Boolean,
        },
        mounted() {
            this.setMaxButtons();
        },
        data(){
            return{
                maxButtons: 0,
            }
        },
        computed: {
            isValueLast() {
                return this.value >= this.length;
            },
            isValueFirst() {
                return this.value <= 1;
            },
            items() {
                const maxLength = this.totalVisible > this.maxButtons
                    ? this.maxButtons
                    : this.totalVisible || this.maxButtons;

                if (this.length <= maxLength || maxLength < 1) {
                    return this.getRange(1, this.length);
                }

                const even = maxLength % 2 === 0 ? 1 : 0;
                const left = Math.floor(maxLength / 2);
                const right = this.length - left + 1 + even;

                if (this.value > left && this.value < right) {
                    const start = this.value - left + 2;
                    const end = this.value + left - 2 - even;

                    return [1, '...', ...this.getRange(start, end), '...', this.length];
                }
                else if (this.value === left) {
                    const end = this.value + left - 1 - even;

                    return [...this.getRange(1, end), '...', this.length];
                }
                else if (this.value === right) {
                    const start = this.value - left + 1;

                    return [1, '...', ...this.getRange(start, this.length)];
                }
                else {
                    return [...this.getRange(1, left), '...', ...this.getRange(right, this.length)];
                }
            },
        },
        methods: {
            goNext(e) {
                e.preventDefault();
                this.$emit('input', this.value + 1);
                this.$emit('next');
            },
            goPrevious(e) {
                e.preventDefault();
                this.$emit('input', this.value - 1);
                this.$emit('previous');
            },
            getRange(from, to) {
                const range = [];

                from = from > 0 ? from : 1;

                for (let i = from; i <= to; i++) {
                    range.push(i);
                }

                return range;
            },
            setMaxButtons() {
                const containerWidth = this.$el && this.$el.parentElement
                    ? this.$el.parentElement.clientWidth
                    : window.innerWidth;

                const navButton = this.$refs.navNext.getBoundingClientRect();

                // width of the items considering navItem.height = item.width
                const itemWidth = navButton.height;
                const navItemsWidth = navButton.width * 2;

                this.maxButtons = Math.floor(
                    (containerWidth - navItemsWidth) / itemWidth
                );
            },
        }
    }
</script>
<style  scoped>




</style>
