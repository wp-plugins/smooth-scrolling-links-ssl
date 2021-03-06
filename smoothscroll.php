<?php
/*
Plugin Name: Smooth Scroll Links [SSL]
Plugin URI: http://www.thechetan.com/smoothscrolllinks/
Description: Make smooth scrolling up-down navigation links on your blog.
Version: 1.1.0
Author: Chetan Gole
Author URI: http://chetangole.com/
*/

/*
Copyright 2010  Chetan Gole, IN  (http://chetangole.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details: http://www.gnu.org/licenses/gpl.txt
*/

function smooth_scroll_head()
{
?>
<!-- Added by Wordpress Smooth Scroll Links 1.1.0 -->
<script type="text/javascript" src="<?php bloginfo('wpurl'); ?>/wp-content/plugins/smooth-scrolling-links-ssl/smoothscroll.js"></script>
<!-- End of Wordpress Smooth Scroll Links 1.1.0 -->
<?php
}

function smooth_scroll_footer()
{
?>
<!-- Added by Wordpress Smooth Scroll Links 1.1.0 -->
<small><a href="#header" title="Back to Top">Back to Top&nbsp;&uarr;</a></small>
<!-- End of Wordpress Smooth Scroll Links 1.1.0 -->
<?php
}

function smooth_scroll_options_page()
{
	if($_POST['smooth_scroll_save']){
		update_option('smooth_scroll_footer',$_POST['smooth_scroll_footer']);
		update_option('smooth_scroll_head',$_POST['smooth_scroll_head']);		
		echo '<div class="updated"><p>Commands accepted</p></div>';
	}
	$wp_smooth_scroll_footer = get_option('smooth_scroll_footer');
	$wp_smooth_scroll_head = get_option('smooth_scroll_head');
	?>
	<div class="wrap">
	
	<h2>Smooth Scroll Links [SSL] Options</h2>ver 1.1.0
	<form method="post" id="smooth_scroll_options">
		<fieldset class="options">
		<legend>Select proper options according to your needs.</legend>
		<br /><br />
		<table class="form-table">
		
		<tr valign="top"> 
				<th width="33%" scope="row">Enable Smooth Scroll effect:</th> 
				<td>
				<input type="checkbox" id="smooth_scroll_head" name="smooth_scroll_head" value="smooth_scroll_head" <?php if($wp_smooth_scroll_head == true) { echo('checked="checked"'); } ?> />
				check to activate.
				</td> 
		</tr>
		
		
		
		<tr valign="top"> 
				<th width="33%" scope="row">Add "Back to top" link at Footer":</th> 
				<td>
				<input type="checkbox" id="smooth_scroll_footer" name="smooth_scroll_footer" value="smooth_scroll_footer" <?php if($wp_smooth_scroll_footer == true) { echo('checked="checked"'); } ?> />
				check to activate.
				</td> 
		</tr>	
        <tr>
        <th width="33%" scope="row">Save settings :</th> 
        <td>
		<input type="submit" name="smooth_scroll_save" value="Save Settings" />
        </td>
        </tr>
		
		<tr>
        <th scope="row" style="text-align:right; vertical-align:top;">
        <td>
		<h3>How to add your own SSL [Smooth Scroll Links]</h3>
		<p>Yes,its very easy to add your own links, check out this post on <a href="http://www.thechetan.com/smoothscrolllinks/#howto" target="_blank">how to add smooth scrolling links in Wordpress</a>.</p>		
		</td>
        </tr>
		<tr>
        <th scope="row" style="text-align:right; vertical-align:top;">
        <td>
		<h3>Whats next ?</h3>
		<p>Why don't you <a href="/wp-admin/post-new.php">write a post</a> about <a href="http://www.thechetan.com/smoothscrolllinks/" target="_blank">Smooth Scroll Links</a> ?</p>
		<h3>Problems, Questions, Suggestions ?</h3>
		<p>Catch me on <a href="http://www.thechetan.com/smoothscrolllinks/" target="_blank">SSL Homepage</a></p>
		<h3>Also see</h3>
		<p>A plugin to protect your blog content from COPY PASTE <a href="http://www.thechetan.com/wp-copyprotect/" target="_blank">WP-CopyProtect</a></p>
        </td>
        </tr>	
		</table>
		<h3>Thank you</h3>
		Plug in developed by <a href="http://www.thechetan.com/" target="_blank">Chetan Gole</a>. <br />
		<small>Follow me on Twitter <a href="http://twitter.com/Chetan_Gole" target="_blank">@Chetan_Gole</a></small>
		</fieldset>
	</form>
	</table>
	</div>
	<?php
}

//We are calling you, function
function smooth_scroll()
{

	$wp_smooth_scroll_head = get_option('smooth_scroll_head');
	$pos = strpos(strtolower(getenv("REQUEST_URI")), '?preview=true');
	
	if ($pos === false) {
		if($wp_smooth_scroll_head == true) { smooth_scroll_head(); }
	}
}


function smooth_scroll_footer_footer()
{
	$wp_smooth_scroll_footer = get_option('smooth_scroll_footer');

	if($wp_smooth_scroll_footer == true) { smooth_scroll_footer(); }
}

function smooth_scroll_adminmenu()
{
	if (function_exists('add_options_page')) {	
		add_options_page('Smooth Scroll Links [SSL]', 'Smooth Scroll Links [SSL]', 9, basename(__FILE__),'smooth_scroll_options_page');
	}
}

//  Commanding the Wordpress
add_action('wp_head','smooth_scroll');
add_action('wp_footer','smooth_scroll_footer_footer');
add_action('admin_menu','smooth_scroll_adminmenu',1);
?>
