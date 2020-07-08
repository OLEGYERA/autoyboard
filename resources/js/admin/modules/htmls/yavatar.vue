<template>
    <div class="yavatar">
        {{this.letters[0]}}{{this.letters[1]}}
    </div>
</template>

<script>
    export default {
        props: ['fname', 'lname', 'path'],
        created() {
            if(this.path == null){
                this.letters[0] = this.fname.substr(0, 1);
                this.letters[1] = this.lname.substr(0, 1);
            }
            console.log(this.letters);
        },
        data: function(){
            return{
                letters: []
            }
        },
        methods: {

        },
        computed: {
        },
        watch: {

        }
    }
</script>
