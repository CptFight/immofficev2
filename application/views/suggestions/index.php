
<div class="title-container">
    <h2><?php echo $this->lang->line('suggestions'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('french'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('suggestions'); ?></a>
        </li>
    </ul>
</div>
<section class="apparitionright l-suggestions-section">
    <form action="" method="POST">
        <div class="l-annonces-form l-form">
            <div class="clearfix">
                <fieldset class="inputstyle float-middle">
                    <label>Name</label>
                    <input type="text" required>
                </fieldset>
                <fieldset class="inputstyle float-middle">
                    <label>Email</label>
                    <input type="email" required>
                </fieldset>
            </div>
            <fieldset class="inputstyle">
                <label>Place your message</label>
                <textarea required></textarea>
            </fieldset>
            <fieldset>
                <button name="submit" class="btn" type="submit">Submit</button>
            </fieldset>
        </div>
    </form>
</section>
           
