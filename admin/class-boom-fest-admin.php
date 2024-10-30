<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      2.1.0
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/admin
 * @author     iB Arts Pvt. Ltd. <support@ibarts.in>
 */

class Boom_Fest_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    2.1.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    2.1.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.1.0
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
	 * @since    2.1.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Boom_Fest_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Boom_Fest_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_style( $this->plugin_name, BOOM_FEST_URL . 'admin/css/boom-fest-admin.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'bootstrap-css', BOOM_FEST_URL . 'admin/css/bootstrap.min.css', array(), $this->version, 'all' );
		wp_enqueue_style('chosen-css', BOOM_FEST_URL . 'admin/css/chosen.min.css', array(), $this->version, 'all');
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    2.1.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Boom_Fest_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Boom_Fest_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, BOOM_FEST_URL . 'admin/js/boom-fest-admin.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->plugin_name, 'ajax_url',array('admin_url'=>admin_url('admin-ajax.php')));
		
		wp_enqueue_script( 'bf_customfest', BOOM_FEST_URL . 'admin/js/boom-fest-customfest.js', array( 'jquery' ), $this->version, false );
		wp_localize_script( 'bf_customfest', 'bf_ajax_object',array('admin_ajax_url'=>admin_url('admin-ajax.php')));
		
		wp_enqueue_script( 'bootstrap-js', BOOM_FEST_URL . 'admin/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script('chosen-js', BOOM_FEST_URL . 'admin/js/chosen.jquery.min.js', array('jquery'), $this->version, false);
	}

    /**
     * Function for admin page menu setting
     */

	public function bf_admin(){
		add_menu_page('Theme Setting','Boom Fest','administrator','boom-fest',array(__CLASS__,'bf_admin_setting'),'dashicons-bell');
	}
    
    /**
     * Callback function for add_menu_page.
     */
    
	public static function bf_admin_setting(){
		if(file_exists(BOOM_FEST_PATH.'admin/partials/boom-fest-admin-display.php')){
			require BOOM_FEST_PATH.'admin/partials/boom-fest-admin-display.php';
		}
	}
    
	/**
     * Ajax action function for admin side menu setting.
     */
	public function bf_customfest(){
		global $wpdb;
		$table2=$wpdb->prefix.'boom_festive_activated';
		$festival = sanitize_text_field($_POST['festival']);
		$results=$wpdb->get_results($wpdb->prepare( 'SELECT * FROM '. $wpdb->prefix.'boom_festive_activated WHERE id = %d', 1 ));
		if($results!=null){
			$wpdb->update($table2, array( 'festival' => $festival, 'celebration_type' => null, 'decoration_image' => null, 'font_style' => null), array('id' => 1));
			echo 'Festival has been updated!';
		}
		else{
			$result=$wpdb->query($wpdb->prepare('INSERT INTO '.$wpdb->prefix.'boom_festive_activated (festival) VALUES (%s)','new-year'));
			if($result!=false){
				echo 'Festival has been saved!';
			}
			else{
				echo 'Some error occured!';
			}
		}
		die();
	}

    /**
     * Ajax action function for admin side menu setting.
     */
    
	 public function bf_admin_action(){
	    global $wpdb;
		$table2=$wpdb->prefix.'boom_festive_activated';
		$celebration_type = sanitize_text_field($_POST['celebration_type']);
		$decoration_image = sanitize_text_field($_POST['decoration_image']);
		$font_style = sanitize_text_field($_POST['font_style']);
		if (isset($_POST['pages']) && is_array($_POST['pages'])) {
			$pages = array_map('sanitize_text_field', $_POST['pages']);
		} else {
			$pages = array();
		}
		$pages=json_encode($pages);
		if(empty($celebration_type) || empty($pages)){
		    echo 'You must select celebration type and pages.';
		    die();
		}
		$results=$wpdb->get_results($wpdb->prepare( 'SELECT * FROM '. $wpdb->prefix.'boom_festive_activated WHERE id = %d', 1 ));
		if($results!=null){
			$wpdb->update($table2, array('celebration_type' => $celebration_type, 'decoration_image' => $decoration_image, 'font_style' => $font_style, 'pages' => $pages), array('id' => 1));
			echo 'Decorations has been updated !';
		}
		else{
			$result=$wpdb->query($wpdb->prepare('INSERT INTO '.$wpdb->prefix.'boom_festive_activated (celebration_type, decoration_image, font_style, pages) VALUES (%s, %s, %s, %s)', $celebration_type, $decoration_image, $font_style, $pages));
			if($result!=false){
				echo 'Decorations has been created !';
			}
			else{
				echo 'Some error occured';
			}
		}
		die();
	}

}