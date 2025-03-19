<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

interface Auth {
    user: {
        id: number;
        name: string;
        email: string;
        // otras propiedades del usuario
    } | null; // El usuario puede ser null si no está autenticado
}

interface PageProps {
    auth: Auth;
    [key: string]: any;
    // otras propiedades si las tienes
}

const mobileMenuOpen = ref(false);

const page = usePage<PageProps>(); // Aquí indicamos el tipo de las props
const isAuthenticated = computed(() => !!page.props.auth?.user); // Verificamos si hay un usuario autenticado
</script>

<template>
    <header>
        <nav class="w-full bg-white px-6 py-4 shadow-md dark:bg-[#1b1b18]">
            <div class="mx-auto flex max-w-7xl items-center justify-between">
                <!-- Logo -->
                <div class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">MiSitio</div>

                <!-- Navegación en desktop -->
                <div class="hidden gap-4 md:flex">
                    <Link :href="route('home')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Inicio</Link>
                    <Link :href="route('ListServices')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Servicios</Link>
                    <Link :href="route('ProfileF')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Proyectos</Link>
                    <Link :href="route('SendF')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">SendToFriend</Link>
                </div>

                <!-- Botones de login/registro o perfil -->
                <div class="flex gap-2">
                    <template v-if="!isAuthenticated">
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
                    </template>

                    <template v-if="isAuthenticated">
                        <Link
                            :href="route('ProfileF')"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]"
                        >
                            Mi perfil
                        </Link>
                        <Link
                            :href="route('logout')"
                            method="post"
                            class="inline-block rounded-sm border border-transparent px-5 py-1.5 text-sm leading-normal text-[#1b1b18] transition hover:border-[#19140035] dark:text-[#EDEDEC] dark:hover:border-[#3E3E3A]">
                            Cerrar sesión
                        </Link>
                    </template>

                    <!-- Menú hamburguesa en móvil -->
                    <button class="ml-2 text-[#1b1b18] focus:outline-none dark:text-[#EDEDEC] md:hidden" @click="mobileMenuOpen = !mobileMenuOpen">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Menú lateral en móvil -->
            <transition name="slide">
                <div v-if="mobileMenuOpen" class="fixed right-0 top-0 z-50 h-full w-64 bg-white p-6 shadow-lg dark:bg-[#1b1b18] md:hidden">
                    <div class="mb-6 flex items-center justify-between">
                        <span class="text-lg font-semibold text-[#1b1b18] dark:text-[#EDEDEC]">Menú</span>
                        <button @click="mobileMenuOpen = false" class="text-[#1b1b18] dark:text-[#EDEDEC]">✕</button>
                    </div>
                    <nav class="flex flex-col gap-4">
                        <Link :href="route('home')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Inicio</Link>
                        <Link :href="route('ListServices')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Servicios</Link>
                        <Link :href="route('ProfileF')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">Proyectos</Link>
                        <Link :href="route('SendF')" class="text-sm text-[#1b1b18] hover:underline dark:text-[#EDEDEC]">SendToFriend</Link>
                    </nav>
                </div>
            </transition>
        </nav>
    </header>
</template>

