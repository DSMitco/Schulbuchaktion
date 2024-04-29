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
          <Column field="fach" header="Fach"></Column>
          <Column field="buchtitel" header="Buchtitel"></Column>
          <Column field="ebook" header="Ebook"></Column>
          <Column field="ebookplus" header="Ebook Plus"></Column>
          <Column field="teacherCopy" header="Teacher Copy"></Column>
          <Column field="klasse" header="Klasse"></Column>
          <Column field="anzahl" header="Anzahl"></Column>
        </DataTable>
      </div>
    </div>
  </section>
</template>

<style scoped>




.list{
  width:100%;
  background-color: #CCA3FD;

}

.borderDiv{
  width:65%;
  display:flex;
  padding: 1%;
  justify-content:center;
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


h1{
  text-align: center;
}




</style>


<script>

const exampleData = [
  {
    fach: 'Mathematik',
    buchtitel: 'Analysis I',
    ebook: true,
    ebookplus: false,
    teacherCopy: true,
    klasse: '4AHITN',
    anzahl: 25
  },
  {
    fach: 'Geschichte',
    buchtitel: 'Epochen der Weltgeschichte',
    ebook: false,
    ebookplus: true,
    teacherCopy: false,
    klasse: '1AHITN',
    anzahl: 30
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
