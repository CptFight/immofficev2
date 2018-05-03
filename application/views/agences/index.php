
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="clearfix l-top-annonces-export">
       <div class="btns-calendar">
            <a href="<?php echo site_url('agences/news'); ?>"><?php echo $this->lang->line('new'); ?></a> 
            <a class="active" href="<?php echo site_url('agences/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="liste_table">
            <thead>
                <tr>
                    <th ><?php echo $this->lang->line('name'); ?></th>
                    <th ><?php echo $this->lang->line('price_htva'); ?></th>
                    <th ><?php echo $this->lang->line('price_tvac'); ?></th>
                    <th ><?php echo $this->lang->line('users'); ?></th>
                    <th ><?php echo $this->lang->line('status'); ?></th>
                    <th class="desktop"><?php echo $this->lang->line('actions'); ?></th>
                </tr>
            </thead>

            <tbody>
            
            </tbody>

          
        </table>
    </div>
   
</section>
           
