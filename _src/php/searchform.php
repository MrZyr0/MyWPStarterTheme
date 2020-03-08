<form role="search" method="get" class="search-form" action="/" target="_self">
  <input type="search" id="search-field" placeholder="Rechercher…" value="<?= get_search_query() ?>" name="s" class="hide-clear-cross">

  <label for="search-submit" id="search-submit__icon">
    <img src="<?= get_source_path('image-matrix-icon', 'searchMagnifier_icon_black.png'); ?>" alt="une loupe représentant la recherche. Cliquer dessus pour lancer la recherche" title="Lancer la recherche" srcset="<?= get_source_path('image-vector-icon', 'searchMagnifier_icon_black.svg'); ?>"/>
  </label>
  <input type="submit" id="search-submit" class="screen-reader-text">
</form>
