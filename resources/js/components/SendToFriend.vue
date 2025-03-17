<template>
    <div class="bg-sky-300 p-6 rounded-lg w-full max-w-md mx-auto mt-10 shadow-lg">
      <h2 class="text-2xl font-bold text-center mb-6">Send to a friend</h2>
      <form @submit.prevent="sendForm" class="space-y-4">
        <div class="flex flex-col">
          <label class="text-sm font-semibold">YOUR NAME</label>
          <input v-model="form.name" type="text" class="form-input" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm">Your e-mail</label>
          <input v-model="form.email" type="email" class="form-input" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm">Your friend's name</label>
          <input v-model="form.friendName" type="text" class="form-input" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm">Your friend's e-mail address</label>
          <input v-model="form.friendEmail" type="email" class="form-input" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm">Subject (optional)</label>
          <input v-model="form.subject" type="text" class="form-input" />
        </div>
        <div class="flex flex-col">
          <label class="text-sm">Message</label>
          <textarea v-model="form.message" rows="5" class="form-textarea resize-none"></textarea>
        </div>
        <div class="text-center mt-4">
          <button type="submit" class="bg-white text-black px-6 py-2 rounded-md shadow hover:shadow-md transition">
            Send
          </button>
        </div>
      </form>
    </div>
  </template>
  
  <script setup>
  import { reactive } from 'vue'
  
  const form = reactive({
    name: '',
    email: '',
    friendName: '',
    friendEmail: '',
    subject: '',
    message: ''
  })
  
  const sendForm = () => {
    console.log('Form submitted:', form)
  }
  </script>
  
  <style scoped>
  .form-input {
    background-color: white;
    padding: 8px 12px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
  }
  .form-input:focus,
  .form-textarea:focus {
    box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.2);
  }
  .form-textarea {
    background-color: white;
    padding: 10px 12px;
    border: none;
    border-radius: 6px;
    font-size: 14px;
    outline: none;
  }
  </style>
  