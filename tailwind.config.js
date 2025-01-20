import defaultTheme from 'tailwindcss/defaultTheme';
import daisyui from "daisyui";
import { iconsPlugin, getIconCollections } from "@egoist/tailwindcss-icons";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        daisyui,
        iconsPlugin({
            collections: getIconCollections(['mdi'])
        })
    ],
    daisyui: {
        themes: ["light", "dark", "cupcake"], // Selecciona los temas que deseas incluir
        darkTheme: "dark", // Tema predeterminado para el modo oscuro (opcional)
        base: true, // aplica estilos base, reset y tipografía (opcional)
        utils: true, // agrega clases utilitarias (opcional)
        logs: true, // muestra logs en la consola (opcional)
        rtl: false, // habilita soporte para lenguajes RTL (opcional)
        prefix: "", // prefijo para las clases de daisyUI (opcional)
      }
};
