<template>
    <div>
        <div class="container">

            <div class="row">

                <div class="col-9">

                    <h1 class="title">{{message}}</h1>

                    <h2>Sezione Post - Ultimi 3 post </h2>
                    <Post
                    v-for="post in postsList"
                    :key="post.id"
                    :post="post"
                    ></Post>
                    
                    <!-- Tasti per le paginazione -->
                     <div class="row">
                            <div class="col justify-content-center d-flex">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <button class="page-link" @click="getData(currentPage - 1)">
                                                Indietro
                                            </button>
                                        </li>

                                        <li v-for="page of lastPage" :key="page" class="page-item" 
                                        :class="{ 'active': currentPage === page }" >

                                            <button class="page-link" @click="getData(page)" > {{page }} </button>
                                        </li>

                                        <li>
                                            <button class="page-link" @click="getData(currentPage + 1)" > Avanti
                                            </button>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>


                </div>

                
            </div>


            
        </div>

         
       
    </div>
</template>

<script>
   
    import Post from '../components/Post.vue'
    export default {
        name:"App",
        components: {
             Post
        },
        
        data() {
            return {
                message:" Laravel BoolPress",
                postsList: [],
                currentPage: 1,
                lastPage: null
            }
        },
        methods: {

          

            getData(page = 1) {

                const category = this.$route.query.category;
                
                 window.axios.get("/api/posts", {
                     params:{
                         page,
                         category,
                     }
                 }).then((resp) => {
                 this.postsList = resp.data.data;
                 this.currentPage = resp.data.current_page;
                 this.lastPage = resp.data.last_page; 
                 });

            }

        },
        mounted() {
            this.getData();
            
    },
    }
</script>

<style lang="scss">

.title{
    text-align: center;
    margin-bottom: 90px;
}

</style>
