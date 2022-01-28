<template>
    
<nav class="container">
    <ul class="nav justify-content-end">
  
  <li class="nav-item">
    <router-link class="nav-link" to="/">Home</router-link>
  </li>
  <li class="nav-item">

    <router-link class="nav-link" 
    :to="{name:'about'}">About
    </router-link>

  </li>
  <li class="nav-item">
    <router-link class="nav-link" to="/contact">Contact</router-link>
  </li>
  
</ul>
</nav>

</template>

<script>

export default {
    name: "SubNav",
};
</script>

<style></style>