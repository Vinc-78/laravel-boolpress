<template>
    <!-- Post preview-->
    <div class="post-preview my-3">
        <a :href="'/posts/' + post.id">  <!-- Questo mi permette lo show dei post post.show -->
            <h2 class="post-title">
                {{ post.title }}
            </h2>
            <!-- <h3 class="post-subtitle">
                Problems look mighty small from 150 miles up
            </h3> -->
        </a>
        <p class="post-meta">
            {{ post.body }}
        </p>
        
        <img v-if="post.coverImg" style="height:250px" :src="post.coverImg " alt="">
    </div>
</template>

<script>
export default {
    name: "Post",
    props: {
        post: {
            type: Object,
           
        },
    },
};
</script>

<style></style>