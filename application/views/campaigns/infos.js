$(document).ready(function() { 

	$(".inputwithsecondary").click(function() {
		var secondary = $(this).data("secondary");
	    if($(this).is(":checked")) 
	    {
	        $("."+secondary).removeClass("hidden");
	    }
	    else 
	    {
	    	$("."+secondary).addClass("hidden");
	    }
	});
});