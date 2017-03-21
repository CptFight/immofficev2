<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="back_path" value='<?php echo $back_path; ?>'>
    <div class="l-annonces-form l-form">
        <ul class="tabs">
            <li><div id="tab1" class='active'><?php echo $this->lang->line('favoris'); ?></div></li>
            <li><div id="tab2"><?php echo $this->lang->line('rappel'); ?></div></li>
        </ul>
        <div class="block">
            <div class='active tab tab1'>
                <fieldset class="inputstyle">
                    <select name="mandataire_user_id" id="mandataire" class="form-control">
                        <?php foreach($mandataires as $key => $mandataire){ ?> 
                            <option value="<?php echo $mandataire->id; ?>" ><?php echo $mandataire->login." : ".$mandataire->name." ".$mandataire->firstname; ?></option>
                        <?php } ?>
                    </select>
                </fieldset>

              
                <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('title'); ?></label>
                    <input type="text" name="title" value='' >
                </fieldset>

                 <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('url'); ?></label>
                    <input type="text" name="url" value='' >
                </fieldset>

                <div class='clearfix'>
                    <div class="float-middle input-separation">
                        <fieldset  class="inputstyle">
                            <label><?php echo $this->lang->line('tags'); ?></label>
                            <input type="text" name="tags" value=''>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        
                        <fieldset >
                            <label class="visuallyhidden"><?php echo $this->lang->line('date'); ?></label>
                            <div class='input-group date datetimepicker' id="datetimepicker_publication">
                                <input type="text" class="form-control" id="date_publication" name="date_publication" value=''>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </fieldset>
                    </div>
                </div>

                <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('web_site'); ?></label>
                    <input type="text" name="web_site" value='' >
                </fieldset>

                 <div class='clearfix'>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('price'); ?></label>
                            <input type="text" name="price" value='' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('living_space'); ?></label>
                            <input type="text" name="living_space" value=''>
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('tel'); ?></label>
                            <input type="text" name="tel" value=''>
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('owner_name'); ?></label>
                            <input type="text" name="owner_name" value=''>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('adress'); ?></label>
                            <input type="text" name="adress" value=''>
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" name="city" value='' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('zip_code'); ?></label>
                            <input type="text" name="zip_code" value='' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('province'); ?></label>
                            <input type="text" name="province" value='' >
                        </fieldset>
                    </div>
                </div>
               
                <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('description'); ?></label>
                    <textarea name="description"></textarea>
                </fieldset>

                <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note"></textarea>
                </fieldset>

               <!-- <div class='clearfix'>
                    <div class="input-separation">
                        <fieldset class="radio-inline-cont pull-left">
                            <div>
                                <input name="sale" type="radio" value="1" id="sell" checked>
                                <label for="sell"><?php echo $this->lang->line('sell'); ?></label>
                            </div><div>
                                <input name="sale" type="radio" value="0" id="location" >
                                <label for="location"><?php echo $this->lang->line('location'); ?></label>
                            </div>
                        </fieldset>
                        <fieldset class="radio-inline-cont pull-right">
                            <div>
                                <input name="lang" type="radio" value="fr" id="fr" checked>
                                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
                            </div><div>
                                <input name="lang" type="radio" value="nl" id="nl" >
                                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
                            </div>
                        </fieldset>
                    </div>
                   
                </div>-->

                <fieldset class="inputstyle">
                    <input type="file" name="picture" id="picture">
                </fieldset>
            </div>
            <div class="tab tab2">
                <input type="hidden" name="rappel_id" value=''>
                <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" name="rappel_tags" value=''>
                </fieldset>
                <fieldset >
                    <label><?php echo $this->lang->line('date'); ?></label>
                    
                    <div class='input-group date datetimepicker' id="datetimepicker_rappel">
                        <input type="text" class="form-control" id="date_rappel" name="rappel_date_rappel" value=''>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </fieldset>

                 <fieldset class="inputstyle">
                    <label><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="rappel_note"></textarea>
                </fieldset>
            </div>
        </div>

        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
            <button name="delete" class="btn delete" value="delete" type="submit"><?php echo $this->lang->line('delete'); ?></button>
        </fieldset>

    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
