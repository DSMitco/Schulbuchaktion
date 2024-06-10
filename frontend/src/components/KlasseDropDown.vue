<script setup>
import { ref } from "vue";
import Dropdown from "primevue/dropdown";

const selectedClass = ref();
const classes = ref([
  { name: 'New York', code: 'NY' },
  { name: 'Rome', code: 'RM' },
  { name: 'London', code: 'LDN' },
  { name: 'Istanbul', code: 'IST' },
  { name: 'Paris', code: 'PRS' }
]);
</script>

<template>
  <div class="card flex justify-content-center">
    <Dropdown v-model="selectedClass" variant="filled" :options="classes" optionLabel="name" placeholder="Klasse auswählen" class="w-full md:w-14rem" />
  </div>
</template>




<style scoped>

</style>