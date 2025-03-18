<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import PhotoUser from './PhotoUser.vue';
import ProjectCard from './ProjectCard.vue';
interface User {
  ID: string;
  EMAIL: string;
}

const { props } = usePage();
const user = props.auth?.user as User;  // Acceso correcto a auth.user

const isAuthenticated = !!user; // Si el usuario está presente, está autenticado
</script>

<template>
  <div class="min-h-screen flex flex-col md:flex-row items-start justify-center bg-gray-100 dark:bg-[#1a1a1a] p-4 md:p-8 gap-6">
    
    <!-- Imagen a la izquierda -->
    <div class="w-full md:w-1/3 flex justify-center items-center">
      <PhotoUser />
    </div>

    <!-- Formulario a la derecha -->
    <div class="w-full md:w-2/3 bg-[#f5f5f5] dark:bg-[#2c2c2a] p-6 rounded-lg shadow">
      <form @submit.prevent>
        <!-- ID -->
        <div class="mb-4">
          <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="first-name"> {{ user.ID }}</label>
          <input
            id="first-name"
            type="text"
            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
            placeholder="First Name"
          />
        </div>
        <!-- Nombre -->
        <div class="mb-4">
          <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="first-name"> Name</label>
          <input
            id="first-name"
            type="text"
            class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
            placeholder="First Name"
          />
        </div>

        <!-- First Name -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="first-name">First Name</label>
    <input
      id="first-name"
      type="text"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="First Name"
    />
  </div>

  <!-- Last Name -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="last-name">Last Name</label>
    <input
      id="last-name"
      type="text"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Last Name"
    />
  </div>

  <!-- Email -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="email">Email</label>
    <input
      id="email"
      type="email"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Email"
    />
  </div>

  <!-- Home Address -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="home-address">Home Address</label>
    <input
      id="home-address"
      type="text"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Home Address"
    />
  </div>

  <!-- Telephone Number -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="telephone">Telephone Number</label>
    <input
      id="telephone"
      type="tel"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Telephone Number"
    />
  </div>

  <!-- User -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="user">User</label>
    <input
      id="user"
      type="text"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="User"
    />
  </div>

  <!-- Change Password -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="new-password">Change Password</label>
    <input
      id="new-password"
      type="password"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="New Password"
    />
  </div>

  <!-- Confirm Password -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="confirm-password">Confirm Password</label>
    <input
      id="confirm-password"
      type="password"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Confirm Password"
    />
  </div>

  <!-- Security Question -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="security-question">Security Question</label>
    <select
      id="security-question"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
    >
      <option value="pet-name">What’s the name of your pet?</option>
      <option value="first-school">What’s the name of your first school?</option>
      <option value="favorite-color">What’s your favorite color?</option>
    </select>
  </div>

  <!-- Answer to Security Question -->
  <div class="mb-4">
    <label class="block text-sm mb-1 text-[#1b1b18] dark:text-[#EDEDEC]" for="security-answer">Answer</label>
    <input
      id="security-answer"
      type="text"
      class="w-full px-3 py-2 rounded border border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] dark:text-white focus:outline-none focus:ring-2 focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC] transition"
      placeholder="Answer"
    />
  </div>

  <!-- Receive Automatic Emails Checkbox -->
  <div class="mb-4">
    <label class="flex items-center text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
      <input
        type="checkbox"
        class="mr-2 rounded border-gray-300 dark:border-[#555] dark:bg-[#1b1b18] focus:ring-[#1b1b18] dark:focus:ring-[#EDEDEC]"
      />
      Receive automatic emails
    </label>
  </div>

  <!-- Update Button -->
        <div class="flex justify-end">
          <button
            type="submit"
            class="bg-[#1b1b18] text-white px-4 py-2 rounded hover:bg-[#333] dark:bg-[#EDEDEC] dark:text-[#1b1b18] dark:hover:bg-[#d6d6d6] transition"
          >
            Update
          </button>
        </div>
      </form>
    </div>
  </div>
  
  <div class="w-full md:w-1/3 flex justify-center items-center">
    <ProjectCard/>
    </div>
</template>
