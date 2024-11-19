// src/stores/productStore.js
import { defineStore } from 'pinia';
import axios from 'axios';

const token=window.sessionStorage.getItem('token')
export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: [],
        errorMessages:''
    }),
    actions: {
        async fetchProducts() {
            try {
                const response = await axios.get('/api/products',{
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                });
                this.products = response.data.data;
            } catch (error) {
                console.error("Error fetching products:", error.response.data.message);
                this.errorMessage=error.response.data.message


            }
        },
        async addProduct(product:object) {
            try {
                const response = await axios.post('/api/products', product);
                this.products.push(response.data);
            } catch (error) {
                console.error("Error adding product:", error.response.data.message);
                this.errorMessage=error.response.data.message

            }
        },
        async searchAction(query:string) {
            try {
                const response = await axios.get('/api/search/product', {
                    params: { query },
                    headers:{
                        Authorization:`Bearer ${token}`
                    }
                });
                this.products = response.data.data;

            } catch (error) {
                console.error("Error searchin product:", error.response.data.message);
                this.errorMessage=error.response.data.message
            }
        },
    },
});
