<script setup>
import { ref } from "vue";
import Dropdown from "primevue/dropdown";

const selectedRepMode = ref();
const repetendenModes = ref([
  { name: 'nur Repetenten' },
  { name: 'mit Repetenten' },
  { name: 'ohne Repetenten'}
]);
</script>

<template>
  <div class="card flex justify-content-center">
    <Dropdown v-model="selectedRepMode" variant="filled" :options="repetendenModes" optionLabel="name" placeholder="Auswahl für Repetenten" class="w-full md:w-14rem" />
  </div>
</template>




<style scoped>

</style>