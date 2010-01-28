<?php
/*
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
global $wpdb;
//Include the various javascript files needed by the metaboxes.
wp_enqueue_script('common');
wp_enqueue_script('wp-lists');
wp_enqueue_script('postbox');
?>
	<div id="howto-metaboxes-general" class="wrap">
		<?php screen_icon('options-general'); ?>
		<h2>Metabox Showcase Plugin Page</h2>
		<form action="admin-post.php" method="post">
			<input type="hidden" name="action" value="save_howto_metaboxes_general" />
		
			<div id="poststuff" class="metabox-holder">
				<div id="side-info-column" class="inner-sidebar">
					moo?
				</div>
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
						<h3 class="hnddle">test?</h3>
						<h4>Static text and input section</h4>
						<p>Here is some static paragraph or your own static content. Can be placed where ever you want.</p>
						<textarea name="static-textarea" style="width:100%;">Change this text ....</textarea>
						<br/>
						<p>
							<input type="submit" value="Save Changes" class="button-primary" name="Submit"/>	
						</p>
					</div>
				</div>
				<br class="clear"/>
								
			</div>	
		</form>
		</div>
	<script type="text/javascript">
		//<![CDATA[
		jQuery(document).ready( function($) {
			// close postboxes that should be closed
			$('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			// postboxes setup
			postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
		});
		//]]>
	</script>
