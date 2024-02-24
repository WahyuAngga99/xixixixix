/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode:'class',
     content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
      "./node_modules/flowbite/**/*.js"
    ],
    theme: {
      container:{
        center : true,
        padding: '16px',
      },
      extend: {
        colors:{
          primary:'#14b8a6',
          secondary: '#64748b',
          dark:'#020617',
        },
        animation: {
          'slow': 'bounce 10s linear infinite',
          wiggle: 'wiggle 1s ease-in-out infinite',
        },
        screens :{
          '2xl' : '1320px',
        },
      },
    },
    plugins: [],
  }

