<template>

    <Head title="add employees" />

        <div class="my-5 max-w-2xl mx-auto bg-white p-6 shadow-md rounded-lg">
            <PrimaryLink href="/employees" class="max-w-xl ml-2">back</PrimaryLink>
            <h2 class="text-2xl font-semibold mb-6 text-gray-800">Employee Form</h2>

            <form @submit.prevent="submit" class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>

                    <input id="name" type="text" v-model="form.name"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <!-- <InputError class="mt-2" :message="form.errors.name" /> -->
                </div>

                <!-- Email -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">price</label>
                    <input id="price" type="text" v-model="form.price"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <!-- <InputError class="mt-2" :message="form.errors.email" /> -->

                </div>

                <!-- Phone -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700">quantity</label>
                    <input id="quantity" type="text" v-model="form.quantity"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <!-- <InputError class="mt-2" :message="form.errors.phone" /> -->

                </div>

                <!-- category -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">category</label>
                    <input id="category" type="text" v-model="form.category"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
                    <!-- <InputError class="mt-2" :message="form.errors.position" /> -->

                </div>

                <!-- image -->
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">image</label>
                    <input id="category" type="file" @change="imageUpload"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

                </div>

                <!-- Hire Date -->
                <div>
                    <label for="Avaialble" class="block text-sm font-medium text-gray-700">Avaialble</label>
                    <select id="status" v-model="form.avaialble"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-3">
                        <option value="1">yes</option>
                        <option value="0">No</option>
                    </select>

                </div>


                <!-- description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="description" v-model="form.description" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                    <!-- <InputError class="mt-2" :message="form.errors.address" /> -->
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select id="status" v-model="form.status"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 py-3">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                    <!-- <InputError class="mt-2" :message="form.errors.status" /> -->

                </div>
                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-sm hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
</template>
<script setup lang="ts">
// import DangerButton from "./../../components/DangerButton.vue"
import TextArea from "@/Components/TextArea.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import PrimaryLink from "@/Components/PrimaryLink.vue";
import { ref } from "vue";
import { Products } from "@/Types";
import { useProductStore } from "@/Store/Products";
const image = ref<File | null>(null); // Set the type to File or null
const productStore=useProductStore()
const imageUpload = (event: any) => {
    const file = event.target.files[0]; // Access the first file in the FileList
    if (file) {
        image.value = file;
    }
};

const form = ref<Products>({
    name: "",
    quantity: "",
    category: "",
    description: "",
    avaialble: "",
    status: "",
    image :image.value,
});



const submit = async()  => {
       // Create FormData to handle the form submission
       const formData = new FormData();

// Append regular fields
formData.append('name', form.value.name);
formData.append('quantity', form.value.quantity);
formData.append('category', form.value.category);
formData.append('description', form.value.description);
formData.append('avaialble', form.value.avaialble);
formData.append('status', form.value.status);

// Append the image if it's selected
if (image.value) {
    formData.append('image', image.value); // The image file
}

await productStore.addProduct(formData);

};

</script>

<style scoped>
input,
textarea:focus {
    outline: none !important;

}
input{
    padding: 7px;
}
</style>
