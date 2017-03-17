<?php if(count($messages) > 0) { ?>
<div style="border:1px; color:green;">
<ul>
<?php foreach($messages as $key => $message){ ?>
	<li><?php echo $message; ?></li>
<?php } ?>
</ul>
</div>
<?php } ?>