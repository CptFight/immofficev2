

<div class="title-container">
    <h2><?php echo $this->lang->line('rappel'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('home'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('calendar'); ?></a>
        </li>
    </ul>
</div>
<section class="l-annonces-search l-annonces-section apparitionright">

    <div class="clearfix l-top-annonces-export">
       <a href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a> | 
       <a href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
    </div>

    <div id='calendar'></div>


</section>