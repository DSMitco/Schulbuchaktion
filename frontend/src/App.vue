<script setup>
import NavComponent from "@/components/NavComponent.vue";
import LoginView from "@/views/LoginView.vue";
import Imprint from "@/views/Imprint.vue";
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import HomeView from "@/views/HomeView.vue";
import AGB from "@/views/AGB.vue";
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
