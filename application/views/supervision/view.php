<section class="l-annonces-search l-annonces-section apparitionright l-dashboard">
    <div class="l-annonces-form l-form">
        <h3><?php echo $user->name." ".$user->firstname; ?></h3>
        
        <ul class="tabs">
            <li><div id="tab1" class='active'><?php echo $this->lang->line('dashboard'); ?></div></li>
            <li><div id="tab2"><?php echo $this->lang->line('connection_historic'); ?></div></li>
        </ul>


        <input type="hidden" id="current_user_id_view" value="<?php echo $user->id;?>" >
        <div class="block">
            <div class='active tab tab1'>
                <div class="clearfix">
                    <div class="float-middle">
                        <h5><?php echo $this->lang->line('last_connection'); ?></h5><p><?php echo date('d/m/Y h:i:s',$user->last_connection); ?></p>
                    </div>
                    <div class="float-middle">
                       
                        <h5><?php echo $this->lang->line('subscriber'); ?></h5><?php echo $subscribers_infos; ?>
                    </div>
                </div>
                <div class="clearfix">
                    <div class="float-middle">
                         <h5><?php echo $this->lang->line('last_link_visited'); ?></h5>
                        <?php if($visits_infos['last_link_visited']) { ?>

                        <a target="_blank" href="<?php echo $visits_infos['last_link_visited']->url; ?>"><?php echo $visits_infos['last_link_visited']->title; ?></a>

                        <?php } ?>
                        
                    </div>
                    <div class="float-middle">
                        
                    <!-- <h5>Nombre mails reçus</h5><p>?</p> -->
                    </div>
                </div>
                <div class="clearfix">
                    <div class="float-middle">
                        <h4><?php echo $this->lang->line('remembers'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_remember'); ?></h5> : <p><?php echo date('d/m/Y H:i:s',$rappels_infos['last_rappels']); ?></p>
                            <li>
                                <h5><?php echo $this->lang->line('number_remember'); ?></h5><p><?php echo $rappels_infos['number_rappels']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-middle">
                        <h4><?php echo $this->lang->line('favoris'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_favoris'); ?></h5>
                                <?php if($favoris_infos['last_favoris']) { ?>
                                <a target="_blank" href="<?php echo $favoris_infos['last_favoris']->url; ?>"><?php echo $favoris_infos['last_favoris']->title; ?></a>
                                <?php }  ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_favoris'); ?></h5><p><?php echo $favoris_infos['number_favoris']; ?></p>
                            </li>
                        </ul>
                    </div>
                </div>
                    
            </div>
            <div class="tab tab2">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="connexion_table">
                        <thead>
                            <tr>
                                <th><?php echo $this->lang->line('name'); ?></th>
                                <th><?php echo $this->lang->line('date'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
