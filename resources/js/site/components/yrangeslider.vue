<template>
    <div class="yprice_container">
        <div class="input_change">
            <input
                class="change"
                v-model.number="minRange"
                @change="updateSlider"
                type="number"
                placeholder="От">
            <input
                class="change"
                v-model.number="maxRange"
                @change="updateSlider"
                type="number"
                placeholder="До">
            <div class="currency_change">
                <ydropdown :items="currency"></ydropdown>
            </div>
        </div>
        <div id="slider" ref="slider"></div>
    </div>
</template>
<script>
    import noUiSlider from 'nouislider';
    import 'nouislider/distribute/nouislider.css';

    export default{
        data() {
            return{
                currency: [{name: '$'}, {name: '₴'}, {name: '€'} ],
                minRange: null,
                maxRange: null,
                slider: {
                    startMin: 60000,
                    startMax: 100000,
                    min: 200,
                    max: 200000,
                    step: 200
                }
            }
        },
        methods: {
            updateSlider: function updateSlider() {
                this.$refs.slider.noUiSlider.set([this.minRange, this.maxRange]);
            }
        },

        mounted() {

            noUiSlider.create(this.$refs.slider, {
                start: [this.slider.startMin, this.slider.startMax],
                step: this.slider.step,
                connect: true,
                range: {
                    'min': this.slider.min,
                    'max': this.slider.max
                },
            });

            this.$refs.slider.noUiSlider.on('update',(values, handle) => {
                this[handle ? 'maxRange' : 'minRange'] = parseInt(values[handle]);
            });
        }

    }
</script>

