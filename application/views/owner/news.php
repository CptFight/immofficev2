
<section class="l-annonces-search l-annonces-section apparitionright">
    
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        
        <fieldset class="inputstyle">
            <label for="name"><?php echo $this->lang->line('name'); ?></label>
            <input type="text" id="name" name="name" value=''>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="email"><?php echo $this->lang->line('email'); ?></label>
            <input type="text" id="email" name="email" value=''>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" id="tel" name="tel" value=''>
        </fieldset>

        <fieldset >
            <select name="owner_status" id="owner_status" class="form-control">
                 <?php foreach($owners_status as $key => $owners_statu){ ?>
                <option value="<?php echo $owners_statu->id; ?>"><?php echo $owners_statu->name; ?></option>
            <?php } ?>
            </select>
        </fieldset>

        <fieldset class="inputstyle" style="clear: both;">

            <label for="note"><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note" id="note"></textarea>
        </fieldset>


        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
