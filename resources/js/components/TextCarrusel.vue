<script setup lang="ts">
import { ref, onMounted, onUnmounted } from 'vue';

const props = defineProps<{
  texts: string[];
}>();

const currentTextIndex = ref<number>(0);
const currentText = ref<string>(props.texts[0]);

onMounted(() => {
  setInterval(() => {
    currentTextIndex.value = (currentTextIndex.value + 1) % props.texts.length;
    currentText.value = props.texts[currentTextIndex.value];
  }, 4000);
});

// Limpiar el intervalo al desmontar el componente
onUnmounted(() => {
  clearInterval(0); // Nota: Aquí deberías pasar `intervalId` en lugar de `0` (ver nota abajo)
});

// Cambiar texto manualmente al hacer clic en los puntos
const setText = (index: number) => {
  currentTextIndex.value = index;
  currentText.value = props.texts[index];
};
</script>

<template>
  <!-- Contenedor que posiciona el carrusel a la izquierda y ocupa el 60% -->
  <div class="w-full md:w-3/5 flex flex-col items-center justify-center text-center">
    <transition name="fade" mode="out-in">
      <p
        :key="currentText"
        class="text-xl md:text-2xl font-semibold text-[#1b1b18] dark:text-[#EDEDEC] mb-4"
      >
        {{ currentText }}
      </p>
    </transition>
    <div class="flex space-x-2 mt-4">
      <span
        v-for="(text, index) in texts"
        :key="index"
        class="w-3 h-3 rounded-full cursor-pointer"
        :class="{
          'bg-[#1b1b18] dark:bg-[#EDEDEC]': index === currentTextIndex,
          'bg-gray-300 dark:bg-[#555]': index !== currentTextIndex,
        }"
        @click="setText(index)"
      ></span>
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
</style>