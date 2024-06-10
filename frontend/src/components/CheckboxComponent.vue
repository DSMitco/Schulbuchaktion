
<script setup>
import { ref } from "vue";
import Checkbox from "primevue/checkbox";

const checked = ref(false);
</script>

<template>
  <div class="card flex justify-content-center">
    <Checkbox v-model="checked" :binary="true" />
  </div>
</template>



<style scoped>

</style>