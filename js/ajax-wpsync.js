jQuery(document).ready( function($) {

	$("#wp-admin-bar-support-wpsync span").click( function(event) {
		var data = {
			_ajax_nonce: wpsync_ajax_obj.nonce,
			action: 'wpsync_action',
			post_var: 'this will be echoed back'
		};

		$.post(wpsync_ajax_obj.ajaxurl, data, function(response) {
			alert(response);
		} );
	 	return false;
	});

});