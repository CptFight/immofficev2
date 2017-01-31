<!--[if lt IE 9]>
	<script src="/assets/global/plugins/respond.min.js"></script>
	<script src="/assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<!--  BEGIN Plugins all pages -->
<script src="/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- End plugins all pages -->

<!-- A Trier -->
<script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
<!--<script src="/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>-->
<script src="/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>

<!-- Home Cateogires-->
<script src="/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<!-- End home categories -->
<script src="/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

<script src="/assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>

<!-- Tags -->
<script src="/assets/global/plugins/flickity/flickity-docs.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/typeahead/handlebars.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/components-bootstrap-tagsinput.min.js" type="text/javascript"></script>



<!-- BEGIN PAGE LEVEL PLUGINS -->
<?php  foreach($plugins_to_load as $plugin):?>
    <script type='text/javascript' src = '<?php echo $plugin;?>'> </script>
<?php endforeach;?>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/assets/global/scripts/app.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?php  foreach($scripts_to_load as $script):?>
    <script type='text/javascript' src = '<?php echo $script;?>'> </script>
<?php endforeach;?>

<script src="/assets/pages/scripts/dashboard.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->


 <!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="/assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="/assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="/assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->



<!-- A TRIER -->
<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/table-datatables-managed.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/icheck/icheck.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/form-icheck.min.js" type="text/javascript"></script>
<!--<script src="/assets/pages/scripts/form-input-mask.min.js" type="text/javascript"></script>-->
<script src="/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
<script src="/assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
<script src="/assets/pages/scripts/charts-morris.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/moment.min.js" type="text/javascript"></script>

<script src="../assets/global/plugins/moment.min.js" type="text/javascript"></script>


<script src="/assets/assetsadmin/js/materialize-plugins/date_picker/picker.js" type="text/javascript"></script>
<script src="/assets/assetsadmin/js/materialize-plugins/date_picker/picker.date.js" type="text/javascript"></script>


<script src="/assets/pages/scripts/components-nouisliders.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/nouislider/wNumb.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/nouislider/nouislider.min.js" type="text/javascript"></script>
<!--
<script type="text/javascript" src="/assetsadmin/js/plugins/jqvmap/jquery-jvectormap-2.0.3.min.js"></script>
<script type="text/javascript" src="/assetsadmin/js/plugins/jqvmap/maps/jquery.vmap.belgium.js" charset="utf-8"></script>
-->


<!-- Range sliders -->
<script src="/assets/global/plugins/ion.rangeslider/js/ion.rangeSlider.min.js" type="text/javascript"></script>

<!-- Google chart 
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>-->

<!-- Modal -->
<script src="/assets/pages/scripts/ui-modals.min.js" type="text/javascript"></script>

 

    


<script type="text/javascript">

//$(document).ready(function () {

	function updateNmargin() {
		console.log('Price discount : '+value_price_ht_discount);
		console.log('Quantity : '+value_quantity);
		console.log('Gross margin : '+value_gmargin);
	    value_nmargin = parseInt(value_price_ht*value_quantity*(value_gmargin/100));
		console.log('Neto margin : '+value_nmargin);
		$('#slider_nmargin').html(value_nmargin);
	}

	function updateGmargin() {
		value_gmargin = parseInt((value_price_ht - value_price_ht_discount)/value_price*100);
 		$('#slider_gmargin').html(value_gmargin); 
	}

	function updatePprice() {
		value_price = parseInt(-value_pp/((value_gmargin/100)-1)*100)/100;
 		$('#slider_price').html(value_price);
 		$range_price.val(value_price);
	}

	function updateEVATprice() {
		value_price_ht = parseInt((value_price - (value_price * value_vat))*100)/100;
 		$('#slider_price_evat').html(value_price_ht);
	}

	function updateSellmargin() {
		value_pourcentagesell = value_pourcentagesell*9;
 		$('#slider_nbreProduits').html(value_pourcentagesell);
	}

	if($(".page-content").attr("id") == "home")
	{
		/* Slider */
		var keypressSlider = document.getElementById('slider'),
		input = document.getElementById('slider_value');

		var $range_price = $("#range_price");
		var $range_quantity = $("#range_quantity");
		var $range_gmargin = $("#range_gmargin");
		var $range_discount = $("#range_discount");
		var $range_nmargin = $("#range_nmargin");

		var $range_nproduits = $("#range_pourcentagesell");

		var value_price = parseFloat($('#slider_basis_price').val());
		var value_quantity = parseInt($('#slider_basis_quantity').val());
		var value_gmargin = parseInt($('#slider_basis_gmargin').val());
		var value_discount = parseInt($('#slider_basis_discount').val());
		var value_nmargin = parseInt($('#slider_basis_nmargin').val());
		var value_pp = parseInt($('#slider_basis_pp').val());
		var value_sp = parseInt($('#slider_basis_sp').val());
		var value_vat = parseInt($('#slider_basis_vat').val())/100;
		var value_pourcentagesell = parseInt($('#slider_nbreProduits').val()); 
		var value_price_ht = parseInt((value_price - (value_price * value_vat))*100)/100;
		var value_price_ht_discount = parseInt((value_price_ht - (value_price_ht * value_discount))*100)/100;

		$range_price.ionRangeSlider({
		    min: 0.90,
		    max: 20,
		    type: 'single',
		    postfix: "€",
		    step: 0.05,
		    onChange: function (data) {
		        value_price = parseFloat(data["from"]);
			    $('#slider_price').html(value_price);
				updateEVATprice();
			    updateGmargin();
			    updateNmargin();
		    },
		});

		$range_quantity.ionRangeSlider({
		    min: 1,
		    max: 1000,
		    type: 'single',
		    onChange: function (data) {
		        value_quantity = parseInt(data["from"]);
			    $('#slider_quantity').html(value_quantity); 
			    updateGmargin();
			    updateNmargin();
		    },
		});

		$range_gmargin.ionRangeSlider({
		    min: 0,
		    max: 100,
		    type: 'single',
		    postfix: "%",
		    onChange: function (data) {
		        value_gmargin = parseFloat(data["from"]);
			    $('#slider_gmargin').html(value_gmargin);
				updatePprice();
			    updateNmargin();
		    },
		});

		$range_discount.ionRangeSlider({
		    min: 0,
		    max: 100,
		    type: 'single',
		    postfix: "%",
		    onChange: function (data) {
		        value_discount = parseInt(data["from"]);
			    $('#slider_discount').html(value_discount); 
				value_discount /= 100;
				value_price_ht_discount = parseInt((value_price_ht - (value_price_ht * value_discount))*100)/100;
			    updateGmargin();
			    updateNmargin();
		    },
		});

		$range_nproduits.ionRangeSlider({
		    min: 0,
		    max: 100,
		    type: 'single',
		    postfix: "%",
		    onChange: function (data) {
		        value_pourcentagesell = parseInt(data["from"]);
			    updateSellmargin();
		    },
		});

		/* Morris chart */

		var graph = new Morris.Line({
			  	// ID of the element in which to draw the chart.
			  	element: 'morris_chart_1',
			  	// Chart data records -- each entry in this array corresponds to a point on
			  	// the chart.
			  	data: [
			  		{ hour: '2016-09-8 04:00', a: 100, b: 90, c:100 , d:47, e:40},
			  	    { hour: '2016-09-8 08:00', a: 75,  b: 65, c:50 , d:65, e:65 },
			  	    { hour: '2016-09-8 12:00', a: 50,  b: 40, c:50 , d:65, e:75},
			  	    { hour: '2016-09-8 16:00', a: 75,  b: 65, c:40 , d:75, e:65},
			  	    { hour: '2016-09-8 20:00', a: 50,  b: 40, c: 40, d:36, e:65},
			  	    { hour: '2016-09-8 24:00', a: 75,  b: 65, c:75 , d:40, e:50}
			  	],
			  	// The name of the data record attribute that contains x-values.
			  	xkey: 'hour',
			  	// A list of names of data record attributes that contain y-values.
			  	ykeys: ['a', 'b', 'c', 'd', 'e'],
			  	resize: true,
			  	// Labels for the ykeys -- will be displayed when you hover over the
			  	// chart.
			  	labels: ['Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5']
			});

			var graph = new Morris.Line({
			  	// ID of the element in which to draw the chart.
			  	element: 'morris_chart_2',
			  	// Chart data records -- each entry in this array corresponds to a point on
			  	// the chart.
			  	data: [
			  		{ hour: '2016-09-8 04:00', a: 100, b: 90, c:100 , d:47, e:40},
			  	    { hour: '2016-09-8 08:00', a: 75,  b: 65, c:50 , d:65, e:65 },
			  	    { hour: '2016-09-8 12:00', a: 50,  b: 40, c:50 , d:65, e:75},
			  	    { hour: '2016-09-8 16:00', a: 75,  b: 65, c:40 , d:75, e:65},
			  	    { hour: '2016-09-8 20:00', a: 50,  b: 40, c: 40, d:36, e:65},
			  	    { hour: '2016-09-8 24:00', a: 75,  b: 65, c:75 , d:40, e:50}
			  	],
			  	// The name of the data record attribute that contains x-values.
			  	xkey: 'hour',
			  	// A list of names of data record attributes that contain y-values.
			  	ykeys: ['a', 'b', 'c', 'd', 'e'],
			  	resize: true,
			  	// Labels for the ykeys -- will be displayed when you hover over the
			  	// chart.
			  	labels: ['Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5']
			});

			

		/*window.Morris.Donut.prototype.setData = function(data, redraw) {
		    if (redraw == null) {
		        redraw = true;
		    }
		    this.data = data;
		    this.values = (function() {
		    var _i, _len, _ref, _results;
		    _ref = this.data;
		    _results = [];
		    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
		        row = _ref[_i];
		        _results.push(parseFloat(row.value));
		    }
		    return _results;
		    }).call(this);
		    this.dirty = true;
		    if (redraw) {
		        return this.redraw();
		    }
		}
		

		var donut = Morris.Donut({
		  	element: 'donut-example',
		  	resize: true,
		  	colors:['#7fae73',"#00aac5"],
		  	data: [
		    	{label: "Prescriptions", value: 41},
		    	{label: "Non Prescriptions", value: 59}
		  	]
			}).on('click', function(i, row){
				var path = row.label;
			    var url = window.location.href;
			    path = path.replace(/ /g,'').toLowerCase();
			    //window.location.href = ""+url+"categories?section="+path+"";
		});

		donut.options.data.forEach(function(label, i) {
		    var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<br><span>&nbsp;</span>');
		    legendItem.find('span')
		      .css('backgroundColor', donut.options.colors[i])
		      .css('width', '20px')
		      .css('display', 'inline-block')
		      .css('margin', '5px');
		    $('#legend').append(legendItem)
		 });*/



		/* Changements de dates // charts */
		$('.dates-charts').on('click', function(){

			var dateId = $(this).children('input').attr('id'); //ID = "day" or "month" or "week"
			var dateName = $(this).children('input').attr('name'); //dateName = "date-" + ("topcategories" OR "topsections" OR "productssales" OR name...
			var iddivparent = dateName.replace('date-', '');
			//HERE should be the refresh of the informations 
			if(iddivparent == "topcategories")
			{
				if(dateId == "day")
				{
					var A = "12";
					var B = "19";
					var C = "30";
				}else if (dateId == "week")
				{
					var A = "20";
					var B = "40";
					var C = "10";
				}
				else if (dateId == "month")
				{
					var A = "50";
					var B = "60";
					var C = "85";
				}
				$('.beauty').data('easyPieChart').update(A);
				$('.beauty span').replaceWith("<span>"+A+"</span>");
				$('.hygiene').data('easyPieChart').update(B);
				$('.hygiene span').replaceWith("<span>"+B+"</span>");
				$('.essentials').data('easyPieChart').update(C);
				$('.essentials span').replaceWith("<span>"+C+"</span>");
			}
			else if(iddivparent == "topsections")
			{
				if(dateId == "day")
				{
					var A = "35%";
					var B = "20%";
					var C = "45%";
					var D = "300";
					var E = "290";
					var F = "106";
					var G = "10";
					var H = "16";
					var I = "5";
				}else if (dateId == "week")
				{
					var A = "40%";
					var B = "25%";
					var C = "35%";
					var D = "260";
					var E = "300";
					var F = "546";
					var G = "20";
					var H = "16";
					var I = "5";
				}
				else if (dateId == "month")
				{
					var A = "45%";
					var B = "30%";
					var C = "25%";
					var D = "456";
					var E = "300";
					var F = "546";
					var G = "20";
					var H = "16";
					var I = "5";
				}
				$('.rx-pourcentage span').replaceWith("<span>"+A+"</span>");
				$('.para-pourcentage span').replaceWith("<span>"+B+"</span>");
				$('.otc-pourcentage span').replaceWith("<span>"+C+"</span>");

				$('.rx-unites span').replaceWith("<span>"+D+"</span>");
				$('.para-unites span').replaceWith("<span>"+E+"</span>");
				$('.otc-unites span').replaceWith("<span>"+F+"</span>");

				$('.rx-valeur span').replaceWith("<span>"+G+"</span>");
				$('.para-valeur span').replaceWith("<span>"+H+"</span>");
				$('.otc-valeur span').replaceWith("<span>"+I+"</span>");

				$('.bar-rx').css('width',A);
				$('.bar-para').css('width',B);
				$('.bar-otc').css('width',C);
			}
			else if(iddivparent == "productssales")
			{
			  	if(dateId == "day")
				{
					var data = [
				  		{ hour: '2016-09-8 04:00', a: 100, b: 90, c:100 , d:47, e:40},
				  	    { hour: '2016-09-8 08:00', a: 75,  b: 65, c:50 , d:65, e:65 },
				  	    { hour: '2016-09-8 12:00', a: 50,  b: 40, c:50 , d:65, e:75},
				  	    { hour: '2016-09-8 16:00', a: 75,  b: 65, c:40 , d:75, e:65},
				  	    { hour: '2016-09-8 20:00', a: 50,  b: 40, c: 40, d:36, e:65},
				  	    { hour: '2016-09-8 24:00', a: 75,  b: 65, c:75 , d:40, e:50}
				  	];
				}else if (dateId == "week")
				{
					var data = [
				  		{ hour: '2016-09-2', a: 70, b: 90, c:100 , d:47, e:40},
				  	    { hour: '2016-09-3', a: 75,  b: 65, c:50 , d:65, e:65 },
				  	    { hour: '2016-09-4', a: 50,  b: 40, c:50 , d:65, e:75},
				  	    { hour: '2016-09-5', a: 75,  b: 65, c:40 , d:75, e:65},
				  	    { hour: '2016-09-6', a: 50,  b: 40, c: 40, d:36, e:65},
				  	    { hour: '2016-09-7', a: 75,  b: 65, c:75 , d:40, e:50},
				  	    { hour: '2016-09-8', a: 50,  b: 40, c: 40, d:36, e:65}
				  	];
				}
				else if (dateId == "month")
				{
					var data = [
						{ hour: '2015-10', a: 100, b: 90, c:100 , d:47, e:40},
						{ hour: '2015-11', a: 50,  b: 40, c: 40, d:36, e:65},
						{ hour: '2015-12', a: 100, b: 90, c:100 , d:47, e:40},
						{ hour: '2016-01', a: 75,  b: 65, c:75 , d:40, e:50},
						{ hour: '2016-02', a: 50,  b: 40, c:50 , d:65, e:75},
						{ hour: '2016-03', a: 100, b: 90, c:100 , d:47, e:40},
				  		{ hour: '2016-04', a: 100, b: 90, c:100 , d:47, e:40},
				  	    { hour: '2016-05', a: 75,  b: 65, c:50 , d:65, e:65 },
				  	    { hour: '2016-06', a: 50,  b: 40, c:50 , d:65, e:75},
				  	    { hour: '2016-07', a: 75,  b: 65, c:40 , d:75, e:65},
				  	    { hour: '2016-08', a: 50,  b: 40, c: 40, d:36, e:65},
				  	    { hour: '2016-09', a: 75,  b: 65, c:75 , d:40, e:50}
				  	];
				}
				// add data and update the chart
				graph.setData(data);
			}/*
			else if(iddivparent == "prescriptions")
			{
				if(dateId == "day")
				{
					var A = "35";
					var B = "65";
				}else if (dateId == "week")
				{
					var A = "40";
					var B = "60";
				}
				else if (dateId == "month")
				{
					var A = "45";
					var B = "55";
				}
				myChart5.setData([
				    {label: "Prescriptions", value: A},
		    		{label: "Non Prescriptions", value: B}
				]);
			}*/
			
		});
	}

//});
	if($(".page-content").hasClass("database")) 
	{
		$('.table').DataTable({
			pageLength : 25
		});
	}

	if($(".page-content").hasClass("results"))
	{
		/* Morris chart */

		var graph = new Morris.Line({
			  	// ID of the element in which to draw the chart.
			  	element: 'morris_chart_1',
			  	// Chart data records -- each entry in this array corresponds to a point on
			  	// the chart.
			  	data: [
			  		{ hour: '2016-09-8 04:00', a: 100, b: 90, c:100 , d:47, e:40},
			  	    { hour: '2016-09-8 08:00', a: 75,  b: 65, c:50 , d:65, e:65 },
			  	    { hour: '2016-09-8 12:00', a: 50,  b: 40, c:50 , d:65, e:75},
			  	    { hour: '2016-09-8 16:00', a: 75,  b: 65, c:40 , d:75, e:65},
			  	    { hour: '2016-09-8 20:00', a: 50,  b: 40, c: 40, d:36, e:65},
			  	    { hour: '2016-09-8 24:00', a: 75,  b: 65, c:75 , d:40, e:50}
			  	],
			  	// The name of the data record attribute that contains x-values.
			  	xkey: 'hour',
			  	// A list of names of data record attributes that contain y-values.
			  	ykeys: ['a', 'b', 'c', 'd', 'e'],
			  	resize: true,
			  	// Labels for the ykeys -- will be displayed when you hover over the
			  	// chart.
			  	labels: ['Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5']
			});

			

		window.Morris.Donut.prototype.setData = function(data, redraw) {
		    if (redraw == null) {
		        redraw = true;
		    }
		    this.data = data;
		    this.values = (function() {
		    var _i, _len, _ref, _results;
		    _ref = this.data;
		    _results = [];
		    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
		        row = _ref[_i];
		        _results.push(parseFloat(row.value));
		    }
		    return _results;
		    }).call(this);
		    this.dirty = true;
		    if (redraw) {
		        return this.redraw();
		    }
		}
		
		/*
		var donut = Morris.Donut({
		  	element: 'donut-example',
		  	resize: true,
		  	colors:['#7fae73',"#00aac5"],
		  	data: [
		    	{label: "Prescriptions", value: 41},
		    	{label: "Non Prescriptions", value: 59}
		  	]
			}).on('click', function(i, row){
				var path = row.label;
			    var url = window.location.href;
			    path = path.replace(/ /g,'').toLowerCase();; 
			    //window.location.href = url+"categories?section="path;
		});

		donut.options.data.forEach(function(label, i) {
		    var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<br><span>&nbsp;</span>');
		    legendItem.find('span')
		      .css('backgroundColor', donut.options.colors[i])
		      .css('width', '20px')
		      .css('display', 'inline-block')
		      .css('margin', '5px');
		    $('#legend').append(legendItem)
		 });*/
	}

	if($(".page-content").hasClass('morrischart'))
	{
		/* Morris chart */

		var graph = new Morris.Line({
		  	// ID of the element in which to draw the chart.
		  	element: 'morris_chart_1',
		  	// Chart data records -- each entry in this array corresponds to a point on
		  	// the chart.
		  	data: [
		  		{ hour: '2016-09-8 04:00', a: 100, b: 90, c:100 , d:47, e:40},
		  	    { hour: '2016-09-8 08:00', a: 75,  b: 65, c:50 , d:65, e:65 },
		  	    { hour: '2016-09-8 12:00', a: 50,  b: 40, c:50 , d:65, e:75},
		  	    { hour: '2016-09-8 16:00', a: 75,  b: 65, c:40 , d:75, e:65},
		  	    { hour: '2016-09-8 20:00', a: 50,  b: 40, c: 40, d:36, e:65},
		  	    { hour: '2016-09-8 24:00', a: 75,  b: 65, c:75 , d:40, e:50}
		  	],
		  	// The name of the data record attribute that contains x-values.
		  	xkey: 'hour',
		  	// A list of names of data record attributes that contain y-values.
		  	ykeys: ['a', 'b', 'c', 'd', 'e'],
		  	resize: true,
		  	// Labels for the ykeys -- will be displayed when you hover over the
		  	// chart.
		  	labels: ['Produit 1', 'Produit 2', 'Produit 3', 'Produit 4', 'Produit 5']
		});
	
		var i = 0;
		//categories
		$('*[data-toggle="modal"]').on('click', function(){
			if(i==0)
			{
				$(".modal-dialog").css("opacity","0");
				function show_popup(){
			      	$('#morris_chart_1').resize();
			      	$(".modal-dialog").css("opacity","1");
			   	};
			   	window.setTimeout( show_popup, 75 ); 
			   	i = i + 1;
			}
		}); 
		$('.modal').on('click', function(){
			$('#morris_chart_1').resize();
		});
	}
                            

	if($(".page-content").attr("id") == "coach")
	{
		$(".coach_container").on("mouseover", function(){
            $(".coach_container_text.bigtext").removeClass("hiddenjs");
            $(".moreinfos").addClass("hiddenjs");
        });
        $(".coach_container").on("mouseout", function(){
            $(".coach_container_text.bigtext").addClass("hiddenjs");
            $(".moreinfos").removeClass("hiddenjs");
        });

    	var keypressSlider = document.getElementById('slider'),
		input = document.getElementById('slider_value');

		var $range_price = $("#range_price");
		var $range_quantity = $("#range_quantity");
		var $range_marge = $("#range_marge");

		$range_price.ionRangeSlider({
		    min: 0.90,
		    max: 20,
		    type: 'single',
		    prefix: "$",
		    onChange: function (data) {
		        var slide_basis_revenues = parseInt($('#slider_basis_revenues').val()*data["from"]);
		        $('#slider_revenues').html(slide_basis_revenues);
		    },
		});

		$range_quantity.ionRangeSlider({
		    min: 1,
		    max: 1000,
		    type: 'single',
		    onChange: function (data) {
		        var slide_basis_revenues = parseInt($('#slider_basis_revenues').val()*data["from"]+data["from"]*0.01);
		        $('#slider_revenues').html(slide_basis_revenues);
		    },
		});

		$range_marge.ionRangeSlider({
		    min: 0,
		    max: 100,
		    type: 'single',
		    prefix: "%",
		    onChange: function (data) {
		        var slide_basis_revenues = parseInt($('#slider_basis_revenues').val()*data["from"]+data["from"]*0.01);
		        $('#slider_revenues').html(slide_basis_revenues);
		    },
		});

    }

	if($(".page-content").hasClass("paraotcrx"))
	{
    	/*var donut = Morris.Donut({
		  	element: 'donut-example',
		  	resize: true,
		  	colors:['#7fae73',"#00aac5"],
		  	data: [
		    	{label: "Prescriptions", value: 41},
		    	{label: "Non Prescriptions", value: 59}
		  	]
			}).on('click', function(i, row){
				var path = row.label;
			    var url = window.location.href;
			    path = path.replace(/ /g,'').toLowerCase();; 
			    //window.location.href = url+"categories?section="+path;
		});

		donut.options.data.forEach(function(label, i) {
		    var legendItem = $('<span></span>').text( label['label'] + " ( " +label['value'] + " )" ).prepend('<br><span>&nbsp;</span>');
		    legendItem.find('span')
		      .css('backgroundColor', donut.options.colors[i])
		      .css('width', '20px')
		      .css('display', 'inline-block')
		      .css('margin', '5px');
		    $('#legend').append(legendItem)
		 });*/

		/* Changements de dates // charts */
		$('.dates-charts').on('click', function(){

			var dateId = $(this).children('input').attr('id'); //ID = "day" or "month" or "week"
			var dateName = $(this).children('input').attr('name'); //dateName = "date-" + ("topcategories" OR "topsections" OR "productssales" OR name...
			var iddivparent = dateName.replace('date-', '');
			//HERE should be the refresh of the informations 
			
			if(iddivparent == "prescriptions")
			{
				if(dateId == "day")
				{
					var A = "35";
					var B = "65";
				}else if (dateId == "week")
				{
					var A = "40";
					var B = "60";
				}
				else if (dateId == "month")
				{
					var A = "45";
					var B = "55";
				}
				donut.setData([
				    {label: "Prescriptions", value: A},
		    		{label: "Non Prescriptions", value: B}
				]);
			}
			
		});


		//categories
		$(".mt-checkbox input").on('click', function(event){
			event.preventDefault();
		});

		$(".mt-checkbox").on("click", function(){
			if($(this).find("input").prop('checked') == true)
			{
		    	$(this).find("input").prop('checked', false);
		    	$(this).find("span").removeClass("checked");
			}
			else 
			{
				$(this).find("span").addClass("checked");
		    	$(this).find("input").prop('checked', true);
			}
		});

		$(".parent-checkbox-container ul li").fadeOut();

		$(".parent-checkbox-container .mt-checkbox").on("click", function(){
			$child = $(this).parent().find("li");
			if($(this).find("input").prop('checked') == true)
			{
				$child.fadeIn();
				$child.find("span").addClass("checked");
				$child.find("input").prop("checked",true);
			} 
			else 
			{
		    	$child.find("span").removeClass("checked");
				$child.find("input").prop("checked",false);
				$child.fadeOut();
			} 
		});
		/*$(".parent-checkbox-container ul .mt-checkbox").on("click", function(){
			$siblings = $(this).parent().parent().children("li").find(".mt-checkbox");
			var i = 0;
			$siblings.each(function(){
				if($(this).find("input").prop('checked') == true)
				{
					i = i + 1;
				}
			});
			if(i == 0)
			{
				$(this).parent().parent().parent().find("li").fadeOut();
			}
		});*/
		/*
		$(".child-checkbox").on("click",function() {
		    $parent = $(this).parent().find('.parent-checkbox');
		    if($(this).find("input").prop('checked') == false)
		    {
		    	$parent.find("span").addClass("checked");
		      	$parent.find("input").prop("checked", true);
		    }  
		});

		$(".parent-checkbox").on("click",function() {
			$child = $(this).parent().find(".child-checkbox");
			if($(this).find("input").prop('checked') == true)
			{
				
				$child.fadeIn();
				$child.find("span").addClass("checked");
				$child.find("input").prop("checked",true);
			} 
			else 
			{

		    	$child.find("span").removeClass("checked");
				$child.find("input").prop("checked",false);
				$child.fadeOut();
			}
		});*/
	
		$(".dropdown-menu").addClass("nothere");
		$("#categories").on("click", function(event){
			if( $(".dropdown-menu-small").hasClass("nothere"))
			{
				$(".dropdown-menu-small").fadeIn();
				$(".dropdown-menu-small").removeClass("nothere");
			}
			else 
			{
				$(".dropdown-menu-small").fadeOut();
				$(".dropdown-menu-small").addClass("nothere");
			}	
		});

		/*
		var gdpData = {
	        "BE-VAN":"1",
	        "BE-WLX":"1%",
	        "BE-WBR":"1%",
	        "BE-VBR":"1%",
	        "BE-VOV":"1%",
	        "BE-WLG":"1%",
	        "BE-VLI":"1%",
	        "BE-WHT":"1%",
	        "BE-WNA":"1%",
	        "BE-BRU":"1%",
	        "BE-VWV":"1%"                 
	    };

	
        jQuery('#bmap').vectorMap({
	        map: 'belgium_en',
	        series: {
	          regions: [{
	            values: gdpData, 
	             scale: ['#bdbdbd', '#9e9e9e', '#757575', '#616161', '#424242', '#212121'],
	          }]
	        },
	        onRegionTipShow: function(e, el, code){
	          	el.html(el.html());
	        },
	       	onRegionClick: function(e, el, code){
	          	console.log(el);
	        }
      	});

      	var width = $(".jvectormap-container").width();
	    $("#bmap svg").width(width);*/



      	$("#smallmap").on("click", function(event){
			$(".bmap-container").removeClass("dissapear");
			$(".bgmap").removeClass("dissapear");
		});
		$(".bgmap").on("click", function(event){
			$(".bmap-container").addClass("dissapear");
			$(".bgmap").addClass("dissapear");
		});

		$(document).on('click','.dropdown-toggle', function(event){
			$dropdown = $(this).siblings(".dropdown-menu");
			if( $dropdown.hasClass("nothere"))
			{
				$dropdown.fadeIn();
				$dropdown.removeClass("nothere");
			}
			else 
			{
				$dropdown.fadeOut();
				$dropdown.addClass("nothere");
			}	
		});

		$(".dropdown-menu").on("click", function(event){
			event.preventDefault();
		});

		jQuery.expr[':'].contains = function(a, i, m) {
		  return jQuery(a).text().toUpperCase()
		      .indexOf(m[3].toUpperCase()) >= 0;
		};

		$("#submit-search-category").on("click", function(){
			var val = $("#search-category").val();
			if(val != "")
			{
				$(".parent-checkbox-container").each(function( index ) {
				  	if($(this).is(':contains("'+val+'")'))
				  	{
				  		$(this).fadeIn();
				  		if($("label:contains('"+val+"')").hasClass("child-checkbox"))
				  		{
				  			$(this).parent().find(".child-checkbox").fadeIn();
				  		}
				  		else 
				  		{
				  			$(this).parent().find(".child-checkbox").fadeOut();
				  		}
				  	}
				  	else 
				  	{
				  		$(this).fadeOut();
				  	}
				});
				$(".close-search-category").addClass("on");
			}
		});
		$(".close-search-category").on("click", function(){
			$(".parent-checkbox-container").fadeIn();
			$(".close-search-category").removeClass("on");
		});

		$(".btn-inclusive").addClass("active");

		$(".btn-tri").on("click", function(){
			$(".btn-tri").removeClass("active");
			$(this).addClass("active");
		});

		$(".carousel").flickity({
			cellAlign: 'left'
		});


		$("#typetag").on("change", function(){
			var val = $(this).val().toLowerCase();
			if(val != "")
			{
				$( ".carousel-cell" ).each(function() {
					if($(this).children("span").text().toLowerCase().indexOf(val) >= 0)
					{
						$(this).addClass("on");
						$(this).removeClass("off");
					}
					else 
					{
						$(this).removeClass("on");
						$(this).addClass("off");
					}
				});
				
			}
		});
		$("#portlet_tags").css("display", "none");

		$(".tags_container .carousel-cell").on("click", function(){
			var val = $(this).data("tag");
			$("#tag"+val).addClass("on");
			$("#tag"+val).removeClass("off");
			$("#portlet_tags").css("display", "block");
			var html = $(".tags_container_ul").html();

			$(".tags_container_ul").html(html + '<li id="tag'+val+'"><div class="btn-group"><a class="btn blue dropdown-toggle"  href="javascript:;"> Tag'+val+' <i class="fa fa-angle-down"></i></a><a href="javascript:;" class="btn grey close-button-tag"><i class="fa close"></i></a><div class="dropdown-menu clearfix nothere"><div class="input-group input-group-search"><input type="text" class="form-control" placeholder="Search" name="query" id="search-category"><span class="input-group-btn"><a href="javascript:;" class="btn submit" id="submit-search-category"><i class="icon-magnifier"></i></a><a href="javascript:;" class="btn submit close-search-category"><i class="icon-close"></i></a></span></div><ul><li><label class="mt-checkbox"><input type="checkbox"> Pineapple 2<span></span></label></li><li><label class="mt-checkbox"><input type="checkbox"> Pineapple 2<span></span></label></li></ul><a href="javascript:;" class="btn btn-tri btn-inclusive active"><span>Inclusive</span></a><a href="javascript:;" class="btn btn-tri btn-exclusive"><span>Exclusive</span></a><a href="javascript:;" class="btn btn-tri btn-excluant"><span>Excluant</span></a><a href="#" class="btn small blue">Apply</a></div></div></li>');
		});


		$(document).on('click','.btn-tri', function(){ 
			$(this).parent().find(".btn-tri").removeClass("active");
			$(this).addClass("active");
		});

		$(document).on('click','.close-button-tag', function(){
			$(this).parents("li").remove();
			console.log($(".tags_container_ul").html());

			if($(".tags_container_ul").html().replace(/\s/g, '') == '')
			{
				$("#portlet_tags").css("display", "none");
			}
		});

		$('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
		});


		$(".minimum label").on("click", function(event){
			var i = 0;
			$(".minimum label").each(function(){
				if($(this).hasClass("active"))
				{	
					i = i+1;
				}
			});
			
			if(i == 1)
			{
				console.log(i);
				$(this).removeClass("active");
			}
		});
	}

</script>