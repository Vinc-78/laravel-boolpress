<template>
    <!-- Post preview-->
    <div class="post-preview my-3">
        
        <router-link :to="{ name: 'post.show', params: {slug: post.slug} }">  
            <h2 class="post-title">
                {{ post.title }}
            </h2>
                    
        </router-link>
         <p v-if="post.category && post.category.name" class="post-meta">
            Categoria: {{post.category.name}}
           </p>

        <p v-if="post.tags " class="post-meta">
            Tags: 
            <span
            v-for="tag in post.tags"
            :key="tag.id"
            class="badge bg-primary mx-1 text-white">
            {{tag.name}}
            </span>
           </p>


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