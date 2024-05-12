<script setup>
import { useRoute } from "vue-router";
import { computed } from "vue";
import AdminLayout from "@/layouts/AdminLayout.vue";
import DefaultLayout from "@/layouts/DefaultLayout.vue";
import AuthLayout from "@/layouts/AuthLayout.vue";
const route = useRoute();

const layout = computed(() => {
  if (route.meta.layout === "admin") {
    return AdminLayout;
  } else if (route.meta.layout === "auth") {
    return AuthLayout;
  } else {
    return DefaultLayout;
  }
});
</script>

<template>
  <div>
    <component :is="layout">
      <slot />
    </component>
  </div>
</template>
