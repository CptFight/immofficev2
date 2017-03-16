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
        <div class="btns-calendar">
            <a href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a>
            <a class="active" href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>
    
    <form action="" method="POST">
    <input type="hidden" name="id" value='<?php echo $rappel->id; ?>'>
    <div class="l-annonces-form l-form">
        
        <div class="favoris-edit-fiche">

            <h3><?php echo $this->lang->line('favoris'); ?> : <?php echo $rappel->title; ?></h3>
            <p class='sublegend'>publié le <?php echo date('d/m/Y',$rappel->date_publication); ?></p>

            <ul class="favoris-edit-fiche-body clearfix">
                <li>
                    <h4><?php echo $this->lang->line('price'); ?>:</h4><p><?php echo $rappel->price; ?></p>
                </li><li>
                    <h4><?php echo $this->lang->line('living_space'); ?>:</h4><p><?php echo $rappel->living_space; ?></p>
                </li>
            </ul>
            <ul class="favoris-edit-fiche-body clearfix">
                <li>
                    <h4><?php echo $this->lang->line('owner_name'); ?>:</h4><p><?php echo $rappel->owner_name; ?></p>
                </li><li>
                    <h4><?php echo $this->lang->line('tel'); ?>:</h4><p><?php echo $rappel->tel; ?></p>
                </li>
            </ul>
            <ul class="favoris-edit-fiche-body clearfix">
                <li>
                    <h4>Location/Vente:</h4><p><?php echo $this->lang->line('sell'); ?></p>
                </li><li>
                    <h4>Langue:</h4><p><?php echo $this->lang->line('french'); ?></p>
                </li>
            </ul>

            <ul class="favoris-edit-fiche-header">
                <li>
                    <h4>Url:</h4><a href="<?php echo $rappel->url; ?>"><?php echo $rappel->url; ?></a>
                </li>
                <li>
                    <h4>Website</h4><a href="<?php echo $rappel->web_site; ?>"><?php echo $rappel->web_site; ?></a>
                </li>
                <li>
                    <h4>Tags:</h4><p><?php echo $rappel->tags; ?></p>
                </li>
            </ul>

            <div class='clearfix'>
                <div class="float-tiers adresse">
                    <h4>Adresse:</h4>
                    <p>
                        <?php echo $rappel->adress; ?>
                        <br /><?php echo $rappel->city; ?>
                        <br/><?php echo $rappel->zip_code; ?>
                        <br/><?php echo $rappel->province; ?>
                    </p>
                </div>
                <div class="float-deux-tiers description">
                    <h4><?php echo $this->lang->line('description'); ?></h4>
                    <p>
                        <?php echo $rappel->description; ?>
                    </p>
                </div>
            </div>
        </div>

    <hr/>

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
    </div>
    </form>

        
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
