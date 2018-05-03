$(document).ready(function() { 
	$("#Glide").glide({
	    type: "carousel", 
	    autoplay: false,
	    afterTransition: function(e){
	    	var template_id = $('.glide__slide').eq(e.index -1).data('template_id');
	    	console.log('template_id',template_id);
	  		$('#template_id').val(template_id);
	    }
	});

	 $('.btn-lightbox a').click(function(event) {
        alert("demo only");
        event.preventDefault();
    }); 
});