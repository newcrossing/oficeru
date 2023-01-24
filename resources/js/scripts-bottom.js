/* Scripts required for this template 
@ file version: 1.0
@last edit: 09.09.2012, 4:06 PM
-------------------------------------------*/
/* =========================================== CONTACT FORM */
jQuery(document).ready(function(){

	

});

/* =========================================== Slider */
/* Flex */
$(window).load(function() {
	$('div[id^=portfolioSlider]').flexslider();
});
$('#mainSlider').flexslider();
$('div[id^=blogSlider]').flexslider();

/* iView */
$(document).ready(function(){
	$('#iview').iView({
		fx: 'random',
		pauseTime: 7000,
		pauseOnHover: true,
		directionNavHoverOpacity: 0,
		timer: "Bar",
		timerDiameter: "50%",
		timerPadding: 0,
		timerStroke: 7,
		timerBarStroke: 0,
		timerColor: "#FFF",
		timerPosition: "bottom-right"
	});
});
/* OneByOne */
$(document).ready(function() { 
		
	$('#onebyone_slider').oneByOne({
		className: 'oneByOne1',	             
		easeType: 'random',
		slideShow: true,
		delay: 300,
		slideShowDelay: 4000
	});  
	
	
 });

/* =========================================== Responsive video */
$(".container_video").fitVids();


/* =========================================== Portfolio grid */
$(function(){
	var $container = $('#portfolio_masonry');
  
	$container.imagesLoaded( function(){
	  $container.isotope({
		itemSelector : '.portf_item'
	  });
	});
});

/* =========================================== Blog grid */
$(function(){
	var $container = $('#blog_masonry');
  
	$container.imagesLoaded( function(){
	  $container.isotope({
		itemSelector : '.blog_article'
	  });
	});
});

/* =========================================== Testimonials grid */
$(function(){
	var $container = $('#testimonials_section');
  
	$container.imagesLoaded( function(){
	  $container.isotope({
		itemSelector : '.testimonial'
	  });
	});
});



/* =========================================== Image hover */
$(function() {
	$('a .image_wrap').hover(function(){
		$('img',this).animate({"opacity": "0.6"},{queue:true,duration:500});
		
	}, function() {
		$('img',this).animate({"opacity": "1"},{queue:true,duration:400});
	});
});	

$(function() {
	$('.home_clients .hp_item_grid_client').hover(function(){
		$('img',this).animate({"opacity": "0.75"},{queue:true,duration:300});
		
	}, function() {
		$('img',this).animate({"opacity": "1"},{queue:true,duration:300});
	});
});	

/* =========================================== Portfolio sortable */

$(function(){

	// cache container
	var $IsoContainer = $('#portfolio');
	// initialize isotope
	$IsoContainer.imagesLoaded( function(){
		$IsoContainer.isotope({
			// options...
			itemSelector : '.portf_item'
		});
	});

	// filter items when filter link is clicked
	$('#portfolio_menu a').click(function(){	
		var selector = $(this).attr('data-filter');
		$IsoContainer.isotope({ filter: selector });
		$('#portfolio_menu a').removeClass('active_cat');
		$(this).addClass('active_cat');
		return false;
	});
	
});


/* =========================================== FAQ Scroll */
$(document).ready(function(){
	
	$('#faq_questions ul li a').click(function(){
	
		var el = $(this).attr('href');
		var elWrapped = $(el);
		
		scrollToDiv(elWrapped,40);
		
		return false;
	
	});
	
	function scrollToDiv(element,navheight){

		var offset = element.offset();
		var offsetTop = offset.top;
		var totalScroll = offsetTop-navheight;
		
		$('body,html').animate({
				scrollTop: totalScroll
		}, 500);
	
	}

});


/* =========================================== FAQ */

$(document).ready(function() {
	
	// FAQ Go To Answer
	$('.faq_question').on('click', function(){
		var $q = $( this ).attr( 'id' ); //Ex: question_1
		var $q_id = $q.substr($q.indexOf('_') + 1); //Ex: 1
		$.scrollTo('#answer_' + $q_id, {
			duration: 500, 
			onAfter:function(){
				$('#answer_' + $q_id + '_text').addClass('faq_mark');
				setTimeout(function(){ $('#answer_' + $q_id + '_text').removeClass('faq_mark');}, 500);
			}
		});
	});

	// Go To TOP
	$('.go_to_top').click(function(){
		$.scrollTo('#smk_container_full', {duration: 500});
	});

});
