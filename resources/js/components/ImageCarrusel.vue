<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../components/HeaderWeb.vue';
import TextCarrusel from '../components/TextCarrusel.vue';




// Imágenes para los carruseles de imágenes
const paintingImages = ref([
  { src: 'https://source.unsplash.com/800x400/?painting,worker' },
  { src: 'https://source.unsplash.com/800x400/?painting,wall' },
  { src: 'https://source.unsplash.com/800x400/?painting,ladder' },
  { src: 'https://source.unsplash.com/800x400/?painting,brush' },
  { src: 'https://source.unsplash.com/800x400/?painting,roller' },
  { src: 'https://source.unsplash.com/800x400/?painting,interior' },
]);

const ceramicTileImages = ref([
  { src: 'https://source.unsplash.com/800x400/?tile,ceramic' },
  { src: 'https://source.unsplash.com/800x400/?tile,installation' },
  { src: 'https://source.unsplash.com/800x400/?tile,floor' },
  { src: 'https://source.unsplash.com/800x400/?tile,bathroom' },
  { src: 'https://source.unsplash.com/800x400/?tile,kitchen' },
  { src: 'https://source.unsplash.com/800x400/?tile,design' },
]);

const paintingOffset = ref<number>(0);
const ceramicOffset = ref<number>(0);
const imagesPerSlide = 4;

onMounted(() => {
  // Rotación automática de las imágenes
  setInterval(() => {
    paintingOffset.value = (paintingOffset.value + 1) % Math.ceil(paintingImages.value.length / imagesPerSlide);
  }, 4000);

  setInterval(() => {
    ceramicOffset.value = (ceramicOffset.value + 1) % Math.ceil(ceramicTileImages.value.length / imagesPerSlide);
  }, 4000);
});

// Funciones para navegar manualmente en los carruseles
const prevPainting = () => {
  if (paintingOffset.value > 0) {
    paintingOffset.value--;
  } else {
    paintingOffset.value = Math.ceil(paintingImages.value.length / imagesPerSlide) - 1;
  }
};

const nextPainting = () => {
  paintingOffset.value = (paintingOffset.value + 1) % Math.ceil(paintingImages.value.length / imagesPerSlide);
};

const prevCeramic = () => {
  if (ceramicOffset.value > 0) {
    ceramicOffset.value--;
  } else {
    ceramicOffset.value = Math.ceil(ceramicTileImages.value.length / imagesPerSlide) - 1;
  }
};

const nextCeramic = () => {
  ceramicOffset.value = (ceramicOffset.value + 1) % Math.ceil(ceramicTileImages.value.length / imagesPerSlide);
};
</script>
<template>
    <!-- Carrusel de imágenes (separado por secciones) -->
    <div class="w-full max-w-7xl mx-auto px-6 py-12 bg-white dark:bg-[#1b1b18]">
      <!-- Sección Painting -->
      <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4 text-center">PAINTING</h2>
      <div class="relative w-full overflow-hidden rounded-lg shadow-lg">
        <div class="carousel-inner flex" :style="{ transform: `translateX(-${paintingOffset * (100 / imagesPerSlide)}%)` }">
          <div v-for="(image, index) in paintingImages" :key="index" class="carousel-item flex-shrink-0 w-1/4 relative">
            <img :src="image.src" :alt="`PAINTING ${index + 1}`" class="w-full h-64 object-cover">
          </div>
        </div>
        <!-- Botones de navegación -->
        <button @click="prevPainting" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-r-lg hover:bg-gray-600">❮</button>
        <button @click="nextPainting" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-l-lg hover:bg-gray-600">❯</button>
        <!-- Puntos indicadores dentro del carrusel -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
          <span
            v-for="i in Math.ceil(paintingImages.length / imagesPerSlide)"
            :key="i"
            class="w-3 h-3 rounded-full cursor-pointer"
            :class="{
              'bg-[#1b1b18] dark:bg-[#EDEDEC]': i - 1 === paintingOffset,
              'bg-gray-300 dark:bg-[#555]': i - 1 !== paintingOffset,
            }"
            @click="paintingOffset = i - 1"
          ></span>
        </div>
      </div>

      <!-- Sección Ceramic Tile -->
      <h2 class="text-2xl font-bold text-[#1b1b18] dark:text-[#EDEDEC] mb-4 mt-12 text-center">CERAMIC TILE</h2>
      <div class="relative w-full overflow-hidden rounded-lg shadow-lg">
        <div class="carousel-inner flex" :style="{ transform: `translateX(-${ceramicOffset * (100 / imagesPerSlide)}%)` }">
          <div v-for="(image, index) in ceramicTileImages" :key="index" class="carousel-item flex-shrink-0 w-1/4 relative">
            <img :src="image.src" :alt="`CERAMIC TILE ${index + 1}`" class="w-full h-64 object-cover">
          </div>
        </div>
        <!-- Botones de navegación -->
        <button @click="prevCeramic" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-r-lg hover:bg-gray-600">❮</button>
        <button @click="nextCeramic" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-l-lg hover:bg-gray-600">❯</button>
        <!-- Puntos indicadores dentro del carrusel -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-2">
          <span
            v-for="i in Math.ceil(ceramicTileImages.length / imagesPerSlide)"
            :key="i"
            class="w-3 h-3 rounded-full cursor-pointer"
            :class="{
              'bg-[#1b1b18] dark:bg-[#EDEDEC]': i - 1 === ceramicOffset,
              'bg-gray-300 dark:bg-[#555]': i - 1 !== ceramicOffset,
            }"
            @click="ceramicOffset = i - 1"
          ></span>
        </div>
      </div>
    </div>
</template>