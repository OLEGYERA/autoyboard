<template>
    <div class="app_excell">
        <div class="excel_row_head">
            <div class="letter_item" v-for="i in cols">
                {{letter_arr[i - 1]}}
            </div>
        </div>
        <div class="excel_double_col">
            <div class="excel_col_head">
                <div class="num_item" v-for="i in rows">
                    {{i}}
                </div>
            </div>
            <div class="excel_content">
                <div class="excel_row" v-for="col in cols">
                    <div class="excel_col" v-for="row in rows">
                        <input type="text" class="excel_item" v-model="excel_storage[letter_arr[col - 1] + row]">
                    </div>
                </div>
                <button @click="getStorage()">Консоль</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            this.init_array(10, 10);
        },
        data: function () {
            return {
                letter_arr:  ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"],
                rows: null,
                cols: null,
                excel_storage: [],
            }
        },
        methods:{
            init_array(x, y){
                this.rows = x;
                this.cols = y;
                this.excel_storage = [];
                for(var j = 0; j < this.rows; j++){
                    for(var k = 1; k <= this.cols; k++){
                        this.excel_storage[this.letter_arr[j] + k] = this.letter_arr[j] + k;
                    }
                }
            },
            getStorage(){
                console.log(this.excel_storage)
            }
        },
        watch: {

        }
    }
</script>
