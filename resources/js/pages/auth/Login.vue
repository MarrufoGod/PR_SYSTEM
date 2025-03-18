<script setup lang="ts">
import InputError from '@/components/InputError.vue';
import TextLink from '@/components/TextLink.vue';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Label } from '@/components/ui/label';
import AuthBase from '@/layouts/AuthLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';

const form = useForm({
    identifier: '',
    auth_type: 'password', // ← tipo de autenticación
    password: '',
    security_question: '',
    security_answer: '',
});

const securityQuestions = [
    '¿Cuál es tu color favorito?',
    '¿Cómo se llama tu primera mascota?',
    '¿Cuál es tu comida favorita?',
    '¿En qué ciudad naciste?',
    '¿Cuál es tu película favorita?',
];

const submit = () => {
    form.post(route('login.custom'), {
        onFinish: () => form.reset('password', 'security_answer'),
    });
};
</script>

<template>
    <AuthBase title="Iniciar sesión" description="Selecciona cómo deseas autenticarte">
        <Head title="Login" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <!-- Correo o Nombre -->
                <div class="grid gap-2">
                    <Label for="identifier">Correo o nombre completo</Label>
                    <Input id="identifier" v-model="form.identifier" required placeholder="usuario@correo.com o Juan Pérez" />
                    <InputError :message="form.errors.identifier" />
                </div>

                <!-- Tipo de autenticación -->
                <div class="grid gap-2">
                    <Label for="auth_type">Método de acceso</Label>
                    <select id="auth_type" v-model="form.auth_type" class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring">
                        <option value="password">Contraseña</option>
                        <option value="security">Pregunta de seguridad</option>
                    </select>
                </div>

                <!-- Contraseña -->
                <div v-if="form.auth_type === 'password'" class="grid gap-2">
                    <Label for="password">Contraseña</Label>
                    <Input id="password" type="password" v-model="form.password" autocomplete="current-password" />
                    <InputError :message="form.errors.password" />
                </div>

                <!-- Pregunta de seguridad -->
                <div v-if="form.auth_type === 'security'" class="grid gap-2">
                    <Label for="security_question">Pregunta de seguridad</Label>
                    <select
                        id="security_question"
                        v-model="form.security_question"
                        class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring"
                    >
                        <option value="" disabled>Selecciona tu pregunta</option>
                        <option v-for="question in securityQuestions" :key="question" :value="question">
                            {{ question }}
                        </option>
                    </select>
                    <InputError :message="form.errors.security_question" />
                </div>

                <!-- Respuesta de seguridad -->
                <div v-if="form.auth_type === 'security'" class="grid gap-2">
                    <Label for="security_answer">Respuesta</Label>
                    <Input id="security_answer" v-model="form.security_answer" placeholder="Ej: Azul" />
                    <InputError :message="form.errors.security_answer" />
                </div>

                <!-- Botón -->
                <Button type="submit" class="mt-2 w-full" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Iniciar sesión
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground mt-4">
                ¿No tienes una cuenta?
                <TextLink :href="route('register')" class="underline underline-offset-4">Regístrate</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
