<script setup lang="ts">
import { ref } from 'vue';
import DataTablesCore from 'datatables.net-bs5';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import DocumentButton from "../components/DocumentButton.vue";
/*
--[OPTIONEN] muss haben:
--> Jahr
--> Buchbezeichnung
--> Klasse auswählen
--> Repetenten auswahl? (Repetent: Ja, Nein, nur für Repetenten bestellen)
--> Auswahl E-Book & E-Book-Plus

--[FUNKTIONEN] muss haben:
--> erstellen
--> bearbeiten
--> speichern
--> löschen
-- soll haben:
--> duplizieren
*/
const test = [
  {
    Jahr: '2023/24',
    Buchbezeichnung: 'Buch',
    Klasse: '4AHTIN',
    Repetenten: 'Ja',
    crudAction: DocumentButton
  },
  {
    Jahr: '2023/24',
    Buchbezeichnung: 'Buch 3',
    Klasse: '4BHTIN',
    Repetenten: 'Nein',
    crudAction: DocumentButton
  }
]

const active = ref(false);
</script>

<template>

    <div id="bestell_container">
      <h1>Bestellliste</h1>

      <section class="sec">
        <div class="borderDiv">
          <div class="list">
            <DataTable :value="test" tableStyle="min-width: 50rem; background-color: white">
              <Column field="Jahr" header="Schuljahr"></Column>
              <Column field="Buchbezeichnung" header="Buchbezeichnung"></Column>
              <Column field="Klasse" header="Klasse"></Column>
              <Column field="Repetenten" header="Repetenten"></Column>
              <Column field="E-Book & E-Book-Plus" header="E-Book & E-Book-Plus"></Column>
              <Column field="crudAction"  header="">
                <template #body="slotProps">
                  <component :is="slotProps.data.crudAction"> </component>
                </template>

              </Column>
            </DataTable>
          </div>
        </div>


      </section>
<button class="LoneBTN">Neu</button>
  </div>

</template>

<style scoped>

h1{
  background-color: #CCA3FD;
  padding-left: 10%;
}

.LoneBTN{
  border: 2px solid #CCA3FD;
  background-color: #652EA8;
  font-size: large;
  padding: 10px;
  margin-left: 20%;
  margin-top: 10px;
}

.action-div{
  padding-left: 5px;
}

ul{
  list-style-type: none;
}

.list{
  width:100%;
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
  display:flex;
  justify-content:center;
  align-items: center;
}

button{
  background-color: #CCA3FD;
  border-radius: 10px;
  margin-left: 20px;
  border: 2px solid #652EA8;
  font-size: medium;
}
button:hover {
  background-color: white;
  color: #5B21B6;
}

body {

  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}
</style>