import Vue from "vue";
import VueRouter from "vue-router";

import Home from "./pages/Home.vue"
import About from "./pages/About.vue"
import Contact from "./pages/Contact.vue"
import PostPage from "./pages/PostPage.vue"
import AllPost from "./pages/AllPost.vue"

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "home",
            component: Home
        },
        {
            path: "/about",
            name: "about",
            component: About,
            meta: {
                title:'Titolo agg con meta: ABOUT',
            }
        },
        {
            path: "/contact",
            name: "contact",
            component: Contact,
    
        },
        {
            path: "/post/",
            name: "posts.index",
            component: AllPost,
           
        },
        {
            path: "/post/:slug",
            name: "post.show",
            component: PostPage,
           
        },

    ]
});


export default router; 