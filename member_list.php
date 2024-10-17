<?php

/**
 * Plugin Name: Team
 * Description: A custom menu page for managing Luna's Libations beverage offerings.
 * Version: 1.0
 * Author: Farhan Sadik
 * Author URI: https://yourwebsite.com
 */

// Hook for plugin activation

register_activation_hook(__FILE__, 'member_activetion');

function member_activetion() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'member_list_table';
    $charset_collate = $wpdb->get_charset_collate();

    // Check if the function exists
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    // SQL to create the table
    $member_table_query = "CREATE TABLE $table_name (
        `id` mediumint(9) NOT NULL AUTO_INCREMENT,
        `name` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `phone` varchar(11) NOT NULL,
        `address` varchar(255) NOT NULL,
        `created_at` datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate";

    // Execute the SQL query
    dbDelta($member_table_query);
}


register_deactivation_hook(__FILE__, 'member_deactivetion');

function member_deactivetion() {
    global $wpdb;

    $table_name = $wpdb->prefix . 'member_list_table';

    // SQL to drop the table
    $drop_table_query = "DROP TABLE IF EXISTS $table_name;";

    // Execute the SQL query
    $wpdb->query($drop_table_query);
}


add_action("admin_menu","admin_menu_function_callback");

function admin_menu_function_callback() {
    add_menu_page("View all member","View All Member","manage_options","view-all-member","view_all_member");
    add_submenu_page("view-all-member","add new member","Add New Member","manage_options","add-new-member", "add_new_member");
}



function view_all_member(){
    require plugin_dir_path(__FILE__) . 'view_all_member_info.php';   
}


function add_new_member(){
    require plugin_dir_path(__FILE__) . 'add_member_list.php'; 
}


//add shortcode in plugin
//[member-lsit]
add_shortcode("member-lsit" , "member_list_callback_function");

function member_list_callback_function(){
   require plugin_dir_path(__FILE__) . 'shorcode_for_plugin.php'; 
}
  

?>