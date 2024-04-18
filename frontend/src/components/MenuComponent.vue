<script setup>
import Menubar from 'primevue/menubar';
import 'primevue/resources/themes/aura-dark-amber/theme.css'
import { RouterLink } from "vue-router";

const items = [
  {label: 'Bestellliste', to: 'orderList'},
  {label: 'Bestellübersicht',  to: 'orderOverView'},
  {label: 'Klassenübersicht',  to: 'classList'},

];

</script>
<template>
  <div class="menu" >
    <div v-for="item in items" class="router-div">
      <router-link :to="item.to" class="router-link">{{item.label}}</router-link>
    </div>
  </div>
</template>

<style scoped>

.menu {
  display: flex;
  justify-content: center;
  width: 33%;
  background-color: #5A4F77;
  margin: 2% auto auto auto;
  border: 3px #CCA3FD;
  border-radius:20px;
}


.router-link {
  text-decoration: none;
  color: white;
  padding: 5%;

}

/*
.router-link:hover{
  background-color:#AC6ECE;
  color:black;
}
*/

.router-div {
  margin:2%;
  font-size:17px;
}

</style>
