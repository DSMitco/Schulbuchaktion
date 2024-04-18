<script setup>

import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import MenuComponent from "@/components/MenuComponent.vue";

</script>

<template>
  <Nav />
  <MenuComponent/>
  <RouterView/>

  <Footer />
</template>

<style>
@import 'assets/main.css';

</style>
