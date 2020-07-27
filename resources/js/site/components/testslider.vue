<template>
        <div class="autocomplete">
                <input
                    type="text"
                    class="input-dropdown"
                    @input="onInput($event.target.value)"
                    @blur="isOpened = false"
                    @keyup.enter="select"
                    @keyup.tab="select"
                    @keydown.down="onDown"
                    @keydown.up="onUp"
                    @click="toggle"
                    @keyup.esc="isOpen = false"
                    ref="dropdown"
                    v-model="search"
                    :placeholder="placeholder"
                />
                <i class="ynav-list-toggle fas"
                   @click="toggle"
                   :class="{'fa-chevron-up' :isOpened, 'fa-chevron-down':  !isOpened}">
                </i>
    <transition	name="fade" mode="in-out">
        <ul class="options-list"  ref="scrollContainer" v-show="isOpened">
            <li v-for="(option, i) in filteredItems"
                ref="options"
                @mouseenter="selected = i"
                @mousedown="select"
                v-if="search.length > 0"
                :class="{'selected': i === selected}">
                {{ option.name }}
                <slot name="item" :title="option"></slot>
            </li>
            <li class="selected" v-if="search.length === 0">Не найдено</li>
        </ul>
    </transition>
    </div>
</template>

<script>
export  default  {
    props: ['options', 'placeholder'],
    data() {
        return {
            isOpened: false,
            selected: null,
            search: "",
            results: []
        }
    },
    computed: {
        filteredItems() {
            this.selected = null
            if(this.$refs.scrollContainer){
                this.$refs.scrollContainer.scrollTop = 0;
            }

            const condition = new RegExp(this.search, "i");
            return this.options.filter(item => item.name.match(condition));

        }
    },
    methods: {
        onInput(value) {
            this.isOpened = !!value;
            this.selected = null;
            this.onDown();
            this.onUp()

        },
        select() {
            const selectedOption = this.filteredItems[this.selected];
            this.$emit("select-item", selectedOption);
            this.search = selectedOption.name;
            this.isOpened = false;
        },
        onDown(ev) {
            if (!this.isOpened) {
                return;
            }
            this.selected = (this.selected + 1) % this.filteredItems.length;
            this.fixScrolling()
            },
        onUp() {
            if (!this.isOpened) {
                return;
            }
            this.selected =
                this.selected - 1 < 0
                    ? this.filteredItems.length - 1
                    : this.selected - 1;
            this.fixScrolling()
            console.log(this.fixScrolling())
            },
        toggle() {
            this.isOpened = !this.isOpened;
            if (this.isOpened) {
                this.$refs.dropdown.focus();
            }
        },
        fixScrolling(){
            const scroll = this.$refs.options[this.selected].scrollHeight;
            this.$refs.scrollContainer.scrollTop = scroll * this.selected;
            console.log(this.$refs.scrollContainer.scrollTop);
            console.log(scroll * this.arrowCounter);
        },
    },
}
</script>

<style scoped>
    .autocomplete {
        display: flex;
        align-items: center;
        position: relative;
        margin-bottom: 15px;
        width: 100%;
    }
    .autocomplete:last-child{
        margin-bottom: 0;
    }
    ul.options-list li.selected {
        background-color: #111E6C;
        color: #fff;
    }

    input.input-dropdown {
        width: 100%;
        height: 42px;
        padding: 10px 40px 10px 20px;
        font-family: "Alegreya Sans", sans-serif;
        font-weight: 500;
        font-size: 1.125em;
        color: rgba(34, 34, 34, 0.8);
        border-radius: 10px;
        border: 1px solid #E2E2E2;
    }
    .autocomplete i {
        position: absolute;
        right: 15px;
        color: #C7C7C7;

    }

    ul.options-list {
        font-family: "Alegreya Sans", sans-serif;
        background: linear-gradient(180deg, rgba(249, 249, 249, 0.5) 0%, rgba(255, 255, 255, 0.5) 105.93%), #F7F7F7;
        position: absolute;
        padding: 0;
        margin: 0;
        width: 100%;
        max-height: 180px;
        overflow: auto;
        top: 50px;
        z-index: 2;
    }

    ul.options-list li {
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        color: rgba(34, 34, 34, 0.79);
        cursor: pointer;
        transition: 0.3s all ease;
    }
    .control i {
        transition: 0.3s all ease;
    }

    ul.options-list li span {
        margin-right: 4px;
    }

    .chevron:before {
        border-style: solid;
        border-width: 0.25em 0.25em 0 0;
        content: "";
        display: inline-block;
        height: 0.45em;
        left: 0.05em;
        position: relative;
        top: 0.15em;
        transform: rotate(-45deg);
        vertical-align: top;
        width: 0.45em;
        transition: 0.3s all ease;
        will-change: transform;
    }

    .chevron.bottom:before {
        top: 16px;
        left: 19px;
    }

    .chevron-active.bottom:before {
        transform: rotate(135deg);
        will-change: transform;
    }

    .chevron-inactive.bottom:before {
        transform: rotate(225deg);
        will-change: transform;
    }

    ul.options-list li:last-child {
        border-bottom: none;
    }

    .fade-enter-active,
    .fade-leave-active {
        transition: all 0.3s ease;
    }
    .fade-enter,
    .fade-leave-active {
        opacity: 0;
        will-change: opacity;
        transform: translateY(-30px);
    }

</style>
