<template>
    <div class="max-w-4xl mx-auto bg-white dark:bg-gray-800 p-4 md:p-6 pt-8 rounded-xl shadow-sm mb-6">
      <form>
        <div class="flex flex-col md:flex-row md:flex-wrap md:items-end gap-4 gap-y-4">
  
          <!-- Filtro: Categoría -->
          <div class="w-full md:w-auto">
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Categoría</label>
            <select class="w-full md:w-36 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white dark:border-gray-600">
              <option>Seleccionar</option>
              <option>Mockups</option>
              <option>Templates</option>
              <option>Design</option>
              <option>Logos</option>
            </select>
          </div>
  
          <!-- Filtro: Fecha -->
          <div class="w-full md:w-auto">
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Fecha</label>
            <input type="date" class="w-full md:w-36 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white dark:border-gray-600">
          </div>
  
          <!-- Filtro: Precio -->
          <div class="w-full md:w-auto">
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Precio máx.</label>
            <input type="number" placeholder="S/ 100" class="w-full md:w-36 px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white dark:border-gray-600">
          </div>
  
          <!-- Buscar -->
          <div class="w-full">
            <label class="block mb-1 text-sm font-medium text-gray-700 dark:text-white">Buscar</label>
            <div class="flex">
              <input type="search" placeholder="Buscar productos..." class="w-full px-3 py-2 text-sm bg-gray-50 border border-gray-300 rounded-l-md focus:ring-2 focus:ring-blue-400 dark:bg-gray-700 dark:text-white dark:border-gray-600">
              <button type="submit" class="px-4 text-white bg-blue-600 rounded-r-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 6.5 6.5a7.5 7.5 0 0 0 10.65 10.65Z"/>
                </svg>
              </button>
            </div>
          </div>
  
        </div>
      </form>
    </div>
  </template>
  