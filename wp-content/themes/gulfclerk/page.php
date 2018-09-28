<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package GulfClerk
 */

get_header(); 

$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
$service_category = get_field('service_category');

?>

	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="text-area" class="col res-34 ph-1 fleft">
            <?php if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb('<p id="breadcrumbs">','</p>');
			} ?>
                <?php 
                
                $post = get_post($id); 
                $content = apply_filters('the_content', $post->post_content); 
                echo $content;  
                
                ?>
            </div>
            
            <?php get_sidebar(); ?>
    		<div class="clear"></div>
        </main><!-- #main -->
    </div><!-- #primary -->

	</div>
    <div id="mid" class="container" >
		<div id="content" class="site-content row">

<?php get_footer(); ?>
