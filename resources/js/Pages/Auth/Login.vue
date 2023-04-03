<!-- <script setup>
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />

                <TextInput
                    id="password"
                    type="password"
                    class="mt-1 block w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link
                    v-if="canResetPassword"
                    :href="route('password.request')"
                    class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template> -->


<script setup>
    
    import { Head, Link, useForm } from "@inertiajs/vue3";

    import GuestLayout from '@/Layouts/GuestLayout.vue';
    

    defineProps({
        canResetPassword: Boolean,
        status: String,
    });
    const form = useForm({
        email: "",
        password: "",
        remember: false,
    });
    const submit = () => {
        form.transform((data) => ({
            ...data,
            remember: form.remember ? "on" : "",
        })).post(route("login"), {
            onFinish: () => form.reset("password"),
        });
    };
</script>
<template>
    
    <Head title="Inicio Sesion" />
    <GuestLayout>
        <div class="row m-0 py-3 shadow rounded border">
            <div class="col-md-12">      
                <div v-if="status" class="alert alert-success">
                    {{ status }}
                </div>
                <form @submit.prevent="submit">
                    <div class="mb-3">
                        <label for="email" class="form-label">Usuario</label>
                        <input type="email" id="email" class="form-control"
                            v-model="form.email"
                            required
                            autofocus
                        />
                        <p class="text-danger" v-if="form.errors.email" v-text="form.errors.email"></p>
                    </div>

                    <div class="mb-3">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" required v-model="form.password">
                        <p class="text-danger" v-if="form.errors.password" v-text="form.errors.password"></p>
                    </div>
                    <div class="form-check">
                        <input id="remember" class="form-check-input" 
                            v-model="form.remember"
                            type="checkbox">
                        <label for="remember" class="form-check-label">Recordarme</label>
                    </div><div class="d-flex align-items-center justify-content-end mt-4">
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="btn btn-link"
                        >
                            Olvido su contraseña?
                        </Link>
                        <button type="submit" class="btn btn-primary" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">Iniciar Sesion</button>
                    </div>
                </form>        
            </div>
        </div>
    </GuestLayout>

</template>