<template>

<h1 :class="classMia">{{messaggio}}</h1>


    
</template>

<script>
export default {
    name : "App",
    data() {
        return {
            messaggio : " Ciao da Vue",
            classMia : "colora"
        }
    }
}
</script>

<style >

    .colora{
        color:blue; 
    }
</style>