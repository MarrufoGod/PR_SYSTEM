<!-- ModalService.vue -->
<template>
    <div v-if="modelValue" class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
        <div class="max-h-[90vh] w-full max-w-4xl overflow-y-auto no-scrollbar rounded-xl bg-sky-300 p-6 shadow-lg">
            <h2 class="mb-6 text-center text-2xl font-bold">CERAMIC TILE</h2>

            <form class="space-y-4">
                <!-- Primera fila -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="First Name" class="w-full rounded-full px-4 py-2" />
                    <input type="email" placeholder="Email" class="w-full rounded-full px-4 py-2" />
                </div>

                <!-- Segunda fila -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Home Phone" class="w-full rounded-full px-4 py-2" />
                    <input type="text" placeholder="Telephone number" class="w-full rounded-full px-4 py-2" />
                </div>

                <!-- Tercera fila -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="What job do you want?" value="CERAMIC TILE" class="w-full rounded-full px-4 py-2" />
                    <div class="flex items-center gap-2">
                        <input type="number" placeholder="Size" value="20" class="w-full rounded-full px-4 py-2" />
                        <span class="text-sm">sq ft/ft²</span>
                    </div>
                </div>

                <!-- Cuarta fila -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="The client proposes his price" class="w-full rounded-full px-4 py-2" />
                    <div class="flex gap-2">
                        <input type="date" class="w-full rounded-full px-4 py-2" />
                    </div>
                </div>

                <!-- Quinta fila -->
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" placeholder="Where is it located?" class="w-full rounded-full px-4 py-2" />
                    <input type="text" placeholder="ZIP" class="w-full rounded-full px-4 py-2" />
                </div>

                <!-- Precio -->
                <select class="w-full rounded-full px-4 py-2">
                    <option selected disabled>Price</option>
                    <option>$10</option>
                    <option>$20</option>
                    <option>$30</option>
                </select>

                <!-- Botón de imágenes -->
                <div>
                    <input ref="fileInput" type="file" accept="image/*" multiple class="hidden" @change="handleImageUpload" />
                    <button type="button" class="mb-4 rounded-full bg-green-200 px-4 py-1" @click="triggerFileInput">Add Images</button>

                    <!-- Carrusel de imágenes -->
                    <div class="flex space-x-4 overflow-x-auto">
                        <div v-for="(img, index) in images" :key="index" class="relative h-32 w-48 flex-shrink-0 rounded bg-white shadow">
                            <img :src="img" alt="Uploaded" class="h-full w-full cursor-zoom-in rounded object-cover" @click="zoomImage(img)" />
                            <button
                                type="button"
                                class="absolute right-1 top-1 h-6 w-6 rounded-full bg-red-500 text-sm text-white"
                                @click="removeImage(index)"
                            >
                                ×
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Descripción -->
                <div>
                    <label class="mb-1 block">Description</label>
                    <textarea rows="4" class="w-full resize-none rounded-xl p-3"></textarea>
                </div>

                <!-- Botones -->
                <div class="mt-4 flex justify-between">
                    <button type="button" class="rounded-full bg-white px-6 py-2" @click="emit('update:modelValue', false)">
  Cancel
</button>

                    <button type="submit" class="rounded-full bg-white px-6 py-2">Send</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal de zoom -->
    <template v-if="zoomedImage">
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/70" @click.self="zoomedImage = null">
            <img :src="zoomedImage" class="max-h-[90vh] max-w-[90vw] rounded-xl shadow-lg" />
        </div>
    </template>
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

  files.forEach(file => {
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
