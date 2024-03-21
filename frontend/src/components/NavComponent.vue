<script setup>
import Menubar from 'primevue/menubar';

const items = [
  { label: 'Home', icon: 'pi pi-home', routerLink: '/' },
  { label: 'About', icon: 'pi pi-info', routerLink: '/about' },
  { label: 'Services', icon: 'pi pi-cog', routerLink: '/services' },
  { label: 'Contact', icon: 'pi pi-envelope', routerLink: '/contact' },
  { label: 'Login', icon: 'pi pi-envelope', routerLink: '/login' },
  { label: 'Logout', icon: 'pi pi-envelope', routerLink: '/logout' }
];

</script>

<template>
  <Menubar :model="items" />
</template>

<style scoped>


</style>