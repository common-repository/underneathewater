<?php
/*
Plugin Name: Underneath The Water
Plugin URI: http://www.CaptchaTheDog.com/wp/underneaththewater
Description: Rotates lyrics to EURYTHMICS - JENNIFER in the Wordpress admin (much like Hello, Dolly)
Author: Team CaptchaTheDog, Matt Mullenweg
Version: 1.0
Author URI: http://www.CaptchaTheDog.com/wp/underneaththewater


Copyright 2009  Daniel McMullan (email : http://www.CaptchaTheDog.com/contact.html) 
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; version 3 (GPLv3) of the License, or 
(at your option) any later version.
This program is distributed in the hope that it will be useful, 
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

*/

// These are the lyrics to Eurythmics : Jennifer
$lyrics = "Jennifer with your orange hair
Jennifer with your green eyes
Jennifer in your dress of deepest purple
Jennifer - Where are you tonight?
Jennifer - Where are you tonight?
(Underneath the water / Underneath the water)";

// Here we split it into lines
$lyrics = explode("\n", $lyrics);
// And then randomly choose a line
$chosen = wptexturize( $lyrics[ mt_rand(0, count($lyrics) - 1) ] );

// This just echoes the chosen line, we'll position it later
function hello_dolly() {
	global $chosen;
		echo "<p id='dolly'><a href='http://www.youtube.com/watch?v=-Z6WlVfpTc0' target=_new>$chosen</a></p>";
		}
// Now we set that function up to execute when the admin_footer action is called
add_action('admin_footer', 'hello_dolly');

// We need some CSS to position the paragraph
function dolly_css() {
	echo "
	<style type='text/css'>
	#dolly {
		position: absolute;
		top: 4.5em;
		margin: 0;
		padding: 0;
		right: 215px;
		font-size: 11px;
	}
	</style>
	";
}

add_action('admin_head', 'dolly_css');

?>
