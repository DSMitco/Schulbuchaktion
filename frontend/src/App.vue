<script setup>
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import MenuComponent from "@/components/MenuComponent.vue";
import LoginView from "@/views/LoginView.vue";

/*const fetchData = async () => {
  const response = await fetch('http://localhost:80/readExcel/doRead');
  const data = await response.text();
  console.log(data);
}

fetchData();
 */
</script>

<template>
  <RouterView></RouterView>
<!--

Überprüfen, ob der Login Button bei der LoginView gedrückt wurde. Wen n ja -> weiterleiten auf die HomeView
-->
</template>

<style>
@import 'assets/main.css';

</style>
