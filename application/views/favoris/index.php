
<section class="l-annonces-search l-annonces-section apparitionright">


    <div class="btns-calendar">
        <a class='btn-actives <?php if(!$archive){ ?>active<?php } ?>' href="<?php echo site_url('favoris/index?archive=0'); ?>"><?php echo $this->lang->line('actives'); ?></a> 
        <a class='btn-actives btn-archives <?php if($archive){ ?>active<?php } ?>' href="<?php echo site_url('favoris/index?archive=1'); ?>"><?php echo $this->lang->line('archives'); ?></a>
        <a class="btn-new" href="<?php echo site_url('favoris/news'); ?>"><i class="fa fa-plus"></i> <?php echo $this->lang->line('new'); ?> <?php /*echo $this->lang->line('propriete'); */ ?></a> 
    </div>

    <input type="hidden" name="archive" id="archive" value="<?php echo $archive; ?>">

    <br/><hr/>
    <div class="row">
        <form action="" method="POST">
            <div class="col-sm-5"> 
                <select name="zip_code" data-placeholder="" id="zip_code" class="form-control">
                    <option value=""><?php echo $this->lang->line('nothing'); ?></option>
                    <?php foreach($zip_codes as $key => $zip_code) { ?>
                        <option value="<?php echo $zip_code; ?>" <?php if ($zip_code == $zip_code_selected) { echo "selected"; } ?>><?php echo $zip_code; ?></option> 
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-5"> 
                <select name="status_favoris" data-placeholder="" id="status_favoris" class="form-control">
                    <option value=""><?php echo $this->lang->line('nothing'); ?></option>
                    <?php foreach($status_favoris as $key => $status) { ?>
                        <option value="<?php echo $status->id; ?>" <?php if ($status->id == $status_favoris_id_selected) { echo "selected"; } ?>><?php echo $status->name; ?></option> 
                    <?php } ?>
                </select>
            </div>
            <div class="col-sm-2"> 
                <button name="search" class="btn" style="float:right" value="search" type="submit"><span><?php echo $this->lang->line('search'); ?></span></button>
            </div>
        </form>
    </div>
    <hr/>

    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS 
    <form action="" method="POST">-->
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="favoris_table">
            <thead>
                <tr>
                    <th ><?php echo $this->lang->line('title'); ?></th>
                    <th ><?php echo $this->lang->line('zip_code'); ?></th>
                    <th width="50px"><?php echo $this->lang->line('price'); ?></th>
                    <th ><?php echo $this->lang->line('status'); ?></th>
                    <th ><?php echo $this->lang->line('date'); ?></th>
                    <th class="desktop"><?php echo $this->lang->line('actions'); ?></th>
                    <th class="none"><?php echo $this->lang->line('saved_by_users_in_agence'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('note'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('annonce_id'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('favoris_id'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('web_site'); ?></th>
                    <th class="none"><?php echo $this->lang->line('price'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('publications'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('adress'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('province'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('city'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('owner_name'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('owner_email'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('owner_tel'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('owner_note'); ?> : </th>


                    <th class="none"><?php echo $this->lang->line('description'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('link'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('upload_link'); ?> : </th>
                </tr>
            </thead>

            <tbody>
            
            </tbody>
          
        </table>
    </div>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
           
