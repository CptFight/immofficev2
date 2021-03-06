

var rappels = rappels || {
   
};


/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
rappels.bind = function(){
}


rappels.insertExport = function(type){
    $.ajax({
        type: "POST",
        url: base_url()+"index.php/exports/insertExport",
        dataType: 'json',
        data: {
            user_id : $('#user_id').val(),
            nb_annonces : rappels.nb_elems,
            type : type,
            page : 'rappels'
        },
        success: function(response){
           
        }
    });
}

rappels.bindElementTable = function(){
    
    $('#annonces .add_rappels').click(function(e){
        e.preventDefault();
        var annonce_id = $(this).closest('ul').data('annonce_id');

        if(!$(this).hasClass('active')){
            $(this).addClass('active');
        }else{
            $(this).removeClass('active');
        }
        
        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/updateFavoris",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id
            },
            success: function(response){
               console.log('response',response);
            }
        });
        
    });

    $('#rappels_table td').click(function(e){
        //Set historic price and publication
      //  console.log('passe',$(this).closest('tr').next().find('span.historic_price').html() );
      //  $(this).closest('tr').find('span.historic_price').html('test');
        
   });
}



/* ----- Tables ----- */
/* ------------------- */
rappels.initTableDatatablesResponsive = function () {
    var table = $('#rappels_table');
    
    if(!rappels.tableObject){
        rappels.tableObject = table.dataTable({
            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No data available in table",
                "info": "",
                "infoEmpty": "No entries found",
                "infoFiltered": "",
                "lengthMenu": "_MENU_",
                "search": translate('key_word'),
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
                url : base_url()+"index.php/rappels/getAllRappelsDataTable",
            },
            
            /* end param server side */

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // setup buttons extentension: http://datatables.net/extensions/buttons/
            buttons: [
                { 
                    extend: 'print', 
                    className: 'btn dark btn-outline',
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 8, 9, 10, 11, 13 ]
                    },
                    action  : function(e, dt, button, config) {
                        rappels.insertExport('print');
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    } 

                },{ 
                    extend: 'pdf', 
                    className: 'btn green btn-outline', 
                    orientation: 'landscape', 
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 8, 9, 10, 11, 13 ]
                    },
                    action  : function(e, dt, button, config) {
                        rappels.insertExport('pdf');
                        $.fn.dataTable.ext.buttons.pdfHtml5.action(e, dt, button, config);
                    }
                },{ 
                    extend: 'csv', 
                    text: 'Excel 1',
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    fieldSeparator: ',',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 8, 9, 10, 11, 13 ]
                    },
                    action  : function(e, dt, button, config) {
                        rappels.insertExport('csv');
                        $.fn.dataTable.ext.buttons.csvHtml5.action(e, dt, button, config);
                    }
                },{ 
                    extend: 'csv', 
                    text: 'Excel 2',
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    fieldSeparator: ';',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 8, 9, 10, 11, 13 ]
                    },
                    action  : function(e, dt, button, config) {
                        rappels.insertExport('excel');
                        $.fn.dataTable.ext.buttons.csvHtml5.action(e, dt, button, config);
                    }
                }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            parseTime: false,
            fnDrawCallback : function(e){
                rappels.bindElementTable();
                rappels.nb_elems = e._iRecordsDisplay;
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

            "dom": "<'row' <'col-md-12'B>><'row'<'col-md-6 col-sm-12'f><'col-md-6 col-sm-12'p>r><'table-scrollable't><'row'<'col-md-5 col-sm-12'l><'col-md-7 col-sm-12'p>>", // horizobtal scrollable datatable

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
rappels.init = function(){

    rappels.tableObject = false;
    rappels.nb_elems = 0;
    rappels.initTableDatatablesResponsive();
    rappels.bind();
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    rappels.init();

});


