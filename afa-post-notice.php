<?php
/**
 * Plugin Name: AFA Post Notice
 * Plugin URI: http://www.alfateemacademy.com
 * Description: This is my post notice description.
 * Version: 0.1.0
 * Author: Al-Fateem Academy
 * Author URI: http://www.alfateemacademy.com
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once (plugin_dir_path(__FILE__) . 'classes/AFAPostNoticeDisplay.php');
require_once (plugin_dir_path(__FILE__) . 'classes/AFAPostNoticeEditor.php');
require_once (plugin_dir_path(__FILE__) . 'classes/AFAPostNotice.php');

function start_plugin() {

	if( is_admin() ) {
		$postNoticeEditor = new AFAPostNoticeEditor();
		$postNotice = new AFA_Post_Notice($postNoticeEditor);
	} else {
		$postNotice = new AFA_Post_Notice_Display();
	}

	$postNotice->initialize();
}

start_plugin();