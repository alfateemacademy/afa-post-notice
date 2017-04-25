<div>
    <h2>Post Notice Settings</h2>
    <form action="options.php" method="post">
        <?php settings_fields('afa-post-notice-option'); ?>
        <?php do_settings_sections('afa-post-notice-option'); ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Select Screen</th>
                <td>
                	<?php $post_types = get_post_types(array('public' => true)); ?>
                	<?php $screens = get_option('post_notice_screens'); ?>
	                <select name="post_notice_screens[]" id="" multiple="multiple">
	                	<?php foreach($post_types as $postType) : ?>
							<option 
							<?php echo ($screens && in_array($postType, $screens) ) ? 'selected="selected"' : null; ?>
							value="<?php echo $postType; ?>"
							><?php echo $postType; ?></option>
	                	<?php endforeach; ?>
	                </select>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Where To Show</th>
                <td>
                <?php $beforeToShow = get_option('where_to_show'); ?>
                	<input type="radio" name="where_to_show" value="before" <?php echo ($beforeToShow == 'before') ? 'checked="checkded"' : null; ?>> Before <br>
                	<input type="radio" name="where_to_show" value="after" <?php echo ($beforeToShow == 'after') ? 'checked="checkded"' : null; ?>> After
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>