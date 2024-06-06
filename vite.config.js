import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/app.scss', 'resources/css/my-library.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
});
