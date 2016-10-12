$(document).ready(function () {
	$(".show").click(function () {
      $(this).next(".hidden").slideToggle("fast");
      return false;
    });
	
	if($("#chapter").length > 0){
		var newUrl;
		pathName = window.location.pathname;
		$(".ffSelect").find(".newLocation option").each(function(){
			if($(this).val() == pathName){
				$(this).attr("selected", "selected");
			}
		});
		
		$(".newLocation").bind("change blur", function(){
			if ($(this).val()!='') {
				window.location.href=$(this).val();
			}
		});
	}
	
	if($(".stories").length > 0){
		$(".stories").find(".hidden").each(function(){
			if($(this).find(".story").length <= 0){
				$(this).prev(".sectionHead").css("display", "none");	
			}
		});
	}
	
	if($("#blur").length > 0){
		var header = "<h2>Warning!</h2>";
		var para1 = "<p>This chapter contains explicit content meant for readers over the age of 18.</p>";
		var para2 = "<p>Please read at your own risk, click the link below to continue</p>";
		var accept = "<a href=\"javascript:void(0);\" class=\"accept\">Continue to Story</a>";
		var message = header + para1 + para2 + accept;
		
		$("#blur").append("<div id=\"explicitWarning\">" + message + "</div>");
		
		$(".accept").click(function(){
			closeWarningPopup();
		});
	}
	
//	if($(".fbLike").length > 0){
//		$(".fbLike").each(function(){
//			$(this).append("<div class=\"fb-like\" data-href=\"" + document.location.href + "\" data-send=\"false\" data-layout=\"button_count\" data-width=\"100\" data-show-faces=\"true\"></div>");						   
//		});
//	}
	
	if($(".coverImage").length > 0){
		$(".coverImage").each(function(){
			var coverWidth = $(this).find("img").outerWidth();
			var coverHeight = $(this).find("img").outerHeight();
			if(coverWidth > 695){
				$(this).find("img").css("width", "695px");
			} else if (coverWidth > 695){
				$(this).find("img").css("height", "695px");
			} else if (coverWidth > 695 && coverHeight > 695){
				$(this).find("img").css("width", "695px");
			}
		});
	}
	
	InitSakura();
	startPawsAnimation();
	
	if ($("#tweets").length > 0) {
        $("#twitter_container").jScrollPane({
            showArrows: true,
            verticalArrowPositions: 'os',
            horizontalArrowPositions: 'os',
			autoReinitialise: true
        });
    }
});

function closeWarningPopup() {
	$("#blur").removeClass("blur");
	$("#explicitWarning").fadeOut(500, function(){
		$(this).remove();
	});
}

var count = 0;
var petalCount = 30;
var basePath = "http://wolfblossom.mysticallegends.us";
var isTestMode = false;

if(isTestMode){
	basePath = "http://localhost/wolf_upgrade";
}

function InitSakura() {
	//$("#header #sakura")
	var sakuraWrapHeight = $("#header #sakura").outerHeight();
	var sakuraWrapWidth = $("#header #sakura").outerWidth();
	
	for(i = 0; i < petalCount; i++){
		var sakuraClass = "sakuraPetal" + i;
		var randomPetal = Math.floor(Math.random() * 4) + 1;
		var sakuraHeight = 15;
		var minStart = -sakuraHeight;
		var maxStart = minStart - 300;
		var sakuraStart = Math.floor(minStart + (Math.random() * (maxStart - minStart)));
		var minDropHeight = -sakuraHeight;
		var maxDropHeight = sakuraHeight + 300;
		var dropHeight = Math.floor(minDropHeight + (Math.random() * (maxDropHeight - minDropHeight)));
		var randomLeft = Math.floor(Math.random() * (sakuraWrapWidth + 200) - 200);
		var randomTime = Math.floor(3000 + (Math.random() * (7000 - 3000)));
		var randomDelay = Math.floor(250 + (Math.random() * (5000 - 250)));
		var fadeDelay = Math.floor(250 + (Math.random() * (1500 - 250)));
		
		$("#sakura").append("<div class='petal sakuraPetal" + i + "' style='display:none'><img src='" + basePath + "/themes/wolfblossom/images/petals/petal0" + randomPetal + ".png' width='15' height='15' alt='petal' /><span class='drop-height'>" + dropHeight + "</span></div>");
		
		$("." + sakuraClass).css("display", "block");
		$("." + sakuraClass).css("left", randomLeft + "px");
		$("." + sakuraClass).css("top", sakuraStart + "px");
		
		$("." + sakuraClass).each(function () {
			var destination = Math.floor(320 + (Math.random() * (320 - 450))) + "px";
			$(this).delay(randomDelay).animate({
				top: destination
			}, randomTime, "linear", function () {
				$(this).fadeOut(500, function(){
					$(this).remove();
					count++;
					randomizePetal();
				});
			}).delay(fadeDelay);
		});
	}
}

function randomizePetal(){
	sakuraWrapHeight = $("#header #sakura").outerHeight();
	sakuraWrapWidth = $("#header #sakura").outerWidth();
	var randomPetal2 = Math.floor(Math.random() * 4) + 1;
	
	sakuraHeight = 15;
	minStart = -sakuraHeight;
	maxStart = minStart - 300;
	var sakuraStart2 = Math.floor(minStart + (Math.random() * (maxStart - minStart)));
	minDropHeight = -sakuraHeight;
	maxDropHeight = sakuraHeight + 300;
	var dropHeight2 = Math.floor(minDropHeight + (Math.random() * (maxDropHeight - minDropHeight)));
	var randomLeft2 = Math.floor(Math.random() * (sakuraWrapWidth + 200) - 200);
	var randomTime2 = Math.floor(2000 + (Math.random() * (7000 - 2000)));
	var randomDelay2 = Math.floor(250 + (Math.random() * (5000 - 250)));
	var fadeDelay2 = Math.floor(250 + (Math.random() * (1500 - 250)));
	
	$("#sakura").append("<div class='petalNew petalNew" + count +"'><img src='" + basePath + "/themes/wolfblossom/images/petals/petal0" + randomPetal2 + ".png' width='15' height='15' alt='petal' /><span class='drop-height'>" + dropHeight2 + "</span></div>");
	
	$(".petalNew" + count).css("left", randomLeft2 + "px");
	$(".petalNew" + count).css("top", sakuraStart2 + "px");
	
	$(".petalNew" + count).each(function () {
		var destination2 = Math.floor(320 + (Math.random() * (320 - 450))) + "px";
		$(this).delay(randomDelay2).animate({
			top: destination2
		}, randomTime2, "linear", function () {
			$(this).fadeOut(500, function(){
				$(this).remove();
				count++;
				if(count >= petalCount * 2){
					count = 0;
				}
				randomizePetal();
			});
		}).delay(fadeDelay2);
	});
}

var pawCount = 1;
var maxPaws = 0;

function startPawsAnimation(){
	$("#paws").find(".paw").each(function(){
		maxPaws++;
	});
	
	pawPrints();
}

function pawPrints() {
	if(pawCount <= maxPaws){
		$(".paw_" + pawCount).fadeIn(500).delay(1000).fadeOut(500, function(){
			pawCount++;
			pawPrints();
		});
	} else {
		pawCount = 1;
		pawPrints();
	}
}