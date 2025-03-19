<template>
    <div class="rounded-2xl bg-white p-6 shadow dark:bg-neutral-900">
        <!-- Encabezado -->
        <div class="mb-6 flex items-center justify-between"></div>

        <!-- Grid de trabajos en una sola línea -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-4">
            <div v-for="(job, index) in trabajos" :key="index" class="rounded-2xl bg-zinc-100 p-4 shadow dark:bg-neutral-800">
                <img :src="job.imagen" alt="Imagen del trabajo" class="mb-4 h-40 w-full rounded-xl object-cover" />
                <h3 class="text-lg font-semibold">{{ job.categoria }}</h3>
                <p class="text-sm text-gray-600 dark:text-gray-300">Precio: S/ {{ job.precio }}</p>
                <p
                    class="mt-1 text-sm font-medium"
                    :class="{
                        'text-green-600': job.estado === 'Completo',
                        'text-yellow-500': job.estado === 'En Proceso',
                        'text-red-500': job.estado === 'Pendiente',
                    }"
                >
                    Estado: {{ job.estado }}
                </p>
                <button
                    class="mt-4 w-full rounded bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700"
                    @click="emit('update:modelValue', true)"
                >
                    Ver Detalles
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
const trabajos = [
    {
        categoria: 'Volantes',
        precio: 50,
        estado: 'En Proceso',
        imagen: 'https://via.placeholder.com/300x200?text=Volantes',
    },
    {
        categoria: 'Calendarios',
        precio: 80,
        estado: 'Pendiente',
        imagen: 'https://via.placeholder.com/300x200?text=Calendarios',
    },
    {
        categoria: 'Afiches',
        precio: 120,
        estado: 'Completo',
        imagen: 'https://via.placeholder.com/300x200?text=Afiches',
    },
    {
        categoria: 'Tarjetas de Presentación',
        precio: 60,
        estado: 'En Proceso',
        imagen: 'https://via.placeholder.com/300x200?text=Tarjetas',
    },
];
const emit = defineEmits(['update:modelValue']);
</script>
