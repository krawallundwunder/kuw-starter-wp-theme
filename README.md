# PHMU Starter WP Theme
Basic WP theme for setting up new projects.

## Features
- Timber Support (https://timber.github.io/docs/)
- ACF Pro Support (https://www.advancedcustomfields.com/resources/)
- Sass/SCSS (https://sass-lang.com/documentation)
- TailwindCSS (https://tailwindcss.com/docs)
- SVG Inject (https://github.com/iconfu/svg-inject)
- Alpine.js (https://github.com/alpinejs/alpine)

## Setup & Development
```bash
# install dependencies
$ npm install

# install Timber via Composer
$ composer require timber/timber

# compile and watch styles/scripts/images and serve with hot reload
$ npm start

# compile styles/scripts/images and purge unused styles
$ npm prod
```

## Note
Please ensure CSS is purged before pushing.
