<template>
    <div class="bg-sky-300 rounded-2xl shadow-md p-4 w-64">
      <h3 class="text-xl font-bold mb-1">{{ title }}</h3>
      <p class="text-sm">
        Price: <span class="font-semibold">${{ price }}</span>
      </p>
      <img :src="image" :alt="title" class="w-full h-28 object-cover rounded-md my-2" />
      <p class="text-sm">
        State: <span class="font-semibold">{{ state }}</span>
      </p>
      <button class="mt-3 px-4 py-1 text-sm bg-gray-200 hover:bg-gray-300 rounded-full">
        More Details
      </button>
    </div>
  </template>
  
  <script setup>
  defineProps({
    title: String,
    price: Number,
    image: String,
    state: String,
  });
  </script>
  