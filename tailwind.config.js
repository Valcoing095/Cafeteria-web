/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php', // Plantillas Blade
    './resources/js/**/*.vue',          // Archivos Vue.js (opcional)
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};