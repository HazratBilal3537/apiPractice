// src/stores/productStore.js
import { defineStore } from 'pinia';
import axios from 'axios';
export const useAuthStore = defineStore('authStore', {
    state: () => ({
        user: {},
    }),
    actions: {
        async registerAction(user:object) {
            try {
                const response = await axios.post('/api/register',user);
                console.log('register',response.data);
                window.sessionStorage.setItem('token',response.data.token)
                this.user=response.data.user;
            } catch (error) {
                console.error("Error register user:", error);
            }
        },
        async LoginAction(user:object) {
            try {
                const response = await axios.post('/api/login', user);
                this.user=response.data.user;
                console.log('login',this.user);
                window.sessionStorage.setItem('token',response.data.token)

            } catch (error) {
                console.error("Error adding product:", error);
            }
        },
    },
});


