<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import HeaderWeb from '../components/HeaderWeb.vue';
import TextCarrusel from '../components/TextCarrusel.vue';
import ImageCarrusel from '@/components/ImageCarrusel.vue';
import FooterWeb from '@/components/FooterWeb.vue';

</script>

<template>
  <div>
    <Head title="Inicio" />
    <HeaderWeb/>
    <TextCarrusel/>
    <ImageCarrusel/>
    <FooterWeb/>
  </div>
</template>
