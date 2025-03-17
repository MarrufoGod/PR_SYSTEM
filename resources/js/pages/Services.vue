<script setup>
import FooterWeb from '@/components/FooterWeb.vue';
import HeaderWeb from '@/components/HeaderWeb.vue';
import InfoServices from '@/components/InfoServices.vue';
import MenuServices from '@/components/MenuServices.vue';
</script>

<template>
  <!-- Contenedor general que ocupa toda la pantalla -->
  <div class="min-h-screen flex flex-col overflow-hidden">
    <!-- Header fijo arriba -->
    <HeaderWeb />

    <!-- Zona debajo del header: menú lateral + contenido -->
    <div class="flex flex-1 overflow-hidden">
      <!-- Sidebar a la izquierda (oculto en móvil si quieres luego) -->
      <MenuServices  />

      <!-- Contenido principal con scroll -->
      <main class="flex-1 overflow-y-auto p-6 bg-gray-100 dark:bg-[#1b1b18]">
        <InfoServices />
      </main>
    </div>
  </div>
  <FooterWeb/>
</template>
