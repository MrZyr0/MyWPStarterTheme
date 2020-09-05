<!-- markdownlint-disable MD012 MD022 MD024 -->
# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).


&nbsp; <!-- break line -->


## [Unreleased]

### Added

- Fix `gulp-uglify`
- Refactor the project
  - Change to oriented object programming (create class when it's usefull)
  - Separate the theme's functionalities into modules
  - Change architecture to Twenty Twenty solution (regroup fonts + imgs + js + css into a `dist` or `assets` folder; READ: <https://stackoverflow.com/questions/22842691/what-is-the-meaning-of-the-dist-directory-in-open-source-projects/#answer-22844164>)
  - Apply phpdoc (READ: <http://phpdocu.sourceforge.net/howto.php>)
  - Add & refactor namespace with text domain (READ: <https://www.ibenic.com/php-namespaces-wordpress-plugins>) 
- Apply / configure `WordPress Coding Standards`
- Add control for CSS breakpoints
- Add humans.txt virtual page by getting infos in style.css file [view official Website for implementation](http://humanstxt.org/)
- Fix navigation bar (use @extends for duplicate properties)
- Check all theme in my local "model" WP for interesting code
- Fix all TODOs presents in sources
- Impriove outline with: `outline: -webkit-focus-ring-color auto 1px;` or an outline bi color white & black like the outline used by Cozy Pass
- Add detection of prod/preprod and control to change WP bar color based on it
- Optimize HTML sementic by apply `rel` attribute (READ: <https://www.alsacreations.com/article/lire/1400-attribut-rel-relations.html> **:fr:**)
- Add accesskey parameter to menu & usefull links (RED: <https://www.w3schools.com/tags/att_global_accesskey.asp>)
- Add text information to explain these shortcuts
- Setup tabindex in all HTML elements (READ: <https://www.w3schools.com/tags/att_global_tabindex.asp>)
- Add sidebar support
- Add basic style for WP class : <https://codex.wordpress.org/CSS#Custom_CSS_in_WordPress>
- Translate the theme (READ: "Loco Translate")
- add `loading="lazy"` for img and iframe
- Add backward compatibility (READ: <https://developer.wordpress.org/reference/functions/wp_body_open/#comment-3396>)
- Add obfuscation for menu (READ: <https://seolyon.slack.com/archives/CKYGRSAN6/p1583655757042200>
- Add an init setup of control on theme installation and a button in customizer to do that
- implement a todo list in theme initialization (READ: <https://wpformation.com/todo-liste-installation-wordpress/> **:fr:** & <https://wpformation.com/optimiser-wordpress-checklist-installation/> **:fr:**)
- Add control to `define('WP_MEMORY_LIMIT', '96M');` in wp-config.php
- Add control to `define('WP_POST_REVISIONS', 3);` in wp-config.php
- Add control to enable recycle_bin `define('MEDIA_TRASH', true);` in wp-config.php
- Hide generators tags (READ: <https://gist.github.com/MaximeCulea/52008b4e3c58f749f8d5ae7c86b05a7d)>\
**it needs to be able to be deactivated in customizer** _and be managable for better UX (possibly a new plugin)_
- Add support for trackbacks (READ: <https://themeisle.com/blog/wordpress-pingbacks/> & <https://poormanblogger.com/blog/ping-blog/> & <https://wpfr.net/support/sujet/afficher-les-pings-dans-les-commentaires/)>
- Add support for pingbacks (READ: <https://bloginfos.com/pingback-et-vulnerabilite/> **:fr:**)
- Add control for completely disable comments
- Add support of Gravatar (get_avatar()) in comments with a control for it
- Enable scrolling on main Backoffice WP sidebar
- Add shortcut for unbreakable space

  ```php
    function wprock_shortcode_nbsp() {
      return '&nbsp;';
  }
  add_shortcode( 'nbsp', 'wprock_shortcode_nbsp' );
  ```

- Add function to filter text to add unbreakable space automaticly. **it needs to be able to be deactivated in customizer** _and in editor for better UX_
  
  ```php
  add_filter( 'the_content', 'quick_french_syntax' );
  function quick_french_syntax( $content ) {
      $s = array( ' :', ' ?', ' !', ' ;' );
      $r = array( '& nbsp;:', '& nbsp;?', '& nbsp;!', '& nbsp;;' );
      return str_replace( $s, $r, $content );
  }
  ```

- Add support for Wayback Machine on 404 pages (READ: <https://blog.archive.org/2013/10/24/web-archive-404-handler-for-webmasters/)>
- Add tarteaucitron.js support (READ: <https://wpformation.com/tarteaucitron-wordpress-rgpd/>)
- add arian fils support (controled in customizer) (READ: <https://developers.google.com/search/docs/data-types/breadcrumb>)
- Add plugin recommandation & auto-installation (READ: <https://wpformation.com/tgm-plugin-activation-automatisez-linstallation-de-plugins-wordpress/>)
- Integrate some usefull shortcodes (READ: <https://wpformation.com/shortcodes-utiles-wordpress/> **:fr:**)
- Store informations in transient to optimizer loading performance (READ: <https://wpformation.com/transients-wordpress/)>
- Add post-format support (READ: <https://wordpress.org/support/article/post-formats/>)
- Check HTML5 roles markup
- Check aria-label markup
- Embded this project into a WordPress docker
- Try to use Timber
- [Add script fallbacks for svg](https://css-tricks.com/a-complete-guide-to-svg-fallbacks/)
- Upload modules in gists
- Add this usefull function : READ: <https://gist.github.com/mi-ca/868ca24a31eada03a5807d4100d75038>
- Add some new debug option `define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );`

&nbsp; <!-- break line -->


## [0.2.1] - 2020-03-08

### Changed

- Revert matrix search icon to the original one (files in `_src` folder should not be optimized)


## [0.2.0] - 2020-03-08

### Added

- Changelog
- Twenty Twenty's script loader
- Custom menu walker to clean WP menu cleaner
- Custom menu walker to properly add element to WP menu
- Function to return absolute path of assets
- Function to test if the theme is in local environnement
- Some interesting files of Twenty Twenty theme
- Basic home.php

### Changed

- Add more information, documentation & more sources to readme file
- Update Gulp to v3.1.0
- Refactor styles
- Refactor function.php
- Refactor text domain
- Improve skip-link
- Improve accessibility of navigation

### Fixed

- Fix search icon path in search form
- Fix html5shiv link


## [0.1.0] - 2020-02-21

### Changed

- Gulp to v3.0.0
- Some documentation

### Removed

- Style & content specific to my blog of source files


## [0.0.0] - 2020-02-07
### Added

- Gulp
- Basic sources files
- License
- Documentation
