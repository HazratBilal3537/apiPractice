import './bootstrap';
import { createApp } from 'vue'
import { createRouter, createWebHistory } from 'vue-router';
import routes from './router';
import '../css/app.css';
import App from './App.vue';


// Create the router instance with imported routes
const router = createRouter({
    history: createWebHistory(),
    routes,
});
const app = createApp(App)

app.use(router);
app.mount('#app');
