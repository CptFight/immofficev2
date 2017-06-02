<section class="l-annonces-section l-annonces-search apparitionright">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="l-annonces-form l-form">
            <fieldset class="inputstyle">
                <label for="title"><?php echo $this->lang->line('name'); ?></label>
                <input type="text" id="title" name="title" value="<?php echo $agence->name; ?>" disabled class="disabled">
            </fieldset>
            <div class="clearfix separation-form">
                <div class="separation-form-title"><h3><?php echo $this->lang->line('adress'); ?>:</h3></div>
                <div class="float-middle input-separation">
                    <div class="float-trois-quart input-separation">
                        <fieldset class="inputstyle">
                        <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
                        <input type="text" id="adress" name="adress" value='<?php echo $agence->adress; ?>' >
                    </fieldset>
                    </div>
                    <div class="float-quart input-separation">
                        <fieldset class="inputstyle">
                            <label for="number"><?php echo $this->lang->line('number'); ?></label>
                            <input type="text" id="number" name="number" value='<?php echo $agence->number; ?>' >
                        </fieldset>
                    </div>
                </div>
                <div class="float-middle input-separation">
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="postcode"><?php echo $this->lang->line('postcode'); ?></label>
                            <input type="text" id="postcode" name="zipcode" value='<?php echo $agence->zipcode; ?>' >
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="city"><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" id="city" name="city" value='<?php echo $agence->city; ?>' >
                        </fieldset>
                    </div>
                </div>
            </div>
            <fieldset class="inputstyle">
                <label for="phone"><?php echo $this->lang->line('tel'); ?></label>
                <input type="text" id="phone" name="tel" value='<?php echo $agence->tel; ?>' >
            </fieldset>
            <div class="clearfix separation-form ul-multiple-inputs-container no-bottom-margin">
                <h3><?php echo $this->lang->line('status_favoris'); ?>:</h3>
                <ul>
                    <?php foreach($status_favoris as $key => $status){  ?>
                    <li>
                        <div class="inputsstatus">
                            <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:<?php echo $status->color; ?>;"></span></a>
                            <fieldset class="inputstyle">
                                <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                <input type="text" id="status1" name="status_favoris[]" value='<?php echo $status->name; ?>' >
                            </fieldset>
                        </div>
                    </li>
                    <?php } ?>
                    <li class="add-element-template">
                        <div class="inputsstatus">
                            <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                            <fieldset class="inputstyle">
                                <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                <input type="text" id="status1" name="status_favoris[]" value='' >
                            </fieldset>
                        </div>
                        <a href="#" class="btn-add"><i class="fa fa-plus"></i></a>
                    </li>
                </ul>
            </div>
            <div class="clearfix separation-form ul-multiple-inputs-container no-top-margin">
                <h3><?php echo $this->lang->line('status_owner'); ?>:</h3>
                <ul>
                    <?php foreach($status_owners as $key => $status){  ?>
                    <li>
                        <div class="inputsstatus">
                            <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:<?php echo $status->color; ?>;"></span></a>
                            <fieldset class="inputstyle">
                                <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                <input type="text" id="status1" name="status_owners[]" value='<?php echo $status->name; ?>' >
                            </fieldset>
                        </div>
                    </li>
                    <?php } ?>
                    <li class="add-element-template">
                        <div class="inputsstatus">
                            <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                            <fieldset class="inputstyle">
                                <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                <input type="text" id="status1" name="status_owners[]" value='' >
                            </fieldset>
                        </div>
                        <a href="#" class="btn-add"><i class="fa fa-plus"></i></a>
                    </li>
                </ul>

            </div>
        </div>

        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </form>
</section>
