
$(document).ready(function() {    
	$('.btn.delete').click(function(e){

        bootbox.confirm(translate('delete_verif'), function(result){ 
            if(result == true)
            {
                return true;
	        }else{
	            return false;
	        }

        });
    });
});