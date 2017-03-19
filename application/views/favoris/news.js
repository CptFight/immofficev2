

var news = news || {
   
};


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
news.init = function(){
	var date = new Date();
	$('#datetimepicker_rappel').datetimepicker({
		format: 'DD/MM/YYYY HH:mm',
		locale: 'fr',
		defaultDate: new Date()
	}).on("dp.show", function(){
		if ($('#date_rappel').val() == ''){
	    	var date = new Date();  	
	        $(this).data('DateTimePicker').date(date.getDate() + "/" + (date.getMonth()+1) + "/" + date.getFullYear() + " 12:00");
	        
	    }
	});

	$('#datetimepicker_publication').datetimepicker({
		format: 'DD/MM/YYYY',
		locale: 'fr',
		defaultDate: new Date()
	}).on("dp.show", function(){
		if ($('#date_rappel').val() == ''){
	    	var date = new Date();  	
	        $(this).data('DateTimePicker').date(date.getDate() + "/" + (date.getMonth()+1) + "/" + date.getFullYear() );
	        
	    }
	});
	
  	$('.tab').hide();
 	$('.active').show();
  	$('.tabs div').on('click',function(){
	    $('.tabs div').removeClass('active');
	    $(this).addClass('active')
	    $('.tab').hide();
	    var activeTab = $(this).attr('id');
	    $("."+activeTab).show();
	    return false;
	 });

}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    news.init();

});





