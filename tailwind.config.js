/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './wp-content/themes/traveltools/**/*.php',
    './wp-content/themes/traveltools/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        heading: ['Poppins', 'sans-serif'],
        body: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

