

var favoris_edit = favoris_edit || {
   
};


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
favoris_edit.init = function(){
	var date = new Date();
	$('#datetimepicker_rappel').datetimepicker({
		format: 'DD/MM/YYYY HH:mm',
		locale: 'fr'
		//defaultDate: new Date()
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


    $('.remove-remark').click(function(e){
        $(this).closest('tr').remove();
        var id = $(this).closest('ul').data('id');
        console.log('id',id);
        e.preventDefault();
            $.ajax({
            type: "POST",
            url: base_url()+"index.php/favoris/removeRemark",
            dataType: 'json',
            data: {
                id : id
             
            },
            success: function(response){
               
            }
        });

   });

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
  	   
    $('.tab').hide();
 	$('.active').show();
  	$('.tabs div').on('click',function(){
	    $('.tabs div').removeClass('active');
	    $(this).addClass('active');
        var thisselect = $(this).attr("data-select");

        $('#current_tab').val(thisselect);

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

    $('.load-owner').click(function(e){
        e.preventDefault();

        if (confirm(translate('load_owner_validate'))) { 
            var infos = $(this).closest('ul');
            $('#owner_id').val(infos.data('id'));
            $('#owner_name').val(infos.data('name'));
            $('#owner_tel').val(infos.data('tel'));
            $('#owner_mail').val(infos.data('email'));
            $('#note_owner').val(infos.data('note'));
            $('#owner_status').val(infos.data('status_id'));
        }
       
    });

}

/* ----- Tables ----- */
/* ------------------- */


favoris_edit.initTableDatatablesResponsive = function () {
    var table = $('#favoris_edit_table');

    if(!favoris_edit.tableObject){
        favoris_edit.tableObject = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                
            },
            searching:true,
            bShowAll: false,
            buttons: [],


            "order": [
                [1, 'desc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        });
    }

    var table = $('#owner_table');

    if(!favoris_edit.tableObjectOwner){
        favoris_edit.tableObjectOwner = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "No entries found",
                "infoFiltered": "(filtered1 from _MAX_ total entries)",
                "lengthMenu": "_MENU_ entries",
                "search": "Search:",
                "zeroRecords": "No matching records found",
                
            },
            searching:true,
            bShowAll: false,
            "order": [
                [1, 'desc']
            ],
            buttons: [],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 5,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable
        });
    }

};
/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    favoris_edit.init();
    favoris_edit.initTableDatatablesResponsive();
    $(".date-mobile").hide();
	$(".date-desktop").show();
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 	$(".date-desktop").remove();
	 	$(".date-mobile").show();
	}
	else 
	{
		$(".date-mobile").remove();
		$(".date-desktop").show();
	}
});





