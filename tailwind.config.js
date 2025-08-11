/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js", 
    "./resources/**/*.vue",
    "./app/Filament/**/*.php",
    "./vendor/filament/**/*.blade.php",
  ],
  safelist: [
    'col-span-12',
    'col-span-11',
    'col-span-10',
    'col-span-9',
    'col-span-8',
    'col-span-7',
    'col-span-6',
    'col-span-5',
    'col-span-4',
    'col-span-3',
    'col-span-2',
    'col-span-1',
  ],
  theme: {
    extend: {
      colors: {
        "primary": "var(--color-primary)",
        "secondary": "var(--color-secondary)",
      },
    },
  },
  plugins: [],
}