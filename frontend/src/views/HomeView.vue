<script setup>
import NavView from "@/components/NavComponent.vue";
import MenuComponent from "@/components/MenuComponent.vue";

</script>

<template>
  <NavView class="navBar"/>


  <MenuComponent class="menu"/>


</template>

<style scoped>
.navBar {
  margin-bottom: 3rem;
}

.menu {
  margin: auto;
  width: 50%;
  border: 3px solid green;
  padding: 10px;
  justify-content: center;
}

</style>
