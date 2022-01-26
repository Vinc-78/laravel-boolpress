<template>

    <div>
    <SubNav /> 
       
        <h1> About </h1>

    <TheFooter />

    </div>

</template>

<script>
import TheFooter from "../components/TheFooter.vue";
import SubNav from '../components/SubNav.vue'
export default {
    data() {
        return {}
        
    },
    component: {
        TheFooter, SubNav
    }
}
</script>


<style lang="scss" >

</style>