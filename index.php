<?php
/**
* Plugin Name: WP Basic Elements
* Plugin URI: http://www.wknet.se/wp-basic-elements/
* Description: Disable unnecessary features and speed up your site. Make the WP Admin simple and clean. <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DYLYJ242GX64J&lc=SE&item_name=WP%20Basic%20Elements&item_number=Support%20Open%20Source&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank">Donate</a>
* Version: 2.1.7
* Author: Damir Calusic
* Author URI: http://www.damircalusic.com/
* License: GPLv2
* License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/ 

/*  Copyright (C) 2014  Damir Calusic (email : damir@damircalusic.com)
	
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

define('WBE_VERSION', '2.1.7');

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
	register_setting('wpb-settings-group', 'irelink');
	register_setting('wpb-settings-group', 'prevlink');
	register_setting('wpb-settings-group', 'startlink');
	register_setting('wpb-settings-group', 'adjlinks');
	register_setting('wpb-settings-group', 'shortlink');
	register_setting('wpb-settings-group', 'pings');
	register_setting('wpb-settings-group', 'canonical');
	register_setting('wpb-settings-group', 'shortcode');
	register_setting('wpb-settings-group', 'wplogo');
	register_setting('wpb-settings-group', 'wpupdates');
	register_setting('wpb-settings-group', 'wpsearch');
	register_setting('wpb-settings-group', 'wpcomments');
	register_setting('wpb-settings-group', 'wp3tc');
	register_setting('wpb-settings-group', 'a1s');
	register_setting('wpb-settings-group', 'yseo');
	register_setting('wpb-settings-group', 'wpzoom');
	register_setting('wpb-settings-group', 'colorsch');
	register_setting('wpb-settings-group', 'haim');
	register_setting('wpb-settings-group', 'hyim');
	register_setting('wpb-settings-group', 'hjabber');
	register_setting('wpb-settings-group', 'hgplus');
	register_setting('wpb-settings-group', 'footerleft');
	register_setting('wpb-settings-group', 'footerright');
}

function wpb_settings_page() {
?>
    <form method="post" action="options.php" style="width:98%;">
        <?php settings_fields('wpb-settings-group'); ?>
        <?php do_settings_sections('baw-settings-group'); ?>
        <div id="welcome-panel" class="welcome-panel">
            <label style="position:absolute;top:5px;right:10px;padding:20px 15px 0 3px;font-size:13px;text-decoration:none;line-height:1;">
            	<?php _e('Version','wpbe'); ?> <?php echo WBE_VERSION; ?>
            </label>
            <div class="welcome-panel-content">
                <h1><?php _e('WP Basic Elements','wpbe'); ?></h1>
                <p class="about-description"><?php _e('With WP Basic Elements you can disable unnecessary features and speed up your site. Make the WP Admin simple and clean. You can activate gzip compression, change admin footers in backend, activate shortcodes in widgets, remove admin toolbar options and you can clean the code markup from unnecessary code snippets like WordPress generator meta tag and a bunch of other non important code snippets in the code. Cleaning the code markup will speed up your sites loadtime and increase the overall performance.','wpbe'); ?></p>
                <div class="welcome-panel-column-container">
                    <div class="welcome-panel-column">
                        <h4><?php _e('Get Started','wpbe'); ?></h4>
                        <p><?php _e('Follow me on Twitter to keep up with the latest updates.','wpbe'); ?></p>
                        <p><?php _e('Donate to support open source.','wpbe'); ?></p>
                        <a class="button button-secondary button-hero load-customize" href="https://twitter.com/damircalusic/" target="_blank">
                           <?php _e('TWITTER','wpbe'); ?>
                        </a>
                        <a class="button button-secondary button-hero load-customize hide-if-no-customize" href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=DYLYJ242GX64J&lc=SE&item_name=WP%20Basic%20Elements&item_number=Support%20Open%20Source&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted" target="_blank">
                           <?php _e('DONATE','wpbe'); ?>
                        </a>
                        <h4><?php _e('WP Optimisation','wpbe'); ?></h4>
                        <ul>
                            <li>
                                <label>
                                    <input type="checkbox" name="wprss" value="1" <?php echo checked(1, get_option('wprss'), false); ?> />
									<?php _e('Remove Post, Comment and Category feeds','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="rsd" value="1" <?php echo checked(1, get_option('rsd'), false); ?> />
									<?php _e('Remove EditURI link','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wlw" value="1" <?php echo checked(1, get_option('wlw'), false); ?> />
									<?php _e('Remove Windows Live Writer Manifest File','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="gen" value="1" <?php echo checked(1, get_option('gen'), false); ?> />
                                    <?php _e('Remove WordPress Generator Meta Tag','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="irelink" value="1" <?php echo checked(1, get_option('irelink'), false); ?> />
                                    <?php _e('Remove Index link','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="prevlink" value="1" <?php echo checked(1, get_option('prevlink'), false); ?> />
                                    <?php _e('Remove Prev link','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="startlink" value="1" <?php echo checked(1, get_option('startlink'), false); ?> />
                                    <?php _e('Remove Start link','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="adjlinks" value="1" <?php echo checked(1, get_option('adjlinks'), false); ?> />
                                    <?php _e('Remove Relational links for the Posts','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="shortlink" value="1" <?php echo checked(1, get_option('shortlink'), false); ?> />
                                    <?php _e('Remove WordPress Shortlink','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="pings" value="1" <?php echo checked(1, get_option('pings'), false); ?> />
                                    <?php _e('Remove WordPress Pingbacks','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                            	<label>
                              		<input type="checkbox" name="canonical" value="1" <?php echo checked(1, get_option('canonical'), false); ?> />
                                    <?php _e('Remove Canonical link','wpbe'); ?>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column">
                        <h4><?php _e('WP Admin Toolbar','wpbe'); ?></h4>
                        <ul>
                            <li>
                            	<label>
                                    <input type="checkbox" name="wplogo" value="1" <?php echo checked(1, get_option('wplogo'), false); ?> />
									<?php _e('Remove WP Logo','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpupdates" value="1" <?php echo checked(1, get_option('wpupdates'), false); ?> />
									<?php _e('Remove WP Updates','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                	<input type="checkbox" name="wpcomments" value="1" <?php echo checked(1, get_option('wpcomments'), false); ?> />
                                    <?php _e('Remove WP Comments','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="wpsearch" value="1" <?php echo checked(1, get_option('wpsearch'), false); ?> />
									<?php _e('Remove WP Search','wpbe'); ?>
                                </label>
                            </li>
               			</ul>
                        <p><strong><?php _e('Plugins','wpbe'); ?></strong></p>
                        <ul>    
                            <li>
                                <label>
                                	<input type="checkbox" name="wp3tc" value="1" <?php echo checked(1, get_option('wp3tc'), false); ?> />
                                    <?php _e('Remove W3 Total Cache','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                	<input type="checkbox" name="a1s" value="1" <?php echo checked(1, get_option('a1s'), false); ?> />
                                    <?php _e('Remove All in One Seo','wpbe'); ?>
                                </label>
                            </li> 
                            <li>
                                <label>
                                	<input type="checkbox" name="yseo" value="1" <?php echo checked(1, get_option('yseo'), false); ?> />
                                    <?php _e('Remove Yoast SEO','wpbe'); ?>
                                </label>
                            </li> 
                            <li>
                                <label>
                                	<input type="checkbox" name="wpzoom" value="1" <?php echo checked(1, get_option('wpzoom'), false); ?> />
                                    <?php _e('Remove WP Zoom Framework','wpbe'); ?>
                                </label>
                            </li> 
                        </ul>
                         <h4><?php _e('WP Users','wpbe'); ?></h4>
                        <ul>
                        	<li>
                                <label>
                                    <input type="checkbox" name="colorsch" value="1" <?php echo checked(1, get_option('colorsch'), false); ?> />
									<?php _e('Disable Color Scheme selector for users','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="haim" value="1" <?php echo checked(1, get_option('haim'), false); ?> />
									<?php _e('Disable AIM field from users contact field','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="hjabber" value="1" <?php echo checked(1, get_option('hjabber'), false); ?> />
									<?php _e('Disable Jabber field from users contact field','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="hyim" value="1" <?php echo checked(1, get_option('hyim'), false); ?> />
									<?php _e('Disable Yahoo IM field from users contact field','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="hgplus" value="1" <?php echo checked(1, get_option('hgplus'), false); ?> />
									<?php _e('Disable Google Plus field from users contact field','wpbe'); ?>
                                </label>
                            </li>
                        </ul>
                        <h4><?php _e('WP Core','wpbe'); ?></h4>
                        <ul>
                            <li>
                                <label>
                                    <input type="checkbox" name="gzip" value="1" <?php echo checked(1, get_option('gzip'), false); ?> />
									<?php _e('Enable GZIP compression','wpbe'); ?>
                                </label>
                            </li>
                            <li>
                                <label>
                                    <input type="checkbox" name="shortcode" value="1" <?php echo checked(1, get_option('shortcode'), false); ?> />
									<?php _e('Enable Shortcode in widgets','wpbe'); ?>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <div class="welcome-panel-column welcome-panel-last">
                        <h4><?php _e('WP Admin Footer','wpbe'); ?></h4>
                        <ul>
                            <li>
                                <label style="display:block;margin-bottom:5px;">
                                    <?php _e('Text Left (HTML allowed)','wpbe'); ?>
                                </label>
                                <textarea type="text" name="footerleft" style="width:100%;height:100px;"><?php echo get_option('footerleft'); ?></textarea>
                            </li>
                            <li>
                                <label style="display:block;margin-bottom:5px;">
                                    <?php _e('Text Right (HTML allowed)','wpbe'); ?>
                                </label>
                                <textarea type="text" name="footerright" style="width:100%;height:100px;"><?php echo get_option('footerright'); ?></textarea>
                            </li>
                        </ul>
                        <?php //submit_button(); ?>
                        <p class="submit">
                        	<input type="submit" name="submit" id="submit" class="button button-primary" value="<?php _e('Save Changes','wpbe'); ?>">
                            <a href="http://www.wknet.se/wp-basic-elements/" class="button button-secondary" target="_blank"><?php _e('Information','wpbe'); ?></a>
                       	</p>
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

function remove_yseo() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wpseo-menu'); 
}

function remove_wpzoom() {
	global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wpzoom'); 
}

function remove_pings($headers) {
	unset($headers['X-Pingback']);
	return $headers;
}

function hide_aim($contactmethods) {
	unset($contactmethods['aim']);
	return $contactmethods;
}

function hide_jabber($contactmethods) {
	unset($contactmethods['jabber']);
	return $contactmethods;
}

function hide_yim($contactmethods) {
	unset($contactmethods['yim']);
	return $contactmethods;
}

function hide_gplus($contactmethods) {
	unset($contactmethods['googleplus']);
	return $contactmethods;
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

// Remove Index link
if(get_option('irelink') == '1'){ remove_action('wp_head', 'index_rel_link'); }

// Remove Prev link
if(get_option('prevlink') == '1'){ remove_action('wp_head', 'parent_post_rel_link', 10, 0); }

// Remove Start link
if(get_option('startlink') == '1'){ remove_action('wp_head', 'start_post_rel_link', 10, 0); }

// Remove relational links for the Posts
if(get_option('adjlinks') == '1'){ remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); }

// Remove WordPress Shortlink
if(get_option('shortlink') == '1'){ remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); }

// Remove Pings from header
if(get_option('pings') == '1'){ add_filter('wp_headers', 'remove_pings'); }

// Remove Canonical link
if(get_option('canonical') == '1'){ remove_action('wp_head', 'rel_canonical'); }

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

// Remove Yoast SEO in toolbar
if(get_option('yseo') == '1'){ add_action('wp_before_admin_bar_render', 'remove_yseo'); }

// Remove WP Zoom Framework in toolbar
if(get_option('wpzoom') == '1'){ add_action('wp_before_admin_bar_render', 'remove_wpzoom'); }

// Remove Website URL from Users contact info
if(get_option('colorsch') == '1'){ remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker'); }

// Remove AIM from Users contact info
if(get_option('haim') == '1'){ add_filter('user_contactmethods', 'hide_aim', 999, 1); }

// Remove Jabber from Users contact info
if(get_option('hjabber') == '1'){ add_filter('user_contactmethods', 'hide_jabber', 999, 1); }

// Remove Yahoo IM from Users contact info
if(get_option('hyim') == '1'){ add_filter('user_contactmethods', 'hide_yim', 999, 1); }

// Remove Google Plus from Users contact info
if(get_option('hgplus') == '1'){ add_filter('user_contactmethods', 'hide_gplus', 999, 1); }

// Add custom text the admin footer left
if(get_option('footerleft') != ''){ add_filter('admin_footer_text', 'admin_footer_left'); } 

// Add custom text the admin footer right
if(get_option('footerright') != ''){ add_filter('update_footer', 'admin_footer_right', '1234'); }