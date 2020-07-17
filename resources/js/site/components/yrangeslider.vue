<template>
    <div class="yprice_container">
        <div class="input_change">
            <input class="change" v-model.number="minPrice" type="number" placeholder="От">
            <input class="change" v-model.number="maxPrice" type="number" placeholder="До">
        </div>
        <div class="track-container">
            <div class="track" ref="_vpcTrack"></div>
            <div class="track-highlight" ref="trackHighlight"></div>
            <button class="track-btn track1" ref="track1"></button>
            <button class="track-btn track2" ref="track2"></button>
        </div>
    </div>

</template>

<script>

    export default {
        data(){
            return{
                min: 200,
                max: 100000,
                minPrice: 30000,
                maxPrice: 60000,
                step: 500,
                totalSteps: 0,
                percentPerStep: 1,
                trackWidth: null,
                isDragging: false,
                pos: {
                    curTrack: null
                }
            }
        },
        methods: {
            moveTrack(track, ev){

                let percentInPx = this.getPercentInPx();

                let trackX = Math.round(this.$refs._vpcTrack.getBoundingClientRect().left);
                let clientX = ev.clientX;
                let moveDiff = clientX-trackX;

                let moveInPct = moveDiff / percentInPx
                // console.log(moveInPct)

                if(moveInPct<1 || moveInPct>100) return;
                let value = ( Math.round(moveInPct / this.percentPerStep) * this.step ) + this.min;
                if(track==='track1'){
                    if(value >= (this.maxPrice - this.step)) return;
                    this.minPrice = value;
                }

                if(track==='track2'){
                    if(value <= (this.minPrice + this.step)) return;
                    this.maxPrice = value;
                }

                this.$refs[track].style.left = moveInPct + '%';
                this.setTrackHightlight()

            },
            mousedown(ev, track){

                if(this.isDragging) return;
                this.isDragging = true;
                this.pos.curTrack = track;
            },

            touchstart(ev, track){
                this.mousedown(ev, track)
            },

            mouseup(ev, track){
                if(!this.isDragging) return;
                this.isDragging = false
            },

            touchend(ev, track){
                this.mouseup(ev, track)
            },

            mousemove(ev, track){
                if(!this.isDragging) return;
                this.moveTrack(track, ev)
            },

            touchmove(ev, track){
                this.mousemove(ev.changedTouches[0], track)
            },

            valueToPercent(value){
                return ((value - this.min) / this.step) * this.percentPerStep
            },

            setTrackHightlight(){
                this.$refs.trackHighlight.style.left = this.valueToPercent(this.minPrice) + '%'
                this.$refs.trackHighlight.style.width = (this.valueToPercent(this.maxPrice) - this.valueToPercent(this.minPrice)) + '%'
            },

            getPercentInPx(){
                let trackWidth = this.$refs._vpcTrack.offsetWidth;
                let oneStepInPx = trackWidth / this.totalSteps;
                // 1 percent in px
                let percentInPx = oneStepInPx / this.percentPerStep;

                return percentInPx;
            },

            setClickMove(ev){
                let track1Left = this.$refs.track1.getBoundingClientRect().left;
                let track2Left = this.$refs.track2.getBoundingClientRect().left;
                // console.log('track1Left', track1Left)
                if(ev.clientX < track1Left){
                    this.moveTrack('track1', ev)
                }else if((ev.clientX - track1Left) < (track2Left - ev.clientX) ){
                    this.moveTrack('track1', ev)
                }else{
                    this.moveTrack('track2', ev)
                }
            }
        },

        mounted() {
            // calc per step value
            this.totalSteps = (this.max - this.min) / this.step;

            // percent the track button to be moved on each step
            this.percentPerStep = 100 / this.totalSteps;
            // console.log('percentPerStep', this.percentPerStep)

            // set track1 initilal
            document.querySelector('.track1').style.left = this.valueToPercent(this.minPrice) + '%'
            // track2 initial position
            document.querySelector('.track2').style.left = this.valueToPercent(this.maxPrice) + '%'
            // set initila track highlight
            this.setTrackHightlight()

            var self = this;

            ['mouseup', 'mousemove'].forEach( type => {
                document.body.addEventListener(type, (ev) => {
                    // ev.preventDefault();
                    if(self.isDragging && self.pos.curTrack){
                        self[type](ev, self.pos.curTrack)
                    }
                })
            });

            ['mousedown', 'mouseup', 'mousemove', 'touchstart', 'touchmove', 'touchend'].forEach( type => {
                document.querySelector('.track1').addEventListener(type, (ev) => {
                    ev.stopPropagation();
                    self[type](ev, 'track1')
                })

                document.querySelector('.track2').addEventListener(type, (ev) => {
                    ev.stopPropagation();
                    self[type](ev, 'track2')
                })
            })

            // on track clik
            // determine direction based on click proximity
            // determine percent to move based on track.clientX - click.clientX
            document.querySelector('.track').addEventListener('click', function(ev) {
                ev.stopPropagation();
                self.setClickMove(ev)

            })

            document.querySelector('.track-highlight').addEventListener('click', function(ev) {
                ev.stopPropagation();
                self.setClickMove(ev)

            })


        },
        watch: {

        }

    }


</script>

<style >

</style>
