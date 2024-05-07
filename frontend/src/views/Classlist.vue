<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import DocumentButton from "@/components/DocumentButton.vue";

const classes = ref([]);

const fetchClasses = async () => {

  const response = await fetch('http://localhost:80/getClasses');
  const data = await response.json();
  classes.value.push(data);
  console.log(classes);
}

onMounted(async () => {
  await fetchClasses();
});

</script>

<template>
  <section class="sec">
    <div class="borderDiv">
    <div class="list" >
      <div v-for="classItem in classes">
      <DataTable :value="classItem" tableStyle="min-width: 50rem; background-color: white">
        <Column field="name" header="Klassenname"></Column>
        <Column field="department" header="Abteilung"></Column>
        <Column field="studentsamount" header="Anzahl der Schüler"></Column>
        <Column field="repamount" header="Anzahl der Repetenten"></Column>
        <Column field="year" header="Schuljahr"></Column>
        <Column field="crudAction" header="">
          <template #body="slotProps">
            <component :is="slotProps.data.crudAction"> </component>
          </template>

        </Column>
      </DataTable>
      </div>



    </div>
    </div>
  </section>
</template>

<style scoped>

.list {
  width: 100%;
  background-color: #CCA3FD;

}

.borderDiv {
  width: 65%;
  display: flex;
  padding: 1%;
  justify-content: center;
  align-items: center;
  background-color: #652EA8;
  border-radius: 20px;

}

.sec {
  margin-top: 3%;
  display: flex;
  justify-content: center;
  align-items: center;
}


</style>