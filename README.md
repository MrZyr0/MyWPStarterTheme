# MyWPStarterTheme

My WordPress theme starter humbly light, complete, clear and more secure as possible.

&nbsp; <!-- break line -->
&nbsp; <!-- break line -->

## Includes

This project is base on [underscores](https://underscores.me/) alias [\_s](https://github.com/automattic/_s) on github.

This project include [my own gulp file](https://github.com/MrZyr0/MyGulpFile) adapted for WordPress theme developement.

&nbsp; <!-- break line -->

## Usage

All you need to edit is in `_src/` folder.

### Commandes

#### `npx gulp`

When developing, use browser sync to speed up your productivity.
It'll compile the scss, prefixes it, quickly optimize images, minify scripts and copy PHP files to the good folder.

#### `npxgulp build`

Optimize your project before upload it !
It'll compile the scss, prefixes it, better optimize images (with an acceptable lossy compression), minify scripts and copy PHP files to the good folder.

#### `npx gulp clean`

For any reason you what to clean-up the project by delete build files.
It will clear caching and delete all build files to just keep essential files and sources.

> I prefer to use package locally so I use `npx` to execute gulp. If you prefer to call gulp directly, install it globally : `npm i -g gulp`

&nbsp; <!-- break line -->

## Installation

1. After duplicate the project use refactor fonction to change all occurecies of 'MyWPStarterTheme' in all files to change the name of your theme.
2. Edit `_src/sass/style.scss` first comment to change theme informations.
3. Change the 'screenshot.png' image.
4. Configure browserSync:\
   Edit the file `gulpfile.js` at the root of the projet at lines 15 and 16 to setup the link and the port to use by browserSync like below.

  ```javascript
  const browserLink = "http://localhost/";
  const browserPort = 3030;
  ```

  _Please refer to [readme file of MyGulpFile project](https://github.com/MrZyr0/MyGulpFile/blob/master/README.md) if you need to change gulp configuration_

5. Update `node_modules` with `npm i`
6. **You're done**

&nbsp; <!-- break line -->

## Organisation

### Oganisation of `assets` folder
- `matrix` : store all matrix assets
  - `icons` : store matrix icons
  - 
### Organisation for sass:

- `elements` : all style applied globaly on specific html elements, separated by subfolder for its components when it's necessary
- `modules` : style used for core functionnalities
- `variables-site` : sass variables
- `pages` : all specific style for only one page
- `post_type` : specific style used for one spécific post type (page, post, CPT...)

### Organisation for php:

- `inc` : all includes
- `inc/templates-parts` : all templates
- `modules` : all modules (ex: WP customizer), separated by subfolder for its components when it's necessary

### Organisation for js:

- `pages` : all scripts for only one page
- `modules` : all script modules
