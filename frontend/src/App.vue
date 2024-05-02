<script setup>
import NavView from "@/components/NavComponent.vue";

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
    <input type="file" @change="uploadFile" accept=".xlsx" />
</template>

<style>
</style>
