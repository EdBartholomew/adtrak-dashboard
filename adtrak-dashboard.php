<?php

/*
Plugin Name: Adtrak Dashboard
Description: A standalone plugin variant of the Adtrak custom WordPress dashboard.
Version: 1.0.0
Author: Adtrak
Author URI: https://adtrak.co.uk
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.txt
*/

// If this file is called directly, abort
if (!defined('WPINC')) {
	die;
};

class adtrak_dashboard {

	public $version = 'v1.0.0';

	function __construct() {
		add_action('admin_menu', array(&$this, 'register_menu'));
		add_action('load-index.php', array(&$this, 'redirect_dashboard'));
		add_action('admin_head', array(&$this, 'remove_menu'));
		add_action('plugins_loaded', array(&$this, 'github_updater'));
	}

	// GitHub updater
	function github_updater() {
		require __DIR__ . '/vendor/yahnis-elsts/plugin-update-checker/plugin-update-checker.php';
		$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
			'https://github.com/EdBartholomew/adtrak-dashboard',
			__FILE__,
			'adtrak-dashboard'
		);
		$myUpdateChecker->setBranch('master');
	}

	// Helper function to return svgs from the sprite
	function sprite($svg) {
		return '<svg><use href="' . plugin_dir_url(__FILE__) . '/assets/images/sprite.svg#' . $svg . '"></use></svg>';
	}

	// Create the links for the 'Quick Links' section
	function quick_links() {
		// Get theme folder name
		$theme_directory_path = get_template_directory();
		$patten = '([^\/]+$)';
		preg_match($patten, $theme_directory_path, $match);
		$theme_directory_name = $match[0];

		// Create Salesforce search query
		$salesforce_json = file_get_contents(__DIR__ . '/assets/json/salesforce.json');
		$salesforce_search_array = json_decode($salesforce_json, true);
		$salesforce_search_array['attributes']['term'] = get_bloginfo('name');
		$salesforce_search_array_json_encoded = json_encode($salesforce_search_array);
		$salesforce_search_array_base64_encoded = base64_encode($salesforce_search_array_json_encoded);

		// Return links as an array
		return array(
			'deployhq'  => 'https://deploy.adtrakdev.com/projects/' . $theme_directory_name . '/overview',
			'gitlab' => 'https://gitlab.com/adtrak-web/' . $theme_directory_name,
			'salesforce' => 'https://adtrak.lightning.force.com/one/one.app#' . $salesforce_search_array_base64_encoded,
		);
	}

	// Redirect the default dashboard to the custom one
	function redirect_dashboard() {
		if (is_admin()) {
			$screen = get_current_screen();
			if ($screen->base == 'dashboard') {
				wp_redirect(admin_url('index.php?page=adtrak-dashboard'));
			}
		}
	}

	// Register the custom dashbord page and call the 'create_dashboard' function
	function register_menu() {
		add_dashboard_page('Dashboard', 'Dashboard', 'read', 'adtrak-dashboard', array(&$this, 'create_dashboard'));
	}

	// Remove the custom dashbord from the menu as it will be accessed via the redirect
	function remove_menu() {
		remove_submenu_page('index.php', 'adtrak-dashboard');
	}

	// Require the code for the front-end of the plugin
	function create_dashboard() {
		require_once __DIR__ . '/assets/php/layout.php';
	}

};

new adtrak_dashboard();