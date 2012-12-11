<?php

//////////////////////////////////////////////////////////////////
// Theme code ////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

// Register scripts/styles with the proper authorities
 
add_action( 'wp_enqueue_scripts', 'theme_styles' ); // Front
add_action( 'admin_enqueue_scripts', 'admin_styles' ); // Back

add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Front
add_action( 'admin_enqueue_scripts', 'admin_scripts' ); // Back

// Register menus

add_action( 'init', 'main_menus' );

//////////////////////////////////////////////////////////////////
// Theme functions ///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////

// WP action functions

function main_menus () {

  	register_nav_menus(
    	array( 'main-navigation' => __( 'Main Navigation' ) )
	);

}

function theme_styles () {

	wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/css/fonts.css' );
	wp_enqueue_style( 'style-main', get_stylesheet_directory_uri() . '/style.css' );

}

function admin_styles () {
	//wp_enqueue_style( 'style-main' );
}

function theme_scripts () {

	wp_enqueue_script( 'jquery-local', get_template_directory_uri() . '/js/jquery-1.8.3.min.js' );
	//wp_enqueue_script( 'jquery-mobile', get_template_directory_uri() . '/js/jquery.mobile-1.2.0.min.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'js-main', get_template_directory_uri() . '/js/main.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBxK-OTkhR7AXxyzaRCbuFhzmVBTHhmOrs&sensor=false' );
	wp_enqueue_script( 'google-maps', get_template_directory_uri() . '/js/gmaps.js', array( 'google-maps-api', 'jquery-local' ) );
	wp_enqueue_script( 'infobox', get_template_directory_uri() . '/js/infobox.js', array( 'google-maps' ) );
	wp_enqueue_script( 'flot', get_template_directory_uri() . '/js/jquery.flot.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'jquery-colorhelpers', get_template_directory_uri() . '/js/jquery.colorhelpers.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-categories', get_template_directory_uri() . '/js/jquery.flot.categories.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-crosshair', get_template_directory_uri() . '/js/jquery.flot.crosshair.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-errorbars', get_template_directory_uri() . '/js/jquery.flot.errorbars.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-fillbetween', get_template_directory_uri() . '/js/jquery.flot.fillbetween.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-image', get_template_directory_uri() . '/js/jquery.flot.image.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-navigate', get_template_directory_uri() . '/js/jquery.flot.navigate.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-pie', get_template_directory_uri() . '/js/jquery.flot.pie.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-resize', get_template_directory_uri() . '/js/jquery.flot.resize.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-selection', get_template_directory_uri() . '/js/jquery.flot.selection.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-stack', get_template_directory_uri() . '/js/jquery.flot.stack.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-symbol', get_template_directory_uri() . '/js/jquery.flot.symbol.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-threshold', get_template_directory_uri() . '/js/jquery.flot.threshold.js', array( 'jquery-local' ) );
	wp_enqueue_script( 'flot-time', get_template_directory_uri() . '/js/jquery.flot.time.js', array( 'jquery-local' ) );

}

function admin_scripts () {

	wp_enqueue_script( 'jquery-local', get_template_directory_uri() . '/js/jquery-1.8.3.min.js' );

}

// Helper functions

function detect_mobile ( $return_info = false ) { // Pass true if more specific info is needed

	$user_agents = $_SERVER['HTTP_USER_AGENT'];
	$is_mobile = false;
	$mobile_info = new stdClass();

	// Check for various mobile types in user agents
	// Other checks will be performed by js

	// Start just by just determining if this is mobile (phone and tablet) or not
	if ( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino|android|ipad|playbook|silk/i', $user_agents ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $user_agents, 0, 4 ) ) ) {
		$is_mobile = true;
		$mobile_info->is_mobile = true;

		// Next, check if this is a phone or not
		if ( preg_match( '/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $user_agents ) || preg_match( '/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr( $user_agents, 0, 4 ) ) )
			$mobile_info->is_phone = true;

		// Then run some more specific checks, might come in handy.
		// First check browser type
		if ( preg_match( '/android/i', $user_agents ) ) // Android device
			$mobile_info->os = 'android';
	
		if ( preg_match( '/ip(ad|hone|od)/i', $user_agents ) ) // iOS device
			$mobile_info->os = 'ios';

		if ( preg_match( "/windows\snt/i", $user_agents ) ) // Microsoft device
			$mobile_info->os = 'microsoft';

		if ( preg_match( '/blackberry/i', $user_agents ) || preg_match( '/rim/i', $user_agents ) || preg_match( '/playbook/i', $user_agents ) ) // Microsoft device
			$mobile_info->os = 'blackberry';

		// Next check for specific devices.  This is not an exhaustive list by any means,
		// it's just meant to knock out the big targets

		if ( preg_match( '/iphone/i', $user_agents ) ) // iPhone
			$mobile_info->device = 'iphone';

		if ( preg_match( '/ipad/i', $user_agents ) ) // iPad
			$mobile_info->device = 'ipad';

		if ( preg_match( '/ipod/i', $user_agents ) ) // iPod
			$mobile_info->device = 'ipod';

		if ( preg_match( "/nexus\s7/i", $user_agents ) ) // Nexus 7
			$mobile_info->device = 'nexus7';

		if ( preg_match( '/playbook/i', $user_agents ) ) // PlayBook
			$mobile_info->device = 'playbook';

		if ( preg_match( '/kindle/i', $user_agents ) ) // Kindle
			$mobile_info->device = 'kindle';

		if ( preg_match( '/nook/i', $user_agents ) ) // Nook
			$mobile_info->device = 'nook';

		if ( preg_match( '/palm/i', $user_agents ) ) // Palm.  Hey, could still happen
			$mobile_info->device = 'palm';

		// Add more specific devices to the list if necessary
	}

	return $return_info ? ( $is_mobile ? $mobile_info : false ) : $is_mobile;

}

?>