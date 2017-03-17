

<?php 
foreach($subscribers as $key => $subscribers_infos){
	$this->load->view($this->router->class.'/block_criterias',$subscribers_infos);
}
?>
