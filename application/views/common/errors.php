<?php $errors = $this->session->flashdata('errors');; ?>

<?php if(count($errors) > 0) { ?>
<div style="border:1px; color:red;">
<ul class="error">
<?php foreach($errors as $key => $message){ ?>
	<li><?php echo $message; ?></li>
<?php } ?>
</ul>
</div>
<?php } ?>