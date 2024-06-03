<script setup>
import {onMounted, ref} from "vue";
import Dropdown from "primevue/dropdown";

const selectedClass = ref();
const classes = ref([]);

const fetchClasses = async () => {
  const response = await fetch('http://localhost:80/getClassNames');
  const data = await response.json();
  classes.value = [...data];
  console.log(classes);
}

onMounted(async () => {
  await fetchClasses()
});

</script>

<template>
  <div class="card flex justify-content-center" v-for="classItem in classes">
    <Dropdown v-model="selectedClass" variant="filled" :options="cllass" optionLabel="name" placeholder="Klasse auswählen" class="w-full md:w-14rem" />
  </div>
</template>




<style scoped>

</style>