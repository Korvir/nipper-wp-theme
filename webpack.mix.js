let mix = require('laravel-mix');
require('laravel-mix-purgecss');

mix
	.js( 'assets/src/js/lazysizes.js', 'assets/dist/lazysizes.js')
    .js('assets/src/js/app.js', 'assets/dist/app.js')
    .sass('assets/src/scss/app.scss', 'assets/dist/app.css')

	// Vendors
	.sass('assets/src/scss/_vendors.scss', 'assets/dist/bootstrap.css')
    .options({
        processCssUrls: false
    })

	// Purge
	.purgeCss(
		{
			enabled: mix.inProduction(),
			extend:{
				content: [
					"**/*.php",
					"**/*.html",
					"**/*.vue",
					"**/*.twig",
					"assets/src/**/*.js",
					"assets/src/**/*.jsx",
					"assets/src/**/*.ts",
					"assets/src/**/*.tsx",
				],
				defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
			}
		}
	);
