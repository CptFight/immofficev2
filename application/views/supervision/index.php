<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="l-annonces-form l-form">
        <ul class="tabs">
            <li><div id="tab1" class='active'><?php echo $this->lang->line('dashboard'); ?></div></li>
            <li><div id="tab2"><?php echo $this->lang->line('connection_historic'); ?></div></li>
        </ul>
        <div class="block">
            <div class='active tab tab1'>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="admin_table">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('user'); ?></th>
                                <th class="none"><?php echo $this->lang->line('subscriber'); ?> :</th>

                                 <!-- depuis 1 semaine  -->
                                <th class="none"><u><?php echo $this->lang->line('since_1_week'); ?></u></th>
                               
                                <th class="none"><?php echo $this->lang->line('number_link_visited'); ?> : </th>

                                <th class="none"><?php echo $this->lang->line('number_favoris'); ?> : </th>
                                <th class="none"><?php echo $this->lang->line('number_remember'); ?> : </th>
                                
                                <th class="none"><?php echo $this->lang->line('number_export'); ?> :</th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_mail'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_csv'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_print'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_pdf'); ?> : </th>


                                <!-- depuis toujours -->
                                <th class="none"><u><?php echo $this->lang->line('since_all_time'); ?></u></th>
                                <th><?php echo $this->lang->line('last_connection'); ?></th>

                                <th class="none"><?php echo $this->lang->line('number_link_visited'); ?> : </th>
                                
                                <th class="desktop"><?php echo $this->lang->line('last_favoris'); ?></th>
                                <th class="none"><?php echo $this->lang->line('number_favoris'); ?> : </th>

                                <th class="desktop"><?php echo $this->lang->line('last_remember'); ?></th>
                                <th class="none"><?php echo $this->lang->line('number_remember'); ?> : </th>

                                <th><?php echo $this->lang->line('last_export'); ?> :</th>
                                <th class="none"><?php echo $this->lang->line('number_export'); ?> :</th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_mail'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_csv'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_print'); ?> : </th>
                                <th class="none"> -> <?php echo $this->lang->line('number_export_pdf'); ?> : </th>

                               
                                
                               
                                

                                <th class="desktop"><?php echo $this->lang->line('actions'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab tab2">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="connexion_table">
                        <thead>
                            <tr>
                                <th>Personne connecté</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
