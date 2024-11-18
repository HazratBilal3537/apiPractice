// src/stores/productStore.js
import { defineStore } from 'pinia';
import axios from 'axios';
import router from '@/router';
const token = window.sessionStorage.getItem('token');
export const useAuthStore = defineStore('authStore', {
    state: () => ({
        user: {},
        errorMessage:''
    }),
    actions: {
        async registerAction(user:object) {
            try {
                const response = await axios.post('/api/register',user);
                // console.log('register',response.data);
                window.sessionStorage.setItem('token',response.data.token)
                this.user=response.data.user;
                router.push('/dashboard')
            } catch (error) {
                console.error("Error register user:", error);
                this.errorMessage=error.response.data.message

            }
        },
        async LoginAction(user:object) {
            try {
                const response = await axios.post('/api/login', user);
                this.user=response.data.user;
                // console.log('login',this.user);
                window.sessionStorage.setItem('token',response.data.token)
                router.push('/dashboard')

            } catch (error) {
                console.error("Error Login:", error.response.data.message);
                this.errorMessage=error.response.data.message
            }
        },
        // login with google
        async loginGoogleAction() {
            try {
                const response = await axios.get('/api/login/google');

                console.log('login',response.data);
                // window.sessionStorage.setItem('token',response.data.token)
                window.location.href=response.data.url;

            } catch (error) {
                console.error("Error Login:", error);
                // this.errorMessage=error.response.data.message
            }
        },
        async forgotPasswordAction(email:object) {
            try {
                const response = await axios.post('/api/forgot-password', email);
                this.errorMessage=response.data.message

            } catch (error) {
                this.errorMessage=error.response.data.message
            }
        },
        async ResetPasswordAction(user:object) {
            try {
                const response = await axios.post('/api/password-reset', user);
                // console.log('reset password',response.data);
                router.push('/login')
            } catch (error) {
                console.error("Error resete password:", error);
                this.errorMessage=error.response.data.message
            }
        },
        async updatePassword(user:object) {
            try {
                const response = await axios.post('/api/update-password', user,{
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                });
                // console.log('update password',response.data);
            } catch (error) {
                console.error("Error update password:", error);
                this.errorMessage=error.response.data.message
            }
        },

        async logout(){
            try{
                const response=await axios.get('/api/logout',{
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                })
                // console.log(response.data);
            }
            catch(error){
                console.error('error in logout', error);

            }
        },
        async deleteUser(user) {
            try {
                const response = await axios.delete('/api/user-delete', {
                    headers: {
                        Authorization: `Bearer ${token}`
                    },
                    data: user // Include data under the 'data' key in the config object
                });
                console.log(response.data);
            } catch (error) {
                console.error("Error deleting user:", error);
            }
        }

    },
});


