
<section class="l-annonces-search l-annonces-section apparitionright">
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        <fieldset class="inputstyle">
            <label for="email"><?php echo $this->lang->line('email'); ?></label>
            <input type="text" id="email" name="email" value='<?php echo $user->login; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label for="password"><?php echo $this->lang->line('password'); ?></label>
            <input type="password" id="password" name="password" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label for="verify_password"><?php echo $this->lang->line('verify_password'); ?></label>
            <input type="password" id="verify_password" name="verify_password" value=''>
        </fieldset>
        <hr/>
        <fieldset class="inputstyle">
            <label for="name"><?php echo $this->lang->line('name'); ?></label>
            <input type="text" id="name" name="name" value='<?php echo $user->name; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label for="firstname"><?php echo $this->lang->line('firstname'); ?></label>
            <input type="text" id="firstname" name="firstname" value='<?php echo $user->firstname; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label for="tel"><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" id="tel" name="tel" value='<?php echo $user->tel; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label for="adress"><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" id="adress" name="adress" value='<?php echo $user->adress; ?>' >
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <div>
                <input name="lang" type="radio" value="french" id="fr" <?php if($user->lang == 'french') echo 'checked'; ?>>
                <label for="fr"><?php echo $this->lang->line('french'); ?></label>
            </div><!--
             --><div>
                <input name="lang" type="radio" value="dutch" id="nl" <?php if($user->lang == 'dutch') echo 'checked'; ?>>
                <label for="nl"><?php echo $this->lang->line('dutch'); ?></label>
            </div>
        </fieldset>
        <fieldset class="radio-inline-cont separation-form"><br/>
            <?php echo $this->lang->line('direct_access_page'); ?> : 
            <div>
                <input name="direct_access_page" type="radio" value="1" id="direct_access_page_1" <?php if($user->direct_access_page == '1') echo 'checked'; ?>>
                <label for="direct_access_page_1"><?php echo $this->lang->line('yes'); ?></label>
            </div><!--
             --><div>
                <input name="direct_access_page" type="radio" value="0" id="direct_access_page_0" <?php if($user->direct_access_page == '0') echo 'checked'; ?>>
                <label for="direct_access_page_0"><?php echo $this->lang->line('no'); ?></label>
            </div>
        </fieldset>
        <fieldset class="radio-inline-cont ">
            <?php echo $this->lang->line('autorisation_members'); ?> : 
            <div >
                <input name="public_access" type="radio" value="1" <?php if($user->public_access >= 1){ echo 'checked'; }?> id="autorisation_members_access_yes">
                <label for="autorisation_members_access_yes"><?php echo $this->lang->line('yes'); ?></label>
            </div>
            <div>
                <input name="public_access" type="radio" value="0" <?php if($user->public_access == 0){ echo 'checked'; }?> id="autorisation_members_access_no">
                <label for="autorisation_members_access_no"><?php echo $this->lang->line('no'); ?></label>`

            </div>
                <div>
                    <input name="public_access_option" type="radio" value="1" id="autorisation_members_access_option_0" <?php if($user->public_access_option == '1') echo 'checked'; ?> >
                    <label for="autorisation_members_access_option_0"><?php echo $this->lang->line('vue'); ?></label>
                </div>
                <div>
                    <input name="public_access_option" type="radio" value="2" id="autorisation_members_access_option_1" <?php if($user->public_access_option == '2') echo 'checked'; ?>>
                    <label for="autorisation_members_access_option_1"><?php echo $this->lang->line('edition'); ?></label>
                </div><!--
                 -->
            </div>
        </fieldset>
        <hr/>
        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
