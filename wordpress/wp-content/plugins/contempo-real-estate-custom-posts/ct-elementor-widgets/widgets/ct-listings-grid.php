<?php
namespace CT_Elementor_Widgets\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * CT Listings Grid
 *
 * Elementor widget for listings grid style.
 *
 * @since 1.0.0
 */
class CT_Listings_Grid extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'ct-listings-grid';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'CT Listings Grid', 'contempo' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ct-real-estate-7' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Query', 'contempo' ),
			]
		);

		$this->add_control(
			'number',
			[
				'label' => __( 'Number', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '6', 'contempo'),
				'description' => __( 'Enter the number to show per page, if you\'d like to show all enter -1.', 'contempo'),
			]
		);

		$this->add_control(
			'order',
			[
				'label' => __( 'Order', 'contempo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC' => __( 'Ascending', 'contempo' ),
					'DESC' => __( 'Descending', 'contempo' ),
				],
				'default' => 'ASC',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label' => __( 'Order by', 'contempo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'date' => __( 'Date', 'contempo' ),
					'price' => __( 'Price', 'contempo' ),
					'rand' => __( 'Random', 'contempo' ),
				],
				'default' => 'date',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_listing_parameters',
			[
				'label' => __( 'Listing Parameters', 'contempo' ),
			]
		);

		$this->add_control(
			'type',
			[
				'label' => __( 'Type', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'single-family-home', 'contempo'),
				'description' => __( 'Enter the type, e.g. single-family-home, condo, commercial.', 'contempo'),
			]
		);

		$this->add_control(
			'beds',
			[
				'label' => __( 'Beds', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '3', 'contempo'),
				//'description' => __( 'Enter the beds, e.g. 2, 3, 4.', 'contempo'),
			]
		);

		$this->add_control(
			'baths',
			[
				'label' => __( 'Baths', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '2', 'contempo'),
				//'description' => __( 'Enter the baths, e.g. 2, 3, 4.', 'contempo'),
			]
		);

		$this->add_control(
			'status',
			[
				'label' => __( 'Status', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'for-sale', 'contempo'),
				'description' => __( 'Enter the status, e.g. for-sale, for-rent, open-house.', 'contempo'),
			]
		);

		$this->add_control(
			'exclude_sold',
			[
				'label' => __( 'Exclude Sold?', 'contempo' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'' => __( 'No', 'contempo' ),
					'sold' => __( 'Yes', 'contempo' ),
				],
				'default' => '',
			]
		);

		$this->add_control(
			'city',
			[
				'label' => __( 'City', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'san-diego', 'contempo'),
				'description' => __( 'Enter the city, e.g. san-diego, los-angeles, new-york.', 'contempo'),
			]
		);

		$this->add_control(
			'state',
			[
				'label' => __( 'State', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( 'ca', 'contempo'),
				'description' => __( 'Enter the state, e.g. ca, tx, ny.', 'contempo'),
			]
		);

		$this->add_control(
			'zipcode',
			[
				'label' => __( 'Zip or Postcode', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '92101', 'contempo'),
				'description' => __( 'Enter the zip or postcode, e.g. 92101, 92065, 94027.', 'contempo'),
			]
		);

		$this->add_control(
			'county',
			[
				'label' => __( 'County', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'contempo'),
				'description' => __( 'Enter the county, e.g. alpine-county, imperial-county, napa-county.', 'contempo'),
			]
		);

		$this->add_control(
			'country',
			[
				'label' => __( 'Country', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'contempo'),
				'description' => __( 'Enter the country, e.g. usa, england, greece.', 'contempo'),
			]
		);

		$this->add_control(
			'community',
			[
				'label' => __( 'Community', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'contempo'),
				'description' => __( 'Enter the community, e.g. the-grand-estates, broadstone-apartments.', 'contempo'),
			]
		);

		$this->add_control(
			'additional_features',
			[
				'label' => __( 'Additional Features', 'contempo' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => __( '', 'contempo'),
				'description' => __( 'Enter the additional features, e.g. pool, gated, beach-frontage.', 'contempo'),
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		// Output Listings
		echo '<ul class="col span_12 row first">';

			global $post, $wp_query, $wpdb;
			global $ct_options;

			if($settings['orderby'] == 'price') {
				$ct_price = get_post_meta($post->ID, "_ct_price", true);
				$args = array(
       				'ct_status' => $settings['status'],
		            'property_type' => $settings['type'],
        			'beds' => $$settings['beds'],
		            'baths' => $settings['baths'],
        			'city' => $settings['city'],
		            'state' => $settings['state'],
        			'zipcode' => $settings['zipcode'],
        			'country' => $settings['country'],
        			'county' => $settings['county'],
        			'community' => $settings['community'],
        			'additional_features' => $settings['additional_features'],
        			'post_type' => 'listings',
		            'orderby' => 'meta_value',
					'meta_key' => '_ct_price',
					'meta_type' => 'numeric',
					'tax_query' => array(
				        array(
				            'taxonomy' => 'ct_status',
				            'field'     => 'slug',
						    'terms'     => $settings['exclude_sold'],
				            'operator' => 'NOT IN'
				        )
				    ),
					'order' => $settings['order'],
		            'posts_per_page' => $settings['number']
    			);
			} else {
				$args = array(
        			'ct_status' => $settings['status'],
        			'property_type' => $settings['type'],
        			'beds' => $settings['beds'],
		            'baths' => $settings['baths'],
        			'city' => $settings['city'],
		            'state' => $settings['state'],
        			'zipcode' => $settings['zipcode'],
        			'country' => $settings['country'],
        			'county' => $settings['county'],
        			'community' => $settings['community'],
        			'additional_features' => $settings['additional_features'],
        			'post_type' => 'listings',
        			'orderby' => $settings['orderby'],
					'order' => $settings['order'],
					//'meta_key' => 'date',
					//'meta_type' => 'numeric',
					'tax_query' => array(
				        array(
				            'taxonomy' => 'ct_status',
				            'field'     => 'slug',
						    'terms'     => $settings['exclude_sold'],
				            'operator' => 'NOT IN'
				        )
				    ),
        			'posts_per_page' => $settings['number']
    			);
			}
			$wp_query = new \wp_query( $args );
	        
	        $count = 0;

	        if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();

	        if(taxonomy_exists('city')){
		        $city = strip_tags( get_the_term_list( $wp_query->post->ID, 'city', '', ', ', '' ) );
		    }
		    if(taxonomy_exists('state')){
		        $state = strip_tags( get_the_term_list( $wp_query->post->ID, 'state', '', ', ', '' ) );
		    }
		    if(taxonomy_exists('zipcode')){
		        $zipcode = strip_tags( get_the_term_list( $wp_query->post->ID, 'zipcode', '', ', ', '' ) );
		    }
		    if(taxonomy_exists('country')){
		        $country = strip_tags( get_the_term_list( $wp_query->post->ID, 'country', '', ', ', '' ) );
		    }
		    if(taxonomy_exists('county')){
		        $county = strip_tags( get_the_term_list( $wp_query->post->ID, 'county', '', ', ', '' ) );
		    }

	        $beds = strip_tags( get_the_term_list( $wp_query->post->ID, 'beds', '', ', ', '' ) );
		    $baths = strip_tags( get_the_term_list( $wp_query->post->ID, 'baths', '', ', ', '' ) );

		    $ct_use_propinfo_icons = isset( $ct_options['ct_use_propinfo_icons'] ) ? esc_html( $ct_options['ct_use_propinfo_icons'] ) : '';
			$ct_search_results_listing_style = isset( $ct_options['ct_search_results_listing_style'] ) ? $ct_options['ct_search_results_listing_style'] : '';
			$ct_listing_stats_on_off = isset( $ct_options['ct_listing_stats_on_off'] ) ? esc_attr( $ct_options['ct_listing_stats_on_off'] ) : '';
		    
		    $ct_walkscore = isset( $ct_options['ct_enable_walkscore'] ) ? esc_html( $ct_options['ct_enable_walkscore'] ) : '';
		    $ct_rentals_booking = isset( $ct_options['ct_rentals_booking'] ) ? esc_html( $ct_options['ct_rentals_booking'] ) : '';
		    $ct_listing_reviews = isset( $ct_options['ct_listing_reviews'] ) ? esc_html( $ct_options['ct_listing_reviews'] ) : '';

		    if($ct_walkscore == 'yes') {
			    /* Walk Score */
			   	$latlong = get_post_meta($post->ID, "_ct_latlng", true);
			   	if($latlong != '') {
					list($lat, $long) = explode(',',$latlong,2);
					$address = get_the_title() . ct_taxonomy_return('city') . ct_taxonomy_return('state') . ct_taxonomy_return('zipcode');
					$json = ct_get_walkscore($lat,$long,$address);

					$ct_ws = json_decode($json);
				}
			} ?>

				<li class="listing col span_4 <?php echo $ct_search_results_listing_style; ?> <?php if($count % 3 == 0) { echo 'first'; } ?>">
		            <figure>
		            	<?php
		           			if(has_term( 'featured', 'ct_status' ) ) {
								echo '<h6 class="snipe featured">';
									echo '<span>';
										echo __('Featured', '');
									echo '</span>';
								echo '</h6>';
							}
						?>
		                <?php
			                $status_tags = strip_tags( get_modified_term_list_name( $wp_query->post->ID, 'ct_status', '', ' ', '', array('featured') ) );
							if($status_tags != '') {
								echo '<h6 class="snipe status ';
										$status_terms = get_the_terms( $wp_query->post->ID, 'ct_status', array() );
										if ( ! empty( $status_terms ) && ! is_wp_error( $status_terms ) ){
										     foreach ( $status_terms as $term ) {
										       echo esc_html($term->slug) . ' ';
										     }
										 }
									echo '">';
									echo '<span>';
										echo esc_html($status_tags);
									echo '</span>';
								echo '</h6>';
							}
		                ?>
		                <?php if( function_exists('ct_property_type_icon') ) {
		                	ct_property_type_icon();
		            	} ?>
		                <?php
							echo '<ul class="listing-actions">';

								// Count Total images
						        $attachments = get_children(
						            array(
						                'post_type' => 'attachment',
						                'post_mime_type' => 'image',
						                'post_parent' => get_the_ID()
						            )
						        );

						        $img_count = count($attachments);

						        $feat_img = 1;
						        $total_imgs = $img_count + $feat_img;

								echo '<li>';
									echo '<span class="listing-views" data-tooltip="' . $img_count . __(' Photos','contempo') . '">';
										echo '<i class="fa fa-image"></i>';
									echo '</span>';
								echo '</li>';
								
								if (function_exists('wpfp_link')) {
									echo '<li>';
										echo '<span class="save-this" data-tooltip="' . __('Favorite','contempo') . '">';
											wpfp_link();
										echo '</span>';
									echo '</li>';
								}

								if(class_exists('Redq_Alike')) {
									echo '<li>';
										echo '<span class="compare-this" data-tooltip="' . __('Compare','contempo') . '">';
											echo do_shortcode('[alike_link vlaue="compare" show_icon="true" icon_class="fa fa-plus-square-o"]');
										echo '</span>';
									echo '</li>';
								}

								if(function_exists('ct_get_listing_views') && $ct_listing_stats_on_off != 'no') {
									echo '<li>';
										echo '<span class="listing-views" data-tooltip="' . ct_get_listing_views(get_the_ID()) . __(' Views','contempo') . '">';
											echo '<i class="fa fa-bar-chart"></i>';
										echo '</span>';
									echo '</li>';
								}

							echo '</ul>';
						?>
		                <?php if( function_exists('ct_first_image_linked') ) {
		                	ct_first_image_linked();
		                } ?>
		            </figure>

		            <?php do_action('before_listing_list_info'); ?>

		            <div class="grid-listing-info">
			            <header>
			                <h5 class="marB0"><a href="<?php the_permalink(); ?>"><?php if( function_exists('ct_listing_title') ) { ct_listing_title(); } ?></a></h5>
			                <p class="location muted marB0"><?php echo esc_html($city); ?>, <?php echo esc_html($state); ?> <?php echo esc_html($zipcode); ?> <?php echo esc_html($country); ?></p>
		                </header>

		                <p class="price marB0"><?php if( function_exists('ct_listing_price') ) { ct_listing_price(); } ?></p>

			            <div class="propinfo">
			            	
			            	<?php do_action('before_elementor_listing_grid_excerpt'); ?>

			            	<p><?php if( function_exists('ct_excerpt') ) { echo ct_excerpt(25); } ?></p>
			                
			                <ul class="marB0">

			                	<?php do_action('before_elementor_listing_grid_propinfo'); ?>
							
								<?php

							    if(ct_has_type('commercial') || ct_has_type('lot') || ct_has_type('land')) { 
							        // Dont Display Bed/Bath
							    } else {
							    	if(!empty($beds)) {
								    	echo '<li class="row beds">';
								    		echo '<span class="muted left">';
								    			if($ct_use_propinfo_icons != 'icons') {
									    			_e('Bed', 'contempo');
									    		} else {
									    			echo '<i class="fa fa-bed"></i>';
									    		}
								    		echo '</span>';
								    		echo '<span class="right">';
								               echo $beds;
								            echo '</span>';
								        echo '</li>';
								    }	
								    if(!empty($baths)) {
								        echo '<li class="row baths">';
								            echo '<span class="muted left">';
								    			if($ct_use_propinfo_icons != 'icons') {
									    			_e('Baths', 'contempo');
									    		} else {
									    			echo '<i class="fa fa-bath"></i>';
									    		}
								    		echo '</span>';
								    		echo '<span class="right">';
								               echo $baths;
								            echo '</span>';
								        echo '</li>';
								    }
							    }

							    if($ct_walkscore == 'yes') {
								    if(!empty($ct_ws->walkscore)) {
									    echo '<li class="row walkscore">';
											echo '<span class="muted left">';
												_e('Walk Score&reg;', 'contempo');
											echo '</span>';
											echo '<span class="right">';
												echo '<a class="tooltips" href=" ' . $ct_ws->ws_link , '" target="_blank">';
											        echo $ct_ws->walkscore;
											        echo '<span>' . $ct_ws->description. '</span>';
										        echo '</a>';
									        echo '</span>';
									    echo '</li>';
									}
								}

								include_once ABSPATH . 'wp-admin/includes/plugin.php';
								if($ct_listing_reviews == 'yes' || is_plugin_active('comments-ratings/comments-ratings.php')) {
									global $pixreviews_plugin;
									$ct_rating_avg = $pixreviews_plugin->get_average_rating();
									if($ct_rating_avg != '') {
										echo '<li class="row rating">';
								            echo '<span class="muted left">';
								                if($ct_use_propinfo_icons != 'icons') {
									    			_e('Rating', 'contempo');
									    		} else {
									    			echo '<i class="fa fa-star"></i>';
									    		}
								            echo '</span>';
								            echo '<span class="right">';
								                 echo $pixreviews_plugin->get_average_rating();
								            echo '</span>';
								        echo '</li>';
								    }
								}

							    include_once ABSPATH . 'wp-admin/includes/plugin.php';
								if($ct_rentals_booking == 'yes' || is_plugin_active('booking/wpdev-booking.php')) {
								    if(get_post_meta($post->ID, "_ct_rental_guests", true)) {
								        echo '<li class="row guests">';
								            echo '<span class="muted left">';
								                if($ct_use_propinfo_icons != 'icons') {
									    			_e('Guests', 'contempo');
									    		} else {
									    			echo '<i class="fa fa-group"></i>';
									    		}
								            echo '</span>';
								            echo '<span class="right">';
								                 echo get_post_meta($post->ID, "_ct_rental_guests", true);
								            echo '</span>';
								        echo '</li>';
								    }

								    if(get_post_meta($post->ID, "_ct_rental_min_stay", true)) {
								        echo '<li class="row min-stay">';
								            echo '<span class="muted left">';
								                if($ct_use_propinfo_icons != 'icons') {
									    			_e('Min Stay', 'contempo');
									    		} else {
									    			echo '<i class="fa fa-calendar"></i>';
									    		}
								            echo '</span>';
								            echo '<span class="right">';
								                 echo get_post_meta($post->ID, "_ct_rental_min_stay", true);
								            echo '</span>';
								        echo '</li>';
								    }
								}
							    
							    if(get_post_meta($post->ID, "_ct_sqft", true)) {
							    	if($ct_use_propinfo_icons != 'icons') {
								        echo '<li class="row sqft">';
								            echo '<span class="muted left">';
								    			if($ct_options['ct_sq'] == "sqft") {
													echo esc_html(' Sq Ft', 'contempo');
												} else if($ct_options['ct_sq'] == "sqmeters") {
													echo esc_html(' m²', 'contempo');
												} else if($ct_options['ct_sq'] == "area") {
													echo esc_html('Area', 'contempo');
												}
								    		echo '</span>';
								    		echo '<span class="right">';
								                $value = get_post_meta($post->ID, "_ct_sqft", true);
												if($value != '') {
													echo number_format($value, 0);
												}
								            echo '</span>';
								        echo '</li>';
								    } else {
								    	echo '<li class="row sqft">';
								            echo '<span class="muted left">';
												ct_listing_size_icon();
								    		echo '</span>';
								    		echo '<span class="right">';
								                echo get_post_meta($post->ID, "_ct_sqft", true);
								                echo ' ';
								                if($ct_options['ct_sq'] == "sqft") {
													echo esc_html(' Sq Ft', 'contempo');
												} else if($ct_options['ct_sq'] == "sqmeters") {
													echo esc_html(' m²', 'contempo');
												} else if($ct_options['ct_sq'] == "area") {
													echo esc_html('Area', 'contempo');
												}
								            echo '</span>';
								        echo '</li>';
								    }
							    }
							    
							    if(get_post_meta($post->ID, "_ct_lotsize", true)) {
							        if(get_post_meta($post->ID, "_ct_sqft", true)) {
							            echo '<li class="row lotsize">';
							        }
							            echo '<span class="muted left">';
							    			if($ct_use_propinfo_icons != 'icons') {
								    			_e('Lot Size', 'contempo');
								    		} else {
								    			echo '<i class="fa fa-arrows-alt"></i>';
								    		}
							    		echo '</span>';
							    		echo '<span class="right">';
							                echo get_post_meta($post->ID, "_ct_lotsize", true) . ' ';
							                
							                if($ct_options['ct_acres'] == "acres") {
												echo esc_html_e('Acres', 'contempo');
											} elseif($ct_options['ct_acres'] == "sqft") {
												echo esc_html_e('Sq Ft', 'contempo');
											} elseif($ct_options['ct_acres'] == "sqmeters") {
												echo esc_html_e('m²', 'contempo');
											} elseif($ct_options['ct_acres'] == "area") {
												echo esc_html_e('Area', 'contempo');
											}
							            echo '</span>';
							            
							        if((get_post_meta($post->ID, "_ct_sqft", true))) {
							            echo '</li>';
							        }
							    } ?>
		                    </ul>

		                    <?php do_action('after_elementor_listing_grid_propinfo'); ?>

		                </div>

		                <?php ct_listing_creation_date(); ?>

		            </div>
			
		        </li>

	        <?php 

	        $count++;
			
			if($count % 3 == 0) {
				echo '<div class="clear"></div>';
			}
			
			endwhile; endif;

			wp_reset_query();
			wp_reset_postdata();
			
		echo '</ul>';
	
		    echo '<div class="clear"></div>';

	}

}
