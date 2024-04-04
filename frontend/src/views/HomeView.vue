<script setup>
import NavView from "@/components/NavComponent.vue";
import MenuComponent from "@/components/MenuComponent.vue";
import Classlist from "@/views/Classlist.vue";




</script>

<template>
  <NavView class="navBar"/>
  <MenuComponent />
  <Classlist/>


</template>

<style scoped>

.navBar {
  margin-bottom: 3rem;
}

</style>
