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
include('wplib/utils_sql.inc.php');
global $wpdb;
if($_POST[mibbit_hidden] == "Y") {	
	if (empty($_POST['mibbit-server'])) {
		update_option('mibbit-server', "irc.mibbit.net");
	}
	else {
		update_option('mibbit-server', trim($_POST['mibbit-server']));
	}
	if (empty($_POST['mibbit-channels'])) {
		update_option('mibbit-channels', "#mibbit.wp");
	}
	else {
		update_option('mibbit-channels', trim($_POST['mibbit-channels']));
	}
	if (empty($_POST['mibbit-nick'])) {
		update_option('mibbit-nick', "WpUser_????");
	}
	else {
		update_option('mibbit-nick', trim($_POST['mibbit-nick']));
	}
	if (empty($_POST['mibbit-settings'])) {
		update_option('mibbit-settingsid', " ad9539b735c13c87bd3c86b2a52cadf0");
	}
	else {
		update_option('mibbit-settingsid', trim($_POST['mibbit-settingsid']));
	}
?>
	<div class="updated"><p><strong><?php echo('Settings saved.' ); ?></strong></p></div>
<?php
}
?>
<div class="wrap">  
	<div id="icon-options-general" class="icon32"><br /></div>
	<h2>Mibbit Webchat Settings</h2>
	
	<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="mibbit_hidden" value="Y"> 
		<table class="form-table">
			<tr valign="top">
				<th scope="row">
					<label for="mibbit-server">Server:</label>
				</th>
				<td>
					<input type="text" name="mibbit-server" id="mibbit-server" value="<?php echo(get_option('mibbit-server')); ?>" class="regular-text code"/>
					<span class="description">Default is <code>irc.mibbit.net</code></span>
					<span class="setting-description">
						<br>To define a port add :port. eg. irc.mibbit.net:6667
					</span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="mibbit-channel">Channels:</label>
				</th>
				<td>
					<input type="text" name="mibbit-channels" id="mibbit-channels" value="<?php echo(get_option('mibbit-channels')); ?>" class="regular-text code"/>
					<span class="description">Default is <code>#mibbit.wp</code></span>
					<span class="setting-description">
						<br>Separate channels with a comma. eg. #mibbit,#mibbit.cp
					</span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="mibbit-nick">Nickname:</label>
				</th>
				<td>
					<input type="text" name="mibbit-nick" id="mibbit-nick" value="<?php echo(get_option('mibbit-nick')); ?>" class="regular-text code"/>
					<span class="description">Default is <code>WpUser_????</code></span>
					<span class="setting-description">
						<br>A ? represents a single random digit.
					</span>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row">
					<label for="mibbit-settingsid">Settings ID:</label>
				</th>
				<td>
					<input type="text" name="mibbit-settingsid" id="mibbit-settingsid" value="<?php echo(get_option('mibbit-settingsid')); ?>" class="regular-text code"/>
					<span class="description">Default is blank.</code></span>
					<span class="setting-description">
						<br>For more information check out the <a href="http://wiki.mibbit.com/index.php/Skins">Mibbit Wiki</a>.
					</span>
				</td>
			</tr>
		</table>
		<p class="submit"> 
			<input type="submit" name="Submit" class="button-primary" value="Save Changes" /> 
		</p> 
	</form>
</div>
