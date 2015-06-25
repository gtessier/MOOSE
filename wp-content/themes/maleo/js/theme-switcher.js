$(document).ready(function(){

	var path = 'css/theme/',
		screenWidth = $(window).width();
	
	$('body').append('<div id="theme-switcher">'+
						'<div id="toggle-switcher"><i class="icon-palette-painting"></i></div>'+
						'<div class="heading-switcher"><h4>Theme Switcher</h4></div>' +
						'<div class="container-switcher">' +
							'<ul class="color-theme small-block-grid-4">' +
								'<li><span id="green"></span></li>' +
								'<li><span id="blue"></span></li>' +
								'<li><span id="yellow"></span></li>' +
								'<li><span id="red"></span></li>' +
								'<li><span id="indigo"></span></li>' +
								'<li><span id="gray"></span></li>' +
								'<li><span id="orange"></span></li>' +
								'<li><span id="yellow-light"></span></li>' +
								'<li><span id="green-light"></span></li>' +
								'<li><span id="grass"></span></li>' +
								'<li><span id="lime"></span></li>' +
								'<li><span id="purple"></span></li>' +
							'</ul>' +
							'<hr>' +
							// '<h5>Frame</h5>'+
							'<div class="option" id="frame">' +
								'<a class="active" id="fullWidth" href="#">Full Width</a>' +
								'<a href="#" id="box">Box</a>' +
							'</div>'+
							'<ul class="pattern-theme small-block-grid-4">' +
								'<li><span id="pattern1"></span></li>' +
								'<li><span id="pattern2"></span></li>' +
								'<li><span id="pattern3"></span></li>' +
								'<li><span id="pattern4"></span></li>' +
							'</ul>' +
							'<hr>' +
							// Available on maleo update 1.2
							// '<h5>Style</h5>'+
							// '<div class="option">' +
							// 	'<a class="active" href="#">Light</a>' +
							// 	'<a href="#">Dark</a>' +
							// '</div>'+
							// '<hr>' +
							// '<h5>Header</h5>'+
							'<select class="header-theme form-control">'+
								'<option value="index.html">Header 1</option>'+
								'<option value="index-layout2.html">Header 2</option>' +
								'<option value="index-layout3.html">Header 3</option>' +
							'</select>' +
							// '<hr>' +
							// Available on maleo update 1.2
							// '<h5>Footer</h5>'+
							// '<select class="form-control">'+
							// 	'<option value="footer1">Footer 1</option>'+
							// 	'<option value="footer2">Footer 2</option>' +
							// 	'<option value="footer3">Footer 3</option>' +
							// '</select>' +
						'</div>' +
						'<div class="footer-switcher"><a id="reset" class="reset">Reset</a></div>' +
					'</div>');

	$('#theme-switcher').find('li').slice(-4).css('padding-bottom', '0');

	if((screenWidth < 767)) {
		$('#toggle-switcher').hide();
	}

	// ------------------------ toggle button ------------------------ 
	$('#toggle-switcher').click(function(){
		if($(this).hasClass('active')){
			$(this).removeClass('active');
			$('#theme-switcher').animate({'left':'-220px'});
		} else{
			$(this).addClass('active');
			$('#theme-switcher').animate({'left':'0px'});
		}
	});
	
	// ------------------------ function declaration ------------------------
	// deactive class
	function colorDeactive() {
		$('#theme-switcher ul.color-theme li span').removeClass('active');
	}

	// theme change
	function changeTheme(self) {
		colorChoice = self.attr('id');
		
		$('link#theme').attr('href', path + colorChoice +'.css');
		$.cookie('setColorTheme', colorChoice);
	}

	// color default
	function colorDefault() {
		$('#theme-switcher ul.color-theme li:first-child span').addClass('active');
	}

	// frame change
	function frameChange(frameChoice) {

		if(frameChoice == "box") {
			$('#mo-wrapper').addClass('box');

			// show pattern choice
			$(".pattern-theme").slideDown("slow");

			// default pattern
			patternDeactive();
		} else {
			$('#mo-wrapper').removeClass('box');
			
			// hide pattern choice
			$(".pattern-theme").slideUp("slow");
			
			// reset pattern
			resetPattern();
		}

		$.cookie('setFrameTheme', frameChoice);
	}

	// pattern change
	function changePattern(patternChoice) {

		$('body').css({
			'background' 		: 'url('+ path + 'pattern/' + patternChoice +'.png)',
			'background-repeat'	: 'repeat'
		});

		$.cookie('setPatternTheme', patternChoice);
	}
	
	// deactive class
	function patternDeactive() {
		$('#theme-switcher ul.pattern-theme li span').removeClass('active');
	}

	// reset pattern
	function resetPattern() {
		$('body').css('background','#fff');
	}

	// ------------------------ Color Theme ------------------------
	// set to color default (green)
	colorDefault();
	
	$('#theme-switcher ul.color-theme li span').click(function(e){
		e.preventDefault();
		var self = $(this);

		// deactive color class
		colorDeactive();

		// active color choice
		self.addClass('active');

		// change color theme
		changeTheme(self);
	});

	// ------------------------ frame theme ------------------------ 
	$('#frame a').click(function(e){
		e.preventDefault();
		
		var self = $(this),
			frameChoice = self.attr("id");

		frameChange(frameChoice);

		$('#frame a').removeClass('active');
		self.addClass('active');
	});

	// ------------------------ pattern for box frame ------------------------ 
	$('#theme-switcher ul.pattern-theme li span').click(function(e){
		var self = $(this);
		patternChoice = self.attr('id');

		// deactive color class
		patternDeactive();

		// active pattern choice
		self.addClass('active');

		// change pattern theme
		changePattern(patternChoice);

	});
	
	// ------------------------ header option ------------------------
	$(".header-theme").on('change', function() {
		var headerLink = $(this).val();
		
		window.location = headerLink;
	});

	// ------------------------ check if cookie exist ------------------------ 
	if($.cookie() != 'null') { 
		colorChoice = $.cookie('setColorTheme');
		frameChoice = $.cookie('setFrameTheme');
		patternChoice = $.cookie('setPatternTheme');

		// -- color theme cookie exist
		if(colorChoice != 'null') {

			// fix first cookie check
			if (colorChoice == null) {
				colorChoice = 'green';
			};

			console.log(colorChoice);

			$('link#theme').attr('href', path + colorChoice +'.css');

			colorDeactive();
			$('#theme-switcher ul.color-theme li').find('span#' + colorChoice).addClass('active');
		} else {
			colorDefault();
			$('link#theme').attr('href', path +'green.css');
		}

		// -- frame theme cookie exist
		$('#mo-wrapper').removeClass();
		if(frameChoice == 'box') {
			$('#mo-wrapper').addClass(frameChoice);

			// show pattern choice
			$(".pattern-theme").slideDown("slow");

			$('#frame a').removeClass('active');
			$('#frame').find('a#' + frameChoice).addClass('active');
		}

		// -- pattern theme cookie exist
		if(patternChoice != 'null') {
			if (frameChoice == 'box') {
				changePattern(patternChoice);
				patternDeactive();

				$('#theme-switcher ul.pattern-theme li').find('span#' + patternChoice).addClass('active');
			} else {
				patternDeactive(); 
				resetPattern();
			};

		} else {
			patternDeactive();
			resetPattern();
		}
	}

	// ------------------------ reset ------------------------
	$('#reset').click(function(e){
		e.preventDefault();

		// -- color theme reset
		colorDeactive();
		colorDefault();

		// reset color property
		$('link#theme').attr('href', path +'green.css');

		// -- frame theme reset
		$('#mo-wrapper').removeClass();
		$('#frame a').removeClass('active');

		// reset frame property
		$('#frame').find('#fullWidth').addClass('active');
		$(".pattern-theme").slideUp("slow");

		// -- pattern theme reset
		patternDeactive() 
		resetPattern();

		// -- reset cookie
		$.cookie('setColorTheme', null);
		$.cookie('setFrameTheme', null);
		$.cookie('setPatternTheme', null);
	});

	/* -----------------------------------------------------------------------
	* Disable Box Frame on mobile
	* ----------------------------------------------------------------------- */ 
	if (screenWidth < 767) {
		$("#mo-wrapper").removeClass("box");
		console.log("disable box mode on mobile device");
	}
});