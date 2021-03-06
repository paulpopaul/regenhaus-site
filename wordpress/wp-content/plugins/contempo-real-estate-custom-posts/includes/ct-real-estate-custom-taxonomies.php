<?php

/**
 * Register Custom Taxonmoies
 * Text Domain:       contempo
 * Domain Path:       /languages
 *
 * @link       http://contempographicdesign.com
 * @since      1.0.0
 *
 * @package    Contempo Real Estate Custom Posts
 * @subpackage contempo-real-estate-custom-posts/includes
 */

global $ct_options;

if ( ! function_exists( 'ct_realestate_taxonomies' ) ) {

	/**
	 * Register Custom Taxonomies
	 *
	 */

	add_action( 'init', 'ct_realestate_taxonomies', 0 );

	function ct_realestate_taxonomies() {

		global $ct_options;

		function ct_taxonomy($name){
			global $post;
			global $wp_query;
			$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, $name, '', ', ', '' ) );
			if($terms_as_text != '') {
				echo esc_html($terms_as_text);
			}
		}

		// Property Type
		$ptlabels = array(
			'name' => __( 'Tipos propiedades', 'contempo' ),
			'singular_name' => __( 'Tipo propiedad', 'contempo' ),
			'search_items' =>  __( 'Buscar por tipo de propiedad', 'contempo' ),
			'popular_items' => __( 'Tipos de propiedad más usados', 'contempo' ),
			'all_items' => __( 'Todos los tipos de propiedad', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar tipo de propiedad', 'contempo' ),
			'update_item' => __( 'Modificar tipo de propiedad', 'contempo' ),
			'add_new_item' => __( 'Añadir nuevo tipo de propiedad', 'contempo' ),
			'new_item_name' => __( 'Agregar nuevo tipo de propiedad', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar tipos de propiedades por comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover tipos de propiedad', 'contempo' ),
			'choose_from_most_used' => __( 'Seleccionar de los tipos de propiedad más usados', 'contempo' )
		);
		register_taxonomy( 'property_type', 'listings', array(
			'hierarchical' => false,
			'labels' => $ptlabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'property-type' ),
		));

		if ( ! function_exists( 'propertytype' ) ) {
			function propertytype() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'property_type', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		$ct_bed_beds_or_bedrooms = isset( $ct_options['ct_bed_beds_or_bedrooms'] ) ? $ct_options['ct_bed_beds_or_bedrooms'] : '';

		if($ct_bed_beds_or_bedrooms == 'rooms') {
			// Rooms
			$bedslabels = array(
				'name' => __( 'Rooms', 'contempo' ),
				'singular_name' => __( 'Room', 'contempo' ),
				'search_items' =>  __( 'Search Rooms', 'contempo' ),
				'popular_items' => __( 'Popular Rooms', 'contempo' ),
				'all_items' => __( 'All Rooms', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Rooms', 'contempo' ),
				'update_item' => __( 'Update Rooms', 'contempo' ),
				'add_new_item' => __( 'Add New Rooms', 'contempo' ),
				'new_item_name' => __( 'New Rooms Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Rooms with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Rooms', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Rooms', 'contempo' )
			);
			register_taxonomy( 'beds', 'listings', array(
				'hierarchical' => false,
				'labels' => $bedslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'rooms' ),
			));
		} elseif($ct_bed_beds_or_bedrooms == 'bedrooms') {
			// Bedroom
			$bedslabels = array(
				'name' => __( 'Bedrooms', 'contempo' ),
				'singular_name' => __( 'Bedroom', 'contempo' ),
				'search_items' =>  __( 'Search Bedrooms', 'contempo' ),
				'popular_items' => __( 'Popular Bedrooms', 'contempo' ),
				'all_items' => __( 'All Bedrooms', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Bedrooms', 'contempo' ),
				'update_item' => __( 'Update Bedrooms', 'contempo' ),
				'add_new_item' => __( 'Add New Bedrooms', 'contempo' ),
				'new_item_name' => __( 'New Bedrooms Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Bedrooms with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Bedrooms', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Bedrooms', 'contempo' )
			);
			register_taxonomy( 'beds', 'listings', array(
				'hierarchical' => false,
				'labels' => $bedslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'bedroom' ),
			));
		} elseif($ct_bed_beds_or_bedrooms == 'beds') {
			// Beds
			$bedslabels = array(
				'name' => __( 'Beds', 'contempo' ),
				'singular_name' => __( 'Beds', 'contempo' ),
				'search_items' =>  __( 'Search Beds', 'contempo' ),
				'popular_items' => __( 'Popular Beds', 'contempo' ),
				'all_items' => __( 'All Beds', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Beds', 'contempo' ),
				'update_item' => __( 'Update Beds', 'contempo' ),
				'add_new_item' => __( 'Add New Beds', 'contempo' ),
				'new_item_name' => __( 'New Beds Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Beds with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Beds', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Beds', 'contempo' )
			);
			register_taxonomy( 'beds', 'listings', array(
				'hierarchical' => false,
				'labels' => $bedslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'beds' ),
			));
		} else {
			// Bed
			$bedslabels = array(
				'name' => __( 'Dormitorios', 'contempo' ),
				'singular_name' => __( 'Dormitorio', 'contempo' ),
				'search_items' =>  __( 'Buscar número dormitorios', 'contempo' ),
				'popular_items' => __( 'Número dormitorios más comunes', 'contempo' ),
				'all_items' => __( 'Todos los números de dormitorios', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar número de dormitorio', 'contempo' ),
				'update_item' => __( 'Modificar números de dormitorio', 'contempo' ),
				'add_new_item' => __( 'Agregar nuevo número de dormitorio', 'contempo' ),
				'new_item_name' => __( 'Agregar nuevo número de dormitorio', 'contempo' ),
				'separate_items_with_commas' => __( 'Separar número de dormitorios por comas', 'contempo' ),
				'add_or_remove_items' => __( 'Agregar o remover número de dormitorios', 'contempo' ),
				'choose_from_most_used' => __( 'Escoger los números de dormitorio más usados', 'contempo' )
			);
			register_taxonomy( 'beds', 'listings', array(
				'hierarchical' => false,
				'labels' => $bedslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'bed' ),
			));
		}

		if ( ! function_exists( 'beds' ) ) {
			function beds() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'beds', '', ', ', '' ) );
				if($terms_as_text != '') {
					echo esc_html($terms_as_text);
				}
			}
		}

		$ct_bath_baths_or_bathrooms = isset( $ct_options['ct_bath_baths_or_bathrooms'] ) ? $ct_options['ct_bath_baths_or_bathrooms'] : '';

		if($ct_bath_baths_or_bathrooms == 'bathrooms') {
			// Bathrooms
			$bathslabels = array(
				'name' => __( 'Bathrooms', 'contempo' ),
				'singular_name' => __( 'Bathroom', 'contempo' ),
				'search_items' =>  __( 'Search Bathrooms', 'contempo' ),
				'popular_items' => __( 'Popular Bathrooms', 'contempo' ),
				'all_items' => __( 'All Bathrooms', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Bathrooms', 'contempo' ),
				'update_item' => __( 'Update Bathrooms', 'contempo' ),
				'add_new_item' => __( 'Add New Bathrooms', 'contempo' ),
				'new_item_name' => __( 'New Bathrooms Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Bathrooms with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Bathrooms', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Bathrooms', 'contempo' )
			);
			register_taxonomy( 'baths', 'listings', array(
				'hierarchical' => false,
				'labels' => $bathslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'bath' ),
			));
		} elseif($ct_bath_baths_or_bathrooms == 'bath') {
			// Bath
			$bathslabels = array(
				'name' => __( 'Bath', 'contempo' ),
				'singular_name' => __( 'Bath', 'contempo' ),
				'search_items' =>  __( 'Search Baths', 'contempo' ),
				'popular_items' => __( 'Popular Baths', 'contempo' ),
				'all_items' => __( 'All Baths', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Baths', 'contempo' ),
				'update_item' => __( 'Update Baths', 'contempo' ),
				'add_new_item' => __( 'Add New Baths', 'contempo' ),
				'new_item_name' => __( 'New Baths Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Baths with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Baths', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Baths', 'contempo' )
			);
			register_taxonomy( 'baths', 'listings', array(
				'hierarchical' => false,
				'labels' => $bathslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'bath' ),
			));
		} else {
			// Baths
			$bathslabels = array(
				'name' => __( 'Baños', 'contempo' ),
				'singular_name' => __( 'Baño', 'contempo' ),
				'search_items' =>  __( 'Buscar baños', 'contempo' ),
				'popular_items' => __( 'Baños más usados', 'contempo' ),
				'all_items' => __( 'Todos los baños', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar baño', 'contempo' ),
				'update_item' => __( 'Modificar baño', 'contempo' ),
				'add_new_item' => __( 'Añadir nuevo baño', 'contempo' ),
				'new_item_name' => __( 'Nuevo baño', 'contempo' ),
				'separate_items_with_commas' => __( 'Separar baños por comas', 'contempo' ),
				'add_or_remove_items' => __( 'Añadir o remover baños', 'contempo' ),
				'choose_from_most_used' => __( 'Escoger baños de los más usados', 'contempo' )
			);
			register_taxonomy( 'baths', 'listings', array(
				'hierarchical' => false,
				'labels' => $bathslabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'baths' ),
			));
		}

		if ( ! function_exists( 'baths' ) ) {
			function baths() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'baths', '', ', ', '' ) );
				if($terms_as_text != '') {
					echo esc_html($terms_as_text);
				}
			}
		}

		// Status
		$statuslabels = array(
			'name' => __( 'Estados venta', 'contempo' ),
			'singular_name' => __( 'Estado venta', 'contempo' ),
			'search_items' =>  __( 'Buscar estados de venta', 'contempo' ),
			'popular_items' => __( 'Estados de venta más usados', 'contempo' ),
			'all_items' => __( 'Todos los estados de venta', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar estado de venta', 'contempo' ),
			'update_item' => __( 'Modificar estado de venta', 'contempo' ),
			'add_new_item' => __( 'Añadir nuevo estado de venta', 'contempo' ),
			'new_item_name' => __( 'Nuevo nombre estado de venta', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar estado de venta por comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover estado de venta', 'contempo' ),
			'choose_from_most_used' => __( 'Escoger estado de venta más usados', 'contempo' )
		);
		register_taxonomy( 'ct_status', 'listings', array(
			'hierarchical' => false,
			'labels' => $statuslabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'status' ),
		));

		if ( ! function_exists( 'status' ) ) {
			function status() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'ct_status', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		// City
		$citylabels = array(
			'name' => __( 'Ciudades', 'contempo' ),
			'singular_name' => __( 'Ciudad', 'contempo' ),
			'search_items' =>  __( 'Buscar ciudades', 'contempo' ),
			'popular_items' => __( 'Ciudades mñas usadas', 'contempo' ),
			'all_items' => __( 'Todas las ciudades', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar ciudad', 'contempo' ),
			'update_item' => __( 'Modificar ciudad', 'contempo' ),
			'add_new_item' => __( 'Añadir nueva ciudad', 'contempo' ),
			'new_item_name' => __( 'Nuevo nombre de ciudad', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar ciudades por comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover ciudades', 'contempo' ),
			'choose_from_most_used' => __( 'Escoger de las ciudades más usadas', 'contempo' )
		);
		register_taxonomy( 'city', 'listings', array(
			'hierarchical' => false,
			'labels' => $citylabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'city' ),
		));

		if ( ! function_exists( 'city' ) ) {
			function city() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'city', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		// State
		$ct_state_or_area = isset( $ct_options['ct_state_or_area'] ) ? $ct_options['ct_state_or_area'] : '';

		if($ct_state_or_area == 'area') {

			$arealabels = array(
				'name' => __( 'Area', 'contempo' ),
				'singular_name' => __( 'Area', 'contempo' ),
				'search_items' =>  __( 'Search Areas', 'contempo' ),
				'popular_items' => __( 'Popular Areas', 'contempo' ),
				'all_items' => __( 'All Areas', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Areas', 'contempo' ),
				'update_item' => __( 'Update Area', 'contempo' ),
				'add_new_item' => __( 'Add New Area', 'contempo' ),
				'new_item_name' => __( 'New Area Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Area with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Areas', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Areas', 'contempo' )
			);
			register_taxonomy( 'state', 'listings', array(
				'hierarchical' => false,
				'labels' => $arealabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'area' ),
			));

		} elseif($ct_state_or_area == 'suburb') {

			$arealabels = array(
				'name' => __( 'Suburb', 'contempo' ),
				'singular_name' => __( 'Suburb', 'contempo' ),
				'search_items' =>  __( 'Search Suburbs', 'contempo' ),
				'popular_items' => __( 'Popular Suburbs', 'contempo' ),
				'all_items' => __( 'All Suburbs', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Suburbs', 'contempo' ),
				'update_item' => __( 'Update Suburb', 'contempo' ),
				'add_new_item' => __( 'Add New Suburb', 'contempo' ),
				'new_item_name' => __( 'New Suburb Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Suburb with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Suburbs', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Suburbs', 'contempo' )
			);
			register_taxonomy( 'state', 'listings', array(
				'hierarchical' => false,
				'labels' => $arealabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'suburb' ),
			));

		} elseif($ct_state_or_area == 'province') {

			$arealabels = array(
				'name' => __( 'Province', 'contempo' ),
				'singular_name' => __( 'Province', 'contempo' ),
				'search_items' =>  __( 'Search Provinces', 'contempo' ),
				'popular_items' => __( 'Popular Provinces', 'contempo' ),
				'all_items' => __( 'All Provinces', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Provinces', 'contempo' ),
				'update_item' => __( 'Update Province', 'contempo' ),
				'add_new_item' => __( 'Add New Province', 'contempo' ),
				'new_item_name' => __( 'New Province Name', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Province with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Provinces', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Provinces', 'contempo' )
			);
			register_taxonomy( 'state', 'listings', array(
				'hierarchical' => false,
				'labels' => $arealabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'province' ),
			));

		} else {

			$statelabels = array(
				'name' => __( 'Regiones', 'contempo' ),
				'singular_name' => __( 'Región', 'contempo' ),
				'search_items' =>  __( 'Buscar regiones', 'contempo' ),
				'popular_items' => __( 'Regiones polulares', 'contempo' ),
				'all_items' => __( 'Todas las regiones', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar region', 'contempo' ),
				'update_item' => __( 'Modificar región', 'contempo' ),
				'add_new_item' => __( 'Añadir región', 'contempo' ),
				'new_item_name' => __( 'Nueva región', 'contempo' ),
				'separate_items_with_commas' => __( 'Separados por coma', 'contempo' ),
				'add_or_remove_items' => __( 'Añadir o remover región', 'contempo' ),
				'choose_from_most_used' => __( 'Escoger región de las más usadas', 'contempo' )
			);
			register_taxonomy( 'state', 'listings', array(
				'hierarchical' => false,
				'labels' => $statelabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'state' ),
			));
		}

		if ( ! function_exists( 'state' ) ) {
			function state() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'state', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		// Zipcode
		$ct_zip_or_post = isset( $ct_options['ct_zip_or_post'] ) ? $ct_options['ct_zip_or_post'] : '';

		if($ct_zip_or_post == 'postcode') {

			$postlabels = array(
				'name' => __( 'Postcode', 'contempo' ),
				'singular_name' => __( 'Postcode', 'contempo' ),
				'search_items' =>  __( 'Search Postcodes', 'contempo' ),
				'popular_items' => __( 'Popular Postcodes', 'contempo' ),
				'all_items' => __( 'All Postcodes', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Postcode', 'contempo' ),
				'update_item' => __( 'Update Postcode', 'contempo' ),
				'add_new_item' => __( 'Add New Postcode', 'contempo' ),
				'new_item_name' => __( 'New Postcode', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Postcodes with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Postcodes', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Postcodes', 'contempo' )
			);
			register_taxonomy( 'zipcode', 'listings', array(
				'hierarchical' => false,
				'labels' => $postlabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'postcode' ),
			));

		} elseif($ct_zip_or_post == 'postalcode') {

			$postlabels = array(
				'name' => __( 'Códigos postales', 'contempo' ),
				'singular_name' => __( 'Código postal', 'contempo' ),
				'search_items' =>  __( 'Buscar códigos postales', 'contempo' ),
				'popular_items' => __( 'Códigos postales más usados', 'contempo' ),
				'all_items' => __( 'Todos los códigos postales', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar códigos postales', 'contempo' ),
				'update_item' => __( 'Modificar códigos postales', 'contempo' ),
				'add_new_item' => __( 'Añadir nuevo código postal', 'contempo' ),
				'new_item_name' => __( 'Nuevo código postal', 'contempo' ),
				'separate_items_with_commas' => __( 'Separar códigos postales por comas', 'contempo' ),
				'add_or_remove_items' => __( 'Añadir o remover códigos postales', 'contempo' ),
				'choose_from_most_used' => __( 'Escoger códigos postales de los más usados', 'contempo' )
			);
			register_taxonomy( 'zipcode', 'listings', array(
				'hierarchical' => false,
				'labels' => $postlabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'postalcode' ),
			));

		} else {

			$ziplabels = array(
				'name' => __( 'Zipcode', 'contempo' ),
				'singular_name' => __( 'Zipcode', 'contempo' ),
				'search_items' =>  __( 'Search Zipcodes', 'contempo' ),
				'popular_items' => __( 'Popular Zipcodes', 'contempo' ),
				'all_items' => __( 'All Zipcodes', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Zipcode', 'contempo' ),
				'update_item' => __( 'Update Zipcode', 'contempo' ),
				'add_new_item' => __( 'Add New Zipcode', 'contempo' ),
				'new_item_name' => __( 'New Zipcode', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Zipcodes with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Zipcodes', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Zipcodes', 'contempo' )
			);
			register_taxonomy( 'zipcode', 'listings', array(
				'hierarchical' => false,
				'labels' => $ziplabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'zipcode' ),
			));
			
		}

		if ( ! function_exists( 'zipcode' ) ) {
			function zipcode() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'zipcode', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		// Country
		$countrylabels = array(
			'name' => __( 'Países', 'contempo' ),
			'singular_name' => __( 'País', 'contempo' ),
			'search_items' =>  __( 'Buscar países', 'contempo' ),
			'popular_items' => __( 'Países más usados', 'contempo' ),
			'all_items' => __( 'Todos los países', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar países', 'contempo' ),
			'update_item' => __( 'Modificar países', 'contempo' ),
			'add_new_item' => __( 'Añadir país', 'contempo' ),
			'new_item_name' => __( 'Nuevo nombre del país', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar países por comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover países', 'contempo' ),
			'choose_from_most_used' => __( 'Escoger países de los más usados', 'contempo' )
		);
		register_taxonomy( 'country', 'listings', array(
			'hierarchical' => false,
			'labels' => $countrylabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'country' ),
		));

		if ( ! function_exists( 'country' ) ) {
			function country() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'country', '', ', ', '' ) );
				if(!empty($terms_as_text)) {
					echo ', ' . esc_html($terms_as_text);
				}
			}
		}

		// Country
		$countylabels = array(
			'name' => __( 'Condados', 'contempo' ),
			'singular_name' => __( 'Condado', 'contempo' ),
			'search_items' =>  __( 'Buscar condados', 'contempo' ),
			'popular_items' => __( 'Condados más usados', 'contempo' ),
			'all_items' => __( 'Todos los condados', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar condado', 'contempo' ),
			'update_item' => __( 'Modificar condado', 'contempo' ),
			'add_new_item' => __( 'Añadir nuevo condado', 'contempo' ),
			'new_item_name' => __( 'Nuevo nombre de condado', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar condado por comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover condados', 'contempo' ),
			'choose_from_most_used' => __( 'Escoger condado de los más usados', 'contempo' )
		);
		register_taxonomy( 'county', 'listings', array(
			'hierarchical' => false,
			'labels' => $countylabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'county' ),
		));

		if ( ! function_exists( 'county' ) ) {
			function county() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'county', '', ', ', '' ) );
				if(!empty($terms_as_text)) {
					echo ', ' . esc_html($terms_as_text);
				}
			}
		}

		// Community
		$ct_community_neighborhood_or_district = isset( $ct_options['ct_community_neighborhood_or_district'] ) ? $ct_options['ct_community_neighborhood_or_district'] : '';

		if($ct_community_neighborhood_or_district == 'neighborhood') {

			$neighborhoodlabels = array(
				'name' => __( 'Condominios', 'contempo' ),
				'singular_name' => __( 'Condominio', 'contempo' ),
				'search_items' =>  __( 'Buscar condominios', 'contempo' ),
				'popular_items' => __( 'Condominios populares', 'contempo' ),
				'all_items' => __( 'Todos los condominios', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Editar condominio', 'contempo' ),
				'update_item' => __( 'Modificar condominio', 'contempo' ),
				'add_new_item' => __( 'Añadir nuevo condominio', 'contempo' ),
				'new_item_name' => __( 'Nuevo nombre de condominio', 'contempo' ),
				'separate_items_with_commas' => __( 'Separar condominios por comas', 'contempo' ),
				'add_or_remove_items' => __( 'Añadir o remover condominios', 'contempo' ),
				'choose_from_most_used' => __( 'Escoger condominio de los más usados', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $neighborhoodlabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'neighborhood' ),
			));
			
		} elseif($ct_community_neighborhood_or_district == 'suburb') {

			$suburblabels = array(
				'name' => __( 'Suburb', 'contempo' ),
				'singular_name' => __( 'Suburb', 'contempo' ),
				'search_items' =>  __( 'Search Suburbs', 'contempo' ),
				'popular_items' => __( 'Popular Suburbs', 'contempo' ),
				'all_items' => __( 'All Suburbs', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Suburb', 'contempo' ),
				'update_item' => __( 'Update Suburb', 'contempo' ),
				'add_new_item' => __( 'Add New Suburb', 'contempo' ),
				'new_item_name' => __( 'New Suburb', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Suburbs with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Suburbs', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Suburbs', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $suburblabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'suburb' ),
			));

		} elseif($ct_community_neighborhood_or_district == 'district') {

			$districtlabels = array(
				'name' => __( 'District', 'contempo' ),
				'singular_name' => __( 'District', 'contempo' ),
				'search_items' =>  __( 'Search Districts', 'contempo' ),
				'popular_items' => __( 'Popular Districts', 'contempo' ),
				'all_items' => __( 'All Districts', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit District', 'contempo' ),
				'update_item' => __( 'Update District', 'contempo' ),
				'add_new_item' => __( 'Add New District', 'contempo' ),
				'new_item_name' => __( 'New District', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Districts with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Districts', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Districts', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $districtlabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'district' ),
			));

		} elseif($ct_community_neighborhood_or_district == 'building') {

			$buildinglabels = array(
				'name' => __( 'Building', 'contempo' ),
				'singular_name' => __( 'Building', 'contempo' ),
				'search_items' =>  __( 'Search Buildings', 'contempo' ),
				'popular_items' => __( 'Popular Buildings', 'contempo' ),
				'all_items' => __( 'All Buildings', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Building', 'contempo' ),
				'update_item' => __( 'Update Building', 'contempo' ),
				'add_new_item' => __( 'Add New Building', 'contempo' ),
				'new_item_name' => __( 'New Building', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Buildings with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Buildings', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Buildings', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $buildinglabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'building' ),
			));

		} elseif($ct_community_neighborhood_or_district == 'borough') {

			$buildinglabels = array(
				'name' => __( 'Borough', 'contempo' ),
				'singular_name' => __( 'Borough', 'contempo' ),
				'search_items' =>  __( 'Search Boroughs', 'contempo' ),
				'popular_items' => __( 'Popular Boroughs', 'contempo' ),
				'all_items' => __( 'All Boroughs', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Borough', 'contempo' ),
				'update_item' => __( 'Update Borough', 'contempo' ),
				'add_new_item' => __( 'Add New Borough', 'contempo' ),
				'new_item_name' => __( 'New Borough', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Boroughs with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Boroughs', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Boroughs', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $buildinglabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'building' ),
			));

		} elseif($ct_community_neighborhood_or_district == 'sector') {

			$buildinglabels = array(
				'name' => __( 'Sector', 'contempo' ),
				'singular_name' => __( 'Sector', 'contempo' ),
				'search_items' =>  __( 'Search Sectors', 'contempo' ),
				'popular_items' => __( 'Popular Sectors', 'contempo' ),
				'all_items' => __( 'All Sectors', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Sector', 'contempo' ),
				'update_item' => __( 'Update Sector', 'contempo' ),
				'add_new_item' => __( 'Add New Sector', 'contempo' ),
				'new_item_name' => __( 'New Sector', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Sectors with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Sectors', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Sectors', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $buildinglabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'sector' ),
			));

		} else {

			$communitylabels = array(
				'name' => __( 'Community', 'contempo' ),
				'singular_name' => __( 'Community', 'contempo' ),
				'search_items' =>  __( 'Search Communities', 'contempo' ),
				'popular_items' => __( 'Popular Communities', 'contempo' ),
				'all_items' => __( 'All Communities', 'contempo' ),
				'parent_item' => null,
				'parent_item_colon' => null,
				'edit_item' => __( 'Edit Community', 'contempo' ),
				'update_item' => __( 'Update Community', 'contempo' ),
				'add_new_item' => __( 'Add New Community', 'contempo' ),
				'new_item_name' => __( 'New Community', 'contempo' ),
				'separate_items_with_commas' => __( 'Separate Communities with commas', 'contempo' ),
				'add_or_remove_items' => __( 'Add or remove Communities', 'contempo' ),
				'choose_from_most_used' => __( 'Choose from the most used Communities', 'contempo' )
			);
			register_taxonomy( 'community', 'listings', array(
				'hierarchical' => false,
				'labels' => $communitylabels,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => array( 'slug' => 'community' ),
			));
		}

		if ( ! function_exists( 'community' ) ) {
			function community() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'community', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		// Additional Features
		$addfeatlabels = array(
			'name' => __( 'Additional Features', 'contempo' ),
			'singular_name' => __( 'Característica adicional', 'contempo' ),
			'search_items' =>  __( 'Buscar característica adicional', 'contempo' ),
			'popular_items' => __( 'Características adicionales más usadas', 'contempo' ),
			'all_items' => __( 'Todas las características adicionales', 'contempo' ),
			'parent_item' => null,
			'parent_item_colon' => null,
			'edit_item' => __( 'Editar característica adicional', 'contempo' ),
			'update_item' => __( 'Modificar característica adicional', 'contempo' ),
			'add_new_item' => __( 'Añadir nueva característica adicional', 'contempo' ),
			'new_item_name' => __( 'Nueva característica adicional', 'contempo' ),
			'separate_items_with_commas' => __( 'Separar características adicionales con comas', 'contempo' ),
			'add_or_remove_items' => __( 'Añadir o remover características adicionales', 'contempo' ),
			'choose_from_most_used' => __( 'Selecccionar características adicionales más usadas', 'contempo' )
		);
		register_taxonomy( 'additional_features', 'listings', array(
			'hierarchical' => false,
			'labels' => $addfeatlabels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'features' ),
		));

		if ( ! function_exists( 'addfeat' ) ) {
			function addfeat() {
				global $post;
				global $wp_query;
				$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'additional_features', '', ', ', '' ) );
				echo esc_html($terms_as_text);
			}
		}

		if ( ! function_exists( 'addfeatlist' ) ) {
			function addfeatlist () {
				global $post;
				$terms = get_the_terms($post->ID, 'additional_features');
				if ($terms) {
					echo '<h4 class="border-bottom marB20">' . __('Additional Features', 'contempo') . '</h4>';
					echo '<ul class="propfeatures col span_6">';
					$count = 0;
					foreach ($terms as $taxindex => $taxitem) {
						echo '<li><i class="fa fa-check-square"></i>' . $taxitem->name . '</li>';
						$count++;
						if ($count == 6) {
							echo '</ul><ul class="propfeatures col span_6">';
							$count = 0;
						}
					}
					echo '</ul>';
					echo '<div class="clear"></div>';
				} else {
					
				}
			}
		}

	}

}

?>