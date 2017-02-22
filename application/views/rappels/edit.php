<div class="title-container">
    <h2><?php echo $this->lang->line('rappel'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('home'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('edit'); ?> <?php echo $this->lang->line('rappel'); ?></a>
        </li>
    </ul>
</div>
<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->

    <div class="clearfix l-top-annonces-export">
       <a href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a> | 
       <a href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
    </div>
    
    <form action="" method="POST">
    <input type="hidden" name="id" value='<?php echo $rappel->id; ?>'>
    <div class="l-annonces-form l-form">
        <h3><?php echo $this->lang->line('rappel'); ?></h3>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tags'); ?></label>
            <input type="text" name="tags" value='<?php echo $rappel->tags; ?>'>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('date'); ?></label>
            <input type="text" name="date_rappel" value='<?php echo date('d/m/Y',$rappel->date_rappel); ?>' required>
        </fieldset>
        
        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><?php echo $this->lang->line('delete'); ?></button>
        </fieldset>


        <h3><?php echo $this->lang->line('favoris'); ?></h3>
        <hr/>

        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tags'); ?></label>
            <input type="text" name="tags" value='<?php echo $rappel->tags; ?>'>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('title'); ?></label>
            <input type="text" name="title" value='<?php echo $rappel->title; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('date'); ?></label>
            <input type="text" name="date_publication" value='<?php echo date('d/m/Y',$rappel->date_publication); ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('price'); ?></label>
            <input type="text" name="price" value='<?php echo $rappel->price; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('url'); ?></label>
            <input type="text" name="url" value='<?php echo $rappel->url; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('web_site'); ?></label>
            <input type="text" name="web_site" value='<?php echo $rappel->web_site; ?>' required>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" value='<?php echo $rappel->adress; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('city'); ?></label>
            <input type="text" name="city" value='<?php echo $rappel->city; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('zip_code'); ?></label>
            <input type="text" name="zip_code" value='<?php echo $rappel->zip_code; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('province'); ?></label>
            <input type="text" name="province" value='<?php echo $rappel->province; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('living_space'); ?></label>
            <input type="text" name="living_space" value='<?php echo $rappel->living_space; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('owner_name'); ?></label>
            <input type="text" name="owner_name" value='<?php echo $rappel->owner_name; ?>'>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" name="tel" value='<?php echo $rappel->tel; ?>'>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="sale" type="radio" value="1" id="sell" <?php if($rappel->sale == 1) echo "checked"; ?>>
                <label for="sell"><?php echo $this->lang->line('sell'); ?></label>
            </div><!--
             --><div>
                <input name="sale" type="radio" value="0" id="location" <?php if($rappel->sale == 0) echo "checked"; ?>>
                <label for="location"><?php echo $this->lang->line('location'); ?></label>
            </div>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="fr" id="fr" <?php if($rappel->lang == 'fr') echo "checked"; ?>>
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="nl" id="nl" <?php if($rappel->lang == 'nl') echo "checked"; ?>>
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('description'); ?></label>
            <textarea><?php echo $rappel->description; ?></textarea>
        </fieldset>
    </div>
    </form>

        
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
