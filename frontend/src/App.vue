<script setup>
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"

</script>

<template class="main">
  <Nav />
  <RouterView />
  <Footer />
</template>

<style>
@import 'assets/main.css';

</style>
