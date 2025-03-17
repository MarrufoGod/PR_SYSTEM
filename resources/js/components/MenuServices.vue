<template>
    <div class="min-h-screen overflow-auto">
    <!-- Botón hamburguesa: fijo pero debajo del header -->
    <button
      class="md:hidden fixed left-4 z-50 bg-sky-300 p-2 rounded shadow-lg"
      :style="{ top: `${buttonTop}px` }"
      @click="isOpen = !isOpen"
    >
      ☰
    </button>
  
    <!-- Menú lateral fijo en escritorio -->
    <aside class="hidden md:block w-64 bg-sky-300 p-4 h-full">
      <ul class="space-y-2">
        <li v-for="item in services" :key="item" class="bg-white rounded text-center text-sm py-1">
          {{ item }}
        </li>
      </ul>
    </aside>
  
    <!-- Menú deslizable en móviles -->
<transition name="slide">
  <aside
   v-if="isOpen"
  class="md:hidden fixed top-0 left-0 w-64 h-full bg-sky-300 p-4 z-40 pt-20 overflow-y-auto hide-scroll"
  >
   
    <ul class="space-y-2">
      <li v-for="item in services" :key="item" class="bg-white rounded text-center text-sm py-1">
        {{ item }}
      </li>
    </ul>
  </aside>
</transition>

</div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue';
  
  const isOpen = ref(false);
  const buttonTop = ref(80); // Ajusta este valor según la altura de tu HeaderWeb
  
  const services = [
    'PAINTING', 'ASSEMBLING', 'BASEMENT', 'ASPHALT PARKING', 'CARPENTRY',
    'CERAMIC TILE', 'DECKS', 'DRYWALL', 'SITE PREPARATION', 'FALSE CEILING',
    'FLOORING', 'FENCE', 'GUTTER', 'INSULATION', 'MASONRY', 'POWERWASH',
    'ROOF', 'SIDING', 'SHEDS', 'WALLPAPER', 'OUT DOOR'
  ];
  
  onMounted(() => {
    // Si tienes un header con altura dinámica puedes usar JS para calcularla
    const header = document.querySelector('header');
    if (header) {
      buttonTop.value = header.offsetHeight + 16; // 16px de margen opcional
    }
  });
  </script>
  
  <style scoped>
  .slide-enter-active,
  .slide-leave-active {
    transition: transform 0.3s ease;
  }
  .slide-enter-from {
    transform: translateX(-100%);
  }
  .slide-leave-to {
    transform: translateX(-100%);
  }
  .hide-scroll {
  scrollbar-width: none; /* Firefox */
  -ms-overflow-style: none; /* IE y Edge */
}

.hide-scroll::-webkit-scrollbar {
  display: none; /* Chrome, Safari, Opera */
}
  </style>
  