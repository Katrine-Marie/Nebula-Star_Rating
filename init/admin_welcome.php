<?php

namespace nebula\rating;

class admin_welcome {

	public function __construct()  {
  	add_action( 'admin_init', array($this,'welcome_do_activation_redirect') );
    // Delete the redirect transient
    // Bail if activating from network, or bulk
    if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
     return;
    }
    // add to menu
    add_action('admin_menu', array($this, 'welcome_pages') );
    add_action('admin_head', array($this, 'welcome_remove_menus' ) );
  }

  public function welcome_do_activation_redirect() {
  	// Bail if no activation redirect
    if ( ! get_transient( '_nebula_rating_welcome' ) ) {
    	return;
    }
    // Redirect
    wp_safe_redirect( add_query_arg( array( 'page' => 'nebula-rating' ), admin_url( 'index.php' ) ) );
  }

  public function welcome_pages() {
    add_dashboard_page(
    	'Nebula Star Rating',
      'Nebula Star Rating',
      'read',
      'nebula-rating',
      array( $this,'welcome_content')
    );
  }

  public function welcome_remove_menus() {
  	remove_submenu_page( 'index.php', 'nebula-rating' );
  }

  public static function welcome_content() {

?>
  <div class="wrap admin-page">
  	<h1 class="title"><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<p>
			Thank you for installing the 'Nebula Star Rating' plugin.
		</p>
		<p>
			A rating can be created by inserting the shortcode <code>[nebula-rating]</code> into a post or a page, where you wish the rating to appear. The default value is '3'.
		</p>
		<p>
			You can set the number of the rating, by simply adding a number between 1 and 5 to the shortcode, like so: <code>[nebula-rating number=5]</code>.
		</p>

  </div>
  <?php
  	delete_transient( '_nebula_rating_welcome' );
  }

}
