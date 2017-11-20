<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package GulfClerk
 */
 $building = get_field('building_photo',6);
 $stjoeaddr = get_field('port_st._joe_address',6);
 $wewaaddr = get_field('wewahitchka_address',6);
 $stjoeph1 = get_field('port_st._joe_phone_1',6);
 $stjoeph2 = get_field('port_st._joe_phone_2',6);
 $wewaph1 = get_field('wewahitchka_phone_1',6);
 $wewaph2 = get_field('wewahitchka_phone_2',6);
?>

	</div><!-- #content -->
	</div>
<div id="bot" class="container footer-content">
    <div id="footer-left" class="col res-23 tab-12 wide-1 ph-1">
        <div id="buildingphoto" class="col res-25 tab-13 wide-12 ph-1"><img src="<?php echo $building['url']; ?>" alt="<?php echo $building['alt']; ?>" /></div>
        <div id="location1" class="col res-35 tab-23 wide-12 ph-1" >
            <h3>Custodian of Public Records</h3>
            <p style="margin-bottom:10px;">Contact Information, Pursuant to 119.12(2), F.S.<br>
                Gulf County Clerk of Circuit Court & County Comptroller<br>
                Attention: Public Records Liaison<br>
                1000 Cecil G. Costin, Sr. Blvd.<br>
                Port St. Joe, FL 32456<br>
                850.229.6112<br>
                <a style="color:#FFF;" href="mailto:info@gulfclerk.com">info@gulfclerk.com</a>
            </p>
        </div>

    </div>
    <div id="footer-right" class="col res-13 tab-12 wide-1 ph-1">


        <div id="location2" class="res-23 tab-23 wide-23 ph-1 fleft" >
            <h3>Hours of Operation</h3>
            <p style="margin-bottom:10px;"><?php echo $wewaaddr; ?></p>
            <p><?php echo $stjoeaddr; ?></p>
        </div>
        <div id="footer-navigation" class="col res-13 tab-13 wide-13 ph-1" >
            <h3>Navigation</h3>
            <ul>
				<?php
				$footargs = array(
					'order'                  => 'ASC',
					'orderby'                => 'menu_order',
					'post_type'              => 'nav_menu_item',
					'post_status'            => 'publish',
					'output'                 => ARRAY_A,
					'output_key'             => 'menu_order',
					'nopaging'               => true,
					'update_post_term_cache' => false );

				$menu_items = wp_get_nav_menu_items( 2, $footargs );

				foreach( $menu_items as $menu_item ) {
					echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
				}
				?>
            </ul>
        </div>

    </div>
</div>
<!--    <div id="bot" class="container footer-content">-->
<!--    	<div id="footer-left" class="col res-25 tab-12 wide-1 ph-1">-->
<!--    		<div id="buildingphoto" class="col res-23 tab-23 wide-23 ph-1"><img src="--><?php //echo $building['url']; ?><!--" alt="--><?php //echo $building['alt']; ?><!--" /></div>-->
<!--            <div id="footer-navigation" class="col res-13 tab-13 wide-13 ph-1" >-->
<!--            <h3>Navigation</h3>-->
<!--            <ul>-->
<!--            --><?php //
//			$footargs = array(
//				'order'                  => 'ASC',
//				'orderby'                => 'menu_order',
//				'post_type'              => 'nav_menu_item',
//				'post_status'            => 'publish',
//				'output'                 => ARRAY_A,
//				'output_key'             => 'menu_order',
//				'nopaging'               => true,
//				'update_post_term_cache' => false );
//
//			$menu_items = wp_get_nav_menu_items( 2, $footargs );
//
//			foreach( $menu_items as $menu_item ) {
//				echo '<li><a href="' . $menu_item->url . '">' . $menu_item->title . '</a></li>';
//			}
//			?>
<!--            </ul>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div id="footer-right" class="col res-35 tab-12 wide-1 ph-1">-->
<!--        	<h3>Locations & Directions</h3>-->
<!--            <div id="location1" class="res-12 ph-1 fleft" >-->
<!--            	<p>--><?php //echo $stjoeaddr; ?><!--</p>-->
<!--                <p>--><?php //echo $stjoeph1;
//					if($stjoeph2 != ''){
//						echo ' or '.$stjoeph2;
//					} ?><!--</p>-->
<!--            </div>-->
<!--            <div id="location2" class="res-12 ph-1 fleft" >-->
<!--            	<p>--><?php //echo $wewaaddr; ?><!--</p>-->
<!--                 <p>--><?php //echo $wewaph1;
//					if($wewaph2 != ''){
//						echo ' or '.$wewaph2;
//					} ?><!--</p>-->
<!--            </div>-->
<!--    	</div>-->
<!--    </div>-->
	<footer id="colophon" class="site-footer">
		<p class="copyright"><a href="#" style="text-decoration:none; cursor:default;">&copy; <?php echo date('Y'); ?> Gulf County Clerk of Courts</a><a href="/privacy-policy/">Privacy Policy</a><a href="/accessability-policy/">Accessability Policy</a><a href="/contact/">Contact Us</a><a href="/sitemap_index.xml">Sitemap</a><span id="siteby"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/kma.png" alt="Designed &amp; Programmed by Kerigan Marketing Associates"> Site by <a href="https://keriganmarketing.com" target="_blank">KMA</a></span></p>
	</footer><!-- #colophon -->
</div><!-- #page -->

<!--deferred scripts-->
<script src="https://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
<script type="text/javascript">
    jQuery(function($) {
        $(document).ready(function(){
            $.getScript( "<?php echo get_template_directory_uri() ?>/js/scripts.js" );
            $.getScript( "<?php echo get_template_directory_uri() ?>/js/navigation.js" );
            $.getScript( "<?php echo get_template_directory_uri() ?>/js/skip-link-focus-fix.js" );
        });
    });
</script>
<?php wp_footer(); ?>

</body>
</html>
