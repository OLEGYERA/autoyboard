<template>
        <div class="autocomplete">
            <div class="control icon-right">
                <input type="text" class="input-dropdown"
                       placeholder=""
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
                />
                <i class="ynav-list-toggle fas"
                   @click="toggle"
                   :class="{'fa-chevron-up' :isOpened, 'fa-chevron-down':  !isOpened}"></i>
            </div>

    <transition	name="fade" mode="in-out">
        <ul class="options-list" v-show="isOpened">
            <li v-for="(option, i) in filteredItems"
                @mouseenter="selected = i"
                @mousedown="select"
                v-if="search.length > 0"
                :class="{'selected': i === selected}">
                {{ option.name }}
                <slot name="item" :title="option"></slot>
            </li>
            <div class="selected" v-if="search.length === 0">Не найдено</div>
        </ul>
    </transition>
    </div>
</template>

<script>
export  default  {
    props: ['options'],
    data() {
        return {
            isOpened: false,
            selected: null,
            search: "",
        }
    },
    methods: {
        onInput(value) {
            this.isOpened = !!value;
            this.selected = null;
        },
        select() {
            const selectedOption = this.filteredItems[this.selected];
            this.$emit("select-item", selectedOption);
            this.search = selectedOption.name;
            this.isOpened = false;
        },
        onDown() {
            if (!this.isOpened) {
                return;
            }
            this.selected = (this.selected + 1) % this.filteredItems.length;
        },
        onUp() {
            if (!this.isOpened) {
                return;
            }

            this.selected =
                this.selected - 1 < 0
                    ? this.filteredItems.length - 1
                    : this.selected - 1;
        },
        toggle() {
            this.isOpened = !this.isOpened;
            if (this.isOpened) {
                this.$refs.dropdown.focus();
            }
        }
    },
    computed: {
        filteredItems() {
            const condition = new RegExp(this.search, "i");
            return this.options.filter(item => item.name.match(condition));
        }
    }
}
</script>

<style scoped>
    .autocomplete {
        width: 230px;
    }
    ul.options-list li.selected {
        background-color: #111E6C;
        color: #fff;
    }

    input.input-dropdown {
        height: 32px;
        width: 100%;
        color: black;
        font-size: 16px;

        padding-left: 8px;
        border: none;
    }

    input.input-dropdown::-webkit-input-placeholder {
        color: #fff;
    }
    .control {
        position: relative;
        display: flex;
        margin-bottom: 0.1rem;
        z-index: 10;
    }

    .control i {
        top: 0;
        border: none;
        right: 15px;
        color: black;
        position: absolute;

    }

    ul.options-list {
        list-style-type: none;
        position: absolute;
        width: 100%;
        padding: 0;
        top: 35px;
        margin: 0;
        border: 1px solid #dbdbdb;
        border-radius: 0 0 3px 3px;
        max-height: 300px;
        overflow-y: auto;
        box-shadow: 0px 3px 6px 0px rgba(195, 195, 195, 0.76);
    }

    ul.options-list li {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
        justify-content: flex-end;
        padding: 0.4rem;
        border-bottom: 1px solid #eee;
        color: #666;
        background-color: #fff;
        cursor: pointer;
        transition: 0.3s all ease;
    }
    .icon-right i {
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
