<template>
    <div class="ychaccordion">
        <div class="accordion-titles">
            <h2 class="accordion-title" @click="[clearCategories(), security = true]" :class="{selected: security}" v-if="options.security.length > 0">
                <span>Безопасность</span>
                <i class="yicon" :class="{'arrow-left': !security, 'arrow-right': security}"></i>
            </h2>
            <h2 class="accordion-title" @click="[clearCategories(), comfort = true]" :class="{selected: comfort}" v-if="options.comfort.length > 0">
                <span>Комфорт</span>
                <i class="yicon" :class="{'arrow-left': !comfort, 'arrow-right': comfort}"></i>
            </h2>
            <h2 class="accordion-title" @click="[clearCategories(), multimedia = true]" :class="{selected: multimedia}" v-if="options.multimedia.length > 0">
                <span>Мультимедиа</span>
                <i class="yicon" :class="{'arrow-left': !multimedia, 'arrow-right': multimedia}"></i>
            </h2>
            <h2 class="accordion-title" @click="[clearCategories(), others = true]" :class="{selected: others}" v-if="options.others.length > 0">
                <span>Прочие</span>
                <i class="yicon" :class="{'arrow-left': !others, 'arrow-right': others}"></i>
            </h2>
        </div>
        <div class="accordion-checks">
            <div class="accordion-checks-box">
                <ycheck v-for="(tech, i) in generateAccordionChecks"
                        :key="i"
                        :name="tech.name"
                        :checked="tech.choosed"
                        @checked="SET_TRANSPORT_TECHS_CHOOSE({val: tech.val, alias: getAliasCategory})">
                </ycheck>
            </div>
        </div>
    </div>
</template>
<script>
    import {HTTP} from "../../http.js";
    import {mapMutations} from 'vuex';
    export default{
        props: ['options', 'choosedItems'],
        mounted(){
            console.log(this.options)
        },
        data() {
            return{
                security: true,
                comfort: false,
                multimedia: false,
                others: false,
            }
        },
        methods: {
            ...mapMutations(['SET_TRANSPORT_TECHS_CHOOSE']),
            clearCategories(){
                this.security = false;
                this.comfort = false;
                this.multimedia = false;
                this.others = false;
            },
        },
        computed: {
            generateAccordionChecks(){
                this.options[this.getAliasCategory].forEach((el, i) => {
                    if(this.choosedItems[this.getAliasCategory].indexOf(el.val) !== -1){
                        el.choosed = true;
                    }
                    else{
                        el.choosed = false;
                    }
                })
                return this.options[this.getAliasCategory];
            },
            getAliasCategory(){
                switch (true) {
                    case this.security:
                        return 'security';
                    case this.comfort:
                        return 'comfort';
                    case this.multimedia:
                        return 'multimedia';
                    case this.others:
                        return 'others';
                }
            }
        },
    }
</script>

