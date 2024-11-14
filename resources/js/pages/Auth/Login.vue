<template>
    <GuestLayout>
        <!-- <Head title="Log in" /> -->

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />

                <TextInput
                    id="email"
                    type="email"
                    class="mt-1 block w-full "
                    v-model="form.email"
                    required
                    autofocus
                    autocomplete="username"
                />

                <!-- <InputError class="mt-2" :message="authStore.errorMessage" /> -->
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

                <!-- <InputError class="mt-2" :message="form.errors.password" /> -->
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="ms-2 text-sm text-gray-600"
                        >Remember me</span
                    >
                </label>
            </div>
            <InputError class="mt-2" :message="authStore.errorMessage" />
            <div class="mt-4 flex items-center justify-between">
                <RouterLink to="/register" class="cursor-pointer underline"> Register</RouterLink>
                <div>
                <RouterLink to="/forgotpassword"


                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                >
                    Forgot your password?
                </RouterLink>


                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Log in
                </PrimaryButton>
            </div>
            </div>
        </form>
    </GuestLayout>
</template>
<script setup lang="ts">
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import {ref} from 'vue'
import { RouterLink } from 'vue-router';
import { Auth } from '@/Types';
import axios from 'axios';
import { useAuthStore } from '@/Store/Auth';


const props = defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form=ref<Auth>({
    email:''
})
const authStore=useAuthStore();

const submit = async() => {
await authStore.LoginAction(form.value)
};


</script>
