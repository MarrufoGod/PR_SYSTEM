
<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { PageProps } from '@/types/inertia'
import { ref, onMounted } from 'vue';
import { Head, Link } from '@inertiajs/vue3';
import HeaderWeb from '../components/HeaderWeb.vue';
import TextCarrusel from '../components/TextCarrusel.vue';
import ImageCarrusel from '@/components/ImageCarrusel.vue';
import FooterWeb from '@/components/FooterWeb.vue';
interface User {
  ID: string;
  EMAIL: string;
  // Si necesitas más propiedades del usuario, agrégalas aquí.
}

const { props } = usePage();
const user = props.user as User;  // Aquí indicamos que user es del tipo User.
const isAuthenticated = !!user; // Si el usuario está presente, es que está autenticado
</script>
<template>
  <div>
    <Head title="Inicio" />
    <!-- Pasamos el estado de autenticación al componente HeaderWeb -->
    <HeaderWeb :isAuthenticated="isAuthenticated"/>
    <div v-if="user">
      <p>Bienvenido, {{ user.EMAIL }}!</p>
      <p>Tu ID es: {{ user.ID }}</p>
    </div>
    <TextCarrusel/>
    <ImageCarrusel/>
    <FooterWeb/>
  </div>
</template>
