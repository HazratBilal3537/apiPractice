<template>
    <div class="pt-2 pb-3 space-y-1 w-44">
        <ResponsiveNavLink >
            <ion-icon name="bar-chart-outline"></ion-icon>
            Dashboard
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

<style></style>
