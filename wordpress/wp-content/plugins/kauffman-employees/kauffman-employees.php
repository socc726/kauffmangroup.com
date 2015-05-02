<?php
/*
Plugin Name: Kauffman Employees
Plugin URI: http://thekgi.com
Description: An employee plugin
Version: 1.0
Author: Sam Merrill
Author URI: http://www.nenvy.com
License: GPL2
*/
/*
Copyright 2015 Sam Merrill
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('Kauffman_Employees'))
{
    class Kauffman_Employees
    {
        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // register actions
            add_action('admin_init', array(&$this, 'admin_init'));
            add_action('admin_menu', array(&$this, 'add_menu'));
            require_once(sprintf("%s/post-types/Employee.php", dirname(__FILE__)));
            $Employee = new Employee();
        } // END public function __construct
    
        /**
         * Activate the plugin
         */
        public static function activate()
        {
            // Do nothing
        } // END public static function activate
    
        /**
         * Deactivate the plugin
         */     
        public static function deactivate()
        {
            // Do nothing
        } // END public static function deactivate
        public function admin_init()
        {
            $this->init_settings();
        }
        /**
         * Initialize some custom settings
         */     
        public function init_settings()
        {
            // register the settings for this plugin
            register_setting('kauffman_employees-group', 'setting_a');
            register_setting('kauffman_employees-group', 'setting_b');
        } // END public function init_custom_settings()
        /**
         * add a menu
         */     
        public function add_menu()
        {
            add_options_page('Kauffman Employees Settings', 'Kauffman Employees', 'manage_options', 'kauffman_employees', array(&$this, 'plugin_settings_page'));
        } // END public function add_menu()
        /**
         * Menu Callback
         */     
        public function plugin_settings_page()
        {
            if(!current_user_can('manage_options'))
            {
                wp_die(__('You do not have sufficient permissions to access this page.'));
            }
            // Render the settings template
            include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
        } // END public function plugin_settings_page()     
    } // END class Kauffman_Employees
} // END if(!class_exists('Kauffman_Employees'))
if(class_exists('Kauffman_Employees'))
{
    // Installation and uninstallation hooks
    register_activation_hook(__FILE__, array('Kauffman_Employees', 'activate'));
    register_deactivation_hook(__FILE__, array('Kauffman_Employees', 'deactivate'));
    // instantiate the plugin class
    $kauffman_employees = new Kauffman_Employees();
    if(isset($kauffman_employees))
    {
        // Add the settings link to the plugins page
        function plugin_settings_link($links)
        { 
            $settings_link = '<a href="options-general.php?page=kauffman_employees">Settings</a>'; 
            array_unshift($links, $settings_link); 
            return $links; 
        }
        $plugin = plugin_basename(__FILE__); 
        add_filter("plugin_action_links_$plugin", 'plugin_settings_link');
    }
}