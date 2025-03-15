<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
</script>

<template>
  <header>
    <nav class="w-full px-6 py-4 bg-white dark:bg-[#1b1b18] shadow-md">
      <div class="flex justify-between items-center max-w-7xl mx-auto">
        <div class="text-xl font-bold text-[#1b1b18] dark:text-[#EDEDEC]">
          MiSitio
        </div>
        <div class="flex gap-2">
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
        </div>
      </div>
    </nav>
  </header>
</template>