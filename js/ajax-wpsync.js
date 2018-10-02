jQuery(document).ready( function($) {

	$('#wpsync-go').click( function(event) {
		var $btn = $( this );
		$btn.html( 'Running...' );
		$btn.prop( 'disabled', true );
		var data = {
			_ajax_nonce: wpsync_ajax_obj.nonce,
			action: 'wpsync_action',
		};

		$.post( wpsync_ajax_obj.ajaxurl, data, function(response) {
			$('#wpsync-results').append(response);
			var $btn = $('#wpsync-go');
			$btn.html('Retry');
			$btn.prop( 'disabled', false );
		} );
	 	return false;
	} );

});