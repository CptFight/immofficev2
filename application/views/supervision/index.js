

var admin = admin || {
};

admin.initTableDatatablesResponsive = function () {
    var table = $('#connexion_table');

    if(!admin.connexion_table_object){
        admin.connexion_table_object = table.dataTable({
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
            /* end param server side */

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            "processing": true,
            "serverSide": true,
            "ajax": {
                data : {
                     agence_id : $('#agence_id').val()
                },
                url : base_url()+"index.php/supervision/getAllConnectionDataTable",
               
            },
            
            "order": [
                [1, 'desc']
            ],
            

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { 
                    extend: 'print', 
                    className: 'btn dark btn-outline',
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, ]
                    } 
                },{ 
                    extend: 'pdf', 
                    className: 'btn green btn-outline', 
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, ]
                    } 
                },{ 
                    extend: 'csv', 
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, ]
                    } 
                }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
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

    var table_admin = $('#admin_table');

         admin.table_admin_object = table_admin.dataTable({
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
            /* end param server side */

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            "processing": true,
            "serverSide": true,
            "ajax": {
                data : {
                     agence_id : $('#agence_id').val()
                },
                url : base_url()+"index.php/supervision/getAllDataTable"
            },

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { 
                    extend: 'print', 
                    className: 'btn dark btn-outline',
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ,6,7 ,8,9,10]
                    } 
                },{ 
                    extend: 'pdf', 
                    className: 'btn green btn-outline', 
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ,6,7 ,8,9,10]
                    } 
                },{ 
                    extend: 'csv', 
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5 ,6,7 ,8,9,10]
                    } 
                }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
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
    
};


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
admin.init = function(){

    admin.connexion_table_object = false;
    admin.table_admin_object = false;


    admin.initTableDatatablesResponsive();
     
       
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
    admin.init();

});





