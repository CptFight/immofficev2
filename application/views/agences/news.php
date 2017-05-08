
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

       
        <fieldset class="inputstyle">
            <label for"name"><?php echo $this->lang->line('name'); ?></label>
            <input type="text" id="name" name="name" value='' required>
        </fieldset>

      

        <fieldset class="inputstyle">
            <label for="boss_name"><?php echo $this->lang->line('boss_name'); ?></label>
            <input type="text" id="boss_name" name="boss_name" value='' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" id="tel" name="tel" value='' >
        </fieldset>

        
        <fieldset class="inputstyle">
            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" id="adress" name="adress" value='' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="price_htva"><?php echo $this->lang->line('price_htva'); ?></label>
            <input type="text" id="price_htva" name="price_htva" value='' >
        </fieldset>
        <fieldset class="inputstyle">
            <label for="price_tvac"><?php echo $this->lang->line('price_tvac'); ?></label>
            <input type="text" id="price_tvac" name="price_tvac" value='' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="note"><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note" id="note"></textarea>
        </fieldset>


        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
