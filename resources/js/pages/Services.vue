<script setup>
import { onMounted } from 'vue'; // Importar onMounted

import { ref } from 'vue'; // Asegúrate de importar ref si lo necesitas
import FooterWeb from '@/components/FooterWeb.vue';
import HeaderWeb from '@/components/HeaderWeb.vue';
import InfoServices from '@/components/InfoServices.vue';
import MenuServices from '@/components/MenuServices.vue';

// Recibimos las categorías como una prop
const props = defineProps({
  categories: Array,  // Especificamos que 'categories' es un arreglo
});

const zoomedImage = ref(null);

// Usar onMounted para ejecutar lógica cuando el componente se monta
onMounted(() => {
  console.log('El componente se ha montado');
  // Puedes agregar lógica adicional aquí si es necesario
});

// Variable para almacenar la categoría seleccionada
const selectedCategory = ref(null);
// Función para manejar la selección de categoría
const handleCategorySelected = (category) => {
  selectedCategory.value = category;
  console.log('Categoría seleccionada:', category);
};
</script>

<template>
  <!-- Contenedor general que ocupa toda la pantalla -->
  <div class="min-h-screen flex flex-col overflow-hidden">
    <!-- Header fijo arriba -->
    <HeaderWeb />

    <!-- Zona debajo del header: menú lateral + contenido -->
    <div class="flex flex-1 overflow-hidden">
      <!-- Sidebar a la izquierda (oculto en móvil si quieres luego) -->
      <MenuServices :categories="categories" @categorySelected="handleCategorySelected" /> <!-- Pasamos las categorías como prop -->

      <!-- Contenido principal con scroll -->
      <main class="flex-1 overflow-y-auto p-6 bg-gray-100 dark:bg-[#1b1b18]">
        <InfoServices :categories="categories" :selectedCategory="selectedCategory"/>
      </main>
    </div>
  </div>
  <FooterWeb/>
</template>
