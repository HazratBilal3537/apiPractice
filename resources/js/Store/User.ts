// src/stores/productStore.js
import { defineStore } from 'pinia';
import axios from 'axios';

const token=window.sessionStorage.getItem('token')
export const useUserStore = defineStore('userStore', {
    state: () => ({
        user: {},
    }),
    actions: {

        async GetMeAction() {
            try {
                const response = await axios.get('/api/get-me',{
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                });
                this.user=response.data;
                console.log('login',response.data);

            } catch (error) {
                console.error("Error get me api", error);
            }
        },
    },
});
