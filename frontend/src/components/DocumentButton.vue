<script setup>

  import 'primevue/resources/themes/aura-light-green/theme.css'
  import Button from "primevue/button";
  import TieredMenu from "primevue/tieredmenu";
  import {ref} from "vue";

  const menu = ref();
  const items = ref([

  {
    label: 'Bearbeiten',
    icon: 'pi pi-file-edit',
  },
  {
    label: 'Duplizieren',
    icon: 'pi pi-copy'
  },
  {
    label: 'Löschen',
    icon: 'pi pi-times'
  },
  {
    separator: true
  }
  ])
  ;

  const toggle = (event) => {
  menu.value.toggle(event);
};

</script>

<template>
  <div class="card flex justify-content-center">
    <Button type="button" class="buttonstyle" label="Options" @click="toggle" aria-haspopup="true" aria-controls="overlay_tmenu"/>
    <TieredMenu ref="menu" id="overlay_tmenu" :model="items" popup/>
  </div>
</template>

<style scoped>
.buttonstyle{
  background-color: #652EA8;
  color: white;
  border-color:#CCA3FD;
}
</style>