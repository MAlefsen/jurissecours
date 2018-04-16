<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/public
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-public.js', array( 'jquery' ), $this->version, false );

	}
		/**
		 * Register the stylesheets for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {

			wp_enqueue_style( 'dashicons' );

			wp_enqueue_style( 'react_slick_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.css', array(), '', 'all' );
			wp_enqueue_style( 'react_slick_theme_css', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick-theme.min.css', array(), '', 'all' );

			$my_page = get_option('learn_a_language_language_school_page');
			if($my_page && is_page($my_page)) {
				if (!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
					$CSSfiles = scandir(dirname(__FILE__) . '/lal-frontend/build/static/css/');
				 	foreach($CSSfiles as $filename) {
						if(strpos($filename,'.css')&&!strpos($filename,'.css.map')) {
							// var_dump(plugin_dir_url( __FILE__ ) . 'lal-frontend/build/static/css/' . $filename);
							// wp_dequeue_style('child-understrap-styles');
							// wp_deregister_style('child-understrap-styles');
							wp_enqueue_style( 'learn_a_language_react_css', plugin_dir_url( __FILE__ ) . 'lal-frontend/build/static/css/' . $filename, array(), mt_rand(10,1000), 'all' );
						}
				 	}
				}
			} else {
				wp_enqueue_style( $this->learn_a_language, plugin_dir_url( __FILE__ ) . 'css/learn-a-language-public.css', array(), mt_rand(10,1000), 'all' );
			}

		}

		/**
		 * Register the JavaScript for the public-facing side of the site.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {

			$my_page = get_option('learn_a_language_language_school_page');
			if($my_page && is_page($my_page)) {
				if (!in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
		    	// code for localhost here
					// PROD
				 	$JSfiles = scandir(dirname(__FILE__) . '/lal-frontend/build/static/js/');
				 	$react_js_to_load = '';
				 	foreach($JSfiles as $filename) {
				 		if(strpos($filename,'.js')&&!strpos($filename,'.js.map')) {
				 			$react_js_to_load = plugin_dir_url( __FILE__ ) . 'lal-frontend/build/static/js/' . $filename;
				 		}
				 	}
				} else {
					$react_js_to_load = 'http://localhost:3000/static/js/bundle.js';
				}
			 	// DEV
			 	// React dynamic loading
			 	// wp_enqueue_script('learn_a_language_react', $react_js_to_load, '', '', true);
			 	wp_register_script('learn_a_language_react', $react_js_to_load, '', mt_rand(10,1000), true);

				wp_localize_script('learn_a_language_react', 'params', array(
				    'nonce' => wp_create_nonce('wp_rest'),
				    'nonce_verify' => wp_verify_nonce($_REQUEST['X-WP-Nonce'], 'wp_rest')
				));
				wp_enqueue_script( 'learn_a_language_react' );
			} else {
				wp_enqueue_script( $this->learn_a_language, plugin_dir_url( __FILE__ ) . 'js/learn-a-language-public.js', array( 'jquery' ), mt_rand(10,1000), false );
			}

		}

}
