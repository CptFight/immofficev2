
<section class="l-annonces-search l-annonces-section apparitionright">
    
    <div class="clearfix l-top-annonces-export">
        <div class="btns-calendar">
            <a href="<?php echo site_url('rappels/calendar'); ?>"><?php echo $this->lang->line('calendar'); ?></a> 
            <a class="active" href="<?php echo site_url('rappels/index'); ?>"><?php echo $this->lang->line('liste'); ?></a>
        </div>
    </div>
    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
    <form action="" method="POST">
   
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="rappels_table">
            <thead>
                <tr>
                    <th ><?php echo $this->lang->line('title'); ?></th>
                    <th ><?php echo $this->lang->line('zip_code'); ?></th>
                    <th ><?php echo $this->lang->line('price'); ?></th>
                    <th ><?php echo $this->lang->line('web_site'); ?></th>
                    <th ><?php echo $this->lang->line('date_rappel'); ?></th>
                    <th class="desktop"><?php echo $this->lang->line('actions'); ?></th>
                    <th class="none"><?php echo $this->lang->line('annonce_id'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('favoris_id'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('rappel_id'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('price'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('publications'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('adress'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('province'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('city'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('description'); ?> : </th>
                    <th class="none"><?php echo $this->lang->line('link'); ?> : </th>
                </tr>
            </thead>

            <tbody>
            
            </tbody>

          
        </table>
    </div>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
           
