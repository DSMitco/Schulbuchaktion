<script setup>
import Menubar from 'primevue/menubar';
import 'primevue/resources/themes/aura-dark-amber/theme.css'
import { RouterLink } from "vue-router";

const items = [
  {label: 'Bestellliste', to: 'orderList'},
  {label: 'Bestellübersicht',  to: 'orderOverview'},
  {label: 'Klassenübersicht',  to: 'classList'},

];

</script>

<template>
  <Menubar class="menu">
    <template #start id="startTemplate">
    <template v-for="item in items" >
        <router-link :to="{name: item.to}" class="router-link rr">
          {{ item.label }}
        </router-link>
    </template>
    </template>

  </Menubar>
</template>

<style scoped>
.menu {
  display:flex;
  justify-content:center;
  width: 33%;
  background-color: #5A4F77;
  margin: 2% auto auto auto;
  border: 3px #CCA3FD;
}


.router-link{
  text-decoration:none;
  color:white;
  padding:5%;
}

.router.link:hover{
  background-color:white;
}

</style>
