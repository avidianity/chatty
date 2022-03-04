const mix = require('laravel-mix');

mix.ts('resources/ts/index.tsx', 'public/js/app.js')
    .react()
    .sourceMaps()
    .postCss('resources/css/app.css', 'public/css/app.css', [
        require('tailwindcss'),
    ]);

mix.webpackConfig({
    devServer: {
        static: false,
    },
});
