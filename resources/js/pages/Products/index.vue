<template>

        <div class="flex justify-between items-center">
            <div>
                <!-- <TextInput @keyup="searchEmployees" v-model="form.search"  placeholder="Search for name, email"/> -->
                <TextInput @keyup="searchProduct" v-model="inpudata" />
            </div>
            <div class=" rounded-md my-5 ">
                <PrimaryLink @click="$router.push('/dashboard/addproduct')">Add Product </PrimaryLink>
            </div>
        </div>
        <div
            class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-xl bg-clip-border">
            <table class="w-full text-left table-auto min-w-max">
                <thead>
                    <tr>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                id </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Image </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                Name </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                                price </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"> quantity
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"> category
                            </p>
                        </th>
                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"> Avaialble
                            </p>
                        </th>


                        <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70"> Action
                            </p>
                        </th>
                    </tr>
                </thead>
            <tbody>
                <tr v-for="product in productStore.products" :key="product.id">
                        <td class="p-4 border-b border-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ product.id }} </p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ product.image }} </p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <p
                                class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                                {{ product.name }}</p>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <a href="#"
                                class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ product.price }}</a>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <a href="#"
                                class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ product.quantity }}</a>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <a href="#"
                                class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ product.category }}</a>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <a href="#"
                                class="block font-sans text-sm antialiased font-medium leading-normal text-blue-gray-900">
                                {{ product.is_active }}</a>
                        </td>
                        <td class="p-4 border-b border-blue-gray-50">
                            <button class="bg-yellow-300 rounded-md p-2 py-1" @click="showProduct(product.id)">View</button>
                            <button class="mx-5 bg-green-300 rounded-md p-2 py-1" @click="updateProduct(product.id)">Update</button>
                            <button class="bg-red-300 rounded-md p-2 py-1" @click="destroyProduct(product.id)">Delete</button>
                        </td>
                    </tr>
            </tbody>

            </table>
            <div class="m-auto">
                <span v-if="!productStore.products.length">no data</span>
                <InputError class="mt-2" :message="productStore.errorMessage" />

            </div>
        </div>


</template>
<script setup lang="ts">
import DangerButton from '@/Components/DangerButton.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryLink from '@/Components/PrimaryLink.vue';
import TextInput from '@/Components/TextInput.vue';
import { useAuthStore } from '@/Store/Auth';
import { useProductStore } from '@/Store/Products';
import axios from 'axios';
import { onMounted, ref } from 'vue';
const inpudata=ref('')
const productStore=useProductStore();
onMounted(() => {
    productsCall()
})
const productsCall = async () => {
  await productStore.fetchProducts();
}
const showProduct = (id: number) => {
    console.log(id);
}
const updateProduct = (id: number) => {
    console.log(id);
}
const destroyProduct = (id: number) => {
    console.log(id);
}


// search product
const searchProduct = async (data:string) => {
  await productStore.searchAction(inpudata.value);
}
</script>
