<?php
ob_start();
/**
 * Header Template
 *
 * @package WP Pro Real Estate 7
 * @subpackage Template
 */

// Load Theme Options
global $ct_options;

$ct_mode = isset( $ct_options['ct_mode'] ) ? esc_attr( $ct_options['ct_mode'] ) : '';
$ct_boxed = isset( $ct_options['ct_boxed'] ) ? esc_attr( $ct_options['ct_boxed'] ) : '';
$ct_top_bar = isset( $ct_options['ct_top_bar'] ) ? esc_attr( $ct_options['ct_top_bar'] ) : '';
$ct_trans_header = isset( $ct_options['ct_trans_header'] ) ? esc_html( $ct_options['ct_trans_header'] ) : '';
$header_layout = isset( $ct_options['ct_header_layout'] ) ? esc_html( $ct_options['ct_header_layout'] ) : '';
$ct_header_style = isset( $ct_options['ct_header_style'] ) ? esc_html( $ct_options['ct_header_style'] ) : '';
$ct_header_currency_switcher = isset( $ct_options['ct_header_currency_switcher'] ) ? esc_html( $ct_options['ct_header_currency_switcher'] ) : '';
$ct_logo = isset( $ct_options['ct_logo']['url'] ) ? esc_html( $ct_options['ct_logo']['url'] ) : '';
$ct_logo_highres = isset( $ct_options['ct_logo_highres']['url'] ) ? esc_html( $ct_options['ct_logo_highres']['url'] ) : '';
$ct_header_listing_search = isset( $ct_options['ct_header_listing_search'] ) ? esc_html( $ct_options['ct_header_listing_search'] ) : '';
$ct_header_info_one_title = isset( $ct_options['ct_header_info_one_title'] ) ? esc_html( $ct_options['ct_header_info_one_title'] ) : '';
$ct_header_info_one_text = isset( $ct_options['ct_header_info_one_text'] ) ? esc_html( $ct_options['ct_header_info_one_text'] ) : '';
$ct_header_info_one_icon = isset( $ct_options['ct_header_info_one_icon'] ) ? esc_html( $ct_options['ct_header_info_one_icon'] ) : '';
$ct_header_info_two_title = isset( $ct_options['ct_header_info_two_title'] ) ? esc_html( $ct_options['ct_header_info_two_title'] ) : '';
$ct_header_info_two_text = isset( $ct_options['ct_header_info_two_text'] ) ? esc_html( $ct_options['ct_header_info_two_text'] ) : '';
$ct_header_info_two_icon = isset( $ct_options['ct_header_info_two_icon'] ) ? esc_html( $ct_options['ct_header_info_two_icon'] ) : '';
$ct_header_info_three_title = isset( $ct_options['ct_header_info_three_title'] ) ? esc_html( $ct_options['ct_header_info_three_title'] ) : '';
$ct_header_info_three_text = isset( $ct_options['ct_header_info_three_text'] ) ? esc_html( $ct_options['ct_header_info_three_text'] ) : '';
$ct_header_info_three_icon = isset( $ct_options['ct_header_info_three_icon'] ) ? esc_html( $ct_options['ct_header_info_three_icon'] ) : '';
$ct_enable_front_end_login = isset( $ct_options['ct_enable_front_end_login'] ) ? esc_html( $ct_options['ct_enable_front_end_login'] ) : '';
$ct_enable_front_end_registration = isset( $ct_options['ct_enable_front_end_registration'] ) ? esc_html( $ct_options['ct_enable_front_end_registration'] ) : '';
$ct_listings_login_register_after_x_views = isset( $ct_options['ct_listings_login_register_after_x_views'] ) ? esc_html( $ct_options['ct_listings_login_register_after_x_views'] ) : '';

?>
<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gte IE 9)|!(IE)]><html <?php language_attributes(); ?>><![endif]-->
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<?php wp_head(); ?>

	<?php

	if( is_singular('listings') ) {
		global $post;

		$thumbnail_src = get_the_post_thumbnail_url( $post->ID, 'post-thumbnail' );
		$content_post = $post->post_content;
	?>

		<meta property="og:image" content="<?php echo $thumbnail_src ?>" />
		<meta property="og:description" content="<?php echo $content_post ?>" />

	<?php } ?>

	<?php if($ct_listings_login_register_after_x_views == 'yes' && !is_user_logged_in()) {
		ct_display_login_register_after_x_views();
	} ?>

	<? $current_page = explode( $_SERVER['HTTP_HOST'], home_url($wp->request) )[1] ?>

	<script>
		jQuery(document).ready(function() {
			var current_page = "<? echo $current_page ?>";
			var is_home = <? echo is_front_page() ? "true": "false" ?>;

			if ( (current_page == "" && !is_home) || current_page.indexOf("/page/") != -1 ) {
				jQuery('#ct-menu').find('a:contains("Propiedades")').parent().addClass("current-menu-item");
			}
		});
	</script>
    
</head>

<body<?php ct_body_id('top'); ?> <?php body_class('cbp-spmenu-push'); ?>>

<?php do_action('after_body'); ?>

<?php
if($ct_boxed == "boxed") {
echo '<div class="container main">';
} ?>

	<?php do_action('before_wrapper'); ?>
    
    <!-- Wrapper -->
    <div id="wrapper" <?php if($ct_boxed == "boxed") { echo 'class="boxed"'; } ?> <?php if($ct_mode == "single-listing") { echo 'class ="single-listing-layout"'; } ?>>
    
        <div id="masthead-anchor"></div>

        <!-- Login/Register Modal -->
        <?php if($ct_enable_front_end_login != 'no') {
        	get_template_part('includes/login-register-modal');
        } ?>
        <!-- //Login/Register Modal -->

        <?php do_action('before_top_bar'); ?>
        
        <?php if($ct_top_bar == 'yes') { ?>
	        <!-- Top Bar -->
	        <div id="topbar-wrap" class="muted">
	            <div class="container">

		            <?php
		            $ct_contact_phone_header_display_icon = isset( $ct_options['ct_contact_phone_header_display_icon'] ) ? $ct_options['ct_contact_phone_header_display_icon'] : '';
		            $ct_contact_phone_header_icon = isset( $ct_options['ct_contact_phone_header_icon'] ) ? $ct_options['ct_contact_phone_header_icon'] : '';
					$phone = isset( $ct_options['ct_contact_phone_header'] ) ? $ct_options['ct_contact_phone_header'] : '';

					$ct_contact_email_header_display_icon = isset( $ct_options['ct_contact_email_header_display_icon'] ) ? $ct_options['ct_contact_email_header_display_icon'] : '';
		            $ct_contact_email_header_icon = isset( $ct_options['ct_contact_email_header_icon'] ) ? $ct_options['ct_contact_email_header_icon'] : '';
					$email = isset( $ct_options['ct_contact_email_header'] ) ? $ct_options['ct_contact_email_header'] : '';

		            if($ct_options['ct_header_social'] == "yes") {
		            	$ct_social_new_tab = isset( $ct_options['ct_social_new_tab'] ) ? esc_html( $ct_options['ct_social_new_tab'] ) : '';
						$facebook = isset( $ct_options['ct_fb_url'] ) ? esc_url( $ct_options['ct_fb_url'] ) : '';    
						$twitter = isset( $ct_options['ct_twitter_url'] ) ? esc_url( $ct_options['ct_twitter_url'] ) : '';  
						$googleplus = isset( $ct_options['ct_googleplus_url'] ) ? esc_url( $ct_options['ct_googleplus_url'] ) : '';
						$youtube = isset( $ct_options['ct_youtube_url'] ) ? esc_url( $ct_options['ct_youtube_url'] ) : '';  
						$linkedin = isset( $ct_options['ct_linkedin_url'] ) ? esc_url( $ct_options['ct_linkedin_url'] ) : '';
						$pinterest = isset( $ct_options['ct_pinterest_url'] ) ? esc_url( $ct_options['ct_pinterest_url'] ) : '';  
						$instagram = isset( $ct_options['ct_instagram_url'] ) ? esc_url( $ct_options['ct_instagram_url'] ) : ''; 
						$vk = isset( $ct_options['ct_vk_url'] ) ? esc_url( $ct_options['ct_vk_url'] ) : '';  
						$contact = isset( $ct_options['ct_contact_url'] ) ? esc_url( $ct_options['ct_contact_url'] ) : '';   	
					} ?>
	                
	                <?php if($phone != '' || $ct_contact_phone_header_display_icon != '') { ?>
	                <div class="contact-phone left">
						<?php
							if($ct_contact_phone_header_display_icon == 'yes') {
								if(!empty($ct_contact_phone_header_icon)) {
									echo '<i class="fa ' . $ct_contact_phone_header_icon . '"></i>';
								} else {
									echo '<i class="fab fa-whatsapp"></i>'; # original: fa fa-mobile-phone
								}
							}?>
							<a href="https://wa.me/<? echo esc_html(preg_replace('/\D/',"",$phone)) ?>" target="_blank"><? echo stripslashes($phone) ?></a>
                    </div>
                    <?php } ?>

                    <?php if($email != '' || $ct_contact_email_header_display_icon != '') { ?>
	                <div class="contact-email left">
						<?php
							if($ct_contact_email_header_display_icon == 'yes') {
								if(!empty($ct_contact_email_header_icon)) {
									echo '<i class="fa ' . $ct_contact_email_header_icon . '"></i>';
								} else {
									echo '<i class="fa fa-envelope"></i>';
								}
							} ?>
							<a href="mailto:<? echo stripslashes($email) ?>"><? echo stripslashes($email) ?></a>
                    </div>
                    <?php } ?>

                    <?php if($ct_header_currency_switcher == 'yes') { ?>
                    <div id="ct-currency-switch-wrap" class="col span_2">
	                    <div id="ct-currency-switch"></div>
                    </div>
                    <?php } ?>
	                
	                <div class="top-links right">
	                    <?php if($ct_options['ct_header_social'] == "yes") { ?>
	                    <ul class="social left">
							 <?php if($facebook != '') { ?>
		                        <li class="facebook"><a href="<?php echo esc_url($facebook); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-facebook-f"></i></a></li>
		                    <?php } ?>
		                    <?php if($twitter != '') { ?>
		                        <li class="twitter"><a href="<?php echo esc_url($twitter); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-twitter"></i></a></li>
		                    <?php } ?>
		                    <?php if($linkedin != '') { ?>
		                        <li class="linkedin"><a href="<?php echo esc_url($linkedin); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-linkedin-in"></i></a></li>
		                    <?php } ?>
		                    <?php if($googleplus != '') { ?>
		                        <li class="google"><a href="<?php echo esc_url($googleplus); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-google-plus"></i></a></li>
		                    <?php } ?>
		                    <?php if($youtube != '') { ?>
		                        <li class="youtube"><a href="<?php echo esc_url($youtube); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-youtube-square"></i></a></li>
		                    <?php } ?>
		                    <?php if($pinterest != '') { ?>
		                        <li class="pinterest"><a href="<?php echo esc_url($pinterest); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-pinterest"></i></a></li>
		                    <?php } ?>
		                    <?php if($instagram != '') { ?>
		                        <li class="instagram"><a href="<?php echo esc_url($instagram); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-instagram"></i></a></li>
		                    <?php } ?>
		                    <?php if($vk != '') { ?>
		                        <li class="vk"><a href="<?php echo esc_url($vk); ?>" <?php if($ct_social_new_tab == 'yes') { echo 'target="_blank"'; } ?>><i class="fab fa-vk"></i></a></li>
		                    <?php } ?>
		                    <?php if($contact != '') { ?>
		                        <li class="contact"><a href="<?php echo esc_url($contact); ?>"><i class="fa fa-envelope"></i></a></li>
		                    <?php } ?>
	                    </ul>
	                    <?php } ?>
	                    <?php
	                        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	                        if(is_plugin_active('sitepress-multilingual-cms/sitepress.php')) {
	                            echo '<div class="wpml-lang left">';
	                                do_action('icl_language_selector');
	                            echo '</div>';
	                        }
	                    ?>
	                    <?php if($ct_header_style != 'three' && $ct_enable_front_end_login != 'no' && $ct_options['ct_mode'] != 'single-listing') { ?>
		                    <ul class="user-frontend left">
			                    <?php if(is_user_logged_in()) {
					                    $current_user = wp_get_current_user();

					                    $ct_saved_listings = isset( $ct_options['ct_saved_listings'] ) ? esc_html( $ct_options['ct_saved_listings'] ) : '';
					                    $ct_listing_email_alerts_page_id = isset( $ct_options['ct_listing_email_alerts_page_id'] ) ? esc_attr( $ct_options['ct_listing_email_alerts_page_id'] ) : '';
					                    $ct_submit_listing = isset( $ct_options['ct_submit'] ) ? esc_html( $ct_options['ct_submit'] ) : '';
					                    $ct_view_listings = isset( $ct_options['ct_view'] ) ? esc_html( $ct_options['ct_view'] ) : '';
					                    $ct_membership = isset( $ct_options['ct_membership'] ) ? esc_html( $ct_options['ct_membership'] ) : '';
					                    $ct_invoices = isset( $ct_options['ct_invoices'] ) ? esc_html( $ct_options['ct_invoices'] ) : '';
					                    $ct_user_profile = isset( $ct_options['ct_profile'] ) ? esc_html( $ct_options['ct_profile'] ) : '';
				                    ?>
			                    	<li class="user-logged-in">
			                    		<a href="#">
				                    		<span class="user-name"><?php esc_html_e('Hi, ','contempo'); ?><?php echo esc_html($current_user->user_firstname); ?></span>
				                    		<figure>
				                    		<?php if($current_user->ct_profile_url) { ?>
							                    <img class="author-img" src="<?php echo esc_html($current_user->ct_profile_url); ?>" rel="<?php echo esc_html($current_user->user_firstname); ?>" />
									        <?php } else { ?>
												<img class="author-img" src="<?php echo get_template_directory_uri(); ?>/images/blank-user.png" />
									        <?php } ?>
							                </figure>
							                <?php
							                	$ct_user_listings = ct_listing_post_count($current_user->ID, 'listings');
							                	if($ct_user_listings >= 1 && $ct_options['ct_enable_front_end'] == 'yes') {
								                	echo '<span class="user-listing-count">' . $ct_user_listings . '</span>';
								                }
							                ?>
						                </a>
				                    	<ul class="user-drop">
					                    	<?php if($ct_saved_listings != '' && function_exists('wpfp_link')) { ?>
				                                <li class="saved-listings"><a href="<?php echo get_page_link($ct_saved_listings); ?>"><i class="fa fa-heart"></i> <?php esc_html_e('Favorite Listings', 'contempo'); ?></a></li>
				                            <?php } ?>
				                            <?php if($ct_listing_email_alerts_page_id != '' && function_exists('ctea_show_alert_creation')) { ?>
				                            <li class="listing-email-alerts"><a href="<?php echo get_page_link($ct_listing_email_alerts_page_id); ?>"><i class="fa fa-exclamation-circle"></i> <?php _e('Listing Alerts', 'contempo'); ?></a></li>
				                            <?php } ?>
				                            <?php if(in_array('administrator', (array) $current_user->roles) || in_array('editor', (array) $current_user->roles) || in_array('author', (array) $current_user->roles) || in_array('contributor', (array) $current_user->roles)) { ?>
					                            <?php if(!empty($ct_submit_listing) && $ct_options['ct_enable_front_end'] == 'yes') { ?>
								                    <li class="submit-listing"><a href="<?php echo get_page_link($ct_submit_listing); ?>"><i class="fa fa-plus"></i> <?php esc_html_e('Submit Listing', 'contempo'); ?></a></li>
							                    <?php } ?>
							                    <?php if(!empty($ct_view_listings) && $ct_options['ct_enable_front_end'] == 'yes') { ?>
								                    <li class="my-listings"><a href="<?php echo get_page_link($ct_view_listings); ?>"><i class="fa fa-th-list"></i> <?php esc_html_e('My Listings', 'contempo'); ?> (<?php echo esc_html($ct_user_listings); ?>)</a></li>
							                    <?php } ?>
							                    <?php if(!empty($ct_membership) && function_exists('ct_create_packages')) { ?>
								                    <li class="membership"><a href="<?php echo get_page_link($ct_membership); ?>"><i class="fa fa-id-badge"></i> <?php esc_html_e('Membership', 'contempo'); ?></a></li>
							                    <?php } ?>
							                    <?php if(!empty($ct_invoices) && function_exists('ct_create_packages')) { ?>
								                    <li class="invoices"><a href="<?php echo get_page_link($ct_invoices); ?>"><i class="fa fa-file-text-o"></i> <?php esc_html_e('Invoices', 'contempo'); ?></a></li>
							                    <?php } ?>
						                   <?php } ?>
						                    <?php if(!empty($ct_user_profile)) { ?>
							                    <li class="my-account"><a href="<?php echo get_page_link($ct_user_profile); ?>"><i class="fa fa-user"></i> <?php esc_html_e('Account Settings', 'contempo'); ?></a></li>
						                    <?php } ?>
						                    <li class="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'contempo'); ?></a></li>
					                    </ul>
				                    </li>
			                    <?php } else { ?>
			                    	<li class="login-register"><a href="#"><i class="fa fa-sign-in"></i> <?php if($ct_enable_front_end_registration != 'no') { esc_html_e('Login / Register', 'contempo'); } else { esc_html_e('Login', 'contempo'); } ?></a></li>
			                    <?php } ?>
		                    </ul>
	                    <?php } ?>
	                   
	                    
	                </div>
	                    <div class="clear"></div>
	                    
	            </div>
	        </div>
	        <!-- //Top Bar -->
	    <?php } ?>

	    <?php do_action('before_header'); ?>

        <?php
        if($ct_mode == "single-listing") { ?>

	        <!-- Single Listing Header -->
	        <header class="single-listing-header">   
		        <div class="container">  
		        <?php do_action('inner_header'); ?>
		        <!-- Logo -->
		            <div class="single-listing-logo"> 
		                <?php if($ct_options['ct_text_logo'] == "yes") { ?>
		                    
		                    <div id="logo" class="left">
		                        <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
		                    </div>
		                    
		                <?php } else { ?>
		                    <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
		                <?php } ?>
	                </div>
	                <!-- //Logo -->
	            </div>
            </header>
            <!-- //Single Listing Header -->

    	<?php } else { ?>

    		<?php if($ct_header_style == 'two') { ?>

	    		<!-- Header -->
		        <div id="header-wrap" class="<?php echo 'header-style-' . $ct_header_style; ?><?php if($ct_trans_header == 'yes') { echo ' trans-header'; } ?>">
		            <div class="container">
		                <header id="masthead" class="layout-<?php echo esc_html($header_layout); ?>">
		                	<?php do_action('inner_header'); ?>

		                	<div class="col span_12 first">
			                	 <!-- Logo -->
			                    <div class="logo-wrap col span_3 first">        
			                        <?php if($ct_options['ct_text_logo'] == "yes") { ?>
			                            
			                            <div id="logo" class="left">
			                                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			                            </div>
			                            
			                        <?php } else { ?>
			                            <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
			                        <?php } ?>
			                    </div>
			                    <!-- //Logo -->

			                    <?php if($ct_header_info_one_title != '' || $ct_header_info_one_text != '' || $ct_header_info_one_icon != '') { ?>
			                    <!-- Header Info -->
			                    <div class="col span_3 header-info">
			                    	<div class="col span_1 first">
					                    	<i class="fa <?php echo $ct_header_info_one_icon; ?>"></i>
			                    	</div>
			                    	<div class="col span_11">
				                    	<div class="header-info-inner">
					                    	<h5 class="marB0"><?php echo $ct_header_info_one_title; ?></h5>
					                    	<p class="muted marB0"><?php echo $ct_header_info_one_text; ?></p>
				                    	</div>
			                    	</div>
			                    </div>
			                    <!-- //Header Info -->
			                    <?php } ?>

			                    <?php if($ct_header_info_two_title != '' || $ct_header_info_two_text != '' || $ct_header_info_two_icon != '') { ?>
			                    <!-- Header Info -->
			                    <div class="col span_3 header-info">
			                    	<div class="col span_1 first">
					                    	<i class="fa <?php echo $ct_header_info_two_icon; ?>"></i>
			                    	</div>
			                    	<div class="col span_11">
				                    	<div class="header-info-inner">
					                    	<h5 class="marB0"><?php echo $ct_header_info_two_title; ?></h5>
					                    	<p class="muted marB0"><?php echo $ct_header_info_two_text; ?></p>
				                    	</div>
			                    	</div>
			                    </div>
			                    <!-- //Header Info -->
			                    <?php } ?>

			                    <?php if($ct_header_info_three_title != '' || $ct_header_info_three_text != '' || $ct_header_info_three_icon != '') { ?>
			                    <!-- Header Info -->
			                    <div class="col span_3 header-info">
			                    	<div class="col span_1 first">
					                    	<i class="fa <?php echo $ct_header_info_three_icon; ?>"></i>
			                    	</div>
			                    	<div class="col span_11">
				                    	<div class="header-info-inner">
					                    	<h5 class="marB0"><?php echo $ct_header_info_three_title; ?></h5>
					                    	<p class="muted marB0"><?php echo $ct_header_info_three_text; ?></p>
				                    	</div>
			                    	</div>
			                    </div>
			                    <!-- //Header Info -->
			                    <?php } ?>
		                    </div>

		                    
		                    	<div class="clear"></div>

	                	</header>
                	</div>
                	<!-- Nav -->
                    <div id="nav-full-width" class="col span_12 first">
	                    <div class="container">
							<?php ct_nav_full_width(); ?>
	                    </div>
                    </div>
                    <!-- //Nav -->

					<!-- Mobile Header -->
					<?php ct_mobile_header(); ?>
					<!-- //Mobile Header -->

						<div class="clear"></div>
                    
            	</div>
	            <!-- //Header -->

	        <?php } elseif($ct_header_style == 'three') { ?>

	        	<!-- Header -->
		        <div id="header-wrap" class="<?php echo 'header-style-' . $ct_header_style; ?><?php if($ct_trans_header == 'yes') { echo ' trans-header'; } ?> <?php if(!is_user_logged_in()) { echo 'not-logged-in'; } ?>">
		            <div class="container">
		                <header id="masthead" class="layout-<?php echo esc_html($header_layout); ?>">
		                	<?php do_action('inner_header'); ?>

		                	<div class="col span_12 first">
			                	 <!-- Logo -->
			                    <div class="logo-wrap col span_2 first">        
			                        <?php if($ct_options['ct_text_logo'] == "yes") { ?>
			                            
			                            <div id="logo" class="left">
			                                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			                            </div>
			                            
			                        <?php } else { ?>
			                            <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
			                        <?php } ?>
			                    </div>
			                    <!-- //Logo -->

			                    <!-- Nav -->
			                    <div class="col span_7">
				                    <div class="container">
										<?php ct_nav_left(); ?>
				                    </div>
			                    </div>
			                    <!-- //Nav -->

								<!-- Mobile Header -->
								<?php ct_mobile_header(); ?>
								<!-- //Mobile Header -->

								<div class="col span_3">
									<?php if($ct_enable_front_end_login != 'no' && $ct_options['ct_mode'] != 'single-listing') { ?>
					                    <ul class="user-frontend right <?php if(!is_user_logged_in()) { echo 'not-logged-in'; } ?>">
						                    <?php if(is_user_logged_in()) {
								                    $current_user = wp_get_current_user();

								                    $saved_listings = isset( $ct_options['ct_saved_listings'] ) ? esc_html( $ct_options['ct_saved_listings'] ) : '';
								                    $ct_listing_email_alerts_page_id = isset( $ct_options['ct_listing_email_alerts_page_id'] ) ? esc_attr( $ct_options['ct_listing_email_alerts_page_id'] ) : '';
								                    $submit_listing = isset( $ct_options['ct_submit'] ) ? esc_html( $ct_options['ct_submit'] ) : '';
								                    $user_listings = isset( $ct_options['ct_view'] ) ? esc_html( $ct_options['ct_view'] ) : '';
								                    $user_profile = isset( $ct_options['ct_profile'] ) ? esc_html( $ct_options['ct_profile'] ) : '';
							                    ?>
						                    	<li class="user-logged-in">
						                    		<a href="#">
							                    		<span class="user-name"><?php esc_html_e('Hi, ','contempo'); ?><?php echo esc_html($current_user->user_firstname); ?></span>
							                    		<figure>
							                    		<?php if($current_user->ct_profile_url) { ?>
										                    <img class="author-img" src="<?php echo esc_html($current_user->ct_profile_url); ?>" rel="<?php echo esc_html($current_user->user_firstname); ?>" />
												        <?php } else { ?>
															<img class="author-img" src="<?php echo get_template_directory_uri(); ?>/images/blank-user.png" />
												        <?php } ?>
										                </figure>
										                <?php
										                	$ct_user_listings = ct_listing_post_count($current_user->ID, 'listings');
										                	if($ct_user_listings >= 1 && $ct_options['ct_enable_front_end'] == 'yes') {
											                	echo '<span class="user-listing-count">' . $ct_user_listings . '</span>';
											                }
										                ?>
									                </a>
							                    	<ul class="user-drop">
								                    	<?php if($saved_listings != '' && function_exists('wpfp_link')) { ?>
							                                <li class="saved-listings"><a href="<?php echo get_page_link($saved_listings); ?>"><i class="fa fa-heart"></i> <?php esc_html_e('Favorite Listings', 'contempo'); ?></a></li>
							                            <?php } ?>
							                            <?php if($ct_listing_email_alerts_page_id != '' && function_exists('ctea_show_alert_creation')) { ?>
							                            <li class="listing-email-alerts"><a href="<?php echo get_page_link($ct_listing_email_alerts_page_id); ?>"><i class="fa fa-exclamation-circle"></i> <?php _e('Listing Alerts', 'contempo'); ?></a></li>
							                            <?php } ?>
							                            <?php if(!empty($submit_listing) && $ct_options['ct_enable_front_end'] == 'yes') { ?>
										                    <li class="submit-listing"><a href="<?php echo get_page_link($submit_listing); ?>"><i class="fa fa-plus"></i> <?php esc_html_e('Submit Listing', 'contempo'); ?></a></li>
									                    <?php } ?>
									                    <?php if(!empty($user_listings) && $ct_options['ct_enable_front_end'] == 'yes') { ?>
										                    <li class="my-listings"><a href="<?php echo get_page_link($user_listings); ?>"><i class="fa fa-th-list"></i> <?php esc_html_e('My Listings', 'contempo'); ?> (<?php echo esc_html($ct_user_listings); ?>)</a></li>
									                    <?php } ?>
									                    <?php if(!empty($user_profile)) { ?>
										                    <li class="my-account"><a href="<?php echo get_page_link($user_profile); ?>"><i class="fa fa-user"></i> <?php esc_html_e('Account Settings', 'contempo'); ?></a></li>
									                    <?php } ?>
									                    <li class="logout"><a href="<?php echo wp_logout_url( home_url() ); ?>"><i class="fa fa-sign-out"></i> <?php esc_html_e('Logout', 'contempo'); ?></a></li>
								                    </ul>
							                    </li>
						                    <?php } else { 

						                    		$submit_listing = isset( $ct_options['ct_submit'] ) ? esc_html( $ct_options['ct_submit'] ) : '';

						                    	?>
						                    	<li class="login-register"><a href="#"><?php if($ct_enable_front_end_registration != 'no') { esc_html_e('Login / Register', 'contempo'); } else { esc_html_e('Login', 'contempo'); } ?></a></li>
						                    	<?php if(!empty($submit_listing) && $ct_options['ct_enable_front_end'] == 'yes') { ?>
							                    	<li class="submit-listing"><a class="btn-outline" href="<?php echo get_page_link($submit_listing); ?>"><?php esc_html_e('Submit Listing', 'contempo'); ?></a></li>
						                    	<?php } ?>
						                    <?php } ?>
					                    </ul>
				                    <?php } ?>
								</div>
			                    
		                    </div>

		                    
		                    	<div class="clear"></div>

	                	</header>
                	</div>
                	

						<div class="clear"></div>
                    
            	</div>
	            <!-- //Header -->

    		<?php } else { ?>

		        <!-- Header -->
		        <div id="header-wrap" <?php if($ct_trans_header == 'yes') { echo 'class="trans-header"'; } ?>>
		            <div class="container">
		                <header id="masthead" class="layout-<?php echo esc_html($header_layout); ?>">
		                	<?php do_action('inner_header'); ?>
			                <?php

			                if($header_layout == "left") { ?>

				                <!-- Logo -->
			                    <div class="logo-wrap col span_3 first">        
			                        <?php if($ct_options['ct_text_logo'] == "yes") { ?>
			                            
			                            <div id="logo" class="left">
			                                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			                            </div>
			                            
			                        <?php } else { ?>
			                            <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
			                        <?php } ?>
			                    </div>
			                    <!-- //Logo -->

			                    <!-- Nav -->
			                    <div class="col span_9">
									<?php ct_nav_right(); ?>
			                    </div>
			                    <!-- //Nav -->		               

		                    <?php } elseif($header_layout == "center") { ?>

			                    <!-- Nav -->
			                    <div class="col span_5 first">
									<?php ct_nav_left(); ?>
			                    </div>
			                    <!-- //Nav -->

		                    	<!-- Logo -->
			                    <div class="logo-wrap col span_2">        
			                        <?php if($ct_options['ct_text_logo'] == "yes") { ?>
			                            
			                            <div id="logo" class="left">
			                                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			                            </div>
			                            
			                        <?php } else { ?>
			                            <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
			                        <?php } ?>
			                    </div>
			                    <!-- //Logo -->
			                    
			                    <!-- Nav -->
			                    <div class="col span_5">
									<?php ct_nav_right(); ?>
			                    </div>
			                    <!-- //Nav -->

		                    <?php } elseif($header_layout == "right") { ?>

			                     <!-- Nav -->
			                    <div class="col span_9 first">
									<?php ct_nav_left(); ?>
			                    </div>
			                    <!-- //Nav -->

			                	<!-- Logo -->
			                    <div class="logo-wrap col span_3">        
			                        <?php if($ct_options['ct_text_logo'] == "yes") { ?>
			                            
			                            <div id="logo" class="right">
			                                <h2><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h2>
			                            </div>
			                            
			                        <?php } else { ?>
			                            <a href="<?php echo home_url() ?>"><img class="logo left" src="<?php echo get_stylesheet_directory_uri() ?>/img/header-logo.svg" alt=""></a>
			                        <?php } ?>
			                    </div>
			                    <!-- //Logo -->

		                    <?php } elseif($header_layout == "none") { ?>
		                    	
		                    	<?php // No header ?>

		                    <?php } ?>

	                    <!-- Mobile Header -->
	                    <?php ct_mobile_header(); ?>
	                    <!-- //Mobile Header -->
	                    
	                        <div class="clear"></div>

	                </header>
	            </div>
	        </div>
	        <!-- //Header -->

	    <?php } ?>

	    <?php
	    if(!class_exists('Redux')) { ?>
	    	<script>
			jQuery(window).load(function() {
				jQuery("div.ct-menu ul").addClass("ct-menu");
			});
	    	</script>
		    <!-- Header -->
	        <div id="header-wrap" class="<?php echo 'header-style-' . $ct_header_style; ?><?php if($ct_trans_header == 'yes') { echo ' trans-header'; } ?>">
				<div class="container">
		        	<header id="masthead" class="layout-<?php echo esc_html($header_layout); ?>">
	                	<?php do_action('inner_header'); ?>

			                <!-- Logo -->
		                    <div class="logo-wrap col span_3 first">        
		                        <a href="<?php echo home_url(); ?>"><img class="logo left" src="<?php echo get_template_directory_uri(); ?>/images/re7-logo.png" srcset="<?php echo get_template_directory_uri(); ?>/images/re7-logo@2x.png 2x" alt="WP Pro Real Estate 7, a WordPress theme by Contempo" /></a>
		                    </div>
		                    <!-- //Logo -->

		                    <!-- Nav -->
		                    <div class="col span_9">
								<?php wp_page_menu( array( 'menu_class' => 'ct-menu' ) ); ?>
		                    </div>
		                    <!-- //Nav -->	

			            <div class="clear"></div>
		            </header>
                </div>
        	</div>
            <!-- //Header -->
		<?php } ?>

        <?php if($ct_header_listing_search == 'yes') { ?>
        
        	<?php get_template_part('/includes/header-advanced-search'); ?>
        
        <?php } ?>

        	<div class="clear"></div>

        <?php if(class_exists('Redq_Alike')) { ?>
        <!-- Compare -->
        <div id="compare-panel">
	        <div id="compare-list">
	        <button id="compare-panel-btn"><i class="fa fa-chevron-left"></i></button>
	            <?php if (is_active_sidebar('compare')) {
	                dynamic_sidebar('Compare');
	            } else {
	            	echo '<p class="nomatches">' . __('Add "CT Compare" Widget via Appearance > Widgets > Compare.', 'contempo') . '</p>';
	            } ?>
	        </div>
        </div>
        <!-- //Compare -->
        <?php } ?>

        <?php do_action('before_main_content'); ?>

        <?php } ?>
        <!-- Main Content -->
        <section id="main-content" <?php if($ct_trans_header == 'yes') { echo 'class="trans-header"'; } ?>>