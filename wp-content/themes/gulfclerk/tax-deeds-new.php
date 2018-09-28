<?php
// Template Name: Tax Deeds
// @package GulfClerk

get_header(); 

$post = get_post($id); 
$content = apply_filters('the_content', $post->post_content); 
$service_category = get_field('service_category');
$disclaimer = get_field('disclaimer');

?>
<script>
    function openProp( parcel ) {
        var parcelID = parcel;
        console.log(parcelID);

        var url = 'http://qpublic6.qpublic.net/fl_alsearch_dw.php';
        var form = $('<form action="' + url + '" method="post" target="_blank">' +
            '<input type="HIDDEN" name="BEGIN" value="0" />' +
            '<input type="HIDDEN" name="INPUT" value="' + parcelID + '" />' +
            '<input type="HIDDEN" name="searchType" value="parcel_id" />' +
            '<input type="HIDDEN" name="county" value="fl_gulf" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    }
</script>
	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <div id="text-area" class="overbids">
	            <?php if ( function_exists('yoast_breadcrumb') ) {
		            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	            } ?>
	            <?php
	            $post = get_post($id);
	            $content = apply_filters('the_content', $post->post_content);
	            echo $content;
                ?>
	            <div class="table-responsive">
                    <table class="tablepress overbids">
                        <tr class="row-2">
                            <td class="column-1">Sale Date</td>
                            <td class="column-2">Certificate No.</td>
                            <td class="column-3">Case No.</td>
                            <td class="column-4">Parcel ID</td>
                            <td class="column-5">Applicant</td>
                            <td class="column-6">Owner of Record</td>
                            <td class="column-7">Status</td>
                            <td class="column-8">Est. Min. Bid /<br>Surplus Funds</td>
                        </tr>
                        <?php
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
	                        $claim_form = get_field('claim_form',$id);
                            $status = get_field('status',$id);
                            $today = date('Ymd');
                            $match_date = date('Ymd', strtotime($date));

                            if((($match_date >= $today) && ($status != 'unpublished')) || $status == 'surplus'){
                                $j++;
                                echo '<tr>';
                                echo '<td class="column-1">'.date('m/d/y', strtotime($date)).'</td>';
                                echo '<td class="column-2"><a target="_blank" href="http://www.gulfcountytaxcollector.com/Property/TASearchResults?ownername=&streetnumber=&streetname=&propertynumber='.$parcel.'&taxbillnumber=&RollTypes=&Years=">'.$taxcert.'</a></td>';
                                echo '<td class="column-3">';
                                if($oereport['url']!=''){ echo '<a target="_blank" href="'.$oereport['url'].'">'; }
                                echo $taxdeed;
                                if($oereport['url']!=''){ echo '</a>'; }
                                echo '</td>';
                                echo '<td class="column-4"><a style="text-decoration: underline; cursor:pointer;" onclick="openProp(\''.$parcel.'\');">'.$parcel.'</a></td>';
                                echo '<td class="column-5">'.$applicant.'</td>';
                                echo '<td class="column-6">'.$owner.'<br>'.$descrip.'</td>';
                                echo '<td class="column-7" style="text-transform: uppercase;">';
                                if($status!=''){ echo $status; }
                                echo '</td>';
                                echo '<td class="column-8">';
                                if($bid!=''){ echo '$'.$bid; }elseif($surplus_funds!='') {
                                    if($claim_form!=''){ echo '<a target="_blank" href="'.$claim_form['url'].'" >'; }
                                    echo '$'.$surplus_funds;
	                                if($claim_form!=''){ echo '</a>'; }
                                }
                                echo '</td>';
                                echo '</tr>';
	                            $i++;
                            }
                        }

                        if($j<1){ echo '<p>There are currently no tax deed sales available, please check back soon for future sales.</p>'; }

                        if($disclaimer!=''){
	                        echo $disclaimer;
                        }

                        ?>
                    </table>
                </div>
	            <?php

	            /*$post = get_post($id);
	            $content = apply_filters('the_content', $post->post_content);
	            echo $conent;*/

                ?>
            </div>

        </main><!-- #main -->
    </div><!-- #primary -->

	</div>
    <div id="mid" class="container" >
		<div id="content" class="site-content row">

<?php get_footer(); ?>
