<script setup>
import { ref, onMounted } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import DocumentButton from "@/components/DocumentButton.vue";

const books = ref([]);

const fetchBooks = async () => {

  const response = await fetch('http://localhost:80/getBooksOverview');
  const data = await response.json();
  books.value.push(data);
  console.log(books);
}

onMounted(async () => {
  await fetchBooks();
});

</script>

<template>
  <section class="sec">
    <div class="borderDiv">
    <div class="list" >
      <div v-for="bookItem in books">
      <DataTable :value="bookItem" tableStyle="min-width: 50rem; background-color: white">
        <Column field="title" header="Buchtitel"></Column>
        <Column field="bnr" header="Buchnummer"></Column>
        <Column field="subject" header="Fach"></Column>
        <Column field="publisher" header="Verlag"></Column>
        <Column field="price" header="Preis"></Column>
        <Column field="crudAction" header="">
          <template #body="slotProps">
            <Button/>
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