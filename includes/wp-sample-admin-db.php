<?php
/**
 * Class Database Page.
 *
 * @author Megumu Niihara
 * @version 1.0.0
 * @since 1.0.0
*/
Class Sample_Plugin_Admin_Db {
	private $table_name;
	/**
	* Constructor
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function __construct() {
		global $wpdb;
		$this->table_name = $wpdb->prefix . 'sample_plugin';
	}
	
	/**
	* Create main table.
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function create_table () {
		global $wpdb;
		
		$prepared = $wpdb->prepare( "SHOW TABLES LIKE %s" , $this->table_name );
		$is_db_exist = $wpdb->get_var( $prepared );
		$charaset_collate = $wpdb->get_charset_collate();
		
		if ( is_null( $is_db_exist ) ) {
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			
			$query = "CREATE TABLE " . $this->table_name . " (";
			$query .= "id MEDIUMINT(9) NOT NULL AUTO_INCREMENT PRIMARY KEY,";
			$query .="image_url TEXT NOT NULL,";
			$query .="image_alt TEXT,";
			$query .="link_url TEXT,";
			$query .="open_new_tab TINYINT(1) DEFAULT 0,";
			$query .="insert_element_class TINYTEXT,";
			$query .="insert_element_id TINYTEXT,";
			$query .="how_display TINYTEXT,";
			$query .="filter_category TINYINT(1) DEFAULT 0,";
			$query .="category_id BIGINT(20),";
			$query .="register_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',";
			$query .="update_date DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',";
			$query .="UNIQUE KEY id(id)";
			$query .=") " . $charaset_collate;
			
			dbDelta( $query );
		}
	}
	/**
	* Insert Post.
	*
	* @version 1.0.0
	* @since 1.0.0
	* @param array $post
	*/
	public function insert_options ( array $post ) {
		var_dump( $post );
	}
	
}