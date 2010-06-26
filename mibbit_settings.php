<?php
/*
Copyright 2010 Joshua Lückers < http://joshualuckers.nl >

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
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
if (empty($_POST['mibbit-settingsid'])) {
update_option('mibbit-settingsid', "");
}
else {
update_option('mibbit-settingsid', trim($_POST['mibbit-settingsid']));
}
if (empty($_POST['mibbit-iframe-width'])) {
update_option('mibbit-iframe-width', "100%");
}
else {
update_option('mibbit-iframe-width', trim($_POST['mibbit-iframe-width']));
}
if (empty($_POST['mibbit-iframe-height'])) {
update_option('mibbit-iframe-height', "500px");
}
else {
update_option('mibbit-iframe-height', trim($_POST['mibbit-iframe-height']));
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
<tr valign="top">
<th scope="row">
<label for="mibbit-nick">Width:</label>
</th>
<td>
<input type="text" name="mibbit-iframe-width" id="mibbit-iframe-width" value="<?php echo(get_option('mibbit-iframe-width')); ?>" class="regular-text code"/>
<span class="description">Default is <code>100%</code></span>
<span class="setting-description">
<br>Width can be in px or %
</span>
</td>
</tr>
<tr valign="top">
<th scope="row">
<label for="mibbit-nick">Height:</label>
</th>
<td>
<input type="text" name="mibbit-iframe-height" id="mibbit-iframe-height" value="<?php echo(get_option('mibbit-iframe-height')); ?>" class="regular-text code"/>
<span class="description">Default is <code>500px</code></span>
<span class="setting-description">
<br>Height can be in px or %
</span>
</td>
</tr>
</table>
<p class="submit"> 
<input type="submit" name="Submit" class="button-primary" value="Save Changes" /> 
</p> 
</form>
<p>Place the following in your page and/or post to embed a widget: &lt;!-- mibbit_webchat --&gt; </p>
<h2>Donate</h2>
<p>If you like this plugin then please consider to donate! When I receive enough donations I'll add a list of people who donated to the settings page.</p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypal.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
</form>
</div>
