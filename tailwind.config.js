import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    safelist: [
        "bg-[url('/img/homeImage.jpeg')]",
    ],
    plugins: {
        tailwindcss: {},
        autoprefixer: {},
    },
    darkMode: 'class',
}
