<?php

/**
 * Fired during plugin activation
 *
 * @link       https://www.ibsofts.com
 * @since      2.1.0
 *
 * @package    Boom_Fest
 * @subpackage Boom_Fest/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      2.1.0
 * @package    Boom_Fest
 * @subpackage Boom_Fest/includes
 * @author     iB Arts Pvt. Ltd. <support@ibarts.in>
 */
class Boom_Fest_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    2.1.0
	 */
	public static function activate() {
		global $wpdb;
		$table=$wpdb->prefix.'boom_festive_data';
		$table2=$wpdb->prefix.'boom_festive_activated';
		$charset_collate = $wpdb->get_charset_collate();

        $sql="CREATE TABLE $table2 (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            festival VARCHAR(30),
            celebration_type VARCHAR(100),
			decoration_image VARCHAR(100),
			font_style VARCHAR(100),
            pages VARCHAR(50)
			) $charset_collate;";
		$wpdb->query($sql);

		$sql2="CREATE TABLE $table (
			id mediumint(9) AUTO_INCREMENT PRIMARY KEY,
			festival VARCHAR(30),
			decorations longtext
		   ) $charset_collate;";
		$wpdb->query($sql2);

		$data = array(
			array(
				'id' => 1,
				'festival' => 'new-year',
				'decorations' => '{"celebration_type":["Ribbons"], "decoration_image":["Ribbon"], "font_style":["New Year 1"] }'
			),
			array(
				'id' => 2,
				'festival' => 'spring',
				'decorations' => '{"celebration_type":["Flowers"], "decoration_image":["Flower Cover"], "font_style":["Spring 1"] }'
			),
			array(
				'id' => 3,
				'festival' => 'halloween',
				'decorations' => '{"celebration_type":["Pumpkins"], "decoration_image":["Halloween Cap"], "font_style":["Halloween 1"] }'
			),
			array(
				'id' => 4,
				'festival' => 'black-friday',
				'decorations' => '{"celebration_type":["Balloons"], "decoration_image":["Black Friday Ribbon"], "font_style":["Black Friday 1"] }'
			),
			array(
				'id' => 5,
				'festival' => 'christmas',
				'decorations' => '{"celebration_type":["Snowflakes"], "decoration_image":["Santa Cap"], "font_style":["Christmas 1"] }'
			)
		);
		foreach($data as $row) {
			$wpdb->insert($table, $row);
		}
	}

}