// src/stores/productStore.js
import { defineStore } from 'pinia';
import axios from 'axios';
const token=window.sessionStorage.getItem('token')
export const useProductStore = defineStore('productStore', {
    state: () => ({
        products: [],
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
                console.error("Error fetching products:", error);
            }
        },
        async addProduct(product:object) {
            try {
                const response = await axios.post('/api/products', product);
                this.products.push(response.data);
            } catch (error) {
                console.error("Error adding product:", error);
            }
        },
    },
});
