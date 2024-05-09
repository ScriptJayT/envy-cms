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
        fontFamily: {
            sans: [
                'Avenir', 'Montserrat', 'Corbel',
                'URW Gothic', 'source-sans-pro', 'sans-serif'
            ],
            serif: [
                'Didot', 'Bodoni MT', 'Noto Serif Display',
                'URW Palladio L', 'P052', 'Sylfaen',
                'serif'
            ],
            monospace: [
                'ui-monospace', 'Cascadia Code', 'Source Code Pro',
                'Menlo', 'Consolas', 'DejaVu Sans Mono',
                'monospace'
            ],
            cursive: [
                'Segoe Print', 'Bradley Hand', 'Chilanka',
                'TSCu_Comic', 'casual', 'cursive'
            ],
        },
        extend: {
            colors: {
                theme: {
                    '0': 'hsl(var(--envy-txt-0) / <alpha-value>)',
                    '200': 'hsl(var(--envy-txt-2) / <alpha-value>)',
                    '400': 'hsl(var(--envy-txt-4) / <alpha-value>)',
                    '600': 'hsl(var(--envy-txt-6) / <alpha-value>)',
                    '800': 'hsl(var(--envy-txt-8) / <alpha-value>)',
                },
                invert: {
                    '0': 'hsl(var(--envy-bg-0) / <alpha-value>)',
                    '200': 'hsl(var(--envy-bg-2) / <alpha-value>)',
                    '400': 'hsl(var(--envy-bg-4) / <alpha-value>)',
                    '600': 'hsl(var(--envy-bg-6) / <alpha-value>)',
                    '800': 'hsl(var(--envy-bg-8) / <alpha-value>)',
                },
                accent: {
                    '200': 'hsl(var(--envy-a-2) / <alpha-value>)',
                    '400': 'hsl(var(--envy-a-4) / <alpha-value>)',
                    '600': 'hsl(var(--envy-a-6) / <alpha-value>)',
                    '800': 'hsl(var(--envy-a-8) / <alpha-value>)',
                },
            },
            backgroundImage: {
                'theme-gradient-300': 'linear-gradient(to bottom, hsl(var(--envy-bg-2)), hsl(var(--envy-bg-4)) )',
                'theme-gradient-500': 'linear-gradient(to bottom, hsl(var(--envy-bg-4)), hsl(var(--envy-bg-6)) )',
                'theme-gradient-700': 'linear-gradient(to bottom, hsl(var(--envy-bg-6)), hsl(var(--envy-bg-8)) )',
            },
        },
    },

    plugins: [forms],
};
