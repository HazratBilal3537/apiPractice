import './bootstrap';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';
import routes from './router';
import '../css/app.css';
import App from './App.vue';
import { createPinia } from 'pinia';
import router from './router';
import { VueQueryPlugin } from '@tanstack/vue-query'


const app = createApp(App)
const pinia = createPinia();
app.use(router);
app.use(pinia);
app.use(VueQueryPlugin)
app.mount('#app');
