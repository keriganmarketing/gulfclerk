// JavaScript Document
$(document).ready(function(){

	//Accordion function
	$('.accordion > ul > li > a').click(function() {
	
		var checkElement = $(this).next();
	
		$('.accordion li').removeClass('active');
		$(this).closest('li').addClass('active');
	
		if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
			$(this).closest('li').removeClass('active');
			checkElement.slideUp('normal');
		}
	
		if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
			$('.accordion ul ul:visible').slideUp('normal');
			checkElement.slideDown('normal');
		}
	
		if (checkElement.is('ul')) {
			return false;
		} else {
			return true;	
		}
	});
	
	//Home slide Toogle Function
		$("#home-bucket-1 .view-more").click(function() {
			$("#home-bucket-1 .hidden").slideToggle("fast");
			//$("#home-bucket-1 ul ul").slideToggle("fast");
		});
		$("#home-bucket-2 .view-more").click(function() {
			$("#home-bucket-2 .hidden").slideToggle("fast");
			//$("#home-bucket-2 ul ul").slideToggle("fast");
		});
		$("#home-bucket-3 .view-more").click(function() {
			$("#home-bucket-3 .hidden").slideToggle("fast");
			//$("#home-bucket-3 ul ul").slideToggle("fast");
		});
});