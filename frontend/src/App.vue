<script setup>
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"

</script>

<template>
  <div class="wrapper">
    <div class="content">
      <Nav />
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
