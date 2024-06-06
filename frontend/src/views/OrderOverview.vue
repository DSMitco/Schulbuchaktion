<script setup>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'

</script>

<template>
  <section class="sec">
    <div class="borderDiv">
      <div class="list">
        <DataTable :value="buecher" tableStyle="min-width: 50rem; background-color: white">
          <Column field="gesamtbudget" header="Gesamtbudget"></Column>
          <Column field="preis" header="Gesamter Preis"></Column>
          <Column field="abteilung" header="Abteilung"></Column>
          <Column field="prozent" header="Verbrauchtes Budget (prozentual)"></Column>
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


h1 {
  text-align: center;
}


</style>


<script>

import DocumentButton from "@/components/DocumentButton.vue";

const exampleData = [
  {
    gesamtbudget: '38.500€',
    preis: '25.800€',
    abteilung: 'Informationstechnologie und Netzwerktechnik',
    prozent: '85.5%',

  },
  {
    gesamtbudget: '45.000€',
    preis: '45.000€',
    abteilung: 'Elektronik',
    prozent: '100%',
  }
];

export default {
  data() {
    return {
      buecher: exampleData
    };
  }
};


</script>
