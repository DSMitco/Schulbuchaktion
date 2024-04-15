<script setup>
import Menubar from 'primevue/menubar';
import 'primevue/resources/themes/aura-dark-amber/theme.css'
const items = [
  {label: 'Bestellliste', routerLink: 'orderListView'},
  {label: 'Bestellübersicht', routerLink: 'orderOverview'},
  {label: 'Klassenübersicht', routerLink: 'loginView'},

];

</script>

<template>
  <Menubar class = "menu" :model="items"/>
</template>

<style scoped>
 .menu{
   width:33%;
   background-color: #5A4F77;
   margin: auto;
   border: 3px #CCA3FD;
   padding: 10px;
   justify-content: center;


 }

</style>
