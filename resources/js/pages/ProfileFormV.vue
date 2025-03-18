<script setup>
 // Asegúrate de importar Inertia
import FooterWeb from '@/components/FooterWeb.vue';
import HeaderWeb from '@/components/HeaderWeb.vue';
import ProfileForm from '@/components/ProfileForm.vue';
import SendToFriend from '@/components/SendToFriend.vue';

const logout = () => {
  Inertia.post(route('logout')); // Realiza una solicitud POST a la ruta 'logout'
};
</script>

<template>
    <HeaderWeb/>
    <button @click="logout">Cerrar sesión</button>
    <ProfileForm/>
    <FooterWeb/>
</template>