<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import Header from '../components/HeaderWeb.vue';
import TextCarrusel from '../components/TextCarrusel.vue';
import ImageCarrusel from '@/components/ImageCarrusel.vue';
import FooterWeb from '@/components/FooterWeb.vue';

</script>

<template>
  <div>
    <Head title="Inicio" />
    <Header/>
    <TextCarrusel/>
    <ImageCarrusel/>
    <FooterWeb/>
  </div>
</template>
