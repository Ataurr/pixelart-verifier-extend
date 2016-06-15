<?php
/**
Plugin Name: Pixelart Verifier
Plugin URI: http://pixelartdev.com
Description: Registration form with envato market purchase verification, and also saves the user information for later use
Version: 1.1.0
Author: Deniz Celebi (Pixelart)
Author URI: http://pixelartdev.com
**/


/** Prevent direct access **/
if ( !defined( 'ABSPATH' ) ) exit;

$plugin_path;
$dir = px_verify_dir();

@include_once "$dir/login.php";
@include_once "$dir/admin.php";
@include_once "$dir/bp-custom.php";
@include_once "$dir/users.php";

// Addons
$files = scandir("$dir/addons");
foreach($files as $file) {
	if ($file != "." && $file != ".." && strtolower(substr($file, strrpos($file, '.') + 1)) == 'php') {
		@include_once "$dir/addons/$file";
	}
}



function px_verify_dir() {
  if (defined('PX_VERIFY_DIR') && file_exists(PX_VERIFY_DIR)) {
    return PX_VERIFY_DIR;
  }else {
    return dirname(__FILE__);
  }
}

function px_verify_info() {
	global $dir;
	$plugin_path = plugin_dir_path($dir);
}

// define here your item names, roles, and role names
function px_verify_globals($item) {
	if($item == "1") {
		$pxverifyitem = array (
			'item1' => 'Doors - Parallax Responsive One Page wordpress theme',
			'item2' => 'WOW Landing Page Template with Page Builder',
			'item3' => 'Wow Multi Concept One Page WordPress Theme',
			'item4' => 'Xmobile - Landing Page WordPress Theme',
			'item5' => 'OnEvent - Special Event WordPress Theme',
			'item6' => 'Car Rental WordPress Theme Landing Page',
			'item7' => 'WellnessCenter Beauty Spa WordPress Theme',
			'item8' => 'Book - Responsive Ebook Landing Page WordPress Theme',
			'item9' => 'Accommodation Hotel Resorts Booking WordPress Theme',
			'item10' => 'Harmony Yoga Spa Html Template',
			'item11' => 'Startup Landing Page Template With Page Builder',
		);
		return $pxverifyitem;

	}else if($item == "2") {
		$pxverifyrole = array (
			'px_dwp_customer' => 'DWP Customer',
			'px_wowhtml_customer' => 'WOW HTML Customer',
			'px_wowwp_customer' => 'WOW WP Customer',
			'px_xmobile_customer' => 'Xmobile Wp Customer',
			'px_onevent_customer' => 'OnEvent WP Customer',
			'px_carrental_customer' => 'Car Rental wp Customer',
			'px_wellness_customer' => 'Wellness WP Customer',
			'px_book_customer' => 'book WP Customer',
			'px_Accomo_customer' => 'Accomo WP Customer',
			'px_harmony_customer' => 'Harmony html Customer',
			'px_startup_customer' => 'Startup HTML Customer',
		);
		return $pxverifyrole;
	}
}


add_action('parse_query', 'px_verify_globals');

?>
