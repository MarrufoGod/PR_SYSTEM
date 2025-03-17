<!-- ModalService.vue -->
<template>
    <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/50">
      <div class="max-h-[90vh] overflow-y-auto rounded-xl bg-sky-300 p-6 shadow-lg w-full max-w-4xl">
        <h2 class="text-2xl font-bold text-center mb-6">CERAMIC TILE</h2>
  
        <form class="space-y-4">
          <!-- Primera fila -->
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="First Name" class="rounded-full px-4 py-2 w-full" />
            <input type="email" placeholder="Email" class="rounded-full px-4 py-2 w-full" />
          </div>
  
          <!-- Segunda fila -->
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="Home Phone" class="rounded-full px-4 py-2 w-full" />
            <input type="text" placeholder="Telephone number" class="rounded-full px-4 py-2 w-full" />
          </div>
  
          <!-- Tercera fila -->
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="What job do you want?" value="CERAMIC TILE" class="rounded-full px-4 py-2 w-full" />
            <div class="flex gap-2 items-center">
              <input type="number" placeholder="Size" value="20" class="rounded-full px-4 py-2 w-full" />
              <span class="text-sm">sq ft/ft²</span>
            </div>
          </div>
  
          <!-- Cuarta fila -->
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="The client proposes his price" class="rounded-full px-4 py-2 w-full" />
            <div class="flex gap-2">
              <input type="date" class="rounded-full px-4 py-2 w-full" />
            </div>
          </div>
  
          <!-- Quinta fila -->
          <div class="grid grid-cols-2 gap-4">
            <input type="text" placeholder="Where is it located?" class="rounded-full px-4 py-2 w-full" />
            <input type="text" placeholder="ZIP" class="rounded-full px-4 py-2 w-full" />
          </div>
  
          <!-- Precio -->
          <select class="rounded-full px-4 py-2 w-full">
            <option selected disabled>Price</option>
            <option>$10</option>
            <option>$20</option>
            <option>$30</option>
          </select>
  
          <!-- Botón de imágenes -->
          <div>
            <button type="button" class="bg-green-200 px-4 py-1 rounded-full mb-2">Add Images</button>
            <div class="grid grid-cols-3 gap-2">
              <img src="/images/example.jpg" class="h-28 rounded shadow" />
              <img src="/images/example.jpg" class="h-28 rounded shadow" />
              <img src="/images/example.jpg" class="h-28 rounded shadow" />
            </div>
          </div>
  
          <!-- Descripción -->
          <div>
            <label class="block mb-1">Description</label>
            <textarea rows="4" class="w-full rounded-xl p-3 resize-none"></textarea>
          </div>
  
          <!-- Botones -->
          <div class="flex justify-between mt-4">
            <button type="button" class="bg-white px-6 py-2 rounded-full">Cancel</button>
            <button type="submit" class="bg-white px-6 py-2 rounded-full">Send</button>
          </div>
        </form>
      </div>
    </div>
  </template>
  

<script setup >
import { ref } from 'vue'; // ✅ ESTE IMPORT ES NECESARIO

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
    emit('update:modelValue', false); // Cerrar modal
};

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


