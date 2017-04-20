(function($) {

    'use strict';
    
    $(function() {
        var $preview, $editor;

        $preview = $('#afa-post-notice-preview');
        $editor = $('textarea[name="afa-post-notice-display-editor"]');

        $preview.html($editor.val());

        $editor.on('keyup', function(evt) {
            $preview.html($(this).val());
        });
    });

})(jQuery);
