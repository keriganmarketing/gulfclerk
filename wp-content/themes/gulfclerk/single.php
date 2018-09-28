<?php
/**
 * The template for displaying all single posts.
 *
 * @package GulfClerk
 */

$date = get_field('date');
$casenum = get_field('case_#');
$plaintiff = get_field('plaintiff');
$defendant = get_field('defendant');
$fjamount = get_field('fj_amount');
$book = get_field('book');
$page = get_field('page');
					
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <div id="text-area" class="col res-34 ph-1 fleft">
		<?php if ( function_exists('yoast_breadcrumb') ) {
			yoast_breadcrumb('<p id="breadcrumbs">','</p>');
		} ?>
		
		
        
        <h1><?php if($casenum != ''){ echo $casenum; } ?></h1>

		<?php if($date != ''){ echo '<p>'.date('M j, Y', strtotime($date)).'</p>'; } ?>
        <?php if($casenum != ''){ echo '<p><strong>Case #:</strong> '.$casenum.'</p>'; } ?>
        <?php if($plaintiff != ''){ echo '<p><strong>Plaintiff:</strong> '.$plaintiff.'</p>'; } ?>
        <?php if($defendant != ''){ echo '<p><strong>Defendant:</strong> '.$defendant.'</p>'; } ?>
        <?php if($fjamount != ''){ echo '<p><strong>F/J Amount:</strong> $'.$fjamount.'</p>'; } ?>
        
        <?php if($book!='' && $page!=''){ ?>
        <form action="https://www3.myfloridacounty.com/ori/search.do?validentry=yes" method="post" id="searchfrm" name="searchfrm" target="_blank">
          <input type="hidden" name="nametype" value="i" >
          <input type="hidden" name="lastName" value="last" >
          <input type="hidden" name="firstName" value="first" >
          <input type="hidden" name="startMonth" value="0">
          <input type="hidden" name="startDay" value="0">
          <input type="hidden" name="startYear" value="2010">
          <input type="hidden" name="endMonth" value="0">
          <input type="hidden" name="endDay" value="0">
          <input type="hidden" name="endYear" value="2010">
          <input type="hidden" name="locationType" value="COUNTY" >
          <input type="hidden" name="county" value="23" >
          <input type="hidden" name="documentTypes" value="LP" >
          <input type="hidden" name="percisesearchtype" value="b" >
          <input type="hidden" name="book" value="<?php echo $book; ?>" >
          <input type="hidden" name="page" value="<?php echo $page; ?>" >
          <input type="submit" value=" See Lis Pendens " name="submit" />
        </form>
        <?php } ?>
        
		</div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
        
		</main><!-- #main -->
	</div><!-- #primary -->

</div>
    <div id="mid" class="container" >
		<div id="content" class="site-content row">

<?php get_footer(); ?>
