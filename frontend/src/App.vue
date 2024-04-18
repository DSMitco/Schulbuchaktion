<script setup>
import NavComponent from "@/components/NavComponent.vue";
import LoginView from "@/views/LoginView.vue";
import Imprint from "@/views/Imprint.vue";
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import HomeView from "@/views/HomeView.vue";
import AGB from "@/views/AGB.vue";
import FAQ from "@/views/FAQ.vue";
import NavView from "@/components/NavComponent.vue";

const fetchData = async () => {
  const response = await fetch('http://localhost:80/readExcel/doRead');
  const data = await response.text();
  console.log(data);
}

fetchData();

</script>


<template>
<NavView/>
  <Footer/>
</template>

<style>
@import 'assets/main.css';

</style>
