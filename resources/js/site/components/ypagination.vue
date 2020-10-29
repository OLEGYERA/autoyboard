<template>
    <ul :class="['pagination', { disabled: disabled }]">
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

        mounted() {
            this.setMaxButtons();
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
        },
    }
</script>
<style  scoped>


    .pagination-item,
    .pagination-navigation,
    .pagination-more {
        height: 2.2rem;
        width: 2.2rem;
        margin: 0.3rem;
        font-size: 15px;
        color: #9ca4c1;
        font-weight: 700;
    }

    .pagination-item,
    .pagination-navigation {
        background-color: white;
        border-radius: 4px;
        -webkit-transition-property: opacity, color, background-color;
        transition-property: opacity, color, background-color;
        -webkit-transition-duration: 160ms;
        transition-duration: 160ms;
        -webkit-transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
        transition-timing-function: cubic-bezier(0.39, 0.575, 0.565, 1);
    }

    .pagination-item {
        padding: 0 5px;
    }
    .pagination-item.active {
        color: white;
        background-color: #7d6ee7;
    }
    .pagination-item:hover, .pagination-item:focus {
        background-color: #f7f7f7;
    }
    .pagination-item:hover.active, .pagination-item:focus.active {
        background-color: #8d80ea;
    }
    .pagination-item:active {
        background-color: #ededed;
    }
    .pagination-item:active.active {
        background-color: #a095ee;
    }

    .pagination-navigation {
        display: -webkit-inline-box;
        display: inline-flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        margin-left: 10px;
        margin-right: 10px;
        text-decoration: none;
    }
    .pagination-navigation.disabled {
        opacity: 0.6;
        cursor: default;
    }
    .pagination-navigation:hover:not(.disabled), .pagination-navigation:focus:not(.disabled) {
        background-color: #f7f7f7;
    }
    .pagination-navigation:active:not(.disabled) {
        background-color: #ededed;
    }

    .pagination-more {
        display: inline-flex;
        -webkit-box-align: end;
        align-items: flex-end;
        -webkit-box-pack: center;
        justify-content: center;
    }

    .pagination {
        display: inline-flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        max-width: 100%;
        width: 100%;
        margin: 0;
        padding-left: 0;
        list-style-type: none;
    }
    .pagination > li {
        -webkit-box-align: center;
        align-items: center;
        display: -webkit-box;
        display: flex;
    }
    .pagination button {
        border: 0;
        outline: none;
        cursor: pointer;
    }
    .pagination.disabled {
        pointer-events: none;
        opacity: 0.6;
    }

    .container {
        margin: 0 auto;
        padding: 0 1rem;
        padding-bottom: 50px;
    }

    .controls {
        display: -webkit-box;
        display: flex;
        -webkit-box-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        align-items: center;
        margin: 40px 0;
    }
    .controls input {
        width: 60px;
        margin-left: 0.3rem;
        margin-right: 1.5rem;
    }

    .stage-container {
        padding: 10px 0;
        background-color: white;
        border-radius: 6px;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

</style>
