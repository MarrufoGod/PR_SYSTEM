<template>
    <div class="flex flex-col items-center space-y-2">
      <!-- Avatar Placeholder -->
      <div class="w-24 h-24 rounded-full bg-black flex items-center justify-center">
        <svg
          class="w-12 h-12 text-white"
          fill="currentColor"
          viewBox="0 0 24 24"
        >
          <path
            d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.2c-3.2 0-9.6 1.6-9.6 4.9v2.7h19.2v-2.7c0-3.3-6.4-4.9-9.6-4.9z"
          />
        </svg>
      </div>
  
      <!-- Update Button -->
      <button
        @click="updatePhoto"
        class="border border-gray-500 rounded px-4 py-1 text-sm hover:bg-gray-100"
      >
        Update Photo
      </button>
    </div>
  </template>
  
 
  <script setup>
  function updatePhoto() {
    // Aquí puedes abrir un input file o lanzar un modal
    alert('Funcionalidad para actualizar foto');
  }
  </script>
    