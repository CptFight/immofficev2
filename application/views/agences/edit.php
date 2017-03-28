
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="clearfix l-top-annonces-export">
       <div class="btns-calendar">
            <a class="active" href="<?php echo site_url('agences/news'); ?>"><?php echo $this->lang->line('new'); ?></a> 
            <a href="<?php echo site_url('agences/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        <input type="hidden" name="id" value="<?php echo $agence->id; ?>" />
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('name'); ?></label>
            <input type="text" name="name" value='<?php echo $agence->name; ?>' required>
        </fieldset>
        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
