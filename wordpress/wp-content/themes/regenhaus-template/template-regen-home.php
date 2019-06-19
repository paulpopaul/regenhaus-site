<?php
/**
 * Template Name: Full Width
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */



if( !is_null($_GET['listar']) || !empty($_GET['search-listings']) )
	get_template_part('search-listings');
else
	Header("Location: ?listar=todo");