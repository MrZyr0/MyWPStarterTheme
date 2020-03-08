<?php

/**
 * A Custom walker to add first element at the begining of a menu
 * extends to Cleanup_Menu_Walker()
 * 
 * @see https://developer.wordpress.org/reference/classes/walker_nav_menu/
 * 
 * @param string $markup Used to add HTML
 * @param int $position Specify where add the element
 */
class Add_Element_Walker extends Cleanup_Menu_Walker {

  private string $element__markup = '';
  private int $element__count = 0;
  private int $element__position = 0;

  function __construct($markup, $position) {
    $this->element__markup = $markup;
    $this->element__position = $position;
  }

  public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {

    if ($this->element__count === $this->element__position && ! $this->$element__markup = '')
    {
      $output .= $this->element__markup;
    }

    parent::start_el( $output, $item, $depth, $args, $id );

    $this->element__count++;
  }
}
