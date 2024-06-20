<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css';
import 'primevue/resources/primevue.min.css';
import InputText from 'primevue/inputtext';
import Button from 'primevue/button';
import { FilterMatchMode } from 'primevue/api';

const books = ref([]);
const loading = ref(true);

const fetchBooks = async () => {

  const response = await fetch('http://localhost:80/getBooksOverview');
  const data = await response.json();
  books.value.push(data);
  loading.value = false;
}

const addBook = async (bnr) => {
  const response = await fetch(`http://localhost:80/addBook/${bnr}`, {
    method: 'POST',
  });
  const data = await response.text();
  console.log(data);
}

onMounted(async () => {
  await fetchBooks();
});

const filters = ref({
  global: { value: null, matchMode: FilterMatchMode.CONTAINS },
  subject: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  title: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  bnr: { value: null, matchMode: FilterMatchMode.STARTS_WITH },
  publisher: { value: null, matchMode: FilterMatchMode.STARTS_WITH }
});
</script>

<template>
  <section class="sec">
    <div class="borderDiv">
      <div class="list">
        <DataTable v-model:filters="filters" :value="books" tableStyle="min-width: 50rem; background-color: white" dataKey="id" filterDisplay="row" :loading="loading"
                   :globalFilterFields="['subject', 'title']">
          <Column field="title" header="Buchtitel">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Titel" />
            </template>
          </Column>
          <Column field="bnr" header="Buchnummer">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Buchnummer" />
            </template>
          </Column>
          <Column field="subject" header="Fach">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Fach" />
            </template>
          </Column>
          <Column field="publisher" header="Verlag">
            <template #filter="{ filterModel, filterCallback }">
              <InputText v-model="filterModel.value" type="text" @input="filterCallback()" class="p-column-filter" placeholder="Suche nach Verleger" />
            </template>
          </Column>
          <Column field="price" header="Preis"></Column>
          <Column field="crudAction" header="">
            <template #body="slotProps">
              <Button @click="addBook(slotProps.data.bnr)">Bestellen</Button>
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
  width: 90%;
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
.titleStyle{
  width:50rem
}


</style>