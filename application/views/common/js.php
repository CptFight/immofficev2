<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->



<!--  JQUERY -->
<script src="<?php echo base_url(); ?>assets/global/libs/jquery-1.11.2.js"></script>
<script src="<?php echo base_url(); ?>assets/global/libs/equalizer.js"></script>


<!-- BOOTSTRAP -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- DATATABLE -->

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/datatables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>


<!-- RANGEPICKER -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/scripts/moment.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/daterangepicker/daterangepicker.js"></script>

<!-- FULL CALENDAR -->
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/dist/locale-all.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/chosen/chosen.jquery.js"></script>

<!-- locationpicker -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCoQI37V-l-pmDlxdiGJf53h8XLAPmFlMA"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/global/plugins/locationpicker.jquery.js"></script>


<!-- datetimepicker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>


<?php 
if(isset($custom_scripts) && is_array($custom_scripts)  ) { 
	foreach($custom_scripts as $key => $script_url){  

?>
<script type='text/javascript' src="<?php echo $script_url; ?>"> </script>
<?php } } ?>


