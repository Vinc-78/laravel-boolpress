<template>
    <div>

        <SubNav />

         <h1 class="title">{{message}}</h1>

         <h2>Sezione Post</h2>
        <Post
        v-for="post in postsList"
        :key="post.id"
        :post="post"
        ></Post>
           
           <!-- Tasti per le pagine -->
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
       

        <TheFooter></TheFooter>

    </div>
</template>

<script>
    import SubNav from '../components/SubNav.vue'
    import TheFooter from '../components/TheFooter.vue'
    import Post from '../components/Post.vue'
    export default {
        name:"App",
        components: {
            TheFooter, SubNav, Post
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
                 window.axios.get("/api/posts?page=" + page).then((resp) => {
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
