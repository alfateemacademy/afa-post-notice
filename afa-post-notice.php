<?php
/**
 * Plugin Name: Post Notice
 * Plugin URI: http://www.alfateemacademy.com
 * Description: This is my post notice description.
 * Version: 0.1.0
 * Author: Al-Fateem Academy
 * Author URI: http://www.alfateemacademy.com
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

require_once (plugin_dir_path(__FILE__) . 'classes/AFAPostNoticeEditor.php');
require_once (plugin_dir_path(__FILE__) . 'classes/AFAPostNotice.php');

function start_plugin() {

	$postNoticeEditor = new AFAPostNoticeEditor();
	$postNoticeEditor->initialize();

	$start = new AFA_Post_Notice();
	$start->intialize();
}

start_plugin();