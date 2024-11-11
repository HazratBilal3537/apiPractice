import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'
import path from 'path';
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.ts'],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js',
            alias: {
                // '@': path.resolve(__dirname, 'resources/js'),  // Alias '@' to 'resources/js'
                '@': path.resolve(__dirname, './resources/js'),
            },
        },
    },
});




