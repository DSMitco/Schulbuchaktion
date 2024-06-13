<script setup>
import { RouterLink } from "vue-router";

const items = [
  { label: 'Impressum', to: 'imprintView' },
  { label: 'AGB', to: 'AGBView' },
  { label: 'FAQ', to: 'FAQView' },
]

</script>

<template>
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col">
          <h4>Info</h4>
          <ul v-for="(item, index) in items" :key="index">
            <li><router-link :to="{name: item.to}" class="router-link">
              {{ item.label }}
            </router-link></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Links</h4>
          <div class="social-links">
            <a href="https://www.htl-steyr.ac.at/" target="_blank" class="htl-steyr"></a>
            <a href="https://www.schulbuchaktion.at/list" target="_blank" class="sba"></a>
          </div>
        </div>
      </div>
      <p class="copyright">© Copyright 2024</p>
    </div>
  </footer>
</template>

<style scoped>
@import '@/assets/footer.css';
</style>