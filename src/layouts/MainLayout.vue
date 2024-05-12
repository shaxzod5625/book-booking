<script setup>
import Header from '@/components/Header.vue'
</script>
<template>
  <div>
    <Header />
    <main>
      <slot />
    </main>
    <Footer />
  </div>
</template>