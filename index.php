<?php
/**
* Plugin Name: WP Basic Elements
* Plugin URI: http://www.wknet.com/wp-basic-elements/
* Description: Activate gzip compression, change admin footers in backend, activate shortcodes in widgets, remove admin toolbar options, remove wp-generator meta tag, remove other meta tags that are not necessary etc...
* Version: 1.0
* Author: Damir Calusic
* Author URI: http://www.damircalusic.com/
* License: GPLv2
*/ 

/*  Copyright 2014  Damir Calusic (email : damir@damircalusic.com)
	
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License, version 2, as 
	published by the Free Software Foundation.
	
	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.
	
	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/* 

// REMOVE ACTIONS
remove_action('wp_head', 'feed_links_extra', 3); 						// The links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); 								// The links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); 									// The Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); 							// The Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); 							// Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); 				// Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); 				// Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); 			// Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); 								// Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'start_post_rel_link', 10, 0);					//
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);		//
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);				// The short WordPress link
*/

load_plugin_textdomain('wpbe', false, basename( dirname( __FILE__ ) ) . '/languages' );

add_action('admin_menu', 'wpb_elements');

function wpb_elements() {
	add_menu_page('WPB Elements', 'WPB Elements', 'administrator', __FILE__, 'wpb_settings_page', 'dashicons-awards', 3);
	add_action('admin_init', 'register_wpb_settings');
}

function register_wpb_settings() {
	register_setting('wpb-settings-group', 'gzip');
	register_setting('wpb-settings-group', 'shortcode');
	register_setting('wpb-settings-group', 'wplogo');
	register_setting('wpb-settings-group', 'wpupdates');
	register_setting('wpb-settings-group', 'wpsearch');
	register_setting('wpb-settings-group', 'wpcomments');
	register_setting('wpb-settings-group', 'wp3tc');
	register_setting('wpb-settings-group', 'a1s');
	register_setting('wpb-settings-group', 'footerleft');
	register_setting('wpb-settings-group', 'footerright');
}

function wpb_settings_page() {
?>
    <div class="wrap">
        <h1><?php _e('WP Basic Elements','wpbe'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('wpb-settings-group'); ?>
            <?php do_settings_sections('baw-settings-group'); ?>
            
			<div style="width:25%;margin-right:5%;float:left;">
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
								<?php _e('Enable GZIP compression','wpbe'); ?>
                                <input type="checkbox" name="gzip" value="1" <?php echo checked(1, get_option('gzip'), false); ?> style="float:right;margin-top:3px;" />
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Enable Shortcode in widgets','wpbe'); ?>
                    			<input type="checkbox" name="shortcode" value="1" <?php echo checked(1, get_option('shortcode'), false); ?> style="float:right;margin-top:3px;" /> 	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Admin footer text left','wpbe'); ?>
                      		</h3>
                            <textarea type="text" name="footerleft" style="width:100%;height:100px;"><?php echo get_option('footerleft'); ?></textarea>	
                        </div>
					</div>
                </div>
                 <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Admin footer text right','wpbe'); ?>
                      		</h3>
                            <textarea type="text" name="footerright" style="width:100%;height:100px;"><?php echo get_option('footerright'); ?></textarea>	
                        </div>
					</div>
                </div>
            </div>
            <div style="width:25%;margin-right:5%;float:left;">
            	<div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove WP Logo in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="wplogo" value="1" <?php echo checked(1, get_option('wplogo'), false); ?> style="float:right;margin-top:3px;" /> 	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove WP Updates in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="wpupdates" value="1" <?php echo checked(1, get_option('wpupdates'), false); ?> style="float:right;margin-top:3px;" />	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove WP Search in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="wpsearch" value="1" <?php echo checked(1, get_option('wpsearch'), false); ?> style="float:right;margin-top:3px;" />	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove WP Comments in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="wpcomments" value="1" <?php echo checked(1, get_option('wpcomments'), false); ?> style="float:right;margin-top:3px;" />	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove W3 Total Cache in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="wp3tc" value="1" <?php echo checked(1, get_option('wp3tc'), false); ?> style="float:right;margin-top:3px;" />	
                            </h3>	
                        </div>
					</div>
                </div>
                <div class="postbox">
                    <div class="inside">
                    	<div class="main">
							<h3 style="cursor:default;margin:0;">
                            	<?php _e('Remove All in One Seo in toolbar','wpbe'); ?>
                    			<input type="checkbox" name="a1s" value="1" <?php echo checked(1, get_option('a1s'), false); ?> style="float:right;margin-top:3px;" />	
                            </h3>	
                        </div>
					</div>
                </div>
            </div>
            <div style="clear:both;">
            	<?php submit_button(); ?>
            </div>
        </form>
    </div>
<?php 
}  

function gzip(){ 
    ob_start('ob_gzhandler');
}

function remove_wplogo() {   
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('wp-logo'); 
}

function remove_wpupdates() {
    global $wp_admin_bar;
	$wp_admin_bar->remove_menu('updates'); 
}

function remove_wpsearch() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('search'); 
}

function remove_wpcomments() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments'); 
}

function remove_wp3tc() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('w3tc'); 
}

function remove_a1s() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('all-in-one-seo-pack'); 
}

function admin_footer_left() { 
     echo get_option('footerleft'); 
}

function admin_footer_right() { 
     return get_option('footerright'); 
}

// Initiate GZIP on WordPress site
if(get_option('gzip') == '1'){ add_action('init', 'gzip'); } 

// Add Shortcode ability to widgets
if(get_option('shortcode') == '1'){ add_filter('widget_text', 'do_shortcode'); } 

// Remove WP Logo in toolbar
if(get_option('wplogo') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wplogo'); } 

// Remove WP Updates in toolbar
if(get_option('wpupdates') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wpupdates'); } 

// Remove WP Search in toolbar
if(get_option('wpsearch') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wpsearch'); } 

// Remove WP Comments in toolbar
if(get_option('wpcomments') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wpcomments'); } 

// Remove W3 Total Cache in toolbar
if(get_option('wp3tc') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wp3tc'); } 

// Remove All in One Seo Pack in toolbar
if(get_option('a1s') == '1'){ add_action('wp_before_admin_bar_render', 'remove_a1s'); }

// Add custom text the admin footer left
if(get_option('footerleft') != ''){ add_filter('admin_footer_text', 'admin_footer_left'); } 

// Add custom text the admin footer right
if(get_option('footerright') != ''){ add_filter('update_footer', 'admin_footer_right', '1234'); }