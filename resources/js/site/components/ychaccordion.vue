<template>
    <div class="ychaccordion" v-if="currentWidth > 945">
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
    <div class="ychaccordion" v-else>
        <div class="accordion-box">
            <h2 class="accordion-title" @click="[security = !security]" :class="{selected: security}" v-if="options.security.length > 0">
                <span>Безопасность</span>
                <i class="yicon" :class="{'arrow-down': !security, 'arrow-up': security}"></i>
            </h2>
            <div class="accordion-checks" v-if="options.security.length > 0 && security">
                <div class="accordion-checks-box">
                    <ycheck v-for="(tech, i) in generateSecurityChecks"
                            :key="i"
                            :name="tech.name"
                            :checked="tech.choosed"
                            @checked="SET_TRANSPORT_TECHS_CHOOSE({val: tech.val, alias: 'security'})">
                    </ycheck>
                </div>
            </div>
            <h2 class="accordion-title" @click="[comfort = !comfort ]" :class="{selected: comfort}" v-if="options.comfort.length > 0">
                <span>Комфорт</span>
                <i class="yicon" :class="{'arrow-down': !comfort, 'arrow-up': comfort}"></i>
            </h2>
            <div class="accordion-checks" v-if="options.comfort.length > 0 && comfort">
                <div class="accordion-checks-box">
                    <ycheck v-for="(tech, i) in generateComfortChecks"
                            :key="i"
                            :name="tech.name"
                            :checked="tech.choosed"
                            @checked="SET_TRANSPORT_TECHS_CHOOSE({val: tech.val, alias: 'comfort'})">
                    </ycheck>
                </div>
            </div>
            <h2 class="accordion-title" @click="[multimedia = !multimedia]" :class="{selected: multimedia}" v-if="options.multimedia.length > 0">
                <span>Мультимедиа</span>
                <i class="yicon" :class="{'arrow-down': !multimedia, 'arrow-up': multimedia}"></i>
            </h2>
            <div class="accordion-checks" v-if="options.multimedia.length > 0 && multimedia">
                <div class="accordion-checks-box">
                    <ycheck v-for="(tech, i) in generateMultimediaChecks"
                            :key="i"
                            :name="tech.name"
                            :checked="tech.choosed"
                            @checked="SET_TRANSPORT_TECHS_CHOOSE({val: tech.val, alias: 'multimedia'})">
                    </ycheck>
                </div>
            </div>
            <h2 class="accordion-title" @click="[others = !others]" :class="{selected: others}" v-if="options.others.length > 0">
                <span>Прочие</span>
                <i class="yicon" :class="{'arrow-down': !others, 'arrow-up': others}"></i>
            </h2>
            <div class="accordion-checks" v-if="options.others.length > 0 && others">
                <div class="accordion-checks-box">
                    <ycheck v-for="(tech, i) in generateOthersChecks"
                            :key="i"
                            :name="tech.name"
                            :checked="tech.choosed"
                            @checked="SET_TRANSPORT_TECHS_CHOOSE({val: tech.val, alias: 'others'})">
                    </ycheck>
                </div>
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
            window.addEventListener('resize', this.changeResize);
            this.changeResize();
            if(this.currentWidth <= 945){
                this.security = false;
            }
        },
        destroyed() {
            window.removeEventListener('resize', this.changeResize);
        },
        data() {
            return{
                security: true,
                comfort: false,
                multimedia: false,
                others: false,
                currentWidth: null
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
            changeResize(){
                this.currentWidth = document.documentElement.clientWidth;
            }
        },
        computed: {
            generateAccordionChecks(){
                const alias = this.getAliasCategory;
                if(this.options[alias] !== undefined)
                    this.options[alias].forEach((el, i) => {
                        if(this.choosedItems[alias].indexOf(el.val) !== -1){
                            el.choosed = true;
                        }
                        else{
                            el.choosed = false;
                        }
                    })

                return this.options[alias];
            },
            generateSecurityChecks(){
                this.options['security'].forEach((el, i) => {
                    if(this.choosedItems['security'].indexOf(el.val) !== -1){
                        el.choosed = true;
                    }
                    else{
                        el.choosed = false;
                    }
                })

                return this.options['security'];
            },
            generateComfortChecks(){
                this.options['comfort'].forEach((el, i) => {
                    if(this.choosedItems['comfort'].indexOf(el.val) !== -1){
                        el.choosed = true;
                    }
                    else{
                        el.choosed = false;
                    }
                })

                return this.options['comfort'];
            },
            generateMultimediaChecks(){
                this.options['multimedia'].forEach((el, i) => {
                    if(this.choosedItems['multimedia'].indexOf(el.val) !== -1){
                        el.choosed = true;
                    }
                    else{
                        el.choosed = false;
                    }
                })

                return this.options['multimedia'];
            },
            generateOthersChecks(){
                this.options['others'].forEach((el, i) => {
                    if(this.choosedItems['others'].indexOf(el.val) !== -1){
                        el.choosed = true;
                    }
                    else{
                        el.choosed = false;
                    }
                })

                return this.options['others'];
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

