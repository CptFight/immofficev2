var owner = owner || {
   
};

owner.init = function(){

}

/* ----- Tables ----- */
/* ------------------- */
owner.initTableDatatablesResponsive = function () {
    var table = $('#owner_table');

    if(!owner.tableObject){
        owner.tableObject = table.dataTable({
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
             // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { 
                    extend: 'print', 
                    className: 'btn dark btn-outline',
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 5]
                    },
                    action  : function(e, dt, button, config) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    } 

                },{ 
                    extend: 'pdf', 
                    className: 'btn green btn-outline', 
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 5]
                    },
                    action  : function(e, dt, button, config) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.action(e, dt, button, config);
                    }
                },{ 
                    extend: 'csv', 
                    text: 'Excel 1',
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    fieldSeparator: ',',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3,  5]
                    },
                    action  : function(e, dt, button, config) {
                        $.fn.dataTable.ext.buttons.csvHtml5.action(e, dt, button, config);
                    }
                },{ 
                    extend: 'csv', 
                    text: 'Excel 2',
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    fieldSeparator: ';',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 5]
                    },
                    action  : function(e, dt, button, config) {
                        $.fn.dataTable.ext.buttons.csvHtml5.action(e, dt, button, config);
                    }
                }

            ],
           


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

};
/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() { 
    owner.init();  
    owner.initTableDatatablesResponsive();
});
