<div class="title-container">
    <h2><?php echo $this->lang->line('user'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('home'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('edit'); ?></a>
        </li>
    </ul>
</div>
<section class="l-annonces-search l-annonces-section apparitionright">
    <form action="" method="POST">
    <div class="l-annonces-form l-form">
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('email'); ?></label>
            <input type="text" name="email" value='<?php echo $user->login; ?>' required>
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('password'); ?></label>
            <input type="password" name="password" value=''>
        </fieldset>
         <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('verify_password'); ?></label>
            <input type="password" name="verify_password" value=''>
        </fieldset>
        <hr/>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('name'); ?></label>
            <input type="text" name="name" value='<?php echo $user->name; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('firstname'); ?></label>
            <input type="text" name="firstname" value='<?php echo $user->firstname; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('agence'); ?></label>
            <input type="text" name="agence" value='<?php echo $user->agence; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('tel'); ?></label>
            <input type="text" name="tel" value='<?php echo $user->tel; ?>' >
        </fieldset>
        <fieldset class="inputstyle">
            <label><?php echo $this->lang->line('adress'); ?></label>
            <input type="text" name="adress" value='<?php echo $user->adress; ?>' >
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
        <fieldset>
            <button name="save" class="btn" value="save" type="submit"><?php echo $this->lang->line('save'); ?></button>
         </fieldset>
    </div>
    </form>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
