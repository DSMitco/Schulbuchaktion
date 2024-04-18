<script setup>
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import MenuComponent from "@/components/MenuComponent.vue";

</script>

<template>
  <div class="wrapper">
    <div class="content">
      <Nav />
      <MenuComponent/>
      <RouterView />
    </div>
    <div class="footer">
      <Footer />
    </div>
  </div>
</template>

<style>
@import 'assets/main.css';

</style>
