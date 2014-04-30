<?php
/**
* Plugin Name: WP Basic Elements
* Plugin URI: http://www.wknet.com/wp-basic-elements/
* Description: Disable unnecessary features and speed up your site. Make the WP Admin simple and clean. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DYLYJ242GX64J&lc=SE&item_name=WP%20Basic%20Elements&item_number=Support%20Open%20Source&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank">Donate</a>
* Version: 2.1.1
* Author: Damir Calusic
* Author URI: http://www.damircalusic.com/
* License: GPLv2
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
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
remove_action('wp_head', 'index_rel_link'); 							// Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); 				// Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); 				// Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); 			// Display relational links for the posts adjacent to the current post.
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
	register_setting('wpb-settings-group', 'wprss');
	register_setting('wpb-settings-group', 'rsd');
	register_setting('wpb-settings-group', 'wlw');
	register_setting('wpb-settings-group', 'gen');
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
    <form method="post" action="options.php" style="width:98%;">
        <?php settings_fields('wpb-settings-group'); ?>
        <?php do_settings_sections('baw-settings-group'); ?>
        <div id="welcome-panel" class="welcome-panel">
            <label style="position:absolute;top:5px;right:10px;padding:20px 15px 0 3px;font-size:13px;text-decoration:none;line-height:1;">Version 2.1.1</label>
            <div class="welcome-panel-content">
                <h1><?php _e('WP Basic Elements','wpbe'); ?></h1>
                <p class="about-description"><?php _e('Disable unnecessary features and speed up your site. Make the WP Admin simple and clean. With WP Basic Elements you can disable unnecessary features and speed up your site. Make the WP Admin simple and clean. You can activate gzip compression, change admin footers in backend, activate shortcodes in widgets, remove admin toolbar options, remove wp-generator meta tag, remove other meta tags that are not necessary etc.','wpbe'); ?></p>
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h4><?php _e('Get Started','wpbe'); ?></h4>
                        <p>Follow me on Twitter to keep up with the latest updates.</p>
                        <p>Donate to support open source.</p>
                        <a class="button button-secondary button-hero load-customize" href="https://twitter.com/damircalusic/" target="_blank">
                           <?php _e('TWITTER','wpbe'); ?>
                        </a>
                        <a class="button button-secondary button-hero load-customize hide-if-no-customize" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DYLYJ242GX64J&lc=SE&item_name=WP%20Basic%20Elements&item_number=Support%20Open%20Source&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank">
                           <?php _e('DONATE','wpbe'); ?>
                        </a>
                        <h4><?php _e('WP Optimisation','wpbe'); ?></h4>
                        <ul>
                            <li>
                                 <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove Post, Comment and Category feeds','wpbe'); ?>
                                    <input type="checkbox" name="wprss" value="1" <?php echo checked(1, get_option('wprss'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                 <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove EditURI link','wpbe'); ?>
                                    <input type="checkbox" name="rsd" value="1" <?php echo checked(1, get_option('rsd'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                 <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove Windows Live Writer manifest file','wpbe'); ?>
                                    <input type="checkbox" name="wlw" value="1" <?php echo checked(1, get_option('wlw'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                 <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove WordPress generator tag','wpbe'); ?>
                                    <input type="checkbox" name="gen" value="1" <?php echo checked(1, get_option('gen'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h4><?php _e('WP Admin Toolbar','wpbe'); ?></h4>
                        <ul>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove WP Logo','wpbe'); ?>
                                    <input type="checkbox" name="wplogo" value="1" <?php echo checked(1, get_option('wplogo'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove WP Updates','wpbe'); ?>
                                    <input type="checkbox" name="wpupdates" value="1" <?php echo checked(1, get_option('wpupdates'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove WP Comments','wpbe'); ?>
                                    <input type="checkbox" name="wpcomments" value="1" <?php echo checked(1, get_option('wpcomments'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove WP Search','wpbe'); ?>
                                    <input type="checkbox" name="wpsearch" value="1" <?php echo checked(1, get_option('wpsearch'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove W3 Total Cache','wpbe'); ?>
                                    <input type="checkbox" name="wp3tc" value="1" <?php echo checked(1, get_option('wp3tc'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Remove All in One Seo','wpbe'); ?>
                                    <input type="checkbox" name="a1s" value="1" <?php echo checked(1, get_option('a1s'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li> 
                        </ul>
                        <h4>WP Core</h4>
                        <ul>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Enable GZIP compression','wpbe'); ?>
                                    <input type="checkbox" name="gzip" value="1" <?php echo checked(1, get_option('gzip'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Enable Shortcode in widgets','wpbe'); ?>
                                    <input type="checkbox" name="shortcode" value="1" <?php echo checked(1, get_option('shortcode'), false); ?> style="float:right;margin-top:1px;" />
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h4>WP Admin Footer</h4>
                        <ul>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Text Left (HTML allowed)','wpbe'); ?>
                                </label>
                                <textarea type="text" name="footerleft" style="width:100%;height:100px;"><?php echo get_option('footerleft'); ?></textarea>
                            </li>
                            <li>
                                <label class="welcome-icon dashicons-minus">
                                    <?php _e('Text Right (HTML allowed)','wpbe'); ?>
                                </label>
                                <textarea type="text" name="footerright" style="width:100%;height:100px;"><?php echo get_option('footerright'); ?></textarea>
                            </li>
                        </ul>
                        <?php submit_button(); ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
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

// Remove Category, Post and Comment feeds
if(get_option('wprss') == '1'){ remove_action('wp_head', 'feed_links_extra', 3); remove_action('wp_head', 'feed_links', 2); }

// Remove the EditURI link (Really Simple Discovery service endpoint)
if(get_option('rsd') == '1'){ remove_action('wp_head', 'rsd_link'); }

// Remove Windows Live Writer manifest file
if(get_option('wlw') == '1'){ remove_action('wp_head', 'wlwmanifest_link'); }

// Remove WordPress generator tag
if(get_option('gen') == '1'){ remove_action('wp_head', 'wp_generator'); }

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