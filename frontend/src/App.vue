<script setup>
import NavView from "@/components/NavComponent.vue";
const fetchData = async () => {
  const response = await fetch('http://localhost:80/readExcel/doRead');
  const data = await response.text();
  console.log(data);
}

fetchData();

</script>


<template>
  <NavView />

</template>

<style>
body{
  background-color: red;
}

</style>
