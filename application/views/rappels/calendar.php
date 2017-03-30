
<section class="l-annonces-search l-annonces-section apparitionright">

    <div class="clearfix l-top-annonces-export">
        <div class="btns-calendar">
            <a class='active' href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a> 
            <a href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>

     <div class='clearfix'>
      	<div class="float-middle input-separation">
            <fieldset class="inputstyle">
                <div id='calendar_week'></div>
            </fieldset>
        </div>

        <div class="float-middle input-separation">
           <fieldset class="inputstyle">
                <div id='calendar_month'></div>
            </fieldset>
        </div>
       
    </div>
    
    


</section>