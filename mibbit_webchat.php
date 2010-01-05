<?php
/*
Plugin Name: Mibbit Webchat
Plugin URI: http://joshualuckers.nl/portfolio
Description: The official Mibbit Webchat plugin for WordPress. With this plugin you can add a widget to your blog or page.
Version: 0.6.6
Author: Joshua Lückers
Author URI: http://joshualuckers.nl

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
register_activation_hook(__FILE__, 'mibbitWebchat_activate' );
register_deactivation_hook(__FILE__, 'mibbitWebchat_deactivate');
include('wplib/utils_sql.inc.php');
define('WP_MIBBIT', '/<!-- mibbit_webchat -->/i');

//Render the widget
function renderMibbit($oldcontent) {
	$newcontent = $oldcontent;
	if (preg_match(WP_MIBBIT, $oldcontent, $matches)) {
		$content .= "\n\n";
		$content .= getMibbitFrame();
		$newcontent = preg_replace("/$matches[0]/i", $content, $oldcontent);
	}
	return $newcontent;
}
//add the filter
add_filter('the_content', 'renderMibbit');

//add it menu item to the settings.
function mibbitMenu() {
	add_options_page('Mibbit Webchat', 'Mibbit Webchat', 1, 'Mibbit Webchat', 'mibbitSettings');  
}

//get the mibbit settings page.
function mibbitSettings() {
	include('mibbit_settings.php');
}
//when the admin menu is loaded add this filter.
add_action('admin_menu', 'mibbitMenu');

//returns the mibbit iframe
function getMibbitFrame() {
	$server = get_option('mibbit-server');
	$channels = urlencode(get_option('mibbit-channels'));
	$nick = urlencode(get_option('mibbit-nick'));
	$settingsid = get_option('mibbit-settingsid');
	return '<iframe width=100% height=500 scrolling=no style="border:0" src="http://widget.mibbit.com/?server=' .$server. '&channel=' .$channels. '&nick=' .$nick. '&settings=' .$settingsid. '"></iframe>';
}

//when activating the plugin
function mibbitWebchat_activate() {
	global $wpdb;
	
	if (!get_option('mibbit-server')) {
		update_option('mibbit-server', "irc.mibbit.net");
	}
	if (!get_option('mibbit-channels')) {
		update_option('mibbit-channels', "#mibbit.wp");
	}
	if (!get_option('mibbit-nick')) {
		update_option('mibbit-nick', "WpUser_????");
	}
	if (!get_option('mibbit-settingsid')) {
		update_option('mibbit-settingsid', "");
	}
	
	$wpdb->show_errors();
}

//when deactivating the plugin
function mibbitWebchat_deactivate() {
	global $wpdb;
	
	delete_option('mibbit-server');
	delete_option('mibbit-channels');
	delete_option('mibbit-nick');
	delete_option('mibbit-settingsid');
}
?>
