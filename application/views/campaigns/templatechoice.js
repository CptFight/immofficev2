$(document).ready(function() { 
	$("#Glide").glide({
	    type: "carousel", 
	    autoplay: false
	});

	 $('.btn-lightbox a').click(function(event) {
        alert("demo only");
        event.preventDefault();
    }); 
});