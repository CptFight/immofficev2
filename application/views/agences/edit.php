
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
            <label for="name"><?php echo $this->lang->line('agence_name'); ?></label>
            <input type="text" id="name" name="name" value='<?php echo $agence->name; ?>' required>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="boss_name"><?php echo $this->lang->line('boss_name'); ?></label>
            <input type="text" id="boss_name" name="boss_name" value='<?php echo $agence->boss_name; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" id="tel" name="tel" value='<?php echo $agence->tel; ?>' >
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

        <fieldset class="inputstyle">
         <select name="agences_status_id" id="agences_status_id" class="form-control">
            <?php foreach($status as $key => $statu){ ?> 
                <option value="<?php echo $statu->id; ?>" <?php if($statu->id == $agence->agences_status_id) echo "selected"; ?>><?php echo $statu->name; ?></option>
            <?php } ?>
        </select>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="note"><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note" id="note"><?php echo $agence->note; ?></textarea>
        </fieldset>

        <fieldset class="form-buttons">
            <button name="save" class="btn save" value="save" type="submit"><i class="fa fa-floppy-o"></i><span><?php echo $this->lang->line('save'); ?></span></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete'); ?></span></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
