<?php
/**
 * Push Menu
 *
 * @package   Class-Walker-Menu
 * @version   1.0
 */

if ( ! class_exists( 'Push_Menu' ) ) {
	
	class Push_Menu extends Walker_Nav_Menu {
	  function start_lvl(&$output, $depth = 0, $args = array()) {
	    $indent = str_repeat("\t", $depth);
	    $output .= "\n$indent<ul class=\"dl-submenu\">\n";
	  }
	  function end_lvl(&$output, $depth = 0, $args = array()) {
	    $indent = str_repeat("\t", $depth);
	    $output .= "$indent</ul>\n";
	  }
	}
	
}
