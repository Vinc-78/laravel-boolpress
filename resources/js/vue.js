window.Vue = require('vue');



import App from './App.vue';
import router from "./router.js";

const app = new Vue({
    el: '#root',
    
    router,
    /* "router":router, */
    render: h => h(App)  //con la funzione render lo vado a passare 
});
