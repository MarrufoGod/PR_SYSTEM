<script setup>
import { ref } from 'vue';
import ModalService from './ModalService.vue';

// Asegúrate de recibir la prop correctamente en el componente InfoServices
const props = defineProps({
  selectedCategory: Object, // Suponiendo que la categoría es un objeto
});

const showModal = ref(false);


const nextImage = () => {
    currentImage.value = (currentImage.value + 1) % images.length;
};

const prevImage = () => {
    currentImage.value = (currentImage.value - 1 + images.length) % images.length;
};

//Json

</script>

<template>
    <section class="mx-auto max-w-4xl space-y-6 rounded-2xl bg-sky-200 p-6 text-center">
        <h2 class="text-2xl font-semibold">Our Works</h2>
        <h3 class="text-xl font-bold uppercase">{{selectedCategory?.name}}</h3>

        <div class="flex items-center justify-center space-x-2">
            <button @click="prevImage" class="text-xl font-bold">‹</button>
            <img :src="selectedCategory?.image" :alt="selectedCategory?.name" class="h-48 w-64 rounded object-cover shadow" />
            <img :src="selectedCategory?.image" :alt="selectedCategory?.name" class="h-48 w-64 rounded object-cover shadow" />
            <button @click="nextImage" class="text-xl font-bold">›</button>
        </div>

        <p class="mx-auto max-w-2xl text-sm leading-relaxed">
            {{selectedCategory?.description}}
        </p>

        

        <button class="rounded-full bg-white px-6 py-2 font-semibold text-black shadow transition hover:bg-gray-100" @click="showModal = true">
            Request
        </button>
    </section>

    <!-- Modal Component -->
    <ModalService v-model="showModal" />
</template>
