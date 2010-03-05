<?php
/*
Plugin Name: Mibbit Webchat
Plugin URI: http://joshualuckers.nl/
Description: The official Mibbit Webchat plugin for WordPress. With this plugin you can add a widget to your blog or page.
Author: Joshua Lückers
Author URI: http://joshualuckers.nl
Version: 1.2

Copyright 2009 Joshua Lückers < http://joshualuckers.nl >
        
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
MA 02110-1301, USA.
*/

//Include the SQL class.
include('wplib/utils_sql.inc.php');
//When the plugin gets activated: register it.
register_activation_hook(__FILE__, 'mibbit_activate' );
//When deactivating the plugin: unregister it.
register_deactivation_hook(__FILE__, 'mibbit_deactivate');
//Tell WordPress to search for the following tag.
define('WP_MIBBIT', '/<!-- mibbit_webchat -->/i');
//Tell WordPress to filter the content and call the function mibbit_render.
add_filter('the_content', 'mibbit_render');
//Add a settings page menu item.
add_action('admin_menu', 'mibbit_menu');

/**
 * Activate the plugin and set the default options.
 */
function mibbit_activate() {
	global $wpdb;
	if (!get_option('mibbit-server')) {
		update_option('mibbit-server',  'irc.mibbit.net');
	}
	if (!get_option('mibbit-channels')) {
		update_option('mibbit-channels', '#mibbit.wp');
	}
	if (!get_option('mibbit-nick')) {
		update_option('mibbit-nick', 'WpUser_????');
	}
	if (!get_option('mibbit-settingsid')) {
		update_option('mibbit-settingsid', '');
	}
	if (!get_option('mibbit-iframe-width')) {
		update_option('mibbit-iframe-width', '100%;');
	}
	if (!get_option('mibbit-iframe-height')) {
		update_option('mibbit-iframe-height', '500px');
	}
	$wpdb->show_errors();
}

/**
 * Deactivate the plugin and unset the options set by the plugin.
 */
function mibbit_deactivate() {
	global $wpdb;
	delete_option('mibbit-server');
	delete_option('mibbit-channels');
	delete_option('mibbit-nick');
	delete_option('mibbit-settingsid');
	delete_option('mibbit-iframe-width');
	delete_option('mibbit-iframe-height');
}

/**
 * Render the widget. 
 * @param $content The page content.
 */
function mibbit_render($content) {
	$content = preg_replace(WP_MIBBIT, mibbit_create_iframe(), $content);
	return $content;
}

/**
 * Create the iframe needed to load the Mibbit Widget.
 * @return The iframe.
 */
function mibbit_create_iframe() {
	$server = get_option('mibbit-server');
	$channels = urlencode(get_option('mibbit-channels'));
	$nick = urlencode(get_option('mibbit-nick'));
	$settingsid = get_option('mibbit-settingsid');
	$width = get_option('mibbit-iframe-width')	;
	$height = get_option('mibbit-iframe-height');
	
	return '<iframe width=' .$width. ' height=' .$height. ' scrolling=no style="border:0" src="https://widget.mibbit.com/?server=' .$server. '&channel=' .$channels. '&nick=' .$nick. '&settings=' .$settingsid. '"></iframe>';
}

/**
 * Add the mibbit settings menu item.
 */
function mibbit_menu() {
	add_options_page('Mibbit Webchat', 'Mibbit Webchat', 1, 'Mibbit Webchat', 'mibbit_settings');
}

/**
 * Get the mibbit settings page.
 */
function mibbit_settings() {
	include('mibbit_settings.php');
}
?>
