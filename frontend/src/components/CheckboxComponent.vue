
<script setup>
import {ref, watch} from "vue";
import Checkbox from "primevue/checkbox";

const props = defineProps({
  isChecked: Boolean
})
const temp = ref(props.isChecked)
</script>

<template>
  <div class="card flex justify-content-center">
    <Checkbox v-model="temp" :binary="true" disabled />
  </div>
</template>



<style scoped>

</style>