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
                    <!--  <div class="row">
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
                        </div> -->


                </div>

                <div class="col-3 mt-5">
                    <h4 class="text-center pt-5 mt-5">Categorie Disponibili</h4>

                    <ul>
                        <li v-for="category of categoryList" :key="category.id">

                             <router-link :to="{name:'posts.index', query:{'category':category.id}}">{{category.name}}</router-link>
                        </li>
                    </ul>  
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
                categoryList: [],
               /*  currentPage: 1,
                lastPage: null */
            }
        },
        methods: {

            getData() {
                 window.axios.get("/api/posts?limit=3").then((resp) => {
                 this.postsList = resp.data;
                 
                 });

            },

            getCategory() {
                window.axios.get("/api/categories").then((resp)=>{
                    this.categoryList =resp.data;
                });

            }
            /* La successiva serve per la paginazione da sostiuire a quella di limit sopra  */

           /*  getData(page = 1) {
                 window.axios.get("/api/posts?page=" + page).then((resp) => {
                 this.postsList = resp.data.data;
                 this.currentPage = resp.data.current_page;
                 this.lastPage = resp.data.last_page; 
                 });

            } */

        },
        mounted() {
            this.getData();
            this.getCategory(); 
    },
    }
</script>

<style lang="scss">

.title{
    text-align: center;
    margin-bottom: 90px;
}

</style>
