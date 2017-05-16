

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
	    $(this).addClass('active');
        var thisselect = $(this).attr("data-select");

        $('#tabsselect').removeAttr('selected');
        $('#tabsselect').find('option[value="'+thisselect+'"]').attr("selected",true);

	    $('.tab').hide();
	    var activeTab = $(this).attr('id');
	    $("."+activeTab).show();
	    return false;
	});
    $("#tabsselect").on("change", function(){
        $('.tabs div').removeClass('active');
        $('#tabsselect').removeAttr('selected');
        var thisvalue = $(this).val();

        $("#"+thisvalue).addClass('active');
        
        $('.tab').hide();
        $("."+thisvalue).show();
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

    $(".date-mobile").hide();
	$(".date-desktop").show();
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	$(".date-desktop").hide();
	 	$(".date-mobile").show();
	}
	else 
	{
		$(".date-mobile").hide();
		$(".date-desktop").show();
	}

    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#fields";
        var newIn = '<fieldset class="inputstyle field" id="field' + next + '" ><textarea name="description' + next + '" placeholder=""></textarea><button data-id="field' + next + '" class="remove-me"><i class="fa fa-remove"></i></button></fieldset>';
        $(addto).append(newIn); 
    });
    $(document).on("click", ".remove-me", function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        $("#"+id).remove();
    });
    
});





