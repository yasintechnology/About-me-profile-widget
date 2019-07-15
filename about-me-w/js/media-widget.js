jQuery(document).ready(function($){

    $('.custom_media_button').click(function(e) {

        var mediaUploader;
        e.preventDefault();
            if (mediaUploader) {
            mediaUploader.open();
            return;
        }
        mediaUploader = wp.media.frames.file_frame = wp.media({
            title: 'Choose Image',
            button: {
            text: 'Choose Image'
        }, multiple: false });
        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('.custom_media_url').val(attachment.url); 
			jQuery('.custom_media_image_preview').attr('src',attachment.url);
        });
        mediaUploader.open();
    });
	
	
	
	
});