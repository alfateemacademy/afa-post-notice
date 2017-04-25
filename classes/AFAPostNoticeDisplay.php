<?php

class AFA_Post_Notice_Display {
	
	public function initialize() {
		add_filter('the_content', array($this, 'display_notice'));
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		
	}

	public function display_notice($content) {
		$post_notice = get_post_meta( get_the_ID(), 'afa-post-notice-display', true );

		if ( $post_notice != '' ) {

			$whereToShow = get_option('where_to_show');
			$notice_html = '<div class="afa-post-notice-display">' . $post_notice . '</div>';

			if($whereToShow == 'before' && $whereToShow == '') {
				$content = $notice_html . $content;
			} else {
				$content = $content . $notice_html;
			}


		}

		return $content;
	}

	public function enqueue_styles() {
		wp_enqueue_style(
			'afa-post-notice-display',
			plugins_url( 'afa-post-notice/assets/css/public.css' ),
			array(),
			'0.1.0'
		);
	}

}