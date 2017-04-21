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
                               <th><?php echo $this->lang->line('last_connection'); ?> :</th>
                                
                                <th class="desktop"><?php echo $this->lang->line('last_favoris'); ?></th>
                                
                                <th class="desktop"><?php echo $this->lang->line('last_remember'); ?></th>
                                <th><?php echo $this->lang->line('last_export'); ?> :</th>

                               

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
