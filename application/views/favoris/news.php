
<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="l-annonces-form l-form">
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tags'); ?></label>
            <input type="text" name="tags" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('title'); ?></label>
            <input type="text" name="title" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('date'); ?></label>
            <input type="text" name="date_publication" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('price'); ?></label>
            <input type="text" name="price" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('url'); ?></label>
            <input type="text" name="url" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('web_site'); ?></label>
            <input type="text" name="web_site" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('city'); ?></label>
            <input type="text" name="city" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('zip_code'); ?></label>
            <input type="text" name="zip_code" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('province'); ?></label>
            <input type="text" name="province" value=''>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('living_space'); ?></label>
            <input type="text" name="living_space" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('owner_name'); ?></label>
            <input type="text" name="owner_name" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" name="tel" value=''>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="sale" type="radio" value="1" id="sell"  checked>
                <label for="sell"><?php echo $this->lang->line('sell'); ?></label>
            </div><!--
             --><div>
                <input name="sale" type="radio" value="0" id="location" >
                <label for="location"><?php echo $this->lang->line('location'); ?></label>
            </div>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="fr" id="fr" checked>
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="nl" id="nl" >
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('description'); ?></label>
            <textarea name="description"></textarea>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('note'); ?></label>
            <textarea name="note"></textarea>
        </fieldset>
         <fieldset class="inputstyle">
            <input type="file" name="picture" id="picture">
        </fieldset>
        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
        </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
