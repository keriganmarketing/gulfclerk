<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package GulfClerk
 */

$ngulfimage = get_field( 'north_gulf_county_image', 6 );
$sgulfimage = get_field( 'south_gulf_county_image', 6 );
$becky = get_field( 'becky_headshot', 6 );

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<link href="<?php echo get_template_directory_uri() ?>/normalize.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	<link rel="icon" href="/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png"/>

	<!--[if lt IE 9]>
	<script>
		var e = ("abbr,article,aside,audio,canvas,datalist,details," +
		"figure,footer,header,hgroup,mark,menu,meter,nav,output," +
		"progress,section,time,video,main").split(',');
		for (var i = 0; i < e.length; i++) {
			document.createElement(e[i]);
		}
	</script>
	<![endif]-->

	<?php wp_head(); ?>
	<link href="<?php echo get_template_directory_uri() ?>/theme.css" rel="stylesheet">

</head>


<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'gulfclerk' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="col res-13 large-14 tab-14 wide-hide ph-hide">
			<?php if ( is_page_template( 'Home Page V2' ) || is_front_page() ) { ?>
				<h1 id="sitetitle"><?php bloginfo( 'name' ); ?></h1>
				<?php
				$beckyclass = 'home';
			} else { ?>
				<p id="sitetitle"><?php bloginfo( 'name' ); ?></p>
				<?php
				$beckyclass = 'support';
			} ?>
		</div>
		<div class="col res-13 large-14 tab-14 wide-13 ph-hide aright"><?php echo date( 'F j, Y' ); ?></div>
		<div class="col res-13 large-12 tab-12 wide-23 ph-1 aright"><?php get_search_form(); ?></div>
	</header>
	<div id="top" class="container">
		<div id="logo"><a href="/" title="Gulf County Clerk of Courts Homepage"><img
					src="<?php echo get_template_directory_uri() ?>/img/gccc_logo.png"
					alt="Gulf County Clerk of Courts"></a></div>
		<div id="sgulf-image" class="header-image col aleft res-12"
		     style="background-image:url(<?php echo $sgulfimage; ?>)"></div>
		<div id="ngulf-image" class="header-image col aright res-12"
		     style="background-image:url(<?php echo $ngulfimage; ?>)"></div>

		<div id="navbar">
			<div id="nav-left" class="col res-12">
				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-expanded="false"><span><i class="fa fa-bars"></i>
</span><?php _e( 'MENU', 'gulfclerk' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #site-navigation -->
			</div>
			<div id="nav-right" class="col res-12 ph-hide">
				<p class="becky-name <?php echo $beckyclass; ?>">Rebecca L. (Becky) Norris<br>Gulf County, Florida Clerk
					of Court</p>
			</div>
		</div>
		<div id="becky-headshot" class="col res-15 fright ph-hide"><img src="<?php echo $becky['url']; ?>"
		                                                                alt="<?php echo $becky['alt']; ?>"/></div>
    

	
