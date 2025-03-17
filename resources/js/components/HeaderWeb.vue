<script setup lang="ts">
import { ref } from 'vue'
import { Link } from '@inertiajs/vue3'

const mobileMenuOpen = ref(false)
</script>

<template>
  <header>
    <nav class="w-full px-6 py-4 bg-white dark:bg-[#1b1b18] shadow-md">
      <div class="flex justify-between items-center max-w-7xl mx-auto">
        <!-- Logo -->
        <div class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
          MiSitio
        </div>

        <!-- Navegación en desktop -->
        <div class="hidden md:flex gap-4">
          <Link :href="route('home')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Inicio</Link>
          <Link :href="route('ListServices')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Servicios</Link>
          <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Proyectos</Link>
          <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Contacto</Link>
        </div>

        <!-- Botones de login/registro -->
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

          <!-- Menú hamburguesa en móvil -->
          <button
            class="ml-2 md:hidden text-[#1b1b18] dark:text-[#EDEDEC] focus:outline-none"
            @click="mobileMenuOpen = !mobileMenuOpen"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Menú lateral en móvil -->
      <transition name="slide">
        <div
          v-if="mobileMenuOpen"
          class="fixed top-0 right-0 w-64 h-full bg-white dark:bg-[#1b1b18] shadow-lg z-50 p-6 md:hidden"
        >
          <div class="flex justify-between items-center mb-6">
            <span class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Menú</span>
            <button @click="mobileMenuOpen = false" class="text-[#1b1b18] dark:text-[#EDEDEC]">
              ✕
            </button>
          </div>
          <nav class="flex flex-col gap-4">
            <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Inicio</Link>
            <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Servicios</Link>
            <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Proyectos</Link>
            <Link href="#" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Contacto</Link>
          </nav>
        </div>
      </transition>
    </nav>
  </header>
</template>

<style scoped>
.slide-enter-active,
.slide-leave-active {
  transition: transform 0.3s ease;
}
.slide-enter-from {
  transform: translateX(100%);
}
.slide-enter-to {
  transform: translateX(0%);
}
.slide-leave-from {
  transform: translateX(0%);
}
.slide-leave-to {
  transform: translateX(100%);
}
</style>
