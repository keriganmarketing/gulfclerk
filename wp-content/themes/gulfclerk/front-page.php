<?php
// @package GulfClerk 

get_header(); ?>

        <div id="primary" class="content-area">
            <main id="main" class="site-main">
        
                <div id="text-area" class="col res-45 ph-1">
                    <?php 
                    
                    $post = get_post($id); 
                    $content = apply_filters('the_content', $post->post_content); 
                    echo $content;  
                    
                    ?>
                </div>
                
                <!--<div id="becky-headshot" class="col res-15 fright ph-show"><img src="<?php echo $becky['url']; ?>" alt="<?php echo $becky['alt']; ?>" /></div>-->
        
            </main><!-- #main -->
        </div><!-- #primary -->
	</div><!-- #top -->
    
	<div id="payments" class="container">
    	<div id="payment-buttons" class="row">
        	<div id="payment-label" class="col res-14 tab-1 ph-1" >
            <p>Make a Payment</p>
            </div>
            <div class="col res-14 tab-13 ph-1" >
            	<a class="payment-button" href="/pay-traffic-citations/" >Traffic Citation</a>
            </div>
            <div class="col res-14 tab-13 ph-1" >
            	<a class="payment-button" href="/pay-child-support/" >Child Support</a>
            </div>
            <div class="col res-14 tab-13 ph-1" >
            	<a class="payment-button" href="https://www.myfloridacounty.com/courtpay/?county=23" target="_blank" >Court Cases</a>
            </div>
        </div>
    </div>
	
    <div id="mid" class="container" >
		<div id="content" class="site-content row">
        	<div id="feat-buttons" class="col res-14 tab-1 wide-1 ph-1 fright" >
            	<ul>
            	<?php include('inc/feat-buttons.php'); ?>
                </ul>
            </div>
        	<div id="home-bucket-1" class="col res-14 tab-13 wide-1 ph-1 bucket" >
            	<h2>Courts</h2>
                <div class="accordion">
            		<?php include('inc/bucket1.php'); ?>
                </div>
                <div class="view-more">View All</div>
            </div>
            <div id="home-bucket-2" class="col res-14 tab-13 wide-1 ph-1 bucket" >
            	<h2>Public Records</h2>
                <div class="accordion">
            		<?php include('inc/bucket2.php'); ?>
                </div>
                <div class="view-more">View All</div>
            </div>
            <div id="home-bucket-3" class="col res-14 tab-13 wide-1 ph-1 bucket" >
            	<h2>Other Services</h2>
                <div class="accordion">
					<?php include('inc/bucket3.php'); ?>
                </div>
                <div class="view-more">View All</div>
            </div>
        

<?php get_footer(); ?>
