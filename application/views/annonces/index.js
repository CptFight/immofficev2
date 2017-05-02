

var annonces = annonces || {
    
};


/*********************************
*   @name : bind
*   params : /
*   bind  instance  
*********************************/
annonces.bind = function(){
   
   $('#button-search').click(function(e){
    e.preventDefault();
    annonces.criterias.price_min = $('#price-min').val(); 
    annonces.criterias.price_max = $('#price-max').val(); 
    annonces.criterias.date_min = $('#date-min').val(); 
    annonces.criterias.date_max = $('#date-max').val(); 
    annonces.criterias.province = $('#province').val();
    annonces.criterias.zipcode = $('#zipcode').val(); 
    annonces.criterias.lang = $("input[name='lang']:checked").val();
    annonces.criterias.vente = $("input[name='vente']:checked").val();  
    annonces.tableObject.api().ajax.reload(); 

    $.ajax({
        type: "POST",
        url: base_url()+"index.php/users/saveLastSearch",
        dataType: 'json',
        data: {
            user_id : $('#user_id').val(),
            price_min : $('#price-min').val(), 
            price_max : $('#price-max').val(),
            province : $('#province').val(),
            zipcode : $('#zipcode').val(),
            lang : $("input[name='lang']:checked").val(),
            vente : $("input[name='vente']:checked").val(),
            daterange : $('#reportrange').val(),
        },
        success: function(response){
           
        }
    });

   });

    annonces.tableObject.on('click','.table-btn-link', function (e) { 

        var checkbox = $(this).closest('tr').find('.visited');
        checkbox.attr('checked',true);

        var annonce_id = $(this).data('annonce_id');
        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/addOrRemoveVisited",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id,
                add : true 
            },
            success: function(response){
              // console.log('response',response);
            }
        });

    });

    annonces.tableObject.on('click','.add_favoris', function (e) { 
        e.preventDefault();
        var annonce_id = $(this).closest('ul').data('annonce_id');

        var count_favoris = $('.alert-tag.favoris').html();
        var count_rappels = $('.alert-tag.rappels').html();

        var add = true;
        if(!$(this).hasClass('active')){
            $(this).addClass('active');
            count_favoris++;
        }else{
            $(this).removeClass('active');
            if($(this).closest('ul').find('.add_rappel').hasClass('active')){
                count_rappels--;
                $(this).closest('ul').find('.add_rappel').removeClass('active');
            }
            
            add = false;
            count_favoris--;
           
        }
        $('.alert-tag.favoris').html(count_favoris);
        $('.alert-tag.rappels').html(count_rappels);

        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/addOrRemoveFavoris",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id,
                add : add 
            },
            success: function(response){
                if(add && typeof response.direct_access_page != 'undefined' && response.direct_access_page){
                    document.location.href = response.direct_access_page+"&back_path=annonces/index";
                }
            }
        });
    });

    annonces.tableObject.on('click','.visited', function (e) { 
        var annonce_id = $(this).closest('tr').find('ul').data('annonce_id');
        add = false;
        if($(this).is(':checked')){
            add = true;
        }

        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/addOrRemoveVisited",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id,
                add : add 
            },
            success: function(response){
              // console.log('response',response);
            }
        });
    });

    annonces.tableObject.on( 'click', 'tr td:first()', function () {
       annonces.activeFavorisRappelVisits();
    } );

    annonces.tableObject.on('click','.add_rappel', function (e) { 
        e.preventDefault();
        var annonce_id = $(this).closest('ul').data('annonce_id');

        var count_favoris = $('.alert-tag.favoris').html();
        var count_rappels = $('.alert-tag.rappels').html();

        var add = true;
        if(!$(this).hasClass('active')){
            if(!$(this).closest('ul').find('.add_favoris').hasClass('active')){
                count_favoris++;
                $(this).closest('ul').find('.add_favoris').addClass('active');
            }
            
            $(this).addClass('active');
            count_rappels++;
        }else{
            $(this).removeClass('active');
            add = false;
            count_rappels--;
        }

        $('.alert-tag.favoris').html(count_favoris);
        $('.alert-tag.rappels').html(count_rappels);

        $.ajax({
            type: "POST",
            url: base_url()+"index.php/users/addOrRemoveRappels",
            dataType: 'json',
            data: {
                user_id : $('#user_id').val(),
                annonce_id : annonce_id,
                add : add 
            },
            success: function(response){
                if(add && typeof response.direct_access_page != 'undefined' && response.direct_access_page){
                    document.location.href = response.direct_access_page+"&back_path=annonces/index";
                }
            }
        });
    });
}

annonces.bindElementTable = function(){

}


annonces.activeFavorisRappelVisits = function(){
    $.ajax({
        type: "POST",
        url: base_url()+"index.php/users/getListIdFavorisRappelVisits",
        dataType: 'json',
        data: {
            user_id : $('#user_id').val()
        },
        success: function(favoris_rappels_list){
            $('#annonces ul.list-tables-buttons').addClass('tes');
            $('#annonces ul.list-tables-buttons').each(function(e){
                var annonce_id = $(this).data('annonce_id');

            
                var index = favoris_rappels_list.favoris.indexOf(annonce_id.toString());
               
                if(index != -1){
                    $(this).find('.add_favoris').addClass('active');
                }

                var index = favoris_rappels_list.rappels.indexOf(annonce_id.toString());
                if(index != -1){
                    $(this).find('.add_rappel').addClass('active');
                }

                var index = favoris_rappels_list.visits.indexOf(annonce_id.toString());
                if(index != -1){
                    $(this).closest('tr').find('.visited').attr('checked',true);
                }                
            });
        }
    });
}

annonces.refreshResult = function(){
    $('#num_result').html(annonces.current_number_annonces);
}

annonces.insertExport = function(type){
    $.ajax({
        type: "POST",
        url: base_url()+"index.php/exports/insertExport",
        dataType: 'json',
        data: {
            user_id : $('#user_id').val(),
            nb_annonces : annonces.current_number_annonces,
            type : type,
            page : 'annonces'
        },
        success: function(response){
           
        }
    });
}

/* ----- Tables ----- */
/* ------------------- */
annonces.initTableDatatablesResponsive = function () {
    var table = $('#annonces_table');

    if(!annonces.tableObject){
        annonces.tableObject = table.dataTable({
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
                data :function ( d ) {
                   return  $.extend(d, annonces.criterias);
                }/*{
                    date_min : $('#date-min').val(),
                    date_max : $('#date-max').val(),
                    price_min : $('#price-min').val(),
                    price_max : $('#price-max').val(),
                    zipcode : $('#zipcode').val(),
                    province : $('#province').val(),
                    lang : $("input[name='lang']:checked").val(),
                    vente : $("input[name='vente']:checked").val(),
                }*/,
                url : base_url()+"index.php/annonces/getAllannoncesDataTable",
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
                        annonces.insertExport('print');
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
                        annonces.insertExport('pdf');
                        $.fn.dataTable.ext.buttons.pdfHtml5.action(e, dt, button, config);
                    }
                },{ 
                    extend: 'csv', 
                    className: 'btn purple btn-outline ',
                    orientation: 'landscape',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 8, 9, 10, 11, 13 ]
                    },
                    action  : function(e, dt, button, config) {
                        annonces.insertExport('csv');
                        $.fn.dataTable.ext.buttons.csvHtml5.action(e, dt, button, config);
                    }
                }
            ],

            // setup responsive extension: http://datatables.net/extensions/responsive/
            responsive: true,
            parseTime: false,
            fnDrawCallback : function(e){
                annonces.activeFavorisRappelVisits();
                annonces.bindElementTable();
                annonces.current_number_annonces = e._iRecordsDisplay;
                annonces.refreshResult();
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


annonces.initSearchValues = function(){

    var config = {
        '.chosen-select' : {
           'width' : '100%'
        }  
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    var date_min = $('#date-min').val();
    var date_max = $('#date-max').val();

    if(!date_min){
        date_min = moment().subtract(1, 'month').format("X");
    }

    if(!date_max){
        date_max = moment().format("X");
    }

    var today_label = translate('today');
    var two_days_ago = translate('two_days_ago');
    var one_week_ago = translate('one_week_ago');
    var one_month_ago = translate('one_month_ago');
    var since_begin_of_the_month = translate('since_begin_of_the_month');
     
    var ranges = [
    ];

    ranges[today_label] = [moment(), moment()];
    ranges[two_days_ago] = [moment().subtract(1, 'days'), moment()];
    ranges[one_week_ago] = [moment().subtract(6, 'days'), moment()];
    ranges[one_month_ago] = [moment().subtract(29, 'days'), moment()];
    ranges[since_begin_of_the_month] = [moment().startOf('month'), moment().endOf('month')];
   
    $('#reportrange').daterangepicker({
        startDate: moment.unix(date_min),
        endDate: moment.unix(date_max),
        minDate: '01/01/2017',
        maxDate: '12/31/2020',
      
        dateLimit: { days: 60 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: ranges,
        opens: 'right',
        drops: 'down',
        buttonClasses: ['btn-range', 'btn-sm'],
        applyClass: 'btn-primary',
        cancelClass: 'btn-default',
        separator: translate('separator'),
        locale: {
            format: 'DD/MM/YYYY',
            applyLabel: translate('submit'),
            cancelLabel: translate('cancel'),
            fromLabel: translate('from'),
            toLabel: translate('to'),
            customRangeLabel: translate('custom'),
            daysOfWeek: [translate('week_7_small'),translate('week_1_small'), translate('week_2_small'), translate('week_3_small'), translate('week_4_small'), translate('week_5_small'), translate('week_6_small')],
            monthNames: [translate('month_1'), translate('month_2'), translate('month_3'), translate('month_4'), translate('month_5'), translate('month_6'), translate('month_7'), translate('month_8'), translate('month_9'), translate('month_10'), translate('month_11'), translate('month_12')],
            firstDay: 1
        }
    }, function(start, end, label) {
        $('#annonces #date-min').val(start.hours(0).minutes(0).seconds(0).format("X"));
        $('#annonces #date-max').val(end.hours(22).minutes(59).seconds(59).format("X"));
    });

    $('#annonces #date-min').val(moment.unix(date_min).hours(0).minutes(0).seconds(0).format("X"));
    $('#annonces #date-max').val(moment.unix(date_max).hours(22).minutes(59).seconds(59).format("X"));

    annonces.criterias.date_min = $('#annonces #date-min').val();
    annonces.criterias.date_max = $('#annonces #date-max').val();
    
}


/*********************************
*   @name : init
*   params : /
*   init  instance  
*********************************/
annonces.init = function(){

    annonces.tableObject = false;
    annonces.criterias = {
        date_min : $('#date-min').val(),
        date_max : $('#date-max').val(),
        price_min : $('#price-min').val(),
        price_max : $('#price-max').val(),
        zipcode : $('#zipcode').val(),
        province : $('#province').val(),
        lang : $("input[name='lang']:checked").val(),
        vente : $("input[name='vente']:checked").val()
    };
    annonces.current_number_annonces = 0;


    annonces.initSearchValues();
    annonces.initTableDatatablesResponsive();
    annonces.bind();
}

/*********************************
*   @name : (window).load
*   params : /
*   Call init method on windows load    
*********************************/
$(document).ready(function() {     
    annonces.init();
});


