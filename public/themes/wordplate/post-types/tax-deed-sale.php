<?php

/**
 * Registers the `tax_deed_sale` post type.
 */
function tax_deed_sale_init() {
	register_post_type( 'tax-deed-sale', array(
		'labels'                => array(
			'name'                  => __( 'Tax Deed Sales', 'wordplate' ),
			'singular_name'         => __( 'Tax Deed Sale', 'wordplate' ),
			'all_items'             => __( 'All Tax Deed Sales', 'wordplate' ),
			'archives'              => __( 'Tax Deed Sale Archives', 'wordplate' ),
			'attributes'            => __( 'Tax Deed Sale Attributes', 'wordplate' ),
			'insert_into_item'      => __( 'Insert into Tax Deed Sale', 'wordplate' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Tax Deed Sale', 'wordplate' ),
			'featured_image'        => _x( 'Featured Image', 'tax-deed-sale', 'wordplate' ),
			'set_featured_image'    => _x( 'Set featured image', 'tax-deed-sale', 'wordplate' ),
			'remove_featured_image' => _x( 'Remove featured image', 'tax-deed-sale', 'wordplate' ),
			'use_featured_image'    => _x( 'Use as featured image', 'tax-deed-sale', 'wordplate' ),
			'filter_items_list'     => __( 'Filter Tax Deed Sales list', 'wordplate' ),
			'items_list_navigation' => __( 'Tax Deed Sales list navigation', 'wordplate' ),
			'items_list'            => __( 'Tax Deed Sales list', 'wordplate' ),
			'new_item'              => __( 'New Tax Deed Sale', 'wordplate' ),
			'add_new'               => __( 'Add New', 'wordplate' ),
			'add_new_item'          => __( 'Add New Tax Deed Sale', 'wordplate' ),
			'edit_item'             => __( 'Edit Tax Deed Sale', 'wordplate' ),
			'view_item'             => __( 'View Tax Deed Sale', 'wordplate' ),
			'view_items'            => __( 'View Tax Deed Sales', 'wordplate' ),
			'search_items'          => __( 'Search Tax Deed Sales', 'wordplate' ),
			'not_found'             => __( 'No Tax Deed Sales found', 'wordplate' ),
			'not_found_in_trash'    => __( 'No Tax Deed Sales found in trash', 'wordplate' ),
			'parent_item_colon'     => __( 'Parent Tax Deed Sale:', 'wordplate' ),
			'menu_name'             => __( 'Tax Deed Sales', 'wordplate' ),
		),
		'public'                => true,
		'hierarchical'          => false,
		'show_ui'               => true,
		'show_in_nav_menus'     => true,
		'supports'              => array( 'title', 'editor' ),
		'has_archive'           => true,
		'rewrite'               => true,
		'query_var'             => true,
		'menu_icon'             => 'dashicons-format-aside',
		'show_in_rest'          => true,
		'rest_base'             => 'tax-deed-sale',
		'rest_controller_class' => 'WP_REST_Posts_Controller',
	) );

}
add_action( 'init', 'tax_deed_sale_init' );

/**
 * Sets the post updated messages for the `tax_deed_sale` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `tax_deed_sale` post type.
 */
function tax_deed_sale_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['tax-deed-sale'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Tax Deed Sale updated. <a target="_blank" href="%s">View Tax Deed Sale</a>', 'wordplate' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'wordplate' ),
		3  => __( 'Custom field deleted.', 'wordplate' ),
		4  => __( 'Tax Deed Sale updated.', 'wordplate' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Tax Deed Sale restored to revision from %s', 'wordplate' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Tax Deed Sale published. <a href="%s">View Tax Deed Sale</a>', 'wordplate' ), esc_url( $permalink ) ),
		7  => __( 'Tax Deed Sale saved.', 'wordplate' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Tax Deed Sale submitted. <a target="_blank" href="%s">Preview Tax Deed Sale</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Tax Deed Sale scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Tax Deed Sale</a>', 'wordplate' ),
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Tax Deed Sale draft updated. <a target="_blank" href="%s">Preview Tax Deed Sale</a>', 'wordplate' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'tax_deed_sale_updated_messages' );
