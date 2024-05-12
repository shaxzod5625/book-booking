<script setup>
import { useStore } from 'vuex'

const store = useStore()

const isLoggedIn = store.getters['auth/isLoggedIn']

const logout = () => {
  store.dispatch('auth/logout')
}
</script>
<template>
  <header class="bg-blue-900 text-white">
    <div class="max-w-screen-xl mx-auto flex justify-between items-center p-4">
      <div class="w-1/4">
        <img class="w-full" src="@/assets/logo.png" alt="image">
      </div>
      <div class="text-xl flex">
        <router-link to="/" class="text-white">Home</router-link>
        <router-link to="/books" class="text-white ml-4">Books</router-link>
        <div v-if="isLoggedIn">
          <router-link to="/profile" class="text-white ml-4">Profile</router-link>
          <button @click="logout" class="text-white ml-4">Logout</button>
        </div>
        <div v-else>
          <router-link to="/login" class="text-white ml-4">Login</router-link>
          <router-link to="/register" class="text-white ml-4">Register</router-link>
        </div>
      </div>
    </div>
  </header>
</template>