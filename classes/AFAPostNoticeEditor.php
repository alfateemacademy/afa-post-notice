<?php

class AFAPostNoticeEditor  {
	
	public function initialize() {
		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_post_notice' ) );
	}

	function add_meta_box() {

		$screen = get_current_screen();

		add_meta_box(
			'afa-post-notice',
			'Post Notice',
			array( $this, 'post_notice_display' ),
			$screen->id,
			'normal',
			'high'
		);
	}

	public function post_notice_display() {
		require_once (WP_PLUGIN_DIR . '/afa-post-notice/views/afa-post-notice-display.php');
	}

	public function save_post_notice($post_id) {
		
		if ( ! $this->user_can_save( $post_id ) ) {
			return;
		}

		$post_notice = $_POST[ 'afa-post-notice-display-editor' ];
		update_post_meta( $post_id, 'afa-post-notice-display', $post_notice );
	}

	public function user_can_save($post_id) {
		$is_autosave = wp_is_post_autosave( $post_id );
		$is_revision = wp_is_post_revision( $post_id );

		return ! ( $is_autosave || $is_revision );
	}

}