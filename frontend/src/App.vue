<script setup>
import Nav from "@/components/NavComponent.vue";
import Footer from "@/components/FooterComponent.vue"
import MenuComponent from "@/components/MenuComponent.vue";

const uploadFile = async (event) => {
  const file = event.target.files[0];
  const formData = new FormData();
  formData.append('file', file);

  const response = await fetch('http://localhost:80/doRead', {
    method: 'POST',
    body: formData
  });

  const data = await response.text();
  console.log(data);
}

</script>

<template>
  <div class="wrapper">
    <div class="content">
      <Nav />
      <MenuComponent/>
      <RouterView />
      <input type="file" @change="uploadFile" accept=".xlsx" />
    </div>
    <div class="footer">
      <Footer />
    </div>
  </div>
</template>

<style>
@import 'assets/main.css';

</style>
