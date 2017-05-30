<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="back_path" value='<?php echo $back_path; ?>'>
    <input type="hidden" name="id" value='<?php echo $favoris->id; ?>'>
       
    <div class="l-annonces-form l-form">

    
        <ul class="tabs">
            <li><div id="tab1"  data-select="tab1" class="<?php if($tab == 1) echo 'active'; ?>"><?php echo $this->lang->line('favoris'); ?></div></li>
            <li><div id="tab2"  data-select="tab2" class="<?php if($tab == 2) echo 'active'; ?>"><?php echo $this->lang->line('rappel'); ?></div></li>
            <li><div id="tab3"  data-select="tab3" class="<?php if($tab == 3) echo 'active'; ?>"><?php echo $this->lang->line('add_infos'); ?></div></li>
            <!-- <li><div id="tab4" data-select="tab4" class="<?php if($tab == 4) echo 'active'; ?>"><?php echo $this->lang->line('notes'); ?></div></li>  -->
        </ul>
        <fieldset class="inputstyle select tabsselectcont">
            <select id="tabsselect" >
                <option value="tab1" <?php if($tab == 1) echo 'selected'; ?>><?php echo $this->lang->line('favoris'); ?></option>
                <option value="tab2" <?php if($tab == 2) echo 'selected'; ?>><?php echo $this->lang->line('rappel'); ?></option>
                <option value="tab3" <?php if($tab == 3) echo 'selected'; ?>><?php echo $this->lang->line('add_infos'); ?></option>
                <!-- <option value="tab4" <?php if($tab == 4) echo 'selected'; ?>><?php echo $this->lang->line('notes'); ?></option>-->
            </select>
         </fieldset>

        <div class="block">
            <div class='<?php if($tab == 1) echo 'active'; ?> tab tab1'>
                <fieldset class="inputstyle">
                    <select name="mandataire_user_id" id="mandataire" class="form-control">
                        <?php foreach($mandataires as $key => $mandataire){ ?> 
                            <option value="<?php echo $mandataire->id; ?>" <?php if($mandataire->id == $favoris->mandataire_user_id) echo "selected"; ?>><?php echo $mandataire->login." : ".$mandataire->name." ".$mandataire->firstname; ?></option>
                        <?php } ?>
                    </select>
                </fieldset>

                <fieldset class="inputstyle">
                    <label for="title"><?php echo $this->lang->line('title'); ?></label>
                    <input type="text" id="title" name="title" value='<?php echo $favoris->title; ?>' >
                </fieldset>

                 <fieldset class="inputstyle">
                    <label for="url"><?php echo $this->lang->line('url'); ?></label>
                    <input type="text" id="url" name="url" value='<?php echo $favoris->url; ?>' >
                </fieldset>

                <fieldset  class="inputstyle">
                    <label for="tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" id="tags" name="tags" value='<?php echo $favoris->tags; ?>'>
                </fieldset>

                <div class='dat clearfix'>
                    <div class="float-middle input-separation">
                       <fieldset class="inputstyle">
                            <label for="owner_name"><?php echo $this->lang->line('owner_name'); ?></label>
                            <input type="text" name="owner_name" id="owner_name" value='<?php echo $favoris->owner_name; ?>'>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
                            <input type="text" name="tel" id="tel" value='<?php echo $favoris->tel; ?>'>
                        </fieldset>
                    </div>
                </div>
                <fieldset class="inputstyle" style="clear: both;">

                    <label for="note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note" id="note"><?php echo $favoris->note; ?></textarea>
                </fieldset>


            </div>
            <div class="tab tab2 <?php if($tab == 2) echo 'active'; ?>">
                <input type="hidden" name="rappel_id" value='<?php echo $favoris->rappel_id; ?>'>
                <fieldset class="inputstyle">
                    <label for="rappel_tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" name="rappel_tags" id="rappel_tags" value='<?php echo $favoris->rappel_tags; ?>'>
                </fieldset>
                <fieldset class="date-desktop">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    <?php if($favoris->date_rappel == '') { $date_rappel = ''; }else{ $date_rappel = date('d/m/Y H:i',$favoris->date_rappel); } ?>


                    <div class='input-group date datetimepicker ' id="datetimepicker_rappel">
                        <input type="text" class="form-control" id="date_rappel" name="rappel_date_rappel" value='<?php echo $date_rappel; ?>' >
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="date-mobile">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    <div>
                        <?php $date = date('Y-m-d',$favoris->date_rappel); ?>
                        <?php $time = date('H:i',$favoris->date_rappel); ?>
                        <div class='input-group'>
                            <input type="date" class="form-control" id="date_rappel_date" name="rappel_date_rappel_mobile_date" value='<?php echo $date; ?>' >
                        </div>
                        <div class='input-group'>
                            <input type="time" class="form-control" id="date_rappel_time" name="rappel_date_rappel_mobile_time" value='<?php echo $time; ?>' >
                        </div>
                    </div>
                </fieldset>
                 <fieldset class="inputstyle">
                    <label for="rappel_note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="rappel_note" id="rappel_note"><?php echo $favoris->rappel_note; ?></textarea>
                </fieldset>
            </div>
            <div class="tab tab3 <?php if($tab == 3) echo 'active'; ?>">
                 <div class='clearfix'>
                    <div class="float-middle input-separation">  
                        <fieldset class="inputstyle">
                            <label for="web_site"><?php echo $this->lang->line('web_site'); ?></label>
                            <input type="text" id="web_site" name="web_site" value='<?php echo $favoris->web_site; ?>' >
                        </fieldset>

                         <fieldset class="inputstyle">
                            <label for="price"><?php echo $this->lang->line('price'); ?></label>
                            <input type="text" id="price" name="price" value='<?php echo $favoris->price; ?>' >
                        </fieldset>
                        <!--<fieldset class="inputstyle">
                            <label><?php echo $this->lang->line('date'); ?></label>
                            <input type="date" name="date_publication" value='<?php echo date('d/m/Y',$favoris->date_publication); ?>' >
                        </fieldset>-->
                        <fieldset >
                            <label class="visuallyhidden"><?php echo $this->lang->line('date'); ?></label>
                            <div class='input-group date datetimepicker' id="datetimepicker_publication">
                                <input type="text" class="form-control" id="date_publication" name="date_publication" value='<?php echo date('d/m/Y',$favoris->date_publication); ?>'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="living_space"><?php echo $this->lang->line('living_space'); ?></label>
                            <input type="text" id="living_space" name="living_space" value='<?php echo $favoris->living_space; ?>'>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
                            <input type="text" id="adress" name="adress" value='<?php echo $favoris->adress; ?>'>
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label for="city"><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" id="city" name="city" value='<?php echo $favoris->city; ?>' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="zip_code"><?php echo $this->lang->line('zip_code'); ?></label>
                            <input type="text" id="zip_code" name="zip_code" value='<?php echo $favoris->zip_code; ?>' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="province"><?php echo $this->lang->line('province'); ?></label>
                            <input type="text" id="province" name="province" value='<?php echo $favoris->province; ?>' >
                        </fieldset>
                    </div>
                </div>
               
                <fieldset class="inputstyle">
                    <label for="description"><?php echo $this->lang->line('description'); ?></label>
                    <textarea name="description" id="description"><?php echo $favoris->description; ?></textarea>
                </fieldset>

               <!-- <div class='clearfix'>
                    <div class="input-separation">
                        <fieldset class="radio-inline-cont pull-left">
                            <div>
                                <input name="sale" type="radio" value="1" id="sell" <?php if($favoris->sale == 1) echo "checked"; ?>>
                                <label for="sell"><?php echo $this->lang->line('sell'); ?></label>
                            </div><div>
                                <input name="sale" type="radio" value="0" id="location" <?php if($favoris->sale == 0) echo "checked"; ?>>
                                <label for="location"><?php echo $this->lang->line('location'); ?></label>
                            </div>
                        </fieldset>
                        <fieldset class="radio-inline-cont pull-right">
                            <div>
                                <input name="lang" type="radio" value="fr" id="fr" <?php if($favoris->lang == 'fr') echo "checked"; ?>>
                                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
                            </div><div>
                                <input name="lang" type="radio" value="nl" id="nl" <?php if($favoris->lang == 'nl') echo "checked"; ?>>
                                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
                            </div>
                        </fieldset>
                    </div>
                   
                </div>-->

               

                <?php if(isset($favoris->web_path)) {  ?>
                <fieldset class="inputstyle">
                    <a target="_blank" href="<?php echo $favoris->web_path; ?>"><?php echo $favoris->file_name; ?></a>
                </fieldset>
                <?php } ?>

                <fieldset class="inputstyle">
                    <input type="file" name="picture" id="picture">
                </fieldset>
            </div>
            <div class="tab tab4 <?php if($tab == 4) echo 'active'; ?>">
                <div class='clearfix'>
                    <div id="fields">
                        <fieldset class="inputstyle field" id="field1" >
                            <textarea name="description" placeholder="description"></textarea>
                            <button data-id="field1" class="remove-me"><i class="fa fa-remove"></i></button>
                        </fieldset>
                    </div>
                    <button id="b1" class="btn add-more" type="button">Add +</button>
                </div>
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
