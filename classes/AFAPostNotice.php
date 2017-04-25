<?php

class AFA_Post_Notice {

	public function __construct($editor) {
		$editor->initialize();
	}

	public function initialize() {
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_styles') );
		add_action( 'admin_enqueue_scripts', array($this, 'enqueue_scripts') );

		add_action('admin_menu', array($this, 'register_admin_page') );
		add_action('admin_init', array($this, 'register_plugin_settings_options') );
	}

	public function register_admin_page() { 
		add_options_page(
			'Post Notice Settings', // Title
			'AFA Post Notice',  // Name
			'manage_options',  // Capabilities
			'afa-post-notice', // Slug
			array($this, 'plugin_options_page') // Callback
		);
	}

	public function plugin_options_page() {
		require_once (WP_PLUGIN_DIR . '/afa-post-notice/views/afa-post-notice-options.php');
	}

	public function register_plugin_settings_options() {
		register_setting( 'afa-post-notice-option', 'post_notice_screens' );
		register_setting( 'afa-post-notice-option', 'where_to_show' );
	}


	public function enqueue_styles() {
		wp_enqueue_style(
			'afa-post-notice-admin',
			plugins_url( 'afa-post-notice/assets/css/admin.css' ),
			array(),
			'0.1.0'
		);
	}

	public function enqueue_scripts() {
		wp_enqueue_script(
			'afa-post-notice-admin',
			plugins_url( 'afa-post-notice/assets/js/admin.js' ),
			array('jquery'),
			'0.1.0'
		);
	}
}