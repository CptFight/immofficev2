<section class="l-annonces-section l-annonces-search apparitionright l-campaignsinfos">
    <div class="clearfix">
        <h3 class="maintitle">Campaign infos</h3>
        <a href="<?php echo site_url('campaigns'); ?>" class="btn-back">Back</a>
    </div>
    <form action="" method="POST">
        <div class="clearfix">
            <div class="float-middle">

                <div class="l-annonces-form l-form">
                    <div class="separation-form">
                        <h3>Header</h3>
                        <fieldset class="inputstyle">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" value='Titre' required>
                        </fieldset>
                        <fieldset class="inputstyle">
                            <label for="titre">Sous-titre</label>
                            <input type="text" id="titre" name="titre" value='Titre' required>
                        </fieldset>
                        <fieldset>
                            <input type="file" name="file" id="file" class="inputfile">
                            <label for="file">Image</label>
                        </fieldset>
                    </div>
                    <div class="separation-form">
                        <h3>Body</h3>
                        <fieldset class="inputstyle">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" value='Titre' required>
                        </fieldset>
                        <fieldset class="inputstyle">
                             <label for="description">Text</label>
                            <textarea name="description" id="description"></textarea>
                        </fieldset>
                    </div>
                    <div class="separation-form">
                        <h3>Footer</h3>
                        <fieldset class="inputstyle">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" value='Titre' required>
                        </fieldset>
                        <fieldset class="inputstyle">
                             <label for="description">Text</label>
                            <textarea name="description" id="description"></textarea>
                        </fieldset>
                    </div>
                 </div>
            </div>
            <div class="float-middle">
                <div class="iframe-preview">
                    <?php
                        foreach($campaigns as $key => $campaign){
                            if($key == 0)
                            {
                                echo '<iframe src="'.$campaign['url'].'" class="btn-iframe"></iframe>';
                            }
                        }
                    ?>
                </div>
            </div>
        </div>

        <fieldset>
            <!--<button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('next'); ?></button>-->
            <a href="template" class="btn"><?php echo $this->lang->line('next'); ?></a>
         </fieldset>
      </form>
</section>

<div id="emojis" class="lightbox"><p>Emoji Characters are well supported in many client emails (specially on mobile) but they don't show up everywhere. Make sure your message is conveyd without them.</p></div>
