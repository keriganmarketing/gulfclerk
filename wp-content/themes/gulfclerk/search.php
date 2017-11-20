<?php
/**
 * The template for displaying search results pages.
 *
 * @package GulfClerk
 */

get_header(); ?>

	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="text-area" class="col res-34 ph-1 fleft">
			<?php if ( have_posts() ) : ?>

			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'gulfclerk' ), '<span>' . get_search_query() . '</span>' ); ?></h1>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>


		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>
		
        </div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
        
		</main><!-- #main -->
	</div><!-- #primary -->

</div>
    <div id="mid" class="container" >
		<div id="content" class="site-content row">
<?php get_footer(); ?>
