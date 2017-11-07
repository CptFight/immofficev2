
$(document).ready(function() {    
	$('.btn.delete').click(function(e){
        if (confirm(translate('delete_verif'))) {
            return true;
        }else{
            return false;
        }
    });
});