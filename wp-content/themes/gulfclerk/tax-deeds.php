<?php
// Template Name: Tax Deeds New
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
				
				$targs = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => 'tax-deed-sales',
				'category_name'    => 'Tax Deed Sales',
				'orderby'          => 'meta_value',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => 'date',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish' );
				
				$deeds = get_posts( $targs );
				$i = 1;
				$j = 0;
				foreach($deeds as $deed){
					$id = $deed->ID;
					$date = get_field('date',$id);
					$taxcert = get_field('tax_cert',$id);
					$taxdeed = get_field('tax_deed',$id);
					$parcel = get_field('parcel',$id);
					$bid = get_field('opening_bid',$id);
					$dep = get_field('estimated_minimum_deposit',$id);
					$high_bid = get_field('high_bid',$id);
					$surplus_funds = get_field('surplus_funds',$id);
					$lands_available = get_field('lands_available',$id);
					$applicant = get_field('applicant',$id);
					$owner = get_field('owner',$id);
					$descrip = get_field('legal_description',$id);
					$oereport = get_field('owner_&_encumbrance_reports',$id);
					$status = get_field('status',$id);
					$today = date('Ymd');
					$match_date = date('Ymd', strtotime($date));
					
					if(($match_date >= $today) && ($status != 'unpublished')){
						$j++;
						
						echo '<div id="tax-deed-'.$i.'" >';
						echo '<table class="'.$status.'" >';
						echo '<tr><td class="header" colspan="2">'.date('M j, Y', strtotime($date));
						if($status == 'cancelled' ){ echo ' - Canceled'; }
						echo '</td></tr>';
						echo '<tr><td class="label" width="250" >Tax Certificate #</td><td>'.$taxcert.'</td></tr>';
						echo '<tr><td class="label" >Tax Deed #</td><td>'.$taxdeed.'</td></tr>';
						echo '<tr><td class="label" >Parcel ID</td><td>'.$parcel.'</td></tr>';
						echo '<tr><td class="label" >Applicant</td><td>'.$applicant.'</td></tr>';
						echo '<tr><td class="label" >Owner</td><td>'.$owner.'</td></tr>';
						echo '<tr><td class="label" >Property Address</td><td>'.$descrip.'</td></tr>';
						echo '<tr><td class="label" >Estimated Opening Bid</td><td valign="middle">$'.$bid.'</td></tr>';
						echo '<tr><td class="label" >Estimated Minimum Deposit</td><td valign="middle">$'.$dep.'</td></tr>';
						if($high_bid!=''){ echo '<tr><td class="label" >High Bid</td><td valign="middle">$'.$high_bid.'</td></tr>'; }
						if($surplus_funds!=''){ echo '<tr><td class="label" >Surplus Funds</td><td valign="middle">$'.$surplus_funds.'</td></tr>'; }
						if($lands_available!=''){ echo '<tr><td class="label" >Lands Available</td><td valign="middle">'.$lands_available.'</td></tr>'; }
						echo '<tr><td class="label" >More Information</td><td>
						<a target="_blank" href="http://www.gulfcountytaxcollector.com/Property/TASearchResults?ownername=&streetnumber=&streetname=&propertynumber='.$parcel.'&taxbillnumber=&RollTypes=&Years=">Tax Collector</a><br>
						<a target="_blank" href="http://qpublic.net/cgi-bin/gulf_display.cgi?KEY='.$parcel.'">Property Appraiser</a>';
						if($oereport['url']!=''){ echo '<br><a target="_blank" href="'.$oereport['url'].'">Owner & Encumbrance Reports</a>'; }
						echo '</td></tr>';

						echo '</table>';
						echo '</div>';
						
						$i++;
					}
					
					
				}
				
				if($j<1){ echo '<p>There are currently no tax deed sales available, please check back soon for future sales.</p>'; }
                
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
