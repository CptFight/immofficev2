
<div class="title-container">
    <h2>Alerte mail </h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('french'); ?></a>
            <a href="" class="active">Alert mail</a>
        </li>
    </ul>
</div>

<?php 
foreach($subscribers as $key => $subscribers_infos){
	$this->load->view($this->router->class.'/block_search',$subscribers_infos);
}
?>
