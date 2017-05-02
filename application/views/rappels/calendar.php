
<section class="l-annonces-search l-annonces-section apparitionright l-section-calendar">

    <div class="clearfix l-top-annonces-export">
        <div class="btns-calendar">
            <a class='active' href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a> 
            <a href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>

    <fieldset class="inputstyle select index-select tabsselectcont">
        <select id="tabsselect">
            <option value="calendar_week_container" selected><?php echo $this->lang->line('calendar_day'); ?></option>
            <option value="calendar_month_container"><?php echo $this->lang->line('calendar_month'); ?></option>
        </select>
     </fieldset>

     <div class='clearfix l-calendar'>
      	<div class="float-middle input-separation" id="calendar_week_container">
            <fieldset>
                <div id='calendar_week'></div>
                <a href="javascript:;" class="btn btn-calendar" data-id="calendar_week_container"><i class="fa fa-arrows-alt"></i></a>
            </fieldset>
        </div>

        <div class="float-middle input-separation" id="calendar_month_container">
           <fieldset>
                <div id='calendar_month'></div>
                 <a href="javascript:;" class="btn btn-calendar" data-id="calendar_month_container"><i class="fa fa-arrows-alt"></i></a>
            </fieldset>
        </div>
       
    </div>
    
    


</section>