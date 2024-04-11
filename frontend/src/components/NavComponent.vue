<script setup>
import Menubar from 'primevue/menubar';
import { RouterLink } from "vue-router";
import 'primevue/resources/themes/aura-dark-amber/theme.css'

const items = [
  { label: 'Startseite', to: 'home' },
  { label: 'Import', to: 'about' },
  { label: 'Logout', to: 'loginView' },
]

  /*export default {
    name: '/import',
    mounted() {
      // Make an AJAX request to the Symfony backend when the component is mounted
      axios.get('/import')
          .then(response => {
            // Handle the response from the backend
            console.log(response.data);
          })
          .catch(error => {
            // Handle errors
            console.error('Error:', error);
          });
    }
  }*/

</script>

<template>
  <Menubar class="menubar">
    <template #start>

      <a href="/">
        <img src="./icons/book_icon.png" alt="icon book" class="icon-book" />
      </a>
      <template v-for="(item, index) in items" :key="index">
        <router-link :to="{name: item.to}" class="router-link">
          {{ item.label }}
        </router-link>
      </template>

    </template>
  </Menubar>
</template>


<style scoped>
.icon-book{
  width: 2rem;
  height: 2rem;
  margin-right: 1rem;
}
.menubar {
  background-color: #4C4A51;
}

.router-link {
  color: white;
  text-decoration:none;
  margin: 0.5rem;
  transition: opacity 0.3s;
}

.router-link:hover {
  opacity: 0.7;
}

</style>