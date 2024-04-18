<script setup lang="ts">
import { ref } from 'vue';
import DataTablesCore from 'datatables.net-bs5';
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import 'primevue/resources/themes/aura-light-green/theme.css'
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
*** wegen funktionen evt. eine wietere Spalte für die Auswahl erstellen

Notiz: so ca. wie die Excel-Tabelle machen
Notiz: ajax für csv
Links-Haufen (ignorieren)
https://www.codementor.io/@pmbanugo/how-to-build-a-real-time-editable-data-table-in-vue-js-kuxfvb215
https://www.npmjs.com/package/vue3-easy-data-table
https://at.video.search.yahoo.com/yhs/search;_ylt=AwrNYtgM0Rxm0U459tiUCYpQ;_ylu=c2VjA3NlYXJjaAR2dGlkAw--?p=simple+Datatable+vue.js+with+reactive+data+from+xsl+file&ei=UTF-8&fr2=p%3As%2Cv%3Av%2Cm%3Asb%2Crgn%3Atop&fr=yhs-airfind-03&hsimp=yhs-03&hspart=airfind&type=50307_30_YHS
https://www.youtube.com/watch?v=bwnK-vp1c0I
https://github.com/GerkinDev/vuejs-datatable/tree/master
https://medium.com/free-code-camp/how-to-build-a-real-time-editable-data-table-in-vue-js-46b7f0b11684
https://datatables.net/forums/discussion/77193/working-with-vue-3-reactive-data
https://www.reddit.com/r/vuejs/comments/lv3x0n/responsive_datatables_for_vue_3_the_easy_way/
https://madewithvuejs.com/blog/best-vue-js-datatables
https://datatables.net/blog/2022/vue
*/

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
              <Column field="Auswahl" header="Auswahl"></Column>
            </DataTable>
          </div>
        </div>

        <button class="toggle" @click="active = !active">Options</button>
        <div v-if="active"  id="dropdown" class="action-div">
          <ul>
            <li><button v-show="active" @click="editData">Bearbeiten</button></li>
            <li><button v-show="active" @click="deleteData">Löschen</button></li>
            <li><button v-show="active" @click="duplicateData">Duplizieren</button></li>
          </ul>
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
  border: 2px solid #652EA8;
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
  border-radius: 4px;
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