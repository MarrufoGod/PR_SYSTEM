<script setup>
import { ref } from 'vue';
import ModalService from './ModalService.vue';

const showModal = ref(false);

const images = ['/images/ceramic1.jpg', '/images/ceramic2.jpg'];

const currentImage = ref(0);

const nextImage = () => {
    currentImage.value = (currentImage.value + 1) % images.length;
};

const prevImage = () => {
    currentImage.value = (currentImage.value - 1 + images.length) % images.length;
};
</script>

<template>
    <section class="mx-auto max-w-4xl space-y-6 rounded-2xl bg-sky-200 p-6 text-center">
        <h2 class="text-2xl font-semibold">Our Works</h2>
        <h3 class="text-xl font-bold uppercase">Ceramic Tile</h3>

        <div class="flex items-center justify-center space-x-2">
            <button @click="prevImage" class="text-xl font-bold">‹</button>
            <img :src="images[currentImage]" alt="Ceramic tile" class="h-48 w-64 rounded object-cover shadow" />
            <img :src="images[currentImage]" alt="Ceramic tile3" class="h-48 w-64 rounded object-cover shadow" />
            <button @click="nextImage" class="text-xl font-bold">›</button>
        </div>

        <p class="mx-auto max-w-2xl text-sm leading-relaxed">
            Field Installation Services Installation Services in perfectoremodel corp. we’ve been in the industry for many years, we understand the
            daily operations maintenance personnel undergo. Therefore, we provide trained, experienced and insured ceramic installers to reduce
            downtime and labor costs and to increase overall productivity. your project is guaranteed well done in residential or commercial work. We
            are experts in porcelain, travertine, ceramic and stone installation as well as hardwood, laminate, carpeting It doesn’t matter whether
            you need installation at a commercial or retail facility, or if you need ceramic and stone installation for your kitchen or bathroom. We
            offer personal service and attention for everyone. Our work is quick,clean and affordable! Get the exact look you want with our
            professional installation services! PERFECTO REMODEL is the key for perfect work
        </p>

        <button class="rounded-full bg-white px-6 py-2 font-semibold text-black shadow transition hover:bg-gray-100" @click="showModal = true">
            Request
        </button>
    </section>

    <!-- Modal Component -->
    <ModalService v-model="showModal" />
</template>
