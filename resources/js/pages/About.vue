<template>

    <div class="container" >

        <h1>{{ $route.meta.title ? $route.meta.title : "Titolo non passato con meta" }}</h1>

        <div class="desk">

            <h1 style="color:white; text-align:center; "> About US</h1>

        </div>

    

    </div>

</template>

<script>

export default {
    name:"About",
    data() {
        return {}
        
    },
   
}
</script>


<style lang="scss">

.desk{         
       background-image: url('../../../public/img/aboutus.jpg');
       background-position: center;
       background-size: contain;
       background-repeat: no-repeat;
       height: 400px;
       margin-bottom: 50px;
                                
                                }


</style>