
<section class="l-annonces-search l-annonces-section apparitionright">
    
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        <input type="hidden" name="id" value="<?php echo $owner->id; ?>" />

        <fieldset class="inputstyle">
            <label for="name"><?php echo $this->lang->line('name'); ?></label>
            <input type="text" id="name" name="name" value='<?php echo $owner->name; ?>'>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="email"><?php echo $this->lang->line('email'); ?></label>
            <input type="text" id="email" name="email" value='<?php echo $owner->email; ?>'>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" id="tel" name="tel" value='<?php echo $owner->tel; ?>'>
        </fieldset>

        <fieldset >
            <select name="owner_status" id="owner_status" class="form-control">
                 <?php foreach($owners_status as $key => $owners_statu){ ?>
                <option value="<?php echo $owners_statu->id; ?>" <?php if($owner->status_id == $owners_statu->id) echo 'selected'; ?>><?php echo $owners_statu->name; ?></option>
            <?php } ?>
            </select>
        </fieldset>

        <fieldset class="inputstyle" style="clear: both;">

            <label for="note"><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note" id="note"><?php echo $owner->note; ?></textarea>
        </fieldset>


        <fieldset class="form-buttons">
            <button name="save" class="btn save" value="save" type="submit"><i class="fa fa-floppy-o"></i><span><?php echo $this->lang->line('save'); ?></span></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete'); ?></span></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
