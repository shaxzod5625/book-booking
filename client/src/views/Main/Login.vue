<script setup>

</script>
<template>
  <div class="max-w-screen-xl mx-auto">
    <h1 class="text-4xl text-center mt-8">Login</h1>
    <form class="max-w-md mx-auto mt-8">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
      </div>
      <div class="mb-4">
        <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4">Login</button>
      </div>
    </form>
  </div>

</template>