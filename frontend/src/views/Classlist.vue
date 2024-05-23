<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'

const classes = ref([]);

onMounted(async () => {
  await fetchClasses();
});

const fetchClasses = async () => {
  const response = await fetch('http://localhost:80/getClasses');
  const data = await response.json();
  classes.value = data;
  console.log(classes.value);
}

</script>

<template>
  <section class="sec">
    <div class="borderDiv">
    <div class="list">
      <DataTable v-if="classes.value.length > 0" :value="classes.value" tableStyle="min-width: 50rem; background-color: white">
        <Column field="name" header="Klassenname"></Column>
        <Column field="department" header="Abteilung"></Column>
        <Column field="studentsamount" header="Anzahl der Schüler"></Column>
        <Column field="repamount" header="Anzahl der Repetenten"></Column>
        <Column field="year" header="Schuljahr"></Column>
      </DataTable>
    </div>
    </div>
  </section>
</template>

<style scoped>

.list{
  width:100%;
  background-color: #CCA3FD;

}

.borderDiv{
  width:65%;
  display:flex;
  padding: 1%;
  justify-content:center;
  align-items: center;
  background-color: #652EA8;
  border-radius: 20px;

}
.sec {
  margin-top: 3%;
  display:flex;
  justify-content:center;
  align-items: center;
}
</style>