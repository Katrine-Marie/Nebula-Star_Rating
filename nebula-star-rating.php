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

class ratingShortcode{

	public function __construct(){
		add_shortcode('nebula-rating',array($this, 'nebula_add_stars'));
	}

	public function nebula_add_stars($atts)
  {
     $a = shortcode_atts( array(
         'number' => '3',
     ), $atts );

 	 $number_of_stars = $a['number'];

 	 if($number_of_stars=='1')
 	 {
 		 $bgcolor = '#F99';
 		 $icon 		= '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#a10014" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>';
 	 } elseif($number_of_stars=='2' || $number_of_stars=='3') {
 		 $bgcolor = '#ffe972';
 		$icon = '';
 	 } else {
 		 $bgcolor = '#9F9';
 		 $icon 		= '<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24" fill="none" stroke="#417505" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
 	 }

 	 return ("
 	 <div style='padding:10px; border-radius:5px; font-size:16pt; background:$bgcolor; width:100%; margin-bottom:20px;'>
 	 <div style=\"padding:0 10px 0 20px;\">$icon</div>
 	 This is Rated:
 	 $number_of_stars out of 5 stars
 	 </div>
 	 ");
  }


}
