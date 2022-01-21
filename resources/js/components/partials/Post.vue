<template>
    <!-- Post preview-->
    <div class="post-preview my-3">
        <a :href="'/admin/posts/' + post.id">  <!-- Questo mi permette lo show dei post post.show -->
            <h2 class="post-title">
                {{ post.title }}
            </h2>
           <p v-if="post.category && post.category.name" class="post-meta">
            {{post.category.name}}
           </p>
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