<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import {onMounted, ref} from "vue";

const orders = ref([]);

const fetchClasses = async () => {

  const response = await fetch('http://localhost:80/getOrderOverview');
  const data = await response.json();
  orders.value.push(data);
  console.log(orders);
}

onMounted(async () => {
  await fetchClasses();
});



</script>

<template>
  <section class="sec">
    <div class="borderDiv">
      <div class="list" >
      <div v-for="orderItem in orders">
        <DataTable :value="orderItem" tableStyle="min-width: 50rem; background-color: white">
          <Column field="gesamtbudget" header="Gesamtbudget"></Column>
          <Column field="preis" header="Gesamter Preis"></Column>
          <Column field="abteilung" header="Abteilung"></Column>
          <Column field="prozent" header="Verbrauchtes Budget (prozentual)"></Column>
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


h1 {
  text-align: center;
}


</style>
