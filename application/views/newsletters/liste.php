
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="clearfix l-top-annonces-export">
       <div class="btns-calendar">
            <a href="<?php echo site_url('newsletters/templatechoice'); ?>"><?php echo $this->lang->line('new'); ?></a> 
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="campaigntable">
            <thead>
                <tr>
                    <th ><?php echo $this->lang->line('campaign_name'); ?></th>
                    <th ><?php echo $this->lang->line('email_subject'); ?></th>
                    <th ><?php echo $this->lang->line('preview_text'); ?></th>
                    <th ><?php echo $this->lang->line('from_name'); ?></th>
                    <th ><?php echo $this->lang->line('from_email_adress'); ?></th>
                    <th class="desktop" width="100px"><?php echo $this->lang->line('actions'); ?></th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td ><?php echo $this->lang->line('campaign_name'); ?></td>
                    <td ><?php echo $this->lang->line('email_subject'); ?></td>
                    <td ><?php echo $this->lang->line('preview_text'); ?></td>
                    <td ><?php echo $this->lang->line('from_name'); ?></td>
                    <td ><?php echo $this->lang->line('from_email_adress'); ?></td>
                    <td>
                        <ul class="list-tables-buttons"">
                            <li class="table-btn-edit"><a href=""><i class="fa fa-clone"></i><span><?php echo $this->lang->line('clone'); ?></span></a></li>
                            <li class="table-btn-edit"><a href="<?php echo site_url('newsletters/rapport'); ?>"><i class="fa fa-eye"></i><span><?php echo $this->lang->line('see_rapport'); ?></span></a></li>
                            <li class="table-btn-edit"><a href="<?php echo site_url('newsletters/infos'); ?>"><i class="fa fa-pencil"></i><span><?php echo $this->lang->line('edit_campaign'); ?></span></a></li>
                            <li class="table-btn-delete"><a href=""><i class="fa fa-remove"></i><span><?php echo $this->lang->line('delete_campaign'); ?></span></a></li>
                        </ul>
                    </td>
                </tr>
            </tbody>

          
        </table>
    </div>
   
</section>
           
