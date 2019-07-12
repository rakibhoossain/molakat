( function( $ ) {
	/**
	 * Run function when customizer is ready.
	 */
	wp.customize.bind('ready', function () {
		wp.customize.control('butterfly_top_post_type', function (control) {
			/**
			 * Run function on setting change of control.
			 */
			control.setting.bind(function (value) {
				switch (value) {
					/**
					 * The select was switched to the hide option.
					 */
					case 'post':
						/**
						 * Deactivate the conditional control.
						 */
						wp.customize.control('butterfly_top_post').activate();
						wp.customize.control('butterfly_top_page').deactivate();
						break;
					/**
					 * The select was switched to »show«.
					 */
					case 'page':
						/**
						 * Activate the conditional control.
						 */
						wp.customize.control('butterfly_top_page').activate();
						wp.customize.control('butterfly_top_post').deactivate();
						break;
				}
			});
		});


	});
} )( jQuery );
