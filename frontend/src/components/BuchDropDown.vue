<script setup>
import {onMounted, ref} from "vue";
import Dropdown from "primevue/dropdown";

const selectedBook = ref();
const books = ref([]);

const fetchBooks = async () => {

  const response = await fetch('http://localhost:80/getBookNames');
  const data = await response.json();
  books.value = [...data];
  console.log(books);
}

onMounted(async () => {
  await fetchBooks();
});

</script>

<template>
  <div class="card flex justify-content-center">
    <Dropdown v-model="selectedBook" variant="filled" :options="books" optionLabel="name" placeholder="Schulbuch auswählen" class="w-full md:w-14rem" />
  </div>
</template>

<style scoped>

</style>