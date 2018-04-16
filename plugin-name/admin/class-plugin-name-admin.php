<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * An example post type that you can remove.
	 *
	 * @since    1.0.0
	 */
 public function create_plugin_name_post_type() {
		 register_post_type( 'plugin-name-post-type',
				 array(
						 'labels' => array(
								 'name' => 'Custom Post Type',
								 'menu_name' => 'Custom',
								 'singular_name' => 'Custom',
								 'add_new' => 'Add New',
								 'add_new_item' => 'Add New Custom',
								 'edit' => 'Edit',
								 'edit_item' => 'Edit Custom',
								 'new_item' => 'New Custom',
								 'view' => 'View',
								 'view_item' => 'View Custom',
								 'search_items' => 'Search Custom',
								 'not_found' => 'No Custom found',
								 'not_found_in_trash' => 'No Custom found in Trash',
								 'parent' => 'Parent Custom'
						 ),
						 'public' => true,
						 'show_in_rest' => true,
						 'menu_position' => 15,
						 'supports' => array( 'title' , 'editor', 'custom-fields', 'thumbnail', 'excerpt'),
						 'taxonomies' => array( '' ),
						 'menu_icon' => 'dashicons-welcome-learn-more',
						 'has_archive' => true
				 )
		 );
 }

 	/**
 	 * Add post type to rest
 	 *
 	 * @since    1.0.0
 	 */
 	function plugin_name_add_post_type_to_rest() {
 		global $wp_post_types;
 		$wp_post_types['plugin-name-post-type']->show_in_rest = true;
 	}

}
