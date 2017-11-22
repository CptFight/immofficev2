<section class="l-annonces-search l-annonces-section apparitionright l-dashboard l-campaignsrapport">
    <div class="l-annonces-form l-form">
        <div class="clearfix">
            <h3><?php echo $this->lang->line('campaign_name'); ?></h3>
            <a href="<?php echo site_url('campaigns'); ?>" class="btn-back">Back</a>
        </div>
        
        <div class="clearfix">
            <div class="float-middle">
                <ul>
                    <li class="title-line">
                        <h4><?php echo $this->lang->line('open_rate'); ?></h4> <p>28.2 %</p>
                        <div class="pourcentage-bar"><span style="width:28%"></span></div>
                    <li>

                    <li>
                        <h5><?php echo $this->lang->line('list_average'); ?></h5> <p>25%</p>
                    <li>
                        <h5><?php echo $this->lang->line('industry_average'); ?> <a href="">(eCommerce)</a></h5> <p>25%</p>
                    </li>
                </ul>
            </div>

            <div class="float-middle">
                <ul>
                     <li class="title-line">
                        <h4><?php echo $this->lang->line('click_rate'); ?></h4><p>0 %</p>
                        <div class="pourcentage-bar"><span style="width:0%"></span></div>
                    <li>
                    <li>
                        <h5><?php echo $this->lang->line('list_average'); ?></h5> <p>25%</p>
                    <li>
                        <h5><?php echo $this->lang->line('industry_average'); ?> <a href="">(eCommerce)</a></h5> <p>25%</p>
                    </li>
                </ul>
            </div>
        </div> 

        <ul class="clearfix rapport-table">
            <li>
                <p>913<span><?php echo $this->lang->line('opened'); ?></span></p>
            </li>
            <li>
                <p>913<span><?php echo $this->lang->line('clicked'); ?></span></p>
            </li>
            <li>
                <p>913<span><?php echo $this->lang->line('bounced'); ?></span></p>
            </li>
            <li>
                <p>913<span><?php echo $this->lang->line('unscribed'); ?></span></p>
            </li>
        </ul>

        <div class="clearfix">
            <div class="float-middle">
                <ul>
                    <li>
                        <h5><?php echo $this->lang->line('successfull_deliveries'); ?></h5> <p><span class="bold">3,2222</span> 95%</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('total_opens'); ?></h5> <p>2000</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('last_opened'); ?></h5> <p>22/22/2222 10:34AM</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('forwarded'); ?></h5> <p>00</p>
                    </li>
                </ul>
            </div>

            <div class="float-middle">
                <ul>
                     <li>
                        <h5><?php echo $this->lang->line('clicks_per_unique_opens'); ?></h5> <p>0%</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('total_clicks'); ?></h5> <p>0</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('last_clicked'); ?></h5> <p>0</p>
                    </li>
                    <li>
                        <h5><?php echo $this->lang->line('abuse_report'); ?></h5> <p>0</p>
                    </li>
                </ul>
            </div>
        </div> 
    </div>
</section>
