/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./php-dasar/pw/src/**/*.{html,js,php}', './index.php'],
  theme: {
    extend: {},
  },
  plugins: [require('@tailwindcss/forms'),],
}