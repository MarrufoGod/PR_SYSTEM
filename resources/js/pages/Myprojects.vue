<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { PageProps } from '@/types/inertia'
import { computed } from 'vue';
import { ref, onMounted } from 'vue';
import { router } from '@inertiajs/vue3';
import { Head, Link } from '@inertiajs/vue3';
import HeaderWeb from '../components/HeaderWeb.vue';
import TextCarrusel from '../components/TextCarrusel.vue';
import ImageCarrusel from '@/components/ImageCarrusel.vue';
import FooterWeb from '@/components/FooterWeb.vue';
import ProjectCard from '@/components/ProjectCard.vue';
import Search from '@/components/Search.vue';
import MyServicesModal from '@/components/MyServicesModal.vue';
interface User {
  ID: string;
  EMAIL: string;
  // Si necesitas más propiedades del usuario, agrégalas aquí.
}
const page = usePage<PageProps>(); // Usa usePage con el tipo correcto
const user = computed(() => page.props.user as User); // Haz user reactivo
const isAuthenticated = computed(() => !!user.value); // Haz isAuthenticated reactivo

const showModal = ref(false);

</script>
<template>
    <div>
        <!-- Pasamos el estado de autenticación al componente HeaderWeb -->
        <HeaderWeb :isAuthenticated="isAuthenticated" />
        <div class="mt-8">
            <Search/>
        </div>

        <!--Trabajos Disponibles-->
        <ProjectCard v-model="showModal"/>

        <!--Trabajos Listos-->
        <ProjectCard/>
        <MyServicesModal v-model="showModal" />
        <FooterWeb />
    </div>
</template>
