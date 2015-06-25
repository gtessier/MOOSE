/* Template: Appster | Author: eriktailor | Version: 1.0.2  */
/*----------------------------------------------------------*/


/*----------------------------------------------------------*/
/* DOCUMENT START */
/*----------------------------------------------------------*/
(function($) {
"use strict";

	$(document).ready(function(){
	


/*----------------------------------------------------------*/
/*   GENERALS */
/*----------------------------------------------------------*/
// Js check
$("html").removeClass("no-js").addClass("js");

// Back Top
$(function(){
	$(window).scroll(function () {
		if ($(this).scrollTop() > 600) {
			$('.back-top').removeClass('downscaled');
		} else {
			$('.back-top').addClass('downscaled');
		}
	});	
	$('.back-top').click(function(){
			$('body,html').animate({ scrollTop: 0 }, 800);

	});
});

// Easing
jQuery.easing.def = "easeOutBounce";


/*----------------------------------------------------------*/
/*   NAVIGATION */
/*----------------------------------------------------------*/
$('.header').waypoint('sticky', { offset: -1 });

var docTop = $(window).scrollTop();
if(docTop != 0){ $('.header').addClass('stuck');}


// Mobile nav
$(".mobile-menu").click(function(){
	$(".menu").slideToggle(400);
});

$(window).on("load resize",function(){
	var w = $(window).width();
	if(w > 768){
		$(".menu").show();
	} else {
		$(".menu a").click(function(){
			$(".menu").slideUp(400);
			console.log("clicked");
		});
	}
});


/*----------------------------------------------------------*/
/*   ZOOMER */
/*----------------------------------------------------------*/

$('.zoomer-image').loupe({
  width: 200, // width of magnifier
  height: 200, // height of magnifier
  loupe: 'magnifier' // css class for magnifier
});

$('.magnifier').hide().css('margin-top','230px');
$('section.tablet-magnifier').hover(function(){
	$('.magnifier').css('opacity','1').addClass('animated bounceIn');
	$('.zoomer-frame').hover(function(){
		$('.magnifier').css('margin-top','0');
	});
});

/*----------------------------------------------------------*/
/*   SHOWCASE */
/*----------------------------------------------------------*/

	$('.showcase:eq(0)').addClass('first');
	$('.showcase:eq(1)').addClass('second');
	$('.showcase:eq(2)').addClass('third');
	$('.showcase:eq(3)').addClass('fourth');
	$('.showcase:eq(4)').addClass('fifth');
	$('.showcase:eq(5)').addClass('sixth');
	
	// $('.showcase.left').find('div.seven.columns.showcase-model').prependTo('.showcase.left .container');





/*----------------------------------------------------------*/
/*   TEAM MEMBERS */
/*----------------------------------------------------------*/

$('.team-member').click(function() {
  var clicks = $(this).data('clicks');
  if (clicks) {

	$(this).find('.team-member-dropdown').slideUp(1600, 'easeOutBounce'); 
	
	$(this).find('.team-member-bullet > i').removeClass('fa-minus').addClass('fa-plus');	
  } else {
	$(this).find('.team-member-dropdown').slideDown(1600, 'easeOutBounce'); 
	$(this).find('.team-member-bullet > i').removeClass('fa-plus').addClass('fa-minus');
  }
  $(this).data("clicks", !clicks);
});

$('ul.team-member-socials > li > a').each(function() {
    var href = $(this).attr("href");
    if(href == '') { 
        $(this).parent().remove();
    }
});


/*----------------------------------------------------------*/
/*   TESTIMONIALS */
/*----------------------------------------------------------*/
$(function(){

$('.quote-slide').each(function(){
  $('.quote-slider-controls').append('<span></span>');
});

$('.quote-slider-controls > span:first').addClass('active');



	var allQuotes = $('.quote-slide'),
		firstQuotes = $('.quote-slide:eq(0)'),
		secondQuotes = $('.quote-slide:eq(1)'),
		thirdQuotes = $('.quote-slide:eq(2)'),
		fourthQuotes = $('.quote-slide:eq(3)'),
		fifthQuotes = $('.quote-slide:eq(4)'),
		quoteControl = $('.quote-slider-controls span');
	
	allQuotes.hide();
	firstQuotes.show();
	
	quoteControl.click(function(){
		allQuotes.hide(); 
		quoteControl.removeClass('active');
		$(this).addClass('active'); 
	});	
	
	quoteControl.eq(0).click(function(){ firstQuotes.fadeIn(1300); });		
	quoteControl.eq(1).click(function(){ secondQuotes.fadeIn(1300); });	
	quoteControl.eq(2).click(function(){ thirdQuotes.fadeIn(1300); });
	quoteControl.eq(3).click(function(){ fourthQuotes.fadeIn(1300); });
	quoteControl.eq(4).click(function(){ fifthQuotes.fadeIn(1300); });		
		
});



/*----------------------------------------------------------*/
/*   CAROUSEL */
/*----------------------------------------------------------*/
$(function(){
	
	var cSlideEffect = 'fadeInUpBig';
	
	$('.carousel-slide.active > div').addClass('animated '+cSlideEffect);	

	$('.carousel-next').click(function(){	
		if($('.carousel-slide:last').hasClass('active')){
			$('.carousel-slide:last').removeClass('active');
			$('.carousel-slide:first').addClass('active');
		} else {
			$('.carousel-slide.active').removeClass('active').next('.carousel-slide').addClass('active');
		}
		$('.carousel-slide.active > div').addClass('animated '+cSlideEffect);
	});
	
	$('.carousel-prev').click(function(){	
		if($('.carousel-slide:first').hasClass('active')){
			$('.carousel-slide:first').removeClass('active');
			$('.carousel-slide:last').addClass('active');
		} else {
			$('.carousel-slide.active').removeClass('active').prev('.carousel-slide').addClass('active');
		}
		$('.carousel-slide.active > div').addClass('animated '+cSlideEffect);
	});
	
});

/*----------------------------------------------------------*/
/*   SHOTS & LIGHTBOX */
/*----------------------------------------------------------*/

$(function(){
	var lb = $('.lightbox'),
		lbOverlay = $('.lightbox-overlay'),
		lbClose = $('.lightbox-close');

	$('.screenshot').click(function(){
		lbOverlay.removeClass('fadeOutUpBig').show().addClass('animated fadeInDownBig');	
		lb.removeClass('fadeOutDownBig').show().addClass('animated fadeInUpBig');
		var lbImage = $(this).children('img').attr('src');
		var lbImageStr = lbImage.replace('img/shots/','');
		lb.children('img').attr('src', lbImageStr);
	});

	lbClose.click(function(){
		lbOverlay.removeClass('fadeInDownBig').addClass('fadeOutUpBig');	
		lb.removeClass('fadeInUpBig').addClass('fadeOutDownBig');	
	});
});


/*----------------------------------------------------------*/
/*   FEATURE SELECTOR */
/*----------------------------------------------------------*/
$(function(){

	$('.feature-selector-buttons > li:eq(0)').attr('data-fselector','first');
	$('.feature-selector-buttons > li:eq(1)').attr('data-fselector','second').addClass('active');
	$('.feature-selector-buttons > li:eq(2)').attr('data-fselector','third');
	$('.feature-selector-buttons > li:eq(3)').attr('data-fselector','fourth');
	
	$('.feature-selector-mask > img:eq(0)').attr('data-fselector','first');
	$('.feature-selector-mask > img:eq(1)').attr('data-fselector','second');
	$('.feature-selector-mask > img:eq(2)').attr('data-fselector','third');
	$('.feature-selector-mask > img:eq(3)').attr('data-fselector','fourth');

	

	var selectorFrame = $('.feature-selector-frame'),
		selectorImage = $('.feature-selector-frame img'),
		selectorButton = $('.feature-selector-buttons li');
	selectorImage.eq(1).show();
	selectorButton.click(function(){
		selectorButton.removeClass('active');
		$(this).addClass('active');
		var selectorImg = $(this).data('fselector');
		selectorImage.addClass('animated fadeOutLeftBig');
		selectorFrame.find("[data-fselector='" + selectorImg + "']").show().removeClass('fadeOutLeftBig').addClass('animated fadeInRightBig');
	});

});

/*----------------------------------------------------------*/
/*   DETAILS COUNTUP */
/*----------------------------------------------------------*/
$(function(){
	$('.counters').waypoint(function(){
		$('.counter h4').countTo();
	}, {offset: 400});
});

/*----------------------------------------------------------*/
/*   PRICING TABLES */
/*----------------------------------------------------------*/
$('.price-table-body > ul > li').each(function() {
    var icon = $(this).text();
    if(icon == '') { 
        $(this).remove();
    }
});

/*----------------------------------------------------------*/
/*   CONTACT FORM */
/*----------------------------------------------------------*/
$(function() {
  $("#cform").on("submit",function(e){
    
    if($("#cform")[0].checkValidity()) {
      $.post("mailer.php", $("#cform").serialize(),  function(response) {
        $('#success').fadeIn(500).html(response);
        $("#cform").fadeOut(300);
		e.preventDefault();
      });
    } else console.log("invalid form");
	e.preventDefault(); // stop actual submission
  }); 
});

$(function(){
	$('input, textarea').placeholder();
});

/*----------------------------------------------------------*/
/*   ANIMATIONS */
/*----------------------------------------------------------*/

// First pricing table
var FirstPricingTable = 'fadeInLeftBig';

// Second pricing table
var SecondPricingTable = 'fadeInUpBig';

// Third pricing table
var ThirdPricingTable = 'fadeInRightBig';

$('.feature-selectors').waypoint(function(){
		$('.feature-selector-buttons > li').each(function(i){
			$(this).css({
				'animation-delay' : (i*0.3)+"s",
				'-webkit-animation-delay' : (i*0.3)+"s",
				'-moz-animation-delay' : (i*0.3)+"s",
				'-ms-animation-delay' : (i*0.3)+"s",
				'-o-animation-delay' : (i*0.3)+"s"
			});
		});
	$('.feature-selector-buttons > li').addClass('animated fadeInLeftBig');
}, {offset: 400});

$('.pricing').waypoint(function(){
	$('.price-table:eq(0)').addClass('animated '+FirstPricingTable).css({'opacity':'1','filter':'alpha(opacity=100)'});;
	$('.price-table:eq(1)').addClass('animated '+SecondPricingTable).css({'opacity':'1','filter':'alpha(opacity=100)'});;
	$('.price-table:eq(2)').addClass('animated '+ThirdPricingTable).css({'opacity':'1','filter':'alpha(opacity=100)'});;
}, {offset: 400});

/*----------------------------------------------------------*/
/*   FIXES */
/*----------------------------------------------------------*/

/* 2014-05-27 
-------------------*/
$('<div class="clear"></div>').insertAfter('.team > .container > .four.columns:eq(3), .team > .container > .four.columns:eq(7), .team > .container > .four.columns:eq(11)');

$(function(){	
  $("#owl-demo").owlCarousel({
		autoplay: 3000,
      navigation : true, // Show next and prev buttons
      slideSpeed : 600,
	  goToFirstSpeed : 2000,
      paginationSpeed : 600,
      singleItem:true,
	  navigationText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	  pagination: false,
	  stopOnHover : false
  });
});

$(function(){
	$("#et-loading span").css("width","100%");
	$(window).load(function(){
		setTimeout(function() {
			$(".site-wrapper").show();
			$("#et-loading").fadeOut(400);
		}, 600);
	});
	var h = $(window).height();
	$(".et-loading-progress").css("top",h/2+80);
});	



/*----------------------------------------------------------*/
/*   END DOCUMENT */
/*----------------------------------------------------------*/
	});
})(jQuery);