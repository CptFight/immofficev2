
<section class="apparitionright l-suggestions-section">
    <form action="" method="POST">
        <div class="l-annonces-form l-form">
            <div class="clearfix">
                <fieldset class="inputstyle float-middle">
                    <label><?php echo $this->lang->line('name'); ?></label>
                    <input type="text" name="name" required>
                </fieldset>
                <fieldset class="inputstyle float-middle">
                    <label><?php echo $this->lang->line('email'); ?></label>
                    <input type="email" name="email" required>
                </fieldset>
            </div>
            <fieldset class="inputstyle">
                <label><?php echo $this->lang->line('message'); ?></label>
                <textarea name="message" required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" class="btn" value="send" type="submit"><?php echo $this->lang->line('send'); ?></button>
            </fieldset>
        </div>
    </form>
</section>
           
