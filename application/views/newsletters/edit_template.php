
<section class="l-annonces-search l-annonces-section apparitionright">
    
    <div class="table-responsive">
        <form action="" method="POST">
        <div class="l-annonces-form l-form">
            <input type="hidden" name="id" value="<?php echo $template->id; ?>" >

            <fieldset class="inputstyle">
                <label for="title"><?php echo $this->lang->line('title'); ?></label>
                <input type="text" id="title" name="title" value='<?php echo $template->title; ?>' >
            </fieldset>

            <fieldset class="inputstyle">
                <label for="template_<?php echo $template->id; ?>"><?php echo $this->lang->line('value'); ?></label>
                <textarea id="template_<?php echo $template->id; ?>" name="value"><?php echo $template->value; ?></textarea>
            </fieldset>

            <fieldset class="inputstyle">
                <label for="subject"><?php echo $this->lang->line('subject'); ?></label>
                <input type="text" id="subject" name="subject" value='<?php echo $template->subject; ?>' >
            </fieldset>

             <fieldset class="inputstyle">
                <label for="cc"><?php echo $this->lang->line('cc'); ?></label>
                <input type="text" id="cc" name="cc" value='<?php echo $template->cc; ?>' >
            </fieldset>

             <fieldset class="inputstyle">
                <label for="bcc"><?php echo $this->lang->line('bcc'); ?></label>
                <input type="text" id="bcc" name="bcc" value='<?php echo $template->bcc; ?>' >
            </fieldset>
        	
            <hr/>
          <fieldset  class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete'); ?></span></button>
         </fieldset>
    </div>
    </form> 
</section>
           
