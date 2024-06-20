<script setup>
import NavComponent from "@/components/NavComponent.vue";
import LoginView from "@/views/LoginView.vue";
import Imprint from "@/views/Imprint.vue";
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import MenuComponent from "@/components/MenuComponent.vue";

const fetchData = async () => {
  const response = await fetch('http://localhost:80/doRead');
  const data = await response.text();
  console.log(data);
}

fetchData();

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
