<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css';
import 'primevue/resources/primevue.min.css';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import { FilterMatchMode } from 'primevue/api';
import DocumentButton from "@/components/DocumentButton.vue";

const classes = ref([]);
const loading = ref(true);

const fetchClasses = async () => {

  const response = await fetch('http://localhost:80/getClasses');
  const data = await response.json();
  classes.value.push(data);
  loading.value = false;
}

onMounted(async () => {
  await fetchClasses();
});

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  name: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  department: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  year: { value: null, matchMode: FilterMatchMode.STARTS_WITH }
});
</script>

<template>
  <section class="sec">
    <div class="borderDiv">
      <div class="list">
        <div v-for="classItem in classes">
        <DataTable v-model:filters="filters" :value="classItem" tableStyle="min-width: 50rem; background-color: white" dataKey="id" filterDisplay="row" :loading="loading"
                   :globalFilterFields="['name', 'department', 'year']">
          <Column field="name" header="Klassenname">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Klassenname" />
            </template>
          </Column>
          <Column field="department" header="Abteilung">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Abteilung" />
            </template>
          </Column>
          <Column field="studentsamount" header="Anzahl der Schüler"></Column>
          <Column field="repamount" header="Anzahl der Repetenten"></Column>
          <Column field="year" header="Schuljahr">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Schuljahr" />
            </template>
          </Column>
          <Column field="crudAction" header="">
            <template #body="slotProps">
              <DocumentButton :selectedID="slotProps.data.id" type="classList" />
            </template>
          </Column>
        </DataTable>
      </div>

    </div>
    </div>
  </section>
</template>

<script>
</script>

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