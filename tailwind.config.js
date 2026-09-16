import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
                serif: ['Montserrat', ...defaultTheme.fontFamily.sans],
                heading: ['Montserrat', ...defaultTheme.fontFamily.sans],
                body: ['Roboto', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                navy: {
                    950: '#070f1e',
                    900: '#0a1628',
                    800: '#0f2138',
                    700: '#16304f',
                    600: '#1d3f66',
                },
                gold: {
                    400: '#e0c58a',
                    500: '#c9a15a',
                    600: '#b48d45',
                    700: '#8f6e34',
                },
                cream: {
                    50: '#fdfcf9',
                    100: '#f7f3ea',
                    200: '#efe8d8',
                },
            },
        },
    },

    plugins: [forms],
};
