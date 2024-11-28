<template>
    <div>
        <p class="h-screen m-auto">redirecting to dashboard</p>
    </div>
</template>
<script setup>
import router from '@/router';
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';
const route=useRoute();
onMounted(()=>{
    window.sessionStorage.setItem('token',route.query.token)
    router.push('dashboard')

})
</script>
