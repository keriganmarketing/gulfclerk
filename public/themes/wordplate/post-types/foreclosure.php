<?php

/**
 * Registers the `foreclosure` post type.
 */
function foreclosure_init() {
	register_post_type( 'foreclosure', array(
		'labels'                => array(
			'name'                  => __( 'Foreclosures', 'wordplate' ),
			'singular_name'         => __( 'Foreclosure', 'wordplate' ),
			'all_items'             => __( 'All Foreclosures', 'wordplate' ),
			'archives'              => __( 'Foreclosure Archives', 'wordplate' ),
			'attributes'            => __( 'Foreclosure Attributes', 'wordplate' ),
			'insert_into_item'      => __( 'Insert into Foreclosure', 'wordplate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Foreclosure', 'wordplate' ),
			'featured_image'        => _x( 'Featured Image', 'foreclosure', 'wordplate' ),
			'set_featured_image'    => _x( 'Set featured image', 'foreclosure', 'wordplate' ),
			'remove_featured_image' => _x( 'Remove featured image', 'foreclosure', 'wordplate' ),
			'use_featured_image'    => _x( 'Use as featured image', 'foreclosure', 'wordplate' ),
			'filter_items_list'     => __( 'Filter Foreclosures list', 'wordplate' ),
			'items_list_navigation' => __( 'Foreclosures list navigation', 'wordplate' ),
			'items_list'            => __( 'Foreclosures list', 'wordplate' ),
			'new_item'              => __( 'New Foreclosure', 'wordplate' ),
			'add_new'               => __( 'Add New', 'wordplate' ),
			'add_new_item'          => __( 'Add New Foreclosure', 'wordplate' ),
			'edit_item'             => __( 'Edit Foreclosure', 'wordplate' ),
			'view_item'             => __( 'View Foreclosure', 'wordplate' ),
			'view_items'            => __( 'View Foreclosures', 'wordplate' ),
			'search_items'          => __( 'Search Foreclosures', 'wordplate' ),
			'not_found'             => __( 'No Foreclosures found', 'wordplate' ),
			'not_found_in_trash'    => __( 'No Foreclosures found in trash', 'wordplate' ),
			'parent_item_colon'     => __( 'Parent Foreclosure:', 'wordplate' ),
			'menu_name'             => __( 'Foreclosures', 'wordplate' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-admin-home',
		'show_in_rest'          => true,
		'rest_base'             => 'foreclosure',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'foreclosure_init' );

/**
 * Sets the post updated messages for the `foreclosure` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `foreclosure` post type.
 */
function foreclosure_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['foreclosure'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Foreclosure updated. <a target="_blank" href="%s">View Foreclosure</a>', 'wordplate' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wordplate' ),
		3  => __( 'Custom field deleted.', 'wordplate' ),
		4  => __( 'Foreclosure updated.', 'wordplate' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Foreclosure restored to revision from %s', 'wordplate' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Foreclosure published. <a href="%s">View Foreclosure</a>', 'wordplate' ), esc_url( $permalink ) ),
		7  => __( 'Foreclosure saved.', 'wordplate' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Foreclosure submitted. <a target="_blank" href="%s">Preview Foreclosure</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Foreclosure scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Foreclosure</a>', 'wordplate' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Foreclosure draft updated. <a target="_blank" href="%s">Preview Foreclosure</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'foreclosure_updated_messages' );



function getForeclosures(){
	$args = [
		'posts_per_page'   => -1,
		'orderby'          => 'meta_value',
		'order'            => 'ASC',
		'meta_key'         => 'date',
		'meta_value'       => '',
		'post_type'        => 'foreclosure',
		'post_status'      => 'publish' 
	];
		
	$foreclosures = get_posts( $args );
	$i = 1;
	$j = 0;
	foreach($foreclosures as $foreclosure){
		$id = $foreclosure->ID;
		$date = get_field('date',$id);
		$casenum = get_field('case_#',$id);
		$plaintiff = get_field('plaintiff',$id);
		$defendant = get_field('defendant',$id);
		$fjamount = get_field('fj_amount',$id);
		$book = get_field('book',$id);
		$page = get_field('page',$id);
		$status = get_field('status',$id);
		
		$checkdate = date('Ymd',strtotime($date));
		$todayminusone = date('Ymd',strtotime('-1 day'));

		$output = '';
		
		if(($checkdate >= $todayminusone) && ($status != 'unpublished')){
			$j++;
			$output .= '<div id="foreclosure-'.$i.'" class="table-responsive" >';
			$output .= '<table class="'.$status.' table" >';
			$output .= '<tr><td class="header" colspan="2">'.date('M j, Y', strtotime($date));
			if($status == 'cancelled' ){ echo ' - Canceled'; }
			$output .= '</td></tr>';
			$output .= '<tr><td class="label" width="150" >Case #</td><td>'.$casenum.'</td></tr>';
			$output .= '<tr><td class="label" >Plaintiff</td><td>'.$plaintiff.'</td></tr>';
			$output .= '<tr><td class="label" >Defendant</td><td>'.$defendant.'</td></tr>';
			$output .= '<tr><td class="label" >F/J Amount</td><td>'.$fjamount.'</td></tr>';
			if($status == 'active' ){
				$output .= '<tr><td class="label" >Legal Description</td><td>
				<form action="https://www3.myfloridacounty.com/ori/search.do" method="post" id="search_official_records" name="searchForm" target="_blank">
				<input type="hidden" name="locationType" value="COUNTY" >
				<input type="hidden" name="county" value="23" >
					<input type="hidden" name="startMonth" value="0">
					<input type="hidden" name="startDay" value="0">
					<input type="hidden" name="endMonth" value="0">
					<input type="hidden" name="endDay" value="0">
				<input type="hidden" name="documentTypes" value="LP" >
				<input type="hidden" name="percisesearchtype" value="b" >
				<input type="hidden" name="book" value="' .$book. '" >
				<input type="hidden" name="page" value="' .$page. '" >
				<input type="submit" value=" See Lis Pendens " name="submit" />
				</form></td></tr>';
			}
			$output .= '</table>';
			$output .= '</div>';
			$i++;
		}			
		
	}
	
	if($j=0){ $output .= '<p>There are currently no foreclosures scheduled.</p>'; }

	return $output;
}

add_shortcode( 'kma_foreclosures', 'getForeclosures' );
