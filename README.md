<!-- markdownlint-disable MD012 MD022 MD024 -->
# MyWPStarterTheme

- [MyWPStarterTheme](#mywpstartertheme)
  - [Introduction](#introduction)
  - [Includes](#includes)
  - [Usage](#usage)
    - [Commandes](#commandes)
      - [`npx gulp`](#npx-gulp)
      - [`npx gulp build`](#npx-gulp-build)
      - [`npx gulp clean`](#npx-gulp-clean)
  - [Installation](#installation)
  - [Project architecture](#project-architecture)
  - [Roadmap](#roadmap)
  - [Cool tools](#cool-tools)
    - [Content](#content)
    - [Development](#development)
    - [Security](#security)
    - [Search Engine Optimization (SEO)](#search-engine-optimization-seo)
    - [Performance optimizations](#performance-optimizations)
    - [Tools](#tools)
    - [Need testing](#need-testing)
  - [Technology Watch](#technology-watch)
    - [Repositories](#repositories)
    - [Tutorials / Articles](#tutorials--articles)
    - [Blogs](#blogs)
    - [Tools / Documentation](#tools--documentation)
    - [Books](#books)
    - [Legal informations](#legal-informations)
    - [Other](#other)


&nbsp; <!-- break line -->


## Introduction

My WordPress theme starter humbly light, complete, compatible and more secure as possible.

I follow [BEM](https://getbem.com) soon as possible accros the project (folder/file name, HTML/CSS class & id).
<!-- 
// TODO: apply this:
Because we can't use hyphen (dash : `-`) in php naming, I replaced it by underscore (`_`) as following : `block_name__element__modifier`
-->

The goal is that the theme works in a regressive way.
In any case the user can navigate normally in all conditions on all browsers ([up to 2 versions back](https://browserl.ist/?q=last+2+versions) ≃ ie 10)
<!-- TODO: improve support up to ie 8 -->


&nbsp; <!-- break line -->


## Includes

This project is base on [underscores](https://underscores.me/) alias [\_s](https://github.com/automattic/_s) on GitHub, made by [Automattic](https://github.com/automattic/).

This project include [my own gulp file](https://github.com/MrZyr0/MyGulpFile) adapted for WordPress theme developement.


&nbsp; <!-- break line -->


## Usage

All you need to edit is in `_src/` folder.

### Commandes

#### `npx gulp`

When developing, use browser sync to speed up your productivity.
It'll compile the scss, prefixes it, quickly optimize images, minify scripts and copy PHP files to the good folder.

#### `npx gulp build`

Optimize your project before upload it !
It'll compile the scss, prefixes it, better optimize images (with an acceptable lossy compression), minify scripts and copy PHP files to the good folder.

#### `npx gulp clean`

For any reason you what to clean-up the project by delete build files.
It will clear caching and delete all build files to just keep essential files and sources.

> I prefer to use package locally so I use `npx` to execute gulp. If you prefer to call gulp directly, install it globally : `npm i -g gulp`


&nbsp; <!-- break line -->


## Installation

1. After duplicate the project use refactor fonction to change `MyWPStarterTheme` and `mywpstartertheme` in all files to change the name of your theme.\
   **⚠ Be careful to respect the case and keep mentions of MyWPStarterTheme in README & in style.scss (like License URI)⚠**
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


## Project architecture

I use my own project architecture to be able to separate source code and compile one.

<!-- PHP language gives the best syntax color -->
```php
📦MyWPStarterTheme
 ┣ 📂_src
 ┃  ┣ 📂assets
 ┃  ┃  ┃
 ┃  ┃  ┣ 📂fonts
 ┃  ┃  ┃  ┗ 📂fontFolder '> Here there are all the fonts are in their own folder'
 ┃  ┃  ┃
 ┃  ┃  ┗ 📂imgs
 ┃  ┃     ┣ 📂matrix
 ┃  ┃     ┃  ┣ 📂icons
 ┃  ┃     ┃  ┃  ┗ 📜 '> here there are all matrix icons alternatives'
 ┃  ┃     ┃  ┃
 ┃  ┃     ┃  ┣ 📂illustrations
 ┃  ┃     ┃  ┃  ┗ 📜 '> here there are all matrix illustrations alternatives'
 ┃  ┃     ┃  ┃
 ┃  ┃     ┃  ┗ 📂pictures
 ┃  ┃     ┃     ┗ 📜 '> here there are all matrix pictures'
 ┃  ┃     ┃
 ┃  ┃     ┗ 📂vector
 ┃  ┃        ┣ 📂icons-vector
 ┃  ┃        ┃  ┗ 📜 '> here there are all vector icons alternatives'
 ┃  ┃        ┃
 ┃  ┃        ┗ 📂illustrations-vector
 ┃  ┃           ┗ 📜 '> here there are all vector illustrations alternatives'
 ┃  ┃
 ┃  ┣ 📂js
 ┃  ┃  ┣ 📂modules-scripts
 ┃  ┃  ┃  ┗ 📜 '> here there are all scripts use multiple times over the theme'
 ┃  ┃  ┃
 ┃  ┃  ┗ 📂pages-scripts
 ┃  ┃     ┗ 📂pageFolder '> here there are all scripts use only one times for on specific page groupes by pages in directory'
 ┃  ┃
 ┃  ┣ 📂php
 ┃  ┃  ┣ 📂inc
 ┃  ┃  ┃  ┗ 📂template-parts
 ┃  ┃  ┃     ┗ 📜 '> here there are all template-parts WP theme'
 ┃  ┃  ┃
 ┃  ┃  ┣ 📂modules-php
 ┃  ┃  ┃  ┗ 📜 '> here there are all PHP code use multiple times over the theme'
 ┃  ┃  ┃
 ┃  ┃  ┣ 📂page_templates
 ┃  ┃  ┃  ┗ 📜 '> here there are all page templates for WP theme'
 ┃  ┃  ┃
 ┃  ┃  ┗ 📜 '> here there are all standard WP pages, like index.php'
 ┃  ┃
 ┃  ┗ 📂sass
 ┃     ┣ 📂backoffice-style
 ┃     ┃  ┗ 📜 '> here there are all style for backoffice (compiled in admin.css style sheet)'
 ┃     ┃
 ┃     ┣ 📂elements-style
 ┃     ┃  ┗ 📜 '> here there are all style applied on "elements" use multiple time over the theme, like footer / links etc...'
 ┃     ┃
 ┃     ┣ 📂modules-style
 ┃     ┃  ┗ 📜 '> here there are all style used to implement fonctionnalitied, like accessibility or normalize'
 ┃     ┃
 ┃     ┣ 📂templates-style
 ┃     ┃  ┗ 📜 '> here there are all style sheet for each page, use for specific style on only one page'
 ┃     ┃
 ┃     ┣ 📂variables-style
 ┃     ┃  ┗ 📜 '> here there are all SASS variables, like colors'
 ┃     ┃
 ┃     ┣ 📜admin.scss '> this file is import all necessary for style backoffice of WP'
 ┃     ┗ 📜style.scss '> this file import all necessary style'
 ┃
 ┣ 📜 .gitattributes
 ┣ 📜 .gitignore
 ┣ 📜 CHANGELOG.md
 ┣ 📜 gulpfile.js '> this file comes with [my own gulp file](https://github.com/MrZyr0/MyGulpFile)'
 ┣ 📜 LICENSE.md
 ┣ 📜 NOTICE.md
 ┣ 📜 package-lock.json '> this file comes with [my own gulp file](https://github.com/MrZyr0/MyGulpFile)'
 ┣ 📜 package.json '> this file comes with [my own gulp file](https://github.com/MrZyr0/MyGulpFile)'
 ┣ 📜 README.md
 ┗ 📜 screenshot.png '> this file is the screenshot used by WP on theme selection'
 ```


&nbsp; <!-- break line -->


## Roadmap

Please check `[Unreleased]` tag in [changelog](CHANGELOG.md) to read what's next.


&nbsp; <!-- break line -->


## Cool tools

In addition to the theme here are some interesting tools and/or that I use.\
_I have benchmarked many plugins to make this list._
_When there's only one plugin for a feature, it's because I've determined that it's the best (the most powerful, the most practical, the lightest)._

### Content

- [Smart Slider 3 - Responsive & SEO friendly slider](https://wordpress.org/plugins/smart-slider-3/)
- [Gutemberg - Keep up to date independently of WP](https://wordpress.org/gutenberg/)
- [Health Check & Troubleshooting - Keep up to date independently of WP](https://wordpress.org/plugins/health-check/)
- [WP Block Revealer - Reveal gutemberg blocs while editing](https://wordpress.org/plugins/wp-block-revealer/)
- [Duplicate Post](https://wordpress.org/plugins/duplicate-post/)
- ~[Revisionize - Edit post in draft before publish it](https://wordpress.org/plugins/revisionize/) _(Works perfectly on WP 5.5.1)_~ Useless since Duplicate Post does the same thing

### Development

- [Block Unit Test - Test all gutemberg bloc at the same time](https://wordpress.org/plugins/block-unit-test/)
- [Lorem Shortcode - Quickly fill pages without content](https://wordpress.org/plugins/lorem-shortcode/)

### Security

- [WP Scan - Scan WordPress for known vulnerabilities](https://wordpress.org/plugins/wpscan/)
- [SecuPress - n°1 of security plugin](https://wordpress.org/plugins/secupress/)

### Search Engine Optimization (SEO)

- [SEOPress - Most complete plugin (much than YoastSEO)](https://wordpress.org/plugins/wp-seopress/)
- [ImageSEO - Auto generate alt text, name and open graph tag](https://wordpress.org/plugins/imageseo/)

### Performance optimizations

- [WP Sweep - Database cleaner](https://wordpress.org/plugins/wp-sweep/) **|** **_[winner of this bench](https://youtu.be/aqeZyP5GVd4)_**
- [ShortPixel Image Optimizer - Better compression than Imagify](https://wordpress.org/plugins/shortpixel-image-optimiser/)
- [WP Rocket - The best cache plugin](https://wp-rocket.me/fr/) [**PAID**]
- [Autoptimize](https://wordpress.org/plugins/autoptimize/) [**Free alternative pack to WP Rocket**]
- [Cache Enabler](https://wordpress.org/plugins/cache-enabler/) [**Free alternative pack to WP Rocket**]
- [Lazy Loading Feature Plugin](https://wordpress.org/plugins/wp-lazy-loading/)
- [Media Cleaner - Delete unused media](https://wordpress.org/plugins/media-cleaner/)
- [Cloudflare](https://wordpress.org/plugins/cloudflare/)

### Tools

- [Post Type Switcher - Convert a post into another post type](https://wordpress.org/plugins/post-type-switcher/)
- [Enable Media Replace - Replace a media by another while keeping the metadata and the URL](https://wordpress.org/plugins/enable-media-replace/)
- [UpdraftPlus - Backups your WP !](https://wordpress.org/plugins/updraftplus/)
- [Relevanssi – A Better Search](http://wordpress.org/extend/plugins/relevanssi/)
- [WPS Notice Center - Group notices](https://wordpress.org/plugins/wps-notice-center/)
- [BEA - Media Analytics](https://wordpress.org/plugins/bea-media-analytics/)
- [BEA – Sanitize Filename](https://wordpress.org/plugins/bea-sanitize-filename/)
- [Brozzme Plugins Thumbnails - Add thumbnail in installed plugin page](https://wordpress.org/plugins/brozzme-add-plugins-thumbnails/)
- [Media File Renamer (Auto Rename) - Rename the media file by the media title](https://wordpress.org/plugins/media-file-renamer/)
- [All-in-One WP Migration - Do quick backup for migration test or apply small changes to production](https:/.wordpress.org/plugins/all-in-one-wp-migration/)
- [Revisionize - Copy post to draft and for easily editing](https://wordpress.org/plugins/revisionize/)
- [File Manager](https://wordpress.org/plugins/wp-file-manager/)
- [reGenerate Thumbnails Advanced - Regenerate Thumbnails after database / media cleaning](https://wordpress.org/plugins/regenerate-thumbnails-advanced/)

### Need testing

Here is mutiple plugins & tools, that could be implemented, for one usage that I need to test to determine the most interesting one.

- **2AF:**
  - [Google Authenticator – WordPress Two Factor Authentication (2FA)](https://wordpress.org/plugins/miniorange-2-factor-authentication/)
  - [Two-Factor](https://wordpress.org/plugins/two-factor/)

- **Some liveChat plugins:**
  - <https://www.livezilla.net>
  - <https://smooch.io>
  - <https://lemtalk.com>
  - <https://www.tawk.to>
  - <https://www.userlike.com>
  - <https://www.helpscout.com>
  - <https://www.tidio.com>
  - [Plugin: Tawkto live chat](https://wordpress.org/plugins/tawkto-live-chat/)
  - [Small CHAT - Slack on websites](https://small.chat)

- **Gutemberg:**
  - [Block navigation - a draggable navigation for the Gutenberg blocks](https://wordpress.org/plugins/block-navigation/)
  - [Coblocks](https://wordpress.org/plugins/coblocks/)
  - [Advanced Gutenberg](https://wordpress.org/plugins/advanced-gutenberg/)
  - [Advanced Gutenberg Blocks](https://wordpress.org/plugins/advanced-gutenberg-blocks/)
  - [Atomic Blocks](https://wordpress.org/plugins/atomic-blocks/)
  - [Editor Blocks](https://wordpress.org/plugins/editor-blocks/)
  - [Kadence Blocks](https://wordpress.org/plugins/kadence-blocks/)
  - [Premium Blocks for Gutenberg](https://wordpress.org/plugins/premium-blocks-for-gutenberg/)
  - [Ultimate Addons for Gutenberg](https://wordpress.org/plugins/ultimate-addons-for-gutenberg/)
  - [Stackable Ultimate Gutenberg Blocks](https://wordpress.org/plugins/stackable-ultimate-gutenberg-blocks/)
  - [Grids: Layout builder for WordPress](https://wordpress.org/plugins/grids/)
  - [Reusable Blocks Re-Extended](https://github.com/AmphiBee/Reusable-Blocks-Re-Extended)
  - [Multiple blocks for page building](https://getwid.getmotopress.com/)
  - [SimpLy Gallery Blocks](https://wordpress.org/plugins/simply-gallery-block/)
  - [Gutenberg Blocks – Ultimate Addons for Gutenberg](https://wordpress.org/plugins/ultimate-addons-for-gutenberg/)
  - [Block navigation](https://wordpress.org/plugins/block-navigation/)

- **Analytics:**
  - [Google Analytics Dashboard for WP by ExactMetrics (formerly GADWP)](https://wordpress.org/plugins/google-analytics-dashboard-for-wp/)
  - [MonsterInsights Google Analytics Dashboard](https://wordpress.org/plugins/google-analytics-for-wordpress/)
  - [GAinWP](https://wordpress.org/plugins/ga-in/)
  - [Google Site Kit](https://wordpress.org/plugins/google-site-kit/)
  - [Matomo](https://matomo.org/)
  - [Slimstat Analytics](https://wordpress.org/plugins/wp-slimstat/)

- **Cookie notice & GDPR compliance:**
  - [Cookie Notice for GDPR & CCPA](https://wordpress.org/plugins/cookie-notice/)
  - [GDPR Cookie Consent](https://wordpress.org/plugins/cookie-law-info/)
  - [GDPR Complianz](https://wordpress.org/plugins/complianz-gdpr/)
  - [Mention legales - generator plugin](https://wordpress.org/plugins/mentions-legales/)

- **Database optimizer & cleaners:**
  - [WP Sweep](https://wordpress.org/plugins/wp-sweep/)
  - [WPS Cleaner](https://wordpress.org/plugins/wps-cleaner/)
  - [WP Optimize](https://wordpress.org/plugins/wp-optimize/) _=> usefull for automation ?_
  - [Shortcode Cleaner Lite](https://wordpress.org/plugins/shortcode-cleaner-lite/)

- **Generating "legal notice":**
  - <https://www.subdelirium.com/generateur-de-mentions-legales/> **:fr:**
  - <http://generateur-de-mentions-legales.com/> **:fr:**

- **Translation:**
  - [Polylang](https://wordpress.org/plugins/polylang/)
  - [Loco Translate](https://wordpress.org/plugins/loco-translate/)
  - [Weglot](https://wordpress.org/plugins/weglot/)
  - [WPML](https://wpml.org/)
  - [GlotPress - OpenSource translation](https://wordpress.org/plugins/glotpress/)

- **Forms:**
  - [Caldera Forms](https://wordpress.org/plugins/caldera-forms/)
  - [Contact form 7](https://wordpress.org/plugins/contact-form-7/)
  - [Ninja Form](https://wordpress.org/plugins/ninja-forms/)
  - [Very Simple Contact Form](https://wordpress.org/plugins/very-simple-contact-form/)
  - [WPForms](https://wordpress.org/plugins/wpforms-lite/)

- **Accessibility:**
  - [Ableplayer](https://ableplayer.github.io/ableplayer/)
  - [Ozplayer](https://github.com/accessibilityoz/ozplayer-wordpress)
  - [WP Accessibility Helper (WAH)](https://wordpress.org/plugins/wp-accessibility-helper/)

- **Security:**
  - [HTTP Header](https://wordpress.org/plugins/http-headers/)
  - [HTTP Security](https://wordpress.org/plugins/http-security/)
  - [WP Security Audit Log](https://wordpress.org/plugins/wp-security-audit-log/)
  - [Decalog - A usefull logger connectable to Slack](https://wordpress.org/plugins/decalog/)
  - [Activity Log](https://wordpress.org/plugins/aryo-activity-log/)
  - [Disable REST API](https://wordpress.org/plugins/disable-json-api/)
  - [WP Umbrella - Monitoring a WordPress site](https://wp-umbrella.com)
  - [Crowdsec](https://wordpress.org/plugins/crowdsec/)

- **Search Engine Optimization (SEO):**
  - [All in One SEO Pack](https://wordpress.org/plugins/all-in-one-seo-pack/)
  - [Premium SEO Pack](https://wordpress.org/plugins/premium-seo-pack/)
  - [SEOPress](https://wordpress.org/plugins/wp-seopress/)
  - [Slim SEO](https://wordpress.org/plugins/slim-seo/)
  - [The SEO Framework](https://wordpress.org/plugins/autodescription/)
  - [Yoast SEO](https://wordpress.org/plugins/wordpress-seo/)
  - [SmartCrawl](https://wordpress.org/plugins/smartcrawl-seo/)
  - [Rank Math](https://wordpress.org/plugins/seo-by-rank-math/)
  - [Future sitemap generation plugin integrated in core](https://wordpress.org/plugins/core-sitemaps/)
  - [Rank Math - Optimize content for SEO](https://rankmath.com)
  - [Linkbuildr - automates links to the people you talk about in your article](https://wordpress.org/plugins/linkbuildr/)
  - [Broken Link Checker](https://wordpress.org/plugins/broken-link-checker/)
  - [WP 410 - Add 410 support](https://wordpress.org/plugins/wp-410/)
  - [Extension Bing URL Submissions](https://wordpress.org/plugins/bing-webmaster-tools/)

- **Loading optimization:**
  - [Asset CleanUp : Page Speed Booster - Manage style & script loading](https://wordpress.org/plugins/wp-asset-clean-up/)
  - [Plugin Load Filter](https://wordpress.org/plugins/plugin-load-filter/)
  - [Plugin Organizer](https://wordpress.org/plugins/plugin-organizer/)
  - [Cloudflare page cache](https://wordpress.org/plugins/cloudflare-page-cache/)
  
- **Customization:**
  - [WP Admin UI - Customize WP Backoffice](https://wordpress.org/plugins/wp-admin-ui/)
  - [Contextual Adminbar Color](https://github.com/JulioPotier/contextual-adminbar-color)
  - [Customize WP Admin](https://wordpress.org/plugins/client-dash/)
  - [Admin Columns - Edit WordPress colums table](https://wordpress.org/plugins/codepress-admin-columns/)
  - [Adminimize - Clean the BackOffice for admins](https://wordpress.org/plugins/adminimize/)
  - [Nested Pages - Powerfully change the page list](https://wordpress.org/plugins/wp-nested-pages/)


- **Tools:**
  - [WP Control - Log CRON tasks](https://wordpress.org/plugins/wp-crontrol/)
  - [Safe SVG](https://wordpress.org/plugins/safe-svg/)
  - [HappyFile - WP media manager](https://happyfiles.io)
  - [Sanitize Accented Uploads](https://github.com/devgeniem/wp-sanitize-accented-uploads)
  - [User Switching - Quickly change users during development](https://wordpress.org/plugins/user-switching/)
  - [User Role Editor - Quickly create & edit user roles](https://wordpress.org/plugins/user-role-editor/)
  - [Stream - Real-time alter notifications](https://wordpress.org/plugins/stream/)
  - [Simple History - Log user actions](https://wordpress.org/plugins/simple-history/)
  - [WP Crontrol - View & control WP cron](https://wordpress.org/plugins/wp-crontrol/)
  - [Head Meta Data by Jeff Starr - Improve page meta](https://wordpress.org/plugins/head-meta-data/)
  - [Prismatic by Jeff Starr - Syntax highlighting for your website](https://wordpress.org/plugins/prismatic/)
  - [Theme switcha by Jeff Starr - Switch theme for only one user](https://wordpress.org/plugins/theme-switcha/)
  - [WP Easy alt edit](https://github.com/creanico/wp-plugin-easy-alt-edit)
  - [Sync editor & ACF color pickers](https://github.com/MarieComet/sync-editor-acf-color-pickers)


- **Page builders**
  - [Page Builder: KingComposer – Free Drag and Drop page builder by King-Theme](https://wordpress.org/plugins/kingcomposer/)
  - [Visual Composer Website Builder](https://wordpress.org/plugins/visualcomposer/)
  - [WPBakery Page Builder](https://wpbakery.com/)
  - [Oxygen Builder](https://oxygenbuilder.com/)
  - [Elementor](https://wordpress.org/plugins/elementor/)
  - [WordPress Page Builder – Beaver Builder](https://wordpress.org/plugins/beaver-builder-lite-version/)
  - [Bicks Page Builder](https://bricksbuilder.io/)
  - [Brizy](https://www.brizy.io/)
  - [Cornerstone - Theme.co's pages builder](https://theme.co/cornerstone)


- **Themes**
  - [Material Design by Material Design's theme](https://wordpress.org/plugins/material-design/)
  
- **Others:**
  - [Archived Post Status](https://wordpress.org/plugins/archived-post-status/)
  - [Pods - Interesting lternative to ACF](https://wordpress.org/plugins/pods/)
  - [WP Easy Backup - Backup WP](https://github.com/JulioPotier/Wp-Easy-Backup)
  - [WPUtilities - repo with some plugins to test](https://github.com/JulioPotier/WPUtilities)
  - [Jetpack](https://wordpress.org/plugins/jetpack/)
  - [Post Thumbnail Editor](https://wordpress.org/plugins/post-thumbnail-editor/)
  - [JB Audras's plugins](https://github.com/audrasjb?tab=repositories)
  - [Quality Web Checklist](https://wordpress.org/plugins/quality-checklist-opquast/)
  - [A good mega menu](https://www.megamenu.com/)
  - [User history](https://simple-history.com/)
  - [Easy live testing for theme](https://wordpress.org/plugins/wp-theme-test/)
  - [User admin simplifier](https://wordpress.org/plugins/user-admin-simplifier/)
  - [WP YouTube Lyte - Speed up emded YT loading !](https://wordpress.org/plugins/wp-youtube-lyte/)
  - [Change the style of WP BO](https://admintwentytwenty.com/fr)
  - [Duplicator – WordPress Migration Plugin](https://wordpress.org/plugins/duplicator/)
  - [My Eyes Are Up Here - Improve WordPress thumbnail](https://wordpress.org/plugins/my-eyes-are-up-here/)
  - [SF Adminbar Tools - add dev tools to adminbar](https://github.com/Screenfeed/sf-adminbar-tools)


&nbsp; <!-- break line -->


## Technology Watch

Here are some interesting sources and documentations that can help or inspire for web development (WP, accessibility, compatibility, best practices, etc.).

### Repositories

- [Some advance customizer controls](https://github.com/Codeinwp/customizer-controls)
- [Beautifull GoDaddy's WP theme](https://themebeans.com/themes/)
- [Other beautifull theme by Twenty Twenty's author](https://www.andersnoren.se/teman/)
- [Gutemberg Library](https://gutenberghub.com/blocks/)
- [Example of good website powered by WordPress](https://docs.google.com/spreadsheets/d/1BNH4LRCS0TRykjOKjN9k8NOw0PM_RnzxWTBe9W_FUZQ/edit#gid=0)
- [wp.org plugins](https://profiles.wordpress.org/wordpressdotorg/#content-plugins)
- [Alternate repo for WP plugins](https://github.com/imath/entrepot)
- [Next JS WP Starter theme](https://github.com/WebDevStudios/nextjs-wordpress-starter)
- [Bzk = WP Starter Theme](https://gitlab.com/bazooka/bzk)

### Tutorials / Articles

- [Capitainewp **:fr:**](https://capitainewp.io/formations)
- [Style Gutemberg UX](https://richtabor.com/add-wordpress-theme-styles-to-gutenberg/)
- [Description of Twenty Twenty to base this theme on it **:fr:**](https://kinsta.com/fr/blog/theme-twenty-twenty/)
- [WPformation tutorials **:fr:**](https://wpformation.com/wordpress/tutos-tutoriels-wordpress/)
- [WPformation - SEO tutorials **:fr:**](https://wpformation.com/wordpress/referencement/)
- [WPformation - Security articles **:fr:**](https://wpformation.com/wordpress/securite-wordpress/)
- [WPformation - backups **:fr:**](https://wpformation.com/?s=SAUVEGARDE)
- [WPformation - translate child theme **:fr:**](https://wpformation.com/comment-traduire-son-theme-wordpress-dans-un-theme-enfant/)
- [WPformation - "pour les nuls" lot of articles on many web topics **:fr:**](https://wpformation.com/?s=pour+les+Nuls)
- [Automating WordPress updates with Bedrock using Dependabot](https://carlalexander.ca/automatic-wordpress-updates-bedrock-dependabot)
- [How to support ie easily](https://css-tricks.com/how-to-create-an-ie-only-stylesheet/)
- [Fix for conditionnal ie](https://stackoverflow.com/questions/19502040/if-ie-conditionals-not-working)
- [WordPress navigation accessibility **:fr:**](https://access42.net/wordpress-accessibilite-faciliter-la-navigation-partie1)
- [Integrate accessibility **:fr:**](https://tnt20.access42.net/#D65)
- [Speed up Your WordPress Site (Ultimate 2020 Guide) - Kinsta](https://kinsta.com/learn/speed-up-wordpress/)
- [Customizing Gutenberg blocks with block styles (only with PHP/CSS)](https://themeshaper.com/2019/02/15/customizing-gutenberg-blocks-with-block-styles/amp/?__twitter_impression=true)
- [Why is_admin() is totally unsafe for your Wordpress development](https://dev.to/lucagrandicelli/why-isadmin-is-totally-unsafe-for-your-wordpress-development-1le1)
- [How to contribute to WP core](https://make.wordpress.org/core/handbook/tutorials/faq-for-new-contributors/)
- [WordCamp conferences](https://wordpress.tv/)
- [Julio Potier's videos - Live sécu WP](https://www.dropbox.com/sh/e5cwgdthsyraq7j/AACgIzmkG7WOFeSWrXIMBBsla?dl=0)
- [CSP article](https://openweb.eu.org/articles/content-security-policy)
- [Configuration of Piwik (former name of Matomo) to comply with the GDPR proposed by the CNIL **:fr:**](https://www.cnil.fr/sites/default/files/typo/document/Configuration_piwik.pdf)
- [Attacking WordPress - useful for patching those vulnerabilities](https://hackertarget.com/attacking-wordpress/)
- [Reusable blocs Gutemberg - usefull plugins **:fr:**](https://www.whodunit.fr/gutenberg-et-les-blocs-reutilisables-deux-plugins-indispensables/)
- [Login Backdoor](https://secupress.me/blog/backdoor-user/)
- [List of usefull wp-config tricks](https://www.wpbeginner.com/wp-tutorials/useful-wordpress-configuration-tricks-that-you-may-not-know/)
- [Writing HTML with accessibility in mind](https://medium.com/alistapart/writing-html-with-accessibility-in-mind-a62026493412)
- [Writing CSS with Accessibility in Mind](https://medium.com/@matuzo/writing-css-with-accessibility-in-mind-8514a0007939)
- [HTML: A good basis for accessibility](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/HTML)
- [CSS and JavaScript accessibility best practices](https://developer.mozilla.org/en-US/docs/Learn/Accessibility/CSS_and_JavaScript)
- [CSS in Action Invisible Content Just for Screen Reader Users](https://webaim.org/techniques/css/invisiblecontent/)
- [Ditch Your Stateful CSS Classes for an Accessible Web](https://seesparkbox.com/foundry/ditch_your_stateful_css_classes_for_an_accessible_web)
- [W3C - CSS Techniques for WCAG 2.0](https://www.w3.org/TR/WCAG20-TECHS/css)
- [CSS Tricks - Improving the Accessibility of 24 ways](https://css-tricks.com/improving-accessibility-24-ways/)
- [Improve accessibility of forms **:fr:**](http://css.mammouthland.net/formulaire-form-input-css.php)
- [Write Website Specifications **:fr:**](https://www.seomix.fr/cahier-des-charges-web/)
- [Risk management with WP **:fr:**](https://imathi.eu/2020/03/02/une-maitrise-des-risques-gonflee-a-bloc-grace-a-wordpress/)
- [5 Ways to Create a WordPress Plugin Settings Page](https://deliciousbrains.com/create-wordpress-plugin-settings-page/)
- [Gutemberg Template Library](https://gutenberghub.com/introducing-gutenberg-templates-library/)
- [Google's image optimizations article](https://developers.google.com/web/tools/lighthouse/audits/optimize-images)
- [Talk about HTML markup](https://html.com/semantic-markup/)
- [Sanitize accents on uploads **:fr:**](https://wpchannel.com/wordpress/tutoriels-wordpress/renommer-automatiquement-fichiers-accentues-wordpress/)
- [Apply migration to WP database](https://gist.github.com/MrZyr0/e811d995055c72fb7e65b876100bd338)

### Blogs

- [wpTavern - blog](https://wptavern.com/)
- [Good blog speak about WP **:fr:**](https://vincentdubroeucq.com/articles/)
- [WP marmite](https://wpmarmite.com/en/blog/)
- [CSP article](https://blog.dareboost.com/fr/2018/03/deployer-csp-une-approche-en-5-etapes/)
- [WPbeginner - another WP blog](https://www.wpbeginner.com/blog/)
- [GeepPress - blog **:fr:**](https://www.geekpress.fr/)
- [WP channel **:fr:**](https://wpchannel.com/blog/)
- [Kinsta - the host's blog](https://kinsta.com/blog/)
- [Smashing Magazine - A lot of technical topics around the web](https://www.smashingmagazine.com/)
- [digWP - technical talk about WP](https://digwp.com/)
- [SEOmix - SEO articles **:fr:**](https://www.seomix.fr/referencement/)
- [SEOmix - WP spécific articles **:fr:**](https://www.seomix.fr/wordpress/)
- [WP for dummies **:fr:**](https://www.wppourlesnuls.com/)
- [Another cool WP blog **:fr:**](https://wabeo.fr/blog/)
- [Themeisle](https://themeisle.com)
- [Misha Rudrastyh's blog](https://rudrastyh.com/)
- [WPexplorer's blog](https://www.wpexplorer.com/blog/)
- [Free & Paid WP Courses, tutorials & articles](https://wpshout.com/)

### Tools / Documentation / Learning

- [START HERE: WordPress configuration to dev theme](https://developer.wordpress.org/themes/basics/theme-functions/)
- [WP Glossary](https://www.wpglossary.net/)
- [Admin interface element presentation](https://wpadmin.bracketspace.com/)
- [Web dev checklist](http://webdevchecklist.com/)
- [The Front-End Checklist](https://frontendchecklist.io)
- [CSS icons](https://css.gg/app)
- [Test CSP on a page](https://securityheaders.com/)
- [Security & code quality scanner for WP themes](https://themecheck.info/)
<!-- // TODO: listing of conditionnal tags & hooks -->
- [Official hooks listing](https://codex.wordpress.org/Plugin_API/Action_Reference)
- [Search engine for WP doc](https://wpseek.com/)
- [WP core load illustration](https://www.rarst.net/images/wordpress_core_load.png)
- [WP official template hierarchy illustration interactive](https://www.wphierarchy.com/)
- [WP officiel conditional tags listing](https://codex.wordpress.org/Conditional_Tags)
<!-- //TODO: add more usefull illustrations -->
- [Axe accessibility rules](https://dequeuniversity.com/rules/)
- [Axe's website - Accessibility tools](https://www.deque.com/)
- [WP quality checklist](https://wpaudit.site/)
- [HTML sementics cheat shee](https://learn-the-web.algonquindesign.ca/topics/html-semantics-cheat-sheet/)
- [Interactive CSS selectors cheat sheet](https://frontend30.com/css-selectors-cheatsheet/)
- [CSS selectors cheat sheet](https://gist.github.com/magicznyleszek/809a69dd05e1d5f12d01)
- [Lando, docker's WP environnement](https://github.com/lando/lando)
- [Ultimate docs for a11y](https://a11yproject.com)
- [Detective Wapuu - Analyse Gutemberg bloc used in a page](https://richtabor.com/detective-wapuu/)
- [A large list of the most known and interesting plugins to test](https://wpstarterpack.com/full-list/)\
  **⚠ Don't take this pack because it's grey market or at your own risk ⚠**
- [Many premium plugins for development and education only](https://freethub.com)
- [Another WP Repository](https://wphive.com)
- [Search engine to search in source code of WP plugins](https://wpdirectory.net/)
_use it to check security of plugins before install it (search "ajax_no_priv")_
- [Learn WP Security](https://learnwpsecurity.com/)
- [Interesting CSS variable tuto](https://youtu.be/rXuHGLzSmSE)
- [SVG fallback](https://css-tricks.com/a-complete-guide-to-svg-fallbacks/)
<!-- TODO: Create a script to resize image to keep ratio on ie -->
- [Calc real dimensions of images with JS](https://css-tricks.com/measuring-image-widths-javascript-carefully/)
- [Interesting hosting](https://www.getshifter.io)
- [An alternative to Local by Flywheel](https://www.stackabl.io/)
- [All about translation :fr:](https://21douze.fr/traduction-wordpress-vous-faites-fausse-route-8518.html)
- [Interesting A11y informations :fr:](https://wiki.lelutinduweb.fr/)
- [Gutenberg Ramp - Control conditions under which Gutenberg loads - either from your theme code or from a UI](https://github.com/Automattic/gutenberg-ramp)
- [Gutenberg WordPress's official components reference](https://developer.wordpress.org/block-editor/components/)
- [Gutengerg WordPress's official packages folder in it repository](https://github.com/WordPress/gutenberg/tree/master/packages), this is the simplier way to find the right component you need

### Books

- [WPcookBook - A complete guide on theme development](https://vincentdubroeucq.com/wpcookbook/)
- [All secrets of wp-config.php](https://21douze.fr/mon-livre-constantes-wp-config)

### Legal informations

- [GDPR is very important, read CNIL's documentations ! **:fr:**](https://www.cnil.fr/)
- [CNIL - GDPR developper guid](https://www.cnil.fr/fr/guide-rgpd-du-developpeur)

### Other

- [OceanWP - a pretty complete theme](https://wordpress.org/themes/oceanwp/)
- [roots WP theme - Tools for modern WordPress development Bedrock architecture](https://roots.io/)
- [Interesting Nginx PHP & MariaDB configuration for WP](https://github.com/QROkes/webinoly)
- [FlyntWP - Interesting starter theme](https://flyntwp.com)
- [New interesting HTML 5 attributes](https://developer.mozilla.org/fr/docs/Web/HTML/Attributs/autocomplete)
- [Obfuscation plugin for wordpress - Pagerank sculpting](https://github.com/jmmorillon/wp-obfmylink)
- [Tide - quality & test code analysis](https://www.wptide.org/)
- [Improve prod/preprod media uploads plugin](https://github.com/BeAPI/prod-images)
- [Official WordPress make's slack](https://make.wordpress.org/chat/)
- [Interesting infography of Web skills & tools](https://andreasbm.github.io/web-skills/)
- [css layout paterns](https://csslayout.io/patterns/)
- [CSS tricks](https://twitter.com/AllThingsSmitty/status/1254151507412496384)
