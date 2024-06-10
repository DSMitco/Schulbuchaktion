<script setup>
import { ref } from "vue";
import Dropdown from "primevue/dropdown";

const selectedBook = ref();
const books = ref([
  { name: 'New York', code: 'NY' },
  { name: 'Rome', code: 'RM' },
  { name: 'London', code: 'LDN' },
  { name: 'Istanbul', code: 'IST' },
  { name: 'Paris', code: 'PRS' }
]);
</script>

<template>
  <div class="card flex justify-content-center">
    <Dropdown v-model="selectedBook" variant="filled" :options="books" optionLabel="name" placeholder="Schulbuch auswählen" class="w-full md:w-14rem" />
  </div>
</template>

<style scoped>

</style>