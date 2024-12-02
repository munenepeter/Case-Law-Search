/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './views/*.php',
    './public/js/*.js',
  ],
  theme: {
    extend: {
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
}