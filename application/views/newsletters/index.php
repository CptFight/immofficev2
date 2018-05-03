
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="clearfix l-top-annonces-export">
       <div class="btns-calendar">
            <a href="<?php echo site_url('newsletters/new_template'); ?>"><?php echo $this->lang->line('new'); ?></a> 
        </div>
    </div>
    <div class="table-responsive">
        <?php foreach($templates as $key => $template){ ?>
        <fieldset>
        	<label for="template_<?php echo $template->id; ?>"><?php echo $template->title; ?></label>
        	<div id="template_<?php echo $template->id; ?>">
        		<?php echo $template->value; ?>
        	</div>
        	<div class="pull-right">
        		<?php if($template->defaut){ ?>
        		<a class="btn btn-default" href="<?php echo site_url('newsletters/edit_template?id='.$template->id); ?>"><?php echo $this->lang->line('copy'); ?></a>
        		<?php }else{ ?>
        		<a class="btn btn-default" href="<?php echo site_url('newsletters/edit_template?id='.$template->id); ?>"><?php echo $this->lang->line('edit'); ?></a>
        		<?php } ?>
        	</div>
        </fieldset>
        <br/>
        <?php } ?>
    </div>
   
</section>
           
