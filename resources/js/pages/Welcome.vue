<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

// Textos para el carrusel de texto
const texts = ref([
  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quo explicabo dolor odit vero, voluptate facilis harum aliquid commodi omnis repellendus animi laboriosam beatae suscipit doloremque architecto exercitationem tempore Consequatur',
  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quo explicabo dolor odit vero, voluptate facilis harum aliquid commodi omnis repellendus animi laboriosam beatae suscipit doloremque architecto exercitationem tempore Consequatur',
  'Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt quo explicabo dolor odit vero, voluptate facilis harum aliquid commodi omnis repellendus animi laboriosam beatae suscipit doloremque architecto exercitationem tempore Consequatur',
]);

const currentTextIndex = ref<number>(0);
const currentText = ref<string>(texts.value[0]);

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
  // Rotación automática del texto
  setInterval(() => {
    currentTextIndex.value = (currentTextIndex.value + 1) % texts.value.length;
    currentText.value = texts.value[currentTextIndex.value];
  }, 4000);

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
  <div>
    <Head title="Inicio" />

    <!-- Navbar -->
    <nav class="w-full px-6 py-4 bg-white dark:bg-[#1b1b18] shadow-md">
      <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
          MiSitio
        </div>
        <div class="flex gap-2">
          <Link
            :href="route('login')"
            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
          >
            Log in
          </Link>
          <Link
            :href="route('register')"
            class="inline-block rounded-sm border border-[#19140035] px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#1915014a] dark:border-[#3E3E3A] dark:text-[#EDEDEC] dark:hover:border-[#62605b]"
          >
            Register
          </Link>
        </div>
      </div>
    </nav>

    <!-- Sección principal con Texto y Formulario -->
    <div class="flex flex-col md:flex-row w-full bg-white dark:bg-[#1b1b18] py-12 px-6 max-w-7xl mx-auto gap-6">
      <!-- Sección izquierda (60%) con Texto -->
      <div class="w-full md:w-3/5 flex flex-col items-center justify-center text-center">
        <transition name="fade" mode="out-in">
          <p
            :key="currentText"
            class="text-xl md:text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4"
          >
            {{ currentText }}
          </p>
        </transition>

        <!-- Puntos indicadores del texto -->
        <div class="flex space-x-2 mt-4">
          <span
            v-for="(text, index) in texts"
            :key="index"
            class="w-3 h-3 rounded-full cursor-pointer"
            :class="{
              'bg-[#1b1b18] dark:bg-[#EDEDEC]': index === currentTextIndex,
              'bg-gray-300 dark:bg-[#555]': index !== currentTextIndex,
            }"
            @click="currentTextIndex = index; currentText = texts[index]"
          ></span>
        </div>
      </div>

      <!-- Formulario (40%) -->
      <div class="w-full md:w-2/5 bg-[#f5f5f5] dark:bg-[#2c2c2a] p-6 rounded-lg shadow">
        <h2 class="text-lg font-bold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">Contáctanos</h2>
        <form @submit.prevent>
          <div class="mb-4">
            <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Nombre</label>
            <input
              type="text"
              class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
              placeholder="Tu nombre"
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Correo</label>
            <input
              type="email"
              class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
              placeholder="ejemplo@correo.com"
            />
          </div>
          <div class="mb-4">
            <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Mensaje</label>
            <textarea
              rows="3"
              class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
              placeholder="Escribe tu mensaje aquí..."
            ></textarea>
          </div>
          <button
            type="submit"
            class="bg-[#1b1b18] text-white px-4 py-2 rounded hover:bg-[#333] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#d6d6d6]"
          >
            Enviar
          </button>
        </form>
      </div>
    </div>

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
  </div>
</template>

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.6s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
.carousel-inner {
  transition: transform 0.5s ease;
}
.carousel-item {
  min-width: 0;
}
</style>