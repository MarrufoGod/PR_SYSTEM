<template>
    <div class="w-full md:w-2/5 bg-[#f5f5f5] dark:bg-[#2c2c2a] p-6 rounded-lg shadow">
      <h2 class="text-lg font-bold mb-4 text-[#1b1b18] dark:text-[#EDEDEC]">Contáctanos</h2>
      <form @submit.prevent>
        <div class="mb-4">
          <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Nombre</label>
          <input
            type="text"
            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
            placeholder="Tu nombre"
          />
        </div>
        <div class="mb-4">
          <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Correo</label>
          <input
            type="email"
            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
            placeholder="ejemplo@correo.com"
          />
        </div>
        <div class="mb-4">
          <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]">Mensaje</label>
          <textarea
            rows="3"
            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white"
            placeholder="Escribe tu mensaje aquí..."
          ></textarea>
        </div>
        <button
          type="submit"
          class="bg-[#1b1b18] text-white px-4 py-2 rounded hover:bg-[#333] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#d6d6d6]"
        >
          Enviar
        </button>
      </form>
    </div>
  </template>