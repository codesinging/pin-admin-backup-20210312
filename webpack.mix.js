const mix = require('laravel-mix')

mix.setPublicPath('publishes/assets')
    .js('resources/js/app.js', 'app.js').vue()
    .postCss('resources/css/app.css', 'app.css', [
        require('tailwindcss'),
        require('autoprefixer')
    ])
    .copyDirectory('node_modules/element-plus/lib/theme-chalk/fonts', 'publishes/assets/fonts')
    .sourceMaps()
    .version()
    .options({
        processCssUrls: false,
    })