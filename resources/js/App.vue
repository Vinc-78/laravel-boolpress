<template>
<!-- App.vue che carica Home si trova in guest.blade.php che extend l'import con i link ad admin -->
<!-- Ho scelto di mantenere differenziati le due nava per studio e in questo modo per gestirne una lato 
server in blade e una lato cliet in Vue -->
    <div>
        <SubNav /> <!-- Qui c'è la nav del guest -->

<!-- Questo è come se fosse @yield('content') di blade -->
        <router-view></router-view>

        <TheFooter />
    </div>

    
</template>

<script>
    import SubNav from "./components/SubNav.vue"
    import TheFooter from "./components/TheFooter.vue"
    
    export default {
        name:"App",
        components: { SubNav, TheFooter },

        /* mounted() {
            console.log(this.$router);
             console.log(this.$route);
        } */
        
    }
</script>

<style lang="scss">


</style>
