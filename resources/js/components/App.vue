<template>
    <div>

        <h1 class="title">{{message}}</h1>

         <h2>Sezione Post</h2>
        <Post
        v-for="post in postsList"
        :key="post.id"
        :post="post"
        ></Post>
           


        <TheFooter />

    </div>
</template>

<script>
    import TheFooter from './partials/TheFooter.vue'
    import Post from './partials/Post.vue'
    export default {
        name:"App",
        components: {TheFooter, Post},
        
        data() {
            return {
                message:" Laravel BoolPress",
                postsList: [],
            }
        },
        mounted() {
        window.axios.get("/api/posts").then((resp) => {
            this.postsList = resp.data;
        });
    },
    }
</script>

<style lang="scss">

.title{
    text-align: center;
    margin-bottom: 90px;
}

</style>
