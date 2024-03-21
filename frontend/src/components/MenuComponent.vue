<script setup>
import Menubar from 'primevue/menubar';

const items = [
  {label: 'Bestellliste', icon: 'pi pi-info', routerLink: '/bestellliste'},
  {label: 'Bestellübersicht', icon: 'pi pi-home', routerLink: '/bestelluebersicht'},
  {label: 'Klassenübersicht', icon: 'pi pi-cog', routerLink: '/klassenuebersicht'},

];

</script>

<template>
  <Menubar class = "menu" :model="items"/>
</template>

<style scoped>
 .menu{
   width:33%;


 }

</style>
