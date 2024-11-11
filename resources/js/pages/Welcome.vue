<template>
    <GuestLayout>
    <div class="">
<div class="items-center flex justify-center flex-col ">

    <h1>Welcom to api Practice</h1>
    <RouterLink to="/login" class="text-lg mt-9">
        <PrimaryButton>login</PrimaryButton>
   </RouterLink>
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
