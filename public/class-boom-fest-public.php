<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://www.ibsofts.com
 * @since      2.1.0
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/public
 * @author     iB Arts Pvt. Ltd. <support@ibarts.in>
 */
 
class Boom_Fest_Public {

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
	 * @since    2.1.0
	 */
	 
	 /**
	  * Function to return results of table boom_festive
	  */
	 
	public function boom_fest_db(){
	    global $wpdb;
        $table=$wpdb->prefix.'boom_festive_activated';
        $sql="SELECT * FROM $table WHERE id=1";
        $results=$wpdb->get_results($sql);
        if($results!=NULL){
            return $results;
        }
        else{
            return NULL;
        }
	}
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
		$results=$this->boom_fest_db();
		if($results!=NULL){
		 	$celebration_type= $results[0]->celebration_type;
			$decoration_image = $results[0]->decoration_image;
			$font_style = $results[0]->font_style;
         	$page=json_decode($results[0]->pages);
			if(!empty($page) && $page[0]=='all'){
				$pages = 'all';
			}
			elseif(!empty($page) && is_page($page)){
				$pages = true;
			}
			else{
				$pages = NULL;
			}
			
			if($celebration_type == 'Ribbons' && !empty($pages)){
				wp_enqueue_style('boom-fest-ribbon', BOOM_FEST_URL . 'public/css/new-year/boom-fest-ribbon.css', array(), $this->version, 'all');
			}
			if($celebration_type == 'Flowers' && !empty($pages)){
				wp_enqueue_style('boom-fest-flower', BOOM_FEST_URL . 'public/css/spring/boom-fest-flower.css', array(), $this->version, false);
			}
			if($celebration_type == 'Pumpkins' && !empty($pages)){
				wp_enqueue_style('boom-fest-pumpkin', BOOM_FEST_URL . 'public/css/halloween/boom-fest-pumpkin.css', array(), $this->version, 'all');
			}
			if($celebration_type == 'Balloons' && !empty($pages)){
				wp_enqueue_style('boom-fest-balloon', BOOM_FEST_URL . 'public/css/black-friday/boom-fest-balloon.css', array(), $this->version, 'all');
			}
			if($celebration_type == 'Snowflakes' && !empty($pages)){
				wp_enqueue_style('boom-fest-snowflake', BOOM_FEST_URL . 'public/css/christmas/boom-fest-snowflakes.css', array(), $this->version, 'all');
			}

			if($decoration_image == 'Ribbon' && !empty($pages)){
				wp_enqueue_style( 'boom-fest-ribbon-cover', BOOM_FEST_URL . 'public/css/new-year/boom-fest-ribbon-cover.css', array(), $this->version, false );
			}
			if($decoration_image == 'Santa Cap' && !empty($pages)){
				wp_enqueue_style( 'boom-fest-santa-cap', BOOM_FEST_URL . 'public/css/christmas/boom-fest-santa-cap.css', array(), $this->version, false );
			}
			if($decoration_image == 'Black Friday Ribbon' && !empty($pages)){
				wp_enqueue_style( 'boom-fest-black-friday', BOOM_FEST_URL . 'public/css/black-friday/boom-fest-black-friday.css', array(), $this->version, false );
			}
			
			if($decoration_image == 'Flower Cover' && !empty($pages)){
				wp_enqueue_style( 'boom-fest-flower-cover', BOOM_FEST_URL . 'public/css/spring/boom-fest-flower-cover.css', array(), $this->version, false );
			}
			if($decoration_image == 'Halloween Cap' && !empty($pages)){
				wp_enqueue_style( 'boom-fest-halloween-cap', BOOM_FEST_URL . 'public/css/halloween/boom-fest-halloween-cap.css', array(), $this->version, false );
			}
			
			if(!empty($font_style) && !empty($pages)){
				if($font_style=='New Year 1'){
					wp_enqueue_style( 'new-year-1', BOOM_FEST_URL . 'public/css/new-year/boom-fest-new-year-1.css', array(), $this->version, 'all' );
				}
				if($font_style=='Spring 1'){
					wp_enqueue_style( 'spring-1', BOOM_FEST_URL . 'public/css/spring/boom-fest-spring-1.css', array(), $this->version, 'all' );
				}
				if($font_style=='Halloween 1'){
					wp_enqueue_style( 'halloween-1', BOOM_FEST_URL . 'public/css/halloween/boom-fest-halloween-1.css', array(), $this->version, 'all' );
				}
				if($font_style=='Black Friday 1'){
					wp_enqueue_style( 'black-friday-1', BOOM_FEST_URL . 'public/css/black-friday/boom-fest-black-friday-1.css', array(), $this->version, 'all' );
				}
				if($font_style=='Christmas 1'){
					wp_enqueue_style( 'christmas-1', BOOM_FEST_URL . 'public/css/christmas/boom-fest-christmas-1.css', array(), $this->version, 'all' );
				}
         	}
		}
		wp_enqueue_style( 'bootstrap-css', BOOM_FEST_URL . 'public/css/bootstrap.min.css', array(), $this->version, 'all' );
	}
	
	/**
	 * Register the JavaScript for the public-facing side of the site.
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
        $results=$this->boom_fest_db();
        if($results!=NULL){
			$celebration_type= $results[0]->celebration_type;
			$decoration_image = $results[0]->decoration_image;
			$font_style = $results[0]->font_style;
			$page=json_decode($results[0]->pages);
			if(!empty($page) && $page[0]=='all'){
				$pages = 'all';
			}
			elseif(!empty($page) && is_page($page)){
				$pages = true;
			}
			else{
				$pages = NULL;
			}

            if($celebration_type == 'Ribbons' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-ribbon', BOOM_FEST_URL . 'public/js/new-year/boom-fest-ribbon.js', array( 'jquery' ), $this->version, false );
            }
			if($celebration_type == 'Flowers' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-flower', BOOM_FEST_URL . 'public/js/spring/boom-fest-flower.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-flower','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($celebration_type == 'Pumpkins' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-pumpkin', BOOM_FEST_URL . 'public/js/halloween/boom-fest-pumpkin.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-pumpkin','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($celebration_type == 'Balloons' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-balloon', BOOM_FEST_URL . 'public/js/black-friday/boom-fest-balloon.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-balloon','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($celebration_type == 'Snowflakes' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-snowflake', BOOM_FEST_URL . 'public/js/christmas/boom-fest-snowflake.js', array( 'jquery' ), $this->version, false );
            }
			if($decoration_image == 'Ribbon' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-ribbon-cover', BOOM_FEST_URL . 'public/js/new-year/boom-fest-ribbon-cover.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-ribbon-cover','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($decoration_image == 'Santa Cap' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-santa-cap', BOOM_FEST_URL . 'public/js/christmas/boom-fest-santa-cap.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-santa-cap','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($decoration_image == 'Flower Cover' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-flower-cover', BOOM_FEST_URL . 'public/js/spring/boom-fest-flower-cover.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-flower-cover','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($decoration_image == 'Black Friday Ribbon' && !empty($pages)){
				wp_enqueue_script( 'boom-fest-black-friday', BOOM_FEST_URL . 'public/js/black-friday/boom-fest-black-friday.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-black-friday','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if($decoration_image == 'Halloween Cap' && !empty($pages)){
                wp_enqueue_script( 'boom-fest-halloween-cap', BOOM_FEST_URL . 'public/js/halloween/boom-fest-halloween-cap.js', array( 'jquery' ), $this->version, false );
				wp_localize_script('boom-fest-halloween-cap','plugin_url',array('url' => BOOM_FEST_URL));
			}
			if(!empty($font_style) && !empty($pages)){
                wp_enqueue_script( 'boom-fest-font', BOOM_FEST_URL . 'public/js/boom-fest-font.js', array( 'jquery' ), $this->version, false );
            }
        }
		
		wp_enqueue_script( 'bootstrap-js', BOOM_FEST_URL . 'public/js/bootstrap.bundle.min.js', array( 'jquery' ), $this->version, false );
	}
	
}