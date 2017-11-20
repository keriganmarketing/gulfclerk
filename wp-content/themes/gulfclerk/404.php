<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package GulfClerk
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="text-area" class="col res-34 ph-1 fleft">
				<h1 class="page-title"><?php _e( '404 Page Not Found', 'gulfclerk' ); ?></h1>

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Try a search below or <a href="/">return to the home page</a>.', 'gulfclerk' ); ?></p>

					<?php get_search_form(); ?>

					
				
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
            
            <?php get_sidebar(); ?>
    		<div class="clear"></div>

		</main><!-- #main -->
	</div><!-- #primary -->

	</div>
    <div id="mid" class="container" >
		<div id="content" class="site-content row">
<?php get_footer(); ?>
