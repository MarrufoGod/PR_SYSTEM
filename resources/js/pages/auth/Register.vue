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
    first_name: '',
    last_name: '',
    email: '',
    password: '',
    password_confirmation: '',
    security_question: '',
    security_answer: '',
});

// Preguntas de seguridad disponibles
const securityQuestions = [
    '¿Cuál es tu color favorito?',
    '¿Cómo se llama tu primera mascota?',
    '¿Cuál es tu comida favorita?',
    '¿En qué ciudad naciste?',
    '¿Cuál es tu película favorita?',
];

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation', 'security_answer'),
    });
};
</script>

<template>
    <AuthBase title="Crear cuenta" description="Ingresa tus datos para registrarte">
        <Head title="Registrarse" />

        <form @submit.prevent="submit" class="flex flex-col gap-6">
            <div class="grid gap-6">
                <div class="grid grid-cols-2 gap-4">
                    <div class="grid gap-2">
                        <Label for="first_name">Nombre</Label>
                        <Input id="first_name" v-model="form.first_name" required autocomplete="given-name" placeholder="Juan" />
                        <InputError :message="form.errors.first_name" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="last_name">Apellido</Label>
                        <Input id="last_name" v-model="form.last_name" required autocomplete="family-name" placeholder="Pérez" />
                        <InputError :message="form.errors.last_name" />
                    </div>
                </div>

                <div class="grid gap-2">
                    <Label for="email">Correo</Label>
                    <Input id="email" type="email" v-model="form.email" required autocomplete="email" placeholder="correo@ejemplo.com" />
                    <InputError :message="form.errors.email" />
                </div>

                <div class="grid gap-2">
                    <Label for="security_question">Pregunta de seguridad</Label>
                    <select
                        id="security_question"
                        v-model="form.security_question"
                        required
                        class="w-full rounded-md border px-3 py-2 text-sm focus:outline-none focus:ring"
                    >
                        <option value="" disabled>Selecciona una pregunta</option>
                        <option v-for="question in securityQuestions" :key="question" :value="question">
                            {{ question }}
                        </option>
                    </select>
                    <InputError :message="form.errors.security_question" />
                </div>

                <div class="grid gap-2">
                    <Label for="security_answer">Respuesta de seguridad</Label>
                    <Input
                        id="security_answer"
                        v-model="form.security_answer"
                        required
                        placeholder="Ej: Azul"
                    />
                    <InputError :message="form.errors.security_answer" />
                </div>

                <div class="grid gap-2">
                    <Label for="password">Contraseña</Label>
                    <Input id="password" type="password" v-model="form.password" required autocomplete="new-password" />
                    <InputError :message="form.errors.password" />
                </div>

                <div class="grid gap-2">
                    <Label for="password_confirmation">Confirmar contraseña</Label>
                    <Input id="password_confirmation" type="password" v-model="form.password_confirmation" required autocomplete="new-password" />
                    <InputError :message="form.errors.password_confirmation" />
                </div>

                <Button type="submit" class="mt-2 w-full" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Crear cuenta
                </Button>
            </div>

            <div class="text-center text-sm text-muted-foreground">
                ¿Ya tienes cuenta?
                <TextLink :href="route('login')" class="underline underline-offset-4">Inicia sesión</TextLink>
            </div>
        </form>
    </AuthBase>
</template>
