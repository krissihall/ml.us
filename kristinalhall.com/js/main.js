var value;
var isTouchDevice;
var worksCount = 0;

$(document).ready(function(){
	isTouchDevice = is_touch_device();
	
	if(!isTouchDevice){
		$("#navigation").waypoint("sticky");
	}
	
	if($("#features").length > 0){
		$("#features").cycle({
			cleartype: !$.support.opacity,
			fx: 'fade',
			activePagerClass: 'active',
			pager: '.pager',
			prev: '#prev',
			next: '#next',
			timeout: 5000,
			containerResize: 0,
			slideResize: 0,
			width: 'fit',
			height: 'fit', 
			before: onBefore,
			after: onAfter
		});
	
		$("#features").touchwipe({
			wipeLeft: function(e){
				$("#features").cycle("next");
				e.preventDefault();
			},
			wipeRight: function(e){
				$("#features").cycle("prev");
				e.preventDefault();
			},
			min_move_x: 20,
			min_move_y: 20,
			preventDefaultEvents: false
		});
	}
	
	if($("#works").length > 0){
		initWorksSlideshow();
	}
	
	$(".search").find("input[type=text]").bind("focus click", function(){
		value = $(this).val();
		
		if($(this).val() == "Search"){
			$(this).val("");
		} else {
			$(this).val(value);
		}
	});
	$(".search").find("input[type=text]").bind("blur change", function(){
		value = $(this).val();
		
		if($(this).val() == null || $(this).val() == ""){
			$(this).val("Search");
		} else {
			$(this).val(value);
		}
	});
	
	if($("#contactForm").length > 0){
		validateContactForm();
		
		/*$(".button.submit").click(function(e){
			validateContactForm();
			e.preventDefault();
		});*/
	}
});

function validateContactForm(e){
	$("#contactForm").validate({
		rules: {
			name: "required",
			email: {
				required: true,
				email: true
			},
			message: "required"
		},
		messages: {
			name: "You must enter a name",
			email: "You must enter a valid email address",
			message: "You must enter a message"
		},
		submitHandler: function (form) {
			//submit form from here
			form.submit();
		}
	});
}

function onBefore(currSlideElement, nextSlideElement, options, forwardFlag) {
	$(currSlideElement).addClass('active');
	
	if($("#verticalScroller").length > 0){
		endVerticalSlider();
	}
}

function onAfter(currSlideElement, nextSlideElement, options, forwardFlag) {
	$(currSlideElement).removeClass('active');
	$(nextSlideElement).addClass('active');
	
	slideIndex = options.currSlide;
	nextIndex = slideIndex + 1;
	prevIndex = slideIndex - 1;

	if (slideIndex == options.slideCount - 1) {
		nextIndex = 0;
	}

	if (slideIndex == 0) {
		prevIndex = options.slideCount - 1;
	}
	
	if($(nextSlideElement).find("#verticalScroller").length > 0){
		startVerticalSlider($(nextSlideElement).find("#verticalScroller"));
	}
}

function is_touch_device() {
    return !!('ontouchstart' in window) // works on most browsers 
        || !!('onmsgesturechange' in window); // works on ie10
};

function initWorksSlideshow(){
	$("#works").cycle({
		slideExpr: '.item',
		timeout: 0,
		fx: 'scrollLeft',
		cleartype: !$.support.opacity,
		containerResize: 0,
		slideResize: 1,
		fit: 1,
		width: '100%',
		height: '100%',
		pager: '.pager',
		activePagerClass: 'active',
		before: onBefore,
		after: onAfter,
		//prev: '.prev',
		//next: '.next',
		cleartypeNoBg: true,
		easing: 'easeInOutQuart',


		// callback fn that creates a thumbnail to use as pager anchor 
		pagerAnchorBuilder: function (idx, slide) {
			var counter = parseInt(idx) + 1;
			return '<a href="javascript:void(0)">' + counter + '</a>';
		}
	});

	$("#works .item").each(function () {
		$(this).append("<span class=\"hide num\">" + worksCount + "</span>");
		worksCount++;
	});
	
	if (worksCount <= 1) {
		$("#works .item").css("position", "relative");
		$(".prev, .next").hide();
	}
	if(isTouchDevice){
		$(".prev, .next").hide();
	}
	
	var $navChildren = $('.pages').children();
	var $featureChildren = $('#works').children();
	$navChildren.unbind('click');
	$navChildren.click(function (e) {
		var idx = $navChildren.index(this);

		if (idx < slideIndex) {
			$("#works").cycle(idx, 'scrollRight');
		} else {
			$("#works").cycle(idx);
		}
		e.preventDefault();
	});

	$(".prev").click(function(e){
		$("#works").cycle(prevIndex, 'scrollRight');
		e.preventDefault();
	});
	$(".next").click(function(e){
		$("#works").cycle(nextIndex, 'scrollLeft');
		e.preventDefault();
	});

	setTimeout(function(){
		$("#works").touchwipe({
			wipeLeft: function(e){
				$("#works").cycle(nextIndex, 'scrollLeft');
				e.preventDefault();
			},
			wipeRight: function(e){
				$("#works").cycle(prevIndex, 'scrollRight');
				e.preventDefault();
			},
			min_move_x: 20,
			min_move_y: 20,
			preventDefaultEvents: false
		});
	}, 250);
}

function startVerticalSlider(ele) {
	var eleHeight = ele.find("img").outerHeight();
	var time = 30000;
	
	ele.find("img").animate({
		top: - eleHeight + ele.outerHeight() + "px"
	}, time, "linear", function(){
		setTimeout(function(){
			ele.find("img").css("top", 0);
			startVerticalSlider(ele);
		}, 5000);
	});
}

function endVerticalSlider(){
	$("#verticalScroller").find("img").stop().css("top", 0);
}