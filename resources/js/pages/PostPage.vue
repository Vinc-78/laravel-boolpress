<template>

    <div class="container" >

       

       <PageHeader 
       :title="post.title"
       :imgUrl="post.coverImg">
       </PageHeader>

    

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
        

            const url = "/posts/" + this.$route.params.slug; 
            window.axios.get(url).then((resp)=>{

                this.post =resp.data;

                console.log(this.post); 

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