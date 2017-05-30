<section class="l-annonces-section l-annonces-search apparitionright">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="l-annonces-form l-form">
            <fieldset class="inputstyle">
                <label for="title"><?php echo $this->lang->line('name'); ?></label>
                <input type="text" id="title" name="title" value="Nom de l agence" disabled class="disabled">
            </fieldset>
            <div class="clearfix separation-form">
                <div class="separation-form-title"><h3><?php echo $this->lang->line('adress'); ?>:</h3></div>
                <div class="float-middle input-separation">
                    <div class="float-trois-quart input-separation">
                        <fieldset class="inputstyle">
                        <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
                        <input type="text" id="adress" name="adress" value='' >
                    </fieldset>
                    </div>
                    <div class="float-quart input-separation">
                        <fieldset class="inputstyle">
                            <label for="number"><?php echo $this->lang->line('number'); ?></label>
                            <input type="text" id="number" name="number" value='' >
                        </fieldset>
                    </div>
                </div>
                <div class="float-middle input-separation">
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="postcode"><?php echo $this->lang->line('postcode'); ?></label>
                            <input type="text" id="postcode" name="postcode" value='' >
                        </fieldset>
                    </div>
                    <div class="float-middle input-separation">
                        <fieldset class="inputstyle">
                            <label for="city"><?php echo $this->lang->line('city'); ?></label>
                            <input type="text" id="city" name="city" value='' >
                        </fieldset>
                    </div>
                </div>
            </div>
            <fieldset class="inputstyle">
                <label for="phone"><?php echo $this->lang->line('tel'); ?></label>
                <input type="text" id="phone" name="phone" value='' >
            </fieldset>
            <div class="clearfix separation-form ul-multiple-inputs-container no-bottom-margin">
                <div class="float-quart">
                    <h3><?php echo $this->lang->line('status'); ?>:</h3>
                </div>
                <div class="float-trois-quart">
                    <ul>
                        <li>
                            <div class="inputsstatus">
                                <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                                <fieldset class="inputstyle">
                                    <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                    <input type="text" id="status1" name="status1" value='' >
                                </fieldset>
                            </div>
                        </li>
                        <li>
                            <div class="inputsstatus">
                                <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                                <fieldset class="inputstyle">
                                    <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                    <input type="text" id="status1" name="status1" value='' >
                                </fieldset>
                            </div>
                            <a href="javascript:;" class="btn-add"><i class="fa fa-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix separation-form ul-multiple-inputs-container no-top-margin">
                <div class="float-quart">
                    <h3><?php echo $this->lang->line('status'); ?>:</h3>
                </div>
                <div class="float-trois-quart">
                    <ul>
                        <li>
                            <div class="inputsstatus">
                                <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                                <fieldset class="inputstyle">
                                    <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                    <input type="text" id="status1" name="status1" value='' >
                                </fieldset>
                            </div>
                        </li>
                        <li>
                            <div class="inputsstatus">
                                <a href="javascript:;" class="btn-colorpicker colorpickerjs" ><span class="color-fill-icon dropdown-color-fill-icon" style="background-color:#000;"></span></a>
                                <fieldset class="inputstyle">
                                    <label for="status1"><?php echo $this->lang->line('status'); ?></label>
                                    <input type="text" id="status1" name="status1" value='' >
                                </fieldset>
                            </div>
                            <a href="javascript:;" class="btn-add"><i class="fa fa-plus"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
</section>
