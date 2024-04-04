<script setup>
import Menubar from 'primevue/menubar';
import 'primevue/resources/themes/aura-dark-amber/theme.css'

const items = [
  { label: 'Startseite', routerLink: '/' },
  { label: 'Import', routerLink: '/import' },
  { label: 'Logout', routerLink: '/logout', class: 'wh' }
]

</script>

<template>
  <Menubar :model="items" class="menubar">
    <template #start>
      <a href="/">
        <img src="./icons/book_icon.png" alt="icon book" class="icon-book" />
      </a>
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


</style>