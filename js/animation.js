$(document).ready(function(){
	//Initialize
	//Set the selector in the first tab
	$(".container .TabMenu span:first").addClass("selector");
	
	
	//Basic hover action
	$(".container .TabMenu span").mouseover(function(){
		$(this).addClass("hovering");
	});
	$(".container .TabMenu span").mouseout(function(){
		$(this).removeClass("hovering");
	});				
	
	//Add click action to tab menu
	$(".container .TabMenu span").click(function(){
		//Remove the exist selector
		$(".selector").removeClass("selector");
		//Add the selector class to the sender
		$(this).addClass("selector");
		
		//Find the width of a tab
		var TabWidth = $(".TabContent:first").width();
		if(parseInt($(".TabContent:first").css("margin-left")) > 0)
			TabWidth += parseInt($(".TabContent:first").css("margin-left"));
		if(parseInt($(".TabContent:first").css("margin-right")) >0)
			TabWidth += parseInt($(".TabContent:first").css("margin-right"));
		//But wait, how far we slide to? Let find out
		var newLeft = -1* $("span").index(this) * TabWidth;
		//Ok, now slide
		$(".AllTabs").animate({
			left: + newLeft + "px"
		},1000);
	});
});