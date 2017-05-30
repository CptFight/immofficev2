<section class="l-annonces-search l-annonces-section apparitionright">
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST" enctype="multipart/form-data">
       
    <div class="l-annonces-form l-form">

    
        <ul class="tabs">
            <li><div id="tab1"  data-select="tab1" class="<?php if($tab == 1) echo 'active'; ?>"><?php echo $this->lang->line('general'); ?></div></li>
            <li><div id="tab2"  data-select="tab2" class="<?php if($tab == 2) echo 'active'; ?>"><?php echo $this->lang->line('rappel'); ?></div></li>
            <li><div id="tab3"  data-select="tab3" class="<?php if($tab == 3) echo 'active'; ?>"><?php echo $this->lang->line('add_infos'); ?></div></li>
            <li><div id="tab4" data-select="tab4" class="<?php if($tab == 4) echo 'active'; ?>"><?php echo $this->lang->line('following'); ?></div></li> 
            <li><div id="tab5" data-select="tab5" class="<?php if($tab == 5) echo 'active'; ?>"><?php echo $this->lang->line('owner'); ?></div></li> 
        </ul>
        <fieldset class="inputstyle select tabsselectcont">
            <select id="tabsselect" >
                <option value="tab1" <?php if($tab == 1) echo 'selected'; ?>><?php echo $this->lang->line('favoris'); ?></option>
                <option value="tab2" <?php if($tab == 2) echo 'selected'; ?>><?php echo $this->lang->line('rappel'); ?></option>
                <option value="tab3" <?php if($tab == 3) echo 'selected'; ?>><?php echo $this->lang->line('add_infos'); ?></option>
                <option value="tab4" <?php if($tab == 4) echo 'selected'; ?>><?php echo $this->lang->line('notes'); ?></option>
                <option value="tab5" <?php if($tab == 5) echo 'selected'; ?>><?php echo $this->lang->line('owner'); ?></option>
            </select>
         </fieldset>


        <div class="block">
            <div class='<?php if($tab == 1) echo 'active'; ?> tab tab1'>
                <fieldset class="inputstyle">
                    <select name="mandataire_user_id" id="mandataire" class="form-control">
                        <?php foreach($mandataires as $key => $mandataire){ ?> 
                            <option value="<?php echo $mandataire->id; ?>"><?php echo $mandataire->login." : ".$mandataire->name." ".$mandataire->firstname; ?></option>
                        <?php } ?>
                    </select>
                </fieldset>

                <fieldset class="inputstyle">
                    <label for="title"><?php echo $this->lang->line('title'); ?></label>
                    <input type="text" id="title" name="title" value='' >
                </fieldset>

                 <fieldset class="inputstyle">
                    <label for="url"><?php echo $this->lang->line('url'); ?></label>
                    <input type="text" id="url" name="url" value='' >
                </fieldset>

                <fieldset  class="inputstyle">
                    <label for="tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" id="tags" name="tags" value=''>
                </fieldset>
                 
                <fieldset class="inputstyle">
                    <label for="note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note" id="note"></textarea>
                </fieldset>


            </div>
            <div class="tab tab2 <?php if($tab == 2) echo 'active'; ?>">
                <input type="hidden" name="rappel_id" value=''>
                <fieldset class="inputstyle">
                    <label for="rappel_tags"><?php echo $this->lang->line('tags'); ?></label>
                    <input type="text" name="rappel_tags" id="rappel_tags" value=''>
                </fieldset>
                <fieldset class="date-desktop">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    
                    <div class='input-group date datetimepicker' id="datetimepicker_rappel">
                        <input type="text" class="form-control" id="date_rappel" name="rappel_date_rappel" value='<?php echo date('d/m/Y',strtotime('now')); ?>'>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar">
                            </span>
                        </span>
                    </div>
                </fieldset>
                <fieldset class="date-mobile">
                    <label><?php echo $this->lang->line('date'); ?></label>
                    <div>
                       
                        <div class='input-group'>
                            <input type="date" class="form-control" id="date_rappel_date" name="rappel_date_rappel_mobile_date" value='' >
                        </div>
                        <div class='input-group'>
                            <input type="time" class="form-control" id="date_rappel_time" name="rappel_date_rappel_mobile_time" value='' >
                        </div>
                    </div>
                </fieldset>


                 <fieldset class="inputstyle">
                    <label for="rappel_note"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="rappel_note" id="rappel_note"></textarea>
                </fieldset>
            </div>
            <div class="tab tab3 <?php if($tab == 3) echo 'active'; ?>">
                 <div class='clearfix'>
                    <div class="float-middle input-separation">  
                        <fieldset class="inputstyle">
                            <label for="web_site"><?php echo $this->lang->line('web_site'); ?></label>
                            <input type="text" id="web_site" name="web_site" value='' >
                        </fieldset>

                         <fieldset class="inputstyle">
                            <label for="price"><?php echo $this->lang->line('price'); ?></label>
                            <input type="text" id="price" name="price" value='' >
                        </fieldset>
                       
                        <fieldset >
                            <label class="visuallyhidden"><?php echo $this->lang->line('date'); ?></label>
                            <div class='input-group date datetimepicker' id="datetimepicker_publication">
                                <input type="text" class="form-control" id="date_publication" name="date_publication" value='<?php echo date('d/m/Y',strtotime('now')); ?>'>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar">
                                    </span>
                                </span>
                            </div>
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="living_space"><?php echo $this->lang->line('living_space'); ?></label>
                            <input type="text" id="living_space" name="living_space" value=''>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
                            <input type="text" id="adress" name="adress" value=''>
                        </fieldset>
                         <fieldset class="inputstyle">
                            <label for="city"><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" id="city" name="city" value='' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="zip_code"><?php echo $this->lang->line('zip_code'); ?></label>
                            <input type="text" id="zip_code" name="zip_code" value='' >
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="province"><?php echo $this->lang->line('province'); ?></label>
                            <input type="text" id="province" name="province" value='' >
                        </fieldset>
                    </div>
                </div>
               
                <fieldset class="inputstyle">
                    <label for="description"><?php echo $this->lang->line('description'); ?></label>
                    <textarea name="description" id="description"></textarea>
                </fieldset>


                <fieldset class="inputstyle">
                    <input type="file" name="picture" id="picture">
                </fieldset>
            </div>
            <div class="tab tab4 <?php if($tab == 4) echo 'active'; ?>">
                <div class="new-note news-new-note">
                    <h3>Add a note</h3>
                    <fieldset class="inputstyle">
                        <textarea name="newnote" placeholder="Note"></textarea>
                    </fieldset>
                    <fieldset class="inputstyle">
                        <textarea name="newnote" placeholder="Note"></textarea>
                        <a href="javascript:;" class="btn-add"><i class="fa fa-plus"></i></a>
                    </fieldset>
                </div>
                <!--<div class='clearfix'>
                    <div id="fields">
                        <fieldset class="inputstyle field" id="field1" >
                            <textarea name="description" placeholder="Note"></textarea>
                            <button data-id="field1" class="remove-me"><i class="fa fa-remove"></i></button>
                        </fieldset>
                    </div>
                    <button id="b1" class="btn add-more" type="button">Add +</button>
                </div>-->
            </div>
            <div class="tab tab5 <?php if($tab == 5) echo 'active'; ?>">
                <div class='clearfix'>
                    <div class="float-middle input-separation">
                       <fieldset class="inputstyle">
                            <label for="owner_name"><?php echo $this->lang->line('owner_name'); ?></label>
                            <input type="text" name="owner_name" id="owner_name" value=''>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
                            <input type="text" name="tel" id="tel" value=''>
                        </fieldset>
                    </div>
                </div>
                <div class='clearfix'>
                    <div class="float-middle input-separation">
                       <fieldset class="inputstyle">
                            <label for="owner_mail"><?php echo $this->lang->line('owner_mail'); ?></label>
                            <input type="email" name="owner_mail" id="owner_mail" value=''>
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset >
                            <select name="owner_status" id="owner_status" class="form-control">
                                <option value="Status">Status</option>
                            </select>
                        </fieldset>
                    </div>
                </div>
                <fieldset class="inputstyle" style="clear: both;">
                    <label for="note_owner"><?php echo $this->lang->line('note'); ?></label>
                    <textarea name="note_owner" id="note_owner"></textarea>
                </fieldset>
            </div>
        </div>

        <fieldset class="form-buttons">
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
        
        </fieldset>

    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
