<template>

    <div class="container" >

       <h1 style="text-align:center">Singolo Post</h1>

    <h2>{{post.title}}</h2>

     <p     v-for="tag in post.tags"
            :key="tag.id"
            class="badge bg-primary mx-1 text-white">
            {{tag.name}}
            </p>
            <br>
    <img :src="post.coverImg" alt="" style="height:250px">


    <p>{{post.body}}</p>
    

    </div>

</template>

<script>
import PageHeader from '../components/PageHeader.vue'
export default {
    
    name:"PostPage",
    components:{PageHeader},
    data(){
        return {
            post: {
                type:Object,
                default: () => ({})
            }
        }
    },
   
    methods: {
        datiPost() {
    
            const url = "/api/posts/" + this.$route.params.slug; 
           
            window.axios.get(url).then((resp)=>{

                this.post = resp.data;            

            });

            /* console.log(window.axios.get("posts/" + this.$route.params.slug)); */
        }
    },
    mounted(){

        this.datiPost(); 

    }
   
}
</script>


<style lang="scss">

.postPage{         
      
       margin-bottom: 50px;
                                
                                }


</style>