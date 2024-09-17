// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'selector',
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './resources/js/**/*.jsx',
    './resources/js/**/*.tsx',
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
