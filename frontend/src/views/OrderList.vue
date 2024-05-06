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

Wichtiger Link für CRUD:
https://vue-crud.github.io/guide/crud/field-options.html#table


*/
const test = ref([
  {
    Jahr: '2023/24',
    Buchbezeichnung: 'Programming for Dummies',
    Klasse: '4AHTIN',
    Repetenten: 'Ja',
    EBookORPlus: 'Ja',
    crudAction: DocumentButton
  },
  {
    Jahr: '2023/24',
    Buchbezeichnung: 'Error 404? not anymore!',
    Klasse: '4BHTIN',
    Repetenten: 'Nein',
    EBookORPlus: 'Ja',
    crudAction: DocumentButton
  }
]);

function createNewItem(){
  test.value.push({
    Jahr: '',
    Buchbezeichnung: '',
    Klasse: '',
    Repetenten: '',
    EBookORPlus: '',
    crudAction: DocumentButton
  });
}

function deleteItem(item) {
  const index = test.value.findIndex(i => i === item);
  test.value.splice(index, 1);
}
//<component :is="slotProps.data.crudAction"> </component>
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
              <Column field="EBookORPlus" header="E-Book & E-Book-Plus"></Column>
              <Column field="crudAction"  header="">
                <template #body="slotProps">
                  <component :is="slotProps.data.crudAction"> </component>
                  <div class="dropdown">
                    <button class="dropbtn">Options</button>
                    <div class="dropdown-content">
                      <a @click="editItem(slotProps.data)">Bearbeiten</a>
                      <a @click="deleteItem(slotProps.data)">Löschen</a>
                    </div>
                  </div>
                </template>

              </Column>
            </DataTable>
          </div>
        </div>


      </section>
<button class="LoneBTN" @click="createNewItem">Neu</button>
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


.dropdown {
  position: relative;
  display: inline-block;
}

.dropbtn {
  background-color: #5B21B6;
  color: white;
  padding: 10px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #5B21B6;}
</style>