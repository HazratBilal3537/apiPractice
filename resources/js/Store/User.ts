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

            } catch (error) {
                console.error("Error get me api", error);
            }
        },
        async sendEmail(emailHtml:any) {
            try {
                const response = await axios.post('/api/sendEmail',{'html':emailHtml},{
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                });
                // this.user=response.data;
                console.log('response email',response.data);


            } catch (error) {
                console.error("Error esponse emai api", error);
            }
        },
    },
});
