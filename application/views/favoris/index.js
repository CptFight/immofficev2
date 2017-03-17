

var favoris = favoris || {
    tableObject : false
};


/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
favoris.bind = function(){
}

favoris.bindElementTable = function(){
    
    $('#annonces .add_rappel').click(function(e){
        e.preventDefault();
        var favoris_id = $(this).closest('ul').data('favoris_id');

        var count_rappels = $('.alert-tag.rappels').html();

        var add = true;
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            count_rappels++;
        }else{
            $(this).removeClass('active');
            add = false;
            count_rappels--;
        }

        $('.alert-tag.rappels').html(count_rappels);

        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/addOrRemoveRappels",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                favoris_id : favoris_id,
                add : add 
            },
            success: function(response){
               console.log('response',response);
            }
        });
        
    });

}



favoris.activeFavorisRappel = function(){

 $.ajax({
        type: "POST",
        url: base_url()+"index.php/users/getListIdFavorisRappelVisits",
        dataType: 'json',
        data: {
            user_id : $('#user_id').val()
        },
        success: function(favoris_rappels_list){
            $('#annonces ul.list-tables-buttons').each(function(e){
                var favoris_id = $(this).data('favoris_id');
                var index = favoris_rappels_list.rappels_favoris_ids.indexOf(favoris_id.toString());
                if(index != -1){
                    $(this).find('.add_rappel').addClass('active');
                }
            });
        }
    });
}



/* ----- Tables ----- */
/* ------------------- */
favoris.initTableDatatablesResponsive = function () {
    var table = $('#favoris_table');
    
    if(!favoris.tableObject){
        favoris.tableObject = table.dataTable({
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
            /* for loadging server side. */
            "processing": true,
            "serverSide": true,
            "ajax": {
                data : {
                    user_id : $('#user_id').val()
                },
                url : base_url()+"index.php/favoris/getAllannoncesDataTable",
            },
            
            /* end param server side */

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { extend: 'print', className: 'btn dark btn-outline' },
                { extend: 'pdf', className: 'btn green btn-outline' },
                { extend: 'csv', className: 'btn purple btn-outline ' }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            parseTime: false,
            fnDrawCallback : function(){
                favoris.activeFavorisRappel();
                favoris.bindElementTable();
            },
            "order": [
                [4, 'desc']
            ],
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row' <'col-md-12'T>><'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",
        });
    }

};


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
favoris.init = function(){
    favoris.initTableDatatablesResponsive();
    favoris.bind();
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    favoris.init();

});


