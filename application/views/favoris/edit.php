<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value='<?php echo $favoris->id; ?>'>
    <div class="l-annonces-form l-form">
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tags'); ?></label>
            <input type="text" name="tags" value='<?php echo $favoris->tags; ?>'>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('title'); ?></label>
            <input type="text" name="title" value='<?php echo $favoris->title; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('date'); ?></label>
            <input type="text" name="date_publication" value='<?php echo date('d/m/Y',$favoris->date_publication); ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('price'); ?></label>
            <input type="text" name="price" value='<?php echo $favoris->price; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('url'); ?></label>
            <input type="text" name="url" value='<?php echo $favoris->url; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('web_site'); ?></label>
            <input type="text" name="web_site" value='<?php echo $favoris->web_site; ?>' >
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" value='<?php echo $favoris->adress; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('city'); ?></label>
            <input type="text" name="city" value='<?php echo $favoris->city; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('zip_code'); ?></label>
            <input type="text" name="zip_code" value='<?php echo $favoris->zip_code; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('province'); ?></label>
            <input type="text" name="province" value='<?php echo $favoris->province; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('living_space'); ?></label>
            <input type="text" name="living_space" value='<?php echo $favoris->living_space; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('owner_name'); ?></label>
            <input type="text" name="owner_name" value='<?php echo $favoris->owner_name; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" name="tel" value='<?php echo $favoris->tel; ?>'>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="sale" type="radio" value="1" id="sell" <?php if($favoris->sale == 1) echo "checked"; ?>>
                <label for="sell"><?php echo $this->lang->line('sell'); ?></label>
            </div><!--
             --><div>
                <input name="sale" type="radio" value="0" id="location" <?php if($favoris->sale == 0) echo "checked"; ?>>
                <label for="location"><?php echo $this->lang->line('location'); ?></label>
            </div>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="fr" id="fr" <?php if($favoris->lang == 'fr') echo "checked"; ?>>
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="nl" id="nl" <?php if($favoris->lang == 'nl') echo "checked"; ?>>
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('description'); ?></label>
            <textarea name="description"><?php echo $favoris->description; ?></textarea>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note"><?php echo $favoris->note; ?></textarea>
        </fieldset>
        <?php if(isset($favoris->web_path)) {  ?>
        <fieldset class="inputstyle">
            <a target="_blank" href="<?php echo $favoris->web_path; ?>"><?php echo $favoris->file_name; ?></a>
        </fieldset>
        <?php } ?>
        <fieldset class="inputstyle">
            <input type="file" name="picture" id="picture">
        </fieldset>
        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><?php echo $this->lang->line('delete'); ?></button>
        </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
