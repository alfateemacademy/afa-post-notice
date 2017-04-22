<div id="afa-post-notice-preview"></div>

<textarea name="afa-post-notice-display-editor"><?php echo get_post_meta( get_the_ID(), 'afa-post-notice-display', true); ?></textarea>
<?php wp_nonce_field( 'afa-unique-nonce-key', 'afa-post-notice-nonce' ); ?>