
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
            <label for="name"><?php echo $this->lang->line('name'); ?></label>
            <input type="text" id="name" name="name" value='<?php echo $agence->name; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" id="adress" name="adress" value='<?php echo $agence->adress; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="price_htva"><?php echo $this->lang->line('price_htva'); ?></label>
            <input type="text" id="price_htva" name="price_htva" value='<?php echo $agence->price_htva; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label for="price_tvac"><?php echo $this->lang->line('price_tvac'); ?></label>
            <input type="text" id="price_tvac" name="price_tvac" value='<?php echo $agence->price_tvac; ?>' >
        </fieldset>

        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><?php echo $this->lang->line('delete'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
