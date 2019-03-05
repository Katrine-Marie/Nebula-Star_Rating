<?php

/* **
* Plugin Name: Nebula Star Rating
* Description: Add 1 to 5 stars for any content, by means of a shortcode
* Author: Katrine-Marie Burmeister
* Version: 1.0.0
* Author URI: https://fjordstudio.dk
* Text Domain: nebula-rating
* License:     GNU General Public License v3.0
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
** */

namespace nebula\rating;

if(!defined('ABSPATH')){
	exit('Go away!');
}

add_shortcode('nebula-rating',__NAMESPACE__.'\nebula_add_stars');

 function nebula_add_stars($atts)
 {
    $a = shortcode_atts( array(
        'number' => '3',
    ), $atts );

	 $number_of_stars = $a['number'];

	 if($number_of_stars=='1')
	 {
		 $bgcolor = '#F99';
		 $icon 		= '<img width="40" src="http://www.freeiconspng.com/uploads/warning-icon-5.png"/>';
	 } elseif($number_of_stars=='2' || $number_of_stars=='3') {
		 $bgcolor = '#FF0';
		$icon = '';
	 } else {
		 $bgcolor = '#9F9';
		 $icon 		= '<img width="40" src="https://cdn0.iconfinder.com/data/icons/round-ui-icons/128/tick_green.png"/>';
	 }

	 return ("
	 <div style='padding:10px; border-radius:5px; font-size:16pt; background:$bgcolor; width:100%; margin-bottom:20px;'>
	 $icon
	 This is Rated:
	 $number_of_stars out of 5 stars
	 </div>
	 ");
 }
