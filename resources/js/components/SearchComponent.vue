<template>
    <div>
        <input type="text" v-model="keyword" placeholder="Search Jobs...." class="form-control" v-on:keyup="Searchjobs()">{{results}}
            <div class="card-footer" v-if="results.length">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href=""></a>
                    </li>
                </ul>
            </div>
    </div>
</template>

<script>
    export default {
        data(){
          return{
            keyword:'',
            results:[],
       }
        },

        methods:{
            Searchjobs(){
              this.results=[];
              if(this.keyword.length>1){
                axios.get('jobs/search',{params:{keyword:this.keyword}}).then(
                    response=>{
                        this.results = response.data;
                    });
              }
            }
        }
    }
</script>
