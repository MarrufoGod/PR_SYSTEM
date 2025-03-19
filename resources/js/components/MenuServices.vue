<template>
  <div class="min-h-screen overflow-auto">
    <!-- Botón hamburguesa: fijo pero debajo del header -->
    <button
      class="hamburger-btn md:hidden fixed left-4 z-50 bg-sky-300 p-2 rounded shadow-lg"
      :style="{ top: `${buttonTop}px` }"
      @click="isOpen = !isOpen"
    >
      ☰
    </button>

    <!-- Menú lateral fijo en escritorio -->
    <aside class="hidden md:block w-64 bg-sky-300 p-4 h-full">
      <ul class="space-y-2">
        <li v-for="item in services" :key="item.id" class="text-center">
          <button
            class="w-full bg-white rounded text-sm py-2 px-4 text-sky-800 hover:bg-sky-400 hover:text-white transition duration-200"
            @click="selectCategory(item)"
          >
            {{ item.name }}
          </button>
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
          <li v-for="item in services" :key="item.id" class="text-center">
            <button
              class="w-full bg-white rounded text-sm py-2 px-4 text-sky-800 hover:bg-sky-400 hover:text-white transition duration-200"
              @click="selectCategory(item)"
            >
              {{ item.name }}
            </button>
          </li>
        </ul>
      </aside>
    </transition>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const isOpen = ref(false);
const buttonTop = ref(80); // Ajusta este valor según la altura de tu HeaderWeb
const services = ref([]); // Aquí guardaremos los servicios obtenidos desde la API

// Si tienes un header con altura dinámica puedes usar JS para calcularla
const header = document.querySelector('header');
if (header) {
  buttonTop.value = header.offsetHeight + 16; // 16px de margen opcional
}

// Obtener las categorías del backend
onMounted(async () => {
  try {
    const response = await axios.get('/categories'); // Aquí va la ruta de tu API
    services.value = response.data; // Asignamos las categorías obtenidas a la variable "services"
    if (services.value.length > 0) {
      emit('categorySelected', services.value[0]);
    }
  } catch (error) {
    console.error('Error al obtener categorías:', error);
    alert('Hubo un problema al obtener las categorías. Intenta más tarde.');
  }
});
const emit = defineEmits(['categorySelected']); // Emite el dato al componente padre

// Función que se ejecuta al seleccionar un botón
const selectCategory = (category) => {
  emit('categorySelected', category); // Emite el dato hacia el componente padre
};


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

/* Estilos para los botones */
button {
  background-color: white;
  border-radius: 0.375rem;
  padding: 0.5rem 1rem;
  text-align: center;
  font-size: 0.875rem; /* Tamaño de texto pequeño */
  color: #1e40af; /* Color azul */
  transition: background-color 0.2s ease, color 0.2s ease;
}

/* Asegurar que el botón hamburguesa no ocupe todo el ancho */
.hamburger-btn {
  width: auto; /* El ancho se ajusta al contenido */
  padding-left: 1rem; /* Espaciado adecuado */
  padding-right: 1rem; /* Espaciado adecuado */
}

/* Estilos adicionales */
button:hover {
  background-color: #38bdf8; /* Color de fondo cuando se pasa el ratón */
  color: white; /* Color del texto cuando se pasa el ratón */
}

/* Media Queries para móviles */
@media (max-width: 768px) {
  .hamburger-btn {
    width: auto;
    padding-left: 1rem; /* Espaciado adecuado */
    padding-right: 1rem; /* Espaciado adecuado */
  }
}

</style>
