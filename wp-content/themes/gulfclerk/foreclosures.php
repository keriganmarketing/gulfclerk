<?php
// Template Name: Foreclosures
// @package GulfClerk

get_header(); 

$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
$service_category = get_field('service_category');
$disclaimer = get_field('disclaimer');

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
				
				$fargs = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => 'foreclosures',
				'category_name'    => 'Foreclosures',
				'orderby'          => 'meta_value',
				'order'            => 'ASC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => 'date',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish' );
				
				$foreclosures = get_posts( $fargs );
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
					
					if(($checkdate >= $todayminusone) && ($status != 'unpublished')){
						$j++;
						//echo date('Ymd',strtotime($date)+1).' - '.date('Ymd');
						echo '<div id="foreclosure-'.$i.'" >';
						echo '<table class="'.$status.'" >';
						echo '<tr><td class="header" colspan="2">'.date('M j, Y', strtotime($date));
						if($status == 'cancelled' ){ echo ' - Canceled'; }
						echo '</td></tr>';
						echo '<tr><td class="label" width="150" >Case #</td><td>'.$casenum.'</td></tr>';
						echo '<tr><td class="label" >Plaintiff</td><td>'.$plaintiff.'</td></tr>';
						echo '<tr><td class="label" >Defendant</td><td>'.$defendant.'</td></tr>';
						echo '<tr><td class="label" >F/J Amount</td><td>$'.$fjamount.'</td></tr>';
//						if($status == 'active' ){
//							echo '<tr><td class="label" >Legal Description</td><td>
//							<form action="https://www3.myfloridacounty.com/ori/search.do?validentry=yes" method="post" id="searchfrm" name="searchfrm" target="_blank">
//							<input type="hidden" name="nametype" value="i" >
//								  <input type="hidden" name="lastName" value="last" >
//								  <input type="hidden" name="firstName" value="first" >
//								  <input type="hidden" name="startMonth" value="0">
//								  <input type="hidden" name="startDay" value="0">
//								  <input type="hidden" name="startYear" value="2010">
//								  <input type="hidden" name="endMonth" value="0">
//								  <input type="hidden" name="endDay" value="0">
//								  <input type="hidden" name="endYear" value="2010">
//								  <input type="hidden" name="locationType" value="COUNTY" >
//								  <input type="hidden" name="county" value="23" >
//								  <input type="hidden" name="documentTypes" value="LP" >
//								  <input type="hidden" name="percisesearchtype" value="b" >
//								  <input type="hidden" name="book" value="' .$book. '" >
//								  <input type="hidden" name="page" value="' .$page. '" >
//								  <input type="submit" value=" See Lis Pendens " name="submit" />
//							</form></td></tr>';
//						}
						if($status == 'active' ){
							echo '<tr><td class="label" >Legal Description</td><td>
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
						echo '</table>';
						echo '</div>';
						$i++;
					}			
					
				}
				
				if($j=0){ echo '<p>There are currently no foreclosures scheduled.</p>'; }
                
				if($disclaimer!=''){
					echo $disclaimer;
				}

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
