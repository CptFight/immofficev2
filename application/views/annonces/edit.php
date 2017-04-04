<section class="l-annonces-search l-annonces-section apparitionright">
   
    <form action="" method="POST">
    <input type="hidden" name="id" value='<?php echo $annonce->id; ?>'>
       
    <div class="l-annonces-form l-form">

        <fieldset class="inputstyle">
            <label for="title"><?php echo $this->lang->line('title'); ?></label>
            <input type="text" name="title" id="title" value='<?php echo $annonce->title; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="description"><?php echo $this->lang->line('description'); ?></label>
            <textarea name="description" id="description"><?php echo $annonce->description; ?></textarea>
        </fieldset>

        <fieldset class="inputstyle">
            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" id="adress" value='<?php echo $annonce->adress; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="city"><?php echo $this->lang->line('city'); ?></label>
            <input type="text" name="city" id="city" value='<?php echo $annonce->city; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="url"><?php echo $this->lang->line('url'); ?></label>
            <input type="text" name="url" id="url" value='<?php echo $annonce->url; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="web_site"><?php echo $this->lang->line('web_site'); ?></label>
            <input type="text" name="web_site" id="web_site" value='<?php echo $annonce->web_site; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="zip_code"><?php echo $this->lang->line('zip_code'); ?></label>
            <input type="text" name="zip_code" id="zip_code" value='<?php echo $annonce->zip_code; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="province"><?php echo $this->lang->line('province'); ?></label>
            <input type="text" name="province" id="province" value='<?php echo $annonce->province; ?>' >
        </fieldset>

        <fieldset class="inputstyle">
            <label for="living_space"><?php echo $this->lang->line('living_space'); ?></label>
            <input type="text" name="living_space" id="living_space" value='<?php echo $annonce->living_space; ?>' >
        </fieldset>

        <fieldset class="radio-inline-cont ">
            <div>
                <input name="sale" type="radio" value="0" id="0" <?php if($annonce->sale == 0) echo 'checked'; ?>>
                <label for="0"><?php echo $this->lang->line('location'); ?></label>
            </div><!--
             --><div>
                <input name="sale" type="radio" value="1" id="1" <?php if($annonce->sale == 1) echo 'checked'; ?>>
                <label for="1"><?php echo $this->lang->line('sell'); ?></label>
            </div>
        </fieldset>

        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="fr" id="fr" <?php if($annonce->lang == 'fr') echo 'checked'; ?>>
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="nl" id="nl" <?php if($annonce->lang == 'nl') echo 'checked'; ?>>
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>

        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><?php echo $this->lang->line('delete'); ?></button>
        </fieldset>

    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
