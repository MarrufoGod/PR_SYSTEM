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

onMounted(() => {
  // Rotación automática del texto
  setInterval(() => {
    currentTextIndex.value = (currentTextIndex.value + 1) % texts.value.length;
    currentText.value = texts.value[currentTextIndex.value];
  }, 4000);
});
</script>
<template>
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
</template>

