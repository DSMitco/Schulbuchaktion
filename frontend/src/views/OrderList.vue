<script setup >
import { ref } from 'vue';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
import DocumentButton from "../components/DocumentButton.vue";

import CheckboxComponent from "@/components/CheckboxComponent.vue";
import DropDownComponent from "@/components/KlasseDropDown.vue";
import RepetentenDropDown from "@/components/RepetentenDropDown.vue";
import KlasseDropDown from "@/components/KlasseDropDown.vue";
import BuchDropDown from "@/components/BuchDropDown.vue";
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
    Buchbezeichnung: BuchDropDown ,//ComboBox,
    Klasse: KlasseDropDown,
    Repetenten: RepetentenDropDown,
    EBook:CheckboxComponent,
    EBookPlus: CheckboxComponent,
    crudAction: DocumentButton
  },
  {
    Jahr: '2023/24',
    Buchbezeichnung: BuchDropDown ,//ComboBox,
    Klasse:KlasseDropDown ,//ComboBox,
    Repetenten: RepetentenDropDown, //ComboBox
    EBook:CheckboxComponent,
    EBookPlus: CheckboxComponent,
    crudAction: DocumentButton
  }
]

const active = ref(false);
</script>

<template>



    <div id="bestell_container">

      <button class="LoneBTN">Neu</button>
      <section class="sec">
        <div class="borderDiv">
          <div class="list">
            <DataTable :value="test" tableStyle="min-width: 50rem; background-color: white">
              <Column field="Jahr" header="Schuljahr"></Column>
              <Column field="Buchbezeichnung" header="Buchbezeichnung">
                <template #body="slotProps">
                <BuchDropDown/>
                </template>
              </Column>
              <Column field="Klasse" header="Klasse">
                <template #body="slotProps">
                  <KlasseDropDown/>
                </template>
              </Column>
              <Column field="Repetenten" header="Repetenten">
                <template #body="slotProps">
                  <RepetentenDropDown/>
                </template>
              </Column>
              <Column field="E-Book" header="E-Book">
                <template #body="slotProps">
                  <component :is="slotProps.data.EBookPlus"> </component>
                </template>
              </Column>
              <Column field="E-Book-Plus" header="E-Book-Plus">
                <template #body="slotProps">
                  <component :is="slotProps.data.EBookPlus"> </component>
                </template>
              </Column>

              <Column field="crudAction"  header="">
                <template #body="slotProps">
                  <DocumentButton/>
                </template>

              </Column>
            </DataTable>
          </div>
        </div>


      </section>

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
  margin-left:5.15%;
  margin-top: 2%;
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

.borderDiv{
  width:90%;
  display:flex;
  padding: 1%;
  justify-content:center;
  align-items: center;
  background-color: #652EA8;
  border-radius: 20px;

}
.sec {
  margin-top: 1%;
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
/*button:hover {
//  background-color: white;
//  color: #5B21B6;
}*/

body {

  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}
</style>

