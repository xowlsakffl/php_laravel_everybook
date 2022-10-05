/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './storage/framework/views/*.php',
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
  ],
  theme: {
    extend: {
      fontFamily: {
        NotoSans: ["Noto Sans KR", "sans-serif"],
        Poppins: ["Poppins", "sans-serif"],
       },
    },
  },
  plugins: [],
}
