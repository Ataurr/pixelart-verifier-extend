<?php

function px_support_custom_role($bbp_roles) {

	$arr = array(

		// Primary caps
		'spectate' => true,
		'participate' => true,
		'moderate' => false,
		'throttle' => false,
		'view_trash' => false,

		// Forum caps
		'publish_forums' => false,
		'edit_forums' => false,
		'edit_others_forums' => false,
		'delete_forums' => false,
		'delete_others_forums' => false,
		'read_private_forums' => true,
		'read_hidden_forums' => false,

		// Topic caps
		'publish_topics' => true,
		'edit_topics' => true,
		'edit_others_topics' => false,
		'delete_topics' => false,
		'delete_others_topics' => false,
		'read_private_topics' => true,

		// Reply caps
		'publish_replies' => true,
		'edit_replies' => true,
		'edit_others_replies' => false,
		'delete_replies' => false,
		'delete_others_replies' => false,
		'read_private_replies' => true,

		// Topic tag caps
		'manage_topic_tags' => false,
		'edit_topic_tags' => false,
		'delete_topic_tags' => false,
		'assign_topic_tags' => true
	);

	foreach(px_verify_globals(2) as $key=>$value) {
		$bbp_roles[$key] = array( 'name' => $value, 'capabilities' => bbp_get_caps_for_role($arr) );
	}
/*
	$bbp_roles['px_wpba_customer'] = array( 'name' => 'WPBA Customer', 'capabilities' => bbp_get_caps_for_role($arr) );
	$bbp_roles['px_wpgcm_customer'] = array( 'name' => 'WP GCM Customer', 'capabilities' => bbp_get_caps_for_role($arr) );
*/
	return $bbp_roles;
}


function px_verifier_bulk_footer() {
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('<option>').val('refactor_forum_roles').text('Refactor Forum Roles').appendTo("select[name='action'], select[name='action2']");
        });
    </script>
    <?php
}


function px_verifier_bulk_refactor_roles() {
	$users = get_users('role=participant');
	foreach($users as $user) {
		$id = $user->id;
		$item = get_the_author_meta('px_envato_item', $id);

		$pxarr1 = px_verify_globals(1);
		$pxarr2 = px_verify_globals(2);
		$pxarr2 = array_keys($pxarr2);

		if($item == $pxarr1['item1'] ) {
			wp_update_user(array('ID' => $id, 'role' => $pxarr2[0]));

		}else if($item == $pxarr1['item2']) {
			wp_update_user(array('ID' => $id, 'role' => $pxarr2[1]));

		}
	}
}


function px_verified_check_user_topic($have_posts){
	if(is_user_logged_in()) {
		global $wp_roles;
		$current_user = wp_get_current_user();
		$roles = $current_user->roles;
		$role = array_shift($roles);
		$forum_name = single_post_title('', false);

		if($role == 'bbp_keymaster' || $role == 'bbp_moderator' || $role == 'administrator' || $role == 'editor') {

		}else if($role == 'px_dwp_customer' && $forum_name == 'Doors - Parallax Responsive One Page wordpress theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_startup_customer' && $forum_name == 'Startup Landing Page Template With Page Builder' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_wowhtml_customer' && $forum_name == 'WOW Landing Page Template with Page Builder' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_wowwp_customer' && $forum_name == 'Wow Multi Concept One Page WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_xmobile_customer' && $forum_name == 'Xmobile - Landing Page WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_onevent_customer' && $forum_name == 'OnEvent - Special Event WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_carrental_customer' && $forum_name == 'Car Rental WordPress Theme Landing Page' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_wellness_customer' && $forum_name == 'WellnessCenter Beauty Spa WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_book_customer' && $forum_name == 'Book - Responsive Ebook Landing Page WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_Accomo_customer' && $forum_name == 'Accommodation Hotel Resorts Booking WordPress Theme' || $forum_name == 'Special Threads from us') {
		}else if($role == 'px_harmony_customer' && $forum_name == 'Harmony Yoga Spa Html Template' || $forum_name == 'Special Threads from us') {

		}else {
				echo '<div class="bbp-template-notice"><p>Sorry, but you do not have the capability to view this forum</p></div>';
				echo '<div class="bbp-template-notice warning"><h4>Only Purchase item user can view this topic</h4></div>';
			return $have_posts = null;
		}

		return $have_posts;

  }else {
		echo '<div class="bbp-template-notice"><p>Sorry, but you do not have the capability to view this topic</p></div>';
		return $have_posts = null;
	}
}


function px_verified_check_user_replies($have_posts){
    if(is_user_logged_in()) {
	/*	global $wp_roles;
		$current_user = wp_get_current_user();
		$roles = $current_user->roles;
		$role = array_shift($roles);

		if(bb_is_forum()) {
			$trail_forum = bb_get_forum(get_forum_id());
			$forum_name = get_forum_name($trail_forum->forum_id);

			if($role == 'bbp_keymaster' || $role == 'bbp_moderator' || $role == 'administrator' || $role == 'editor') {

			}else if($role == 'px_wpba_customer' && $forum_name == 'WordPress Blog Android App' || $forum_name == 'WP Google Cloud Messaging' || $forum_name == 'Special Threads from us') {

			}else if($role == 'px_wpgcm_customer' && $forum_name == 'WP Google Cloud Messaging' || $forum_name == 'Special Threads from us') {
			}

		}else {
 			echo '<div class="bbp-template-notice"><p>Sorry, but you do not have the capability to view this forum</p></div>';
			return $have_posts = null;
		}
		*/
		return $have_posts;
    }else {
		echo '<div class="bbp-template-notice"><p>Sorry, but you do not have the capability to view this topic</p></div>';
		return $have_posts = null;
	}
}


function px_verifier_custom_registration($user_id, $verify) {
	$pxarr1 = px_verify_globals(1);
	$pxarr2 = px_verify_globals(2);
	$pxarr2 = array_keys($pxarr2);

	if($verify['px_envato_item'] == $pxarr1['item1'] ) {
		wp_update_user(array('ID' => $user_id, 'role' => $pxarr2[0]));

	}else if($verify['px_envato_item'] == $pxarr1['item2']) {
		wp_update_user(array('ID' => $user_id, 'role' => $pxarr2[1]));

	}else {
		wp_update_user(array('ID' => $user_id, 'role' => 'bbp_blocked'));
	}
}



add_filter('bbp_has_topics', 'px_verified_check_user_topic');
// add_filter('bbp_has_forums', 'px_verified_check_user');
add_filter('bbp_has_replies', 'px_verified_check_user_replies');
add_filter('bbp_get_dynamic_roles', 'px_support_custom_role', 1);

add_action('admin_footer-users.php', 'px_verifier_bulk_footer');
add_action('admin_action_refactor_forum_roles', 'px_verifier_bulk_refactor_roles');
add_action('px_verifier_user_registration', 'px_verifier_custom_registration', 10, 2);
?>
