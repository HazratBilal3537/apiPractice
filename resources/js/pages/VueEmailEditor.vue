<template>
    <div id="app">
        <div class="">
            <div id="bar" class="bg-purple-500 flex justify-between py-3">
                <h1 class="text-lg text-black  font-bold">Vue Email Editor</h1>
                <div>
                    <button class="bg-green-500 p-2" @click="saveDesign">Save Design</button>
                    <button class="bg-green-500 p-2 mx-4" @click="loadDesign">load design </button>
                    <button class="bg-green-500 p-2 mx-4" @click="sendEmail">SendEmail </button>
                    <button class="bg-green-500 p-2 mx-4" @click="exportHtml">Export HTML</button>
                </div>
            </div>
            <EmailEditor :appearance="appearance" minHeight='1000px' :project-id="projectId" :locale="locale"
                :tools="tools" :options="options" ref="emailEditor" v-on:load="editorLoaded" style="height: 100vh;" />
        </div>
    </div>
</template>
<script setup>
import { useUserStore } from '@/Store/User';
import { ref } from 'vue';
import { EmailEditor } from 'vue-email-editor';
const emailEditor = ref(null);
const userStore = useUserStore();

const saveDesign = () => {
    emailEditor.value.editor.saveDesign((design) => {
        console.log('saveDesign', design);
        // Save the design to localStorage
        localStorage.setItem('emailDesign', JSON.stringify(design));
        alert('Design saved to localStorage!');
    });
};

const loadDesign = () => {
    const savedDesign = localStorage.getItem('emailDesign');
    if (savedDesign) {
        // Load the design back into the editor
        emailEditor.value.editor.loadDesign(JSON.parse(savedDesign));
        alert('Saved design loaded into the editor!');
    } else {
        alert('No saved design found in localStorage!');
    }
};

const exportHtml = () => {
    emailEditor.value.editor.exportHtml((data) => {
        console.log('exportHtml', data);
        const htmlContent = data.html;

        // Create a blob for the HTML content
        const blob = new Blob([htmlContent], { type: 'text/html' });

        // Create a link element
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'email-template.html'; // Set the file name
        // Trigger the download
        link.click();
        // Clean up the URL object
        URL.revokeObjectURL(link.href);
    });
};
const sendEmail = async () => {
    emailEditor.value.editor.exportHtml(async (data) => {
        await userStore.sendEmail(data.html);
    });

}
</script>
<style>
.blockbuilder-branding{
    display: none !important;
}
</style>
