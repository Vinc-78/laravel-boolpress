window.Vue = require('vue');



import App from './components/App.vue';

const app = new Vue({
    el: '#root',
    render: h => h(App)  //con la funzione render lo vado a passare 
});
