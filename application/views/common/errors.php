<?php if(count($errors) > 0) { ?>
<div style="border:1px; color:red;">
<ul>
<?php foreach($errors as $key => $message){ ?>
	<li><?php echo $message; ?></li>
<?php } ?>
</ul>
</div>
<?php } ?>