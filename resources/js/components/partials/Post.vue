<template>
    <!-- Post preview-->
    <div class="post-preview">
        <a href="post.html">
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
    </div>
</template>

<script>
export default {
    name: "Post",
    props: {
        post: {
            type: Object,
            required: true,
        },
    },
};
</script>

<style></style>