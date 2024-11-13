<template>
    <div class="pt-2 pb-3 space-y-1 w-44">
        <ResponsiveNavLink to="/dashboard">
            Dashboard
        </ResponsiveNavLink>
        <ResponsiveNavLink to="/dashboard/products">
            Products
        </ResponsiveNavLink>

    </div>
</template>
<script setup>
import { ref } from "vue";
import ResponsiveNavLink from "./ResponsiveNavLink.vue";
const isDropdownOpen = ref(false);

const toggleDropdown = () => {
    isDropdownOpen.value = !isDropdownOpen.value;
};
</script>

<style scoped>

</style>
