<!-- ModalService.vue -->
<template>
    <div v-if="modelValue" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="no-scrollbar max-h-[90vh] w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-10 shadow-lg">
            <h2 class="mb-6 text-center text-2xl font-bold">CERAMIC TILE</h2>

            <form class="mx-auto max-w-md">
                <div class="group relative z-0 mb-5 w-full">
                    <input
                        type="email"
                        name="floating_email"
                        id="floating_email"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                        placeholder=" "
                        required
                    />
                    <label
                        for="floating_email"
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:left-auto rtl:peer-focus:translate-x-1/4"
                        >Email address</label
                    >
                </div>
                <div class="group relative z-0 mb-5 w-full">
                    <input
                        type="password"
                        name="floating_password"
                        id="floating_password"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                        placeholder=" "
                        required
                    />
                    <label
                        for="floating_password"
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                        >Password</label
                    >
                </div>
                <div class="group relative z-0 mb-5 w-full">
                    <input
                        type="password"
                        name="repeat_password"
                        id="floating_repeat_password"
                        class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                        placeholder=" "
                        required
                    />
                    <label
                        for="floating_repeat_password"
                        class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                        >Confirm password</label
                    >
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="group relative z-0 mb-5 w-full">
                        <input
                            type="text"
                            name="floating_first_name"
                            id="floating_first_name"
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_first_name"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                            >First name</label
                        >
                    </div>
                    <div class="group relative z-0 mb-5 w-full">
                        <input
                            type="text"
                            name="floating_last_name"
                            id="floating_last_name"
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_last_name"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                            >Last name</label
                        >
                    </div>
                </div>
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="group relative z-0 mb-5 w-full">
                        <input
                            type="tel"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
                            name="floating_phone"
                            id="floating_phone"
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_phone"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                            >Phone number (123-456-7890)</label
                        >
                    </div>
                    <div class="group relative z-0 mb-5 w-full">
                        <input
                            type="text"
                            name="floating_company"
                            id="floating_company"
                            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent px-0 py-2.5 text-sm text-gray-900 focus:border-blue-600 focus:outline-none focus:ring-0 dark:border-gray-600 dark:text-white dark:focus:border-blue-500"
                            placeholder=" "
                            required
                        />
                        <label
                            for="floating_company"
                            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm text-gray-500 duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:start-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-blue-600 dark:text-gray-400 peer-focus:dark:text-blue-500 rtl:peer-focus:translate-x-1/4"
                            >Company (Ex. Google)</label
                        >
                    </div>
                </div>
                <button
                    type="submit"
                    class="w-full rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 sm:w-auto"
                >
                    Submit
                </button>
                
                <button
                    class="mt-4 w-full rounded bg-blue-600 px-4 py-2 text-white transition hover:bg-blue-700"
                    @click="emit('update:modelValue', false)"
                >
                    Close
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';

const props = defineProps({
    modelValue: Boolean,
});

const emit = defineEmits(['update:modelValue']);

const form = ref({
    name: '',
    price: '',
});

const submitForm = () => {
    console.log('Formulario enviado:', form.value);
    emit('update:modelValue', false);
};

// 👇 Lista reactiva de imágenes
const images = ref([]);

// 👇 Referencia al input de archivos
const fileInput = ref(null);

// 📥 Manejo de carga de imágenes
function handleImageUpload(event) {
    const files = Array.from(event.target.files);

    files.forEach((file) => {
        if (!file.type.startsWith('image/')) return;

        const reader = new FileReader();
        reader.onload = () => {
            const imageData = reader.result;
            images.value.push(imageData);
        };
        reader.readAsDataURL(file);
    });

    // ✅ Limpia el input para que se pueda volver a cargar la misma imagen
    event.target.value = '';
}

// ❌ Eliminar imagen por índice
function removeImage(index) {
    images.value.splice(index, 1);
}

// 📸 Disparar input desde el botón
function triggerFileInput() {
    fileInput.value?.click();
}
</script>

<style scoped>
.no-scrollbar::-webkit-scrollbar {
    display: none;
}
.no-scrollbar {
    -ms-overflow-style: none; /* IE y Edge */
    scrollbar-width: none; /* Firefox */
}
</style>
