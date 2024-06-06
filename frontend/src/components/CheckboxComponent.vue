
<script setup>
import { ref } from "vue";
import Checkbox from "primevue/checkbox";

const checked = ref();

</script>

<template>
  <div class="card flex justify-content-center">
    <Checkbox v-model="checked" :binary="true" disabled />
  </div>
</template>



<style scoped>

</style>