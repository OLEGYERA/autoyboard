<template>
    <div class="ysearch">
        <input
            class="search"
            :class="{'focus' : toggle === true}"
            @focus="blurInput = true, toggle = true"
            type="text"
            placeholder="Поиск"
            v-model="search"
        />
        <i @click="toggle = !toggle" class=" search_toggle fas fa-search"></i>
<!--        drop down when search by text-->
        <ul v-if="search.length > 0" class="ysearch_items-list">
            <li
                v-for="(item, index) in filterSearch"
                class="ysearch_item"
                :key="index"
            >
                {{item}}
            </li>
            <button class="ysearch_expanded">
                Расширеный поиск
                <svg width="54" height="8" viewBox="0 0 54 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M53.3536 4.35355C53.5488 4.15829 53.5488 3.8417 53.3536 3.64644L50.1716 0.464462C49.9763 0.2692 49.6597 0.2692 49.4645 0.464462C49.2692 0.659724 49.2692 0.976306 49.4645 1.17157L52.2929 4L49.4645 6.82842C49.2692 7.02368 49.2692 7.34027 49.4645 7.53553C49.6597 7.73079 49.9763 7.73079 50.1716 7.53553L53.3536 4.35355ZM4.37114e-08 4.5L53 4.5L53 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z" fill="#0B3F8D"/>
                </svg>
            </button>
        </ul>
<!--        drop down when search with bestOffer card and last search-->
<!--        <div v-if="toggle && search.length <= 0"  class="ysearch_items-res">-->
<!--            <div  class="yb-last_requests">-->
<!--                Недавние поисковые запросы-->
<!--                <svg @click="lastReguest = false" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                    <circle cx="6" cy="6" r="6" fill="#0B3F8D"/>-->
<!--                    <g clip-path="url(#clip0)">-->
<!--                        <path d="M6.54969 6.00707L8.88597 3.67072C9.03801 3.51875 9.03801 3.27303 8.88597 3.12106C8.734 2.96909 8.48829 2.96909 8.33632 3.12106L5.99997 5.45741L3.66369 3.12106C3.51164 2.96909 3.266 2.96909 3.11403 3.12106C2.96199 3.27303 2.96199 3.51875 3.11403 3.67072L5.45031 6.00707L3.11403 8.34342C2.96199 8.49539 2.96199 8.7411 3.11403 8.89307C3.18977 8.96888 3.28935 9.00696 3.38886 9.00696C3.48837 9.00696 3.58788 8.96888 3.66369 8.89307L5.99997 6.55672L8.33632 8.89307C8.41213 8.96888 8.51164 9.00696 8.61115 9.00696C8.71066 9.00696 8.81017 8.96888 8.88597 8.89307C9.03801 8.7411 9.03801 8.49539 8.88597 8.34342L6.54969 6.00707Z" fill="white"/>-->
<!--                    </g>-->
<!--                    <defs>-->
<!--                        <clipPath id="clip0">-->
<!--                            <rect width="6" height="6" fill="white" transform="translate(3 3)"/>-->
<!--                        </clipPath>-->
<!--                    </defs>-->
<!--                </svg>-->
<!--            </div>-->
<!--            <ul v-if="lastReguest" class="yb-requests_items">-->
<!--                <li class="yb-requests_item">audi </li>-->
<!--                <li class="yb-requests_item">автомобили б/у</li>-->
<!--                <li class="yb-requests_item">audi Киев</li>-->
<!--                <li class="yb-requests_item">автомобили б/у</li>-->
<!--                <li class="yb-requests_item">audi </li>-->
<!--            </ul>-->
<!--            <h2 class="yb_best-title">Лучшие предложения</h2>-->
<!--            <div class="yb_best-offers">-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="yb-offer_item">-->
<!--                    <figure class="yb-offer_img">-->
<!--                        <img src="https://images.outlookindia.com/public/uploads/articles/2019/1/10/Webstories_1_20190110.jpg" alt="">-->
<!--                    </figure>-->
<!--                    <div class="yb_item-desc">-->
<!--                        <h2 class="yb-item_name"> Mercedes-Benz E 220,2009</h2>-->
<!--                        <div class="yb-item_location price">-->
<!--                            <span class="yb-loc">Киев</span>-->
<!--                            <span class="yb-price">8 200 $</span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
    </div>
</template>

<script>
export default {
    data(){
        return{
            blurInput: false,
            toggle: false,
            lastReguest: true,
            testAray:[
                'Ауди',
                'ауди а3',
                'ауди ТТ',
                'фольксваген',
                'тойота аурис',
                'королла киев',
                'тесла битая',
            ],
            search: '',
        }
    },
    methods: {

        handleClickOutside(evt) {
            if (!this.$el.contains(evt.target)) {
                this.toggle = false;
                this.search - ''
            }
        },
    },
    mounted() {
        document.addEventListener('click', this.handleClickOutside)
    },
    destroyed() {
        document.removeEventListener('click', this.handleClickOutside)
    },
    computed: {
        filterSearch(){
            return this.testAray.filter(item => {
                return item.indexOf(this.search) > - 1
            })
        }
    },
    watch: {
        toggle: function (to) {
            if(to === false){
                this.search =''
            }
            to ? $('.search_toggle').addClass('fa-times') : $('.search_toggle').removeClass('fa-times');
            to ? $('.ysearch').addClass('search_long') : $('.ysearch').removeClass('search_long');
            to ? $('#yb-site').addClass('y_shadow-absolute') : $('#yb-site').removeClass('y_shadow-absolute');
            //add class from .yb-header-right when ysearch is opened, this class push (right: 0;) to yb-header-right
            to ? $('.yb-header-right').addClass('yb-fullright_zero') : $('.yb-header-right').removeClass('yb-fullright_zero');
        },
    }

}
</script>
