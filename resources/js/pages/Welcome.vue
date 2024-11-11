<template>
    <GuestLayout>
    <div class="">
<div class="items-center flex justify-center flex-col ">

    <h1>Welcom to api Practice</h1>
    <div class="mt-9 ">
        <RouterLink to="/login" class="text-lg me-4">
            <PrimaryButton>login</PrimaryButton>
        </RouterLink>
        <RouterLink to="/register" class="text-lg mt-9">
            <PrimaryButton>Register</PrimaryButton>
        </RouterLink>
    </div>
</div>
    </div>

    <!-- <p class="text-red-600 bg-black">welcom</p> -->
</GuestLayout>
</template>
<script setup>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { RouterLink } from 'vue-router';
</script>
