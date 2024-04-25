<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import DocumentButton from "@/components/DocumentButton.vue";

const test = [
  {
    klasse: '4AHITN',
    abteilung: 'Informationstechnologie',
    anzahl: 19,
    jahr: '2023/24',
    crudAction: DocumentButton
  },
  {
    klasse: '1AHITN',
    abteilung: 'Informationstechnologie',
    anzahl: 25,
    jahr: '2023/24',
    crudAction: DocumentButton
  }
];
</script>

<template>
  <section class="sec">
    <div class="borderDiv">
      <div class="list">
        <DataTable :value="test" tableStyle="min-width: 50rem; background-color: white">
          <Column field="klasse" header="Klassenname"></Column>
          <Column field="abteilung" header="Abteilung"></Column>
          <Column field="anzahl" header="Anzahl der Schüler"></Column>
          <Column field="jahr" header="Schuljahr"></Column>
          <Column field="crudAction"  header="">
                  <template #body="slotProps">
                    <component :is="slotProps.data.crudAction"> </component>
                  </template>

          </Column>

        </DataTable>
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