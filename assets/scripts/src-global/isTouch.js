/**
 * JS mobile detection.
 */
; ( function() {

	/**
	 * Is this a touch enabled device or not?
	 *
	 * @return boolean
	 */
	var is_touch_device = function() {

		return ( ( 'ontouchstart' in window ) || ( navigator.MaxTouchPoints > 0 ) || ( navigator.msMaxTouchPoints > 0 ) );

	};

	window.gladiador = window.gladiador || {};

	window.gladiador.is_touch_device = is_touch_device;

} )();
