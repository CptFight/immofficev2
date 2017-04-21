<section class="l-annonces-search l-annonces-section apparitionright l-dashboard">
    <div class="l-annonces-form l-form">
        <h3><?php echo $user->name." ".$user->firstname; ?></h3>
        
       
        <ul class="tabs">
            <li><div id="tab1" data-select="tab1" class='active'><?php echo $this->lang->line('since_1_week'); ?></div></li>
            <li><div id="tab3" data-select="tab3"><?php echo $this->lang->line('since_1_month'); ?></div></li>
            <li><div id="tab4" data-select="tab4"><?php echo $this->lang->line('since_all_time'); ?></div></li>
            <li><div id="tab2" data-select="tab2"><?php echo $this->lang->line('connection_historic'); ?></div></li>
        </ul>
        <fieldset class="inputstyle select tabsselectcont">
            <select id="tabsselect" >
                <option value="tab1" selected><?php echo $this->lang->line('since_1_week'); ?></option>
                <option value="tab3"><?php echo $this->lang->line('since_1_month'); ?></option>
                <option value="tab4"><?php echo $this->lang->line('since_all_time'); ?></option>
                <option value="tab2"><?php echo $this->lang->line('connection_historic'); ?></option>
            </select>
         </fieldset>

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
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('remembers'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_remember'); ?></h5> : <p><?php echo date('d/m/Y H:i:s',$rappels_infos['since_1_week']['last_rappels']); ?></p>
                            <li>
                                <h5><?php echo $this->lang->line('number_remember'); ?></h5><p><?php echo $rappels_infos['since_1_week']['number_rappels']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('favoris'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_favoris'); ?></h5>
                                <?php if($favoris_infos['since_1_week']['last_favoris']) { ?>
                                <a target="_blank" href="<?php echo $favoris_infos['since_1_week']['last_favoris']->url; ?>"><?php echo $favoris_infos['last_favoris']->title; ?></a>
                                <?php }  ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_favoris'); ?></h5><p><?php echo $favoris_infos['since_1_week']['number_favoris']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4>Liens</h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_link_visited'); ?></h5>
                                <?php if($visits_infos['since_1_week']['last_link_visited']) { ?>
                                <a target="_blank" href="<?php echo $visits_infos['since_1_week']['last_link_visited']->url; ?>"><?php echo $visits_infos['since_1_week']['last_link_visited']->title; ?></a>

                                <?php } ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_link_visited'); ?></h5><p><?php echo $visits_infos['since_1_week']['numbers_visits']; ?></p>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="width98">
                    <h4><?php echo $this->lang->line('number_export'); ?></h4>
                    <div class="clearfix">
                        <div class="float-tiers">
                            <ul>
                                <li>
                                     <h5><?php echo $this->lang->line('number_export'); ?></h5><p><?php echo $export_infos['since_1_week']['number_exports']['all']; ?></p>
                                </li>
                                <li>
                                  
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_mail'); ?></h5>
                                     <p><?php echo $export_infos['since_1_week']['number_exports']['mail']; ?></p>

                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_csv'); ?></h5><p><?php echo $export_infos['since_1_week']['number_exports']['csv']; ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_print'); ?></h5>
                                    <p><?php echo $export_infos['since_1_week']['number_exports']['print']; ?></p>
                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_pdf'); ?></h5><p><?php echo $export_infos['since_1_week']['number_exports']['pdf']; ?></p>
                                </li>
                            </ul>
                        </div>
                        
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


            <div class="tab tab3">
                <div class="clearfix">
                    <div class="float-middle">
                        <h5><?php echo $this->lang->line('last_connection'); ?></h5><p><?php echo date('d/m/Y h:i:s',$user->last_connection); ?></p>
                    </div>
                    <div class="float-middle">
                       
                        <h5><?php echo $this->lang->line('subscriber'); ?></h5><?php echo $subscribers_infos; ?>
                    </div>
                </div>
               
                <div class="clearfix">
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('remembers'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_remember'); ?></h5> : <p><?php echo date('d/m/Y H:i:s',$rappels_infos['since_1_month']['last_rappels']); ?></p>
                            <li>
                                <h5><?php echo $this->lang->line('number_remember'); ?></h5><p><?php echo $rappels_infos['since_1_month']['number_rappels']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('favoris'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_favoris'); ?></h5>
                                <?php if($favoris_infos['since_1_month']['last_favoris']) { ?>
                                <a target="_blank" href="<?php echo $favoris_infos['since_1_month']['last_favoris']->url; ?>"><?php echo $favoris_infos['since_1_month']['last_favoris']->title; ?></a>
                                <?php }  ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_favoris'); ?></h5><p><?php echo $favoris_infos['since_1_month']['number_favoris']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4>Liens</h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_link_visited'); ?></h5>
                                <?php if($visits_infos['since_1_month']['last_link_visited']) { ?>
                                <a target="_blank" href="<?php echo $visits_infos['since_1_month']['last_link_visited']->url; ?>"><?php echo $visits_infos['since_1_month']['last_link_visited']->title; ?></a>

                                <?php } ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_link_visited'); ?></h5><p><?php echo $visits_infos['since_1_month']['numbers_visits']; ?></p>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="width98">
                    <h4><?php echo $this->lang->line('number_export'); ?></h4>
                    <div class="clearfix">
                        <div class="float-tiers">
                            <ul>
                                <li>
                                     <h5><?php echo $this->lang->line('number_export'); ?></h5><p><?php echo $export_infos['since_1_month']['number_exports']['all']; ?></p>
                                </li>
                                <li>
                                  
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_mail'); ?></h5>
                                     <p><?php echo $export_infos['since_1_month']['number_exports']['mail']; ?></p>

                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_csv'); ?></h5><p><?php echo $export_infos['since_1_month']['number_exports']['csv']; ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_print'); ?></h5>
                                    <p><?php echo $export_infos['since_1_month']['number_exports']['print']; ?></p>
                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_pdf'); ?></h5><p><?php echo $export_infos['since_1_month']['number_exports']['pdf']; ?></p>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div> 
            </div>
            <div class="tab tab4">
                <div class="clearfix">
                    <div class="float-middle">
                        <h5><?php echo $this->lang->line('last_connection'); ?></h5><p><?php echo date('d/m/Y h:i:s',$user->last_connection); ?></p>
                    </div>
                    <div class="float-middle">
                       
                        <h5><?php echo $this->lang->line('subscriber'); ?></h5><?php echo $subscribers_infos; ?>
                    </div>
                </div>
               
                <div class="clearfix">
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('remembers'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_remember'); ?></h5> : <p><?php echo date('d/m/Y H:i:s',$rappels_infos['since_always']['last_rappels']); ?></p>
                            <li>
                                <h5><?php echo $this->lang->line('number_remember'); ?></h5><p><?php echo $rappels_infos['since_always']['number_rappels']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4><?php echo $this->lang->line('favoris'); ?></h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_favoris'); ?></h5>
                                <?php if($favoris_infos['since_always']['last_favoris']) { ?>
                                <a target="_blank" href="<?php echo $favoris_infos['since_always']['last_favoris']->url; ?>"><?php echo $favoris_infos['since_always']['last_favoris']->title; ?></a>
                                <?php }  ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_favoris'); ?></h5><p><?php echo $favoris_infos['since_always']['number_favoris']; ?></p>
                            </li>
                        </ul>
                    </div>
                    <div class="float-tiers">
                        <h4>Liens</h4>
                        <ul>
                            <li>
                                <h5><?php echo $this->lang->line('last_link_visited'); ?></h5>
                                <?php if($visits_infos['since_always']['last_link_visited']) { ?>
                                <a target="_blank" href="<?php echo $visits_infos['since_always']['last_link_visited']->url; ?>"><?php echo $visits_infos['since_always']['last_link_visited']->title; ?></a>

                                <?php } ?>
                            </li>
                            <li>
                                <h5><?php echo $this->lang->line('number_link_visited'); ?></h5><p><?php echo $visits_infos['since_always']['numbers_visits']; ?></p>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="width98">
                    <h4><?php echo $this->lang->line('export'); ?></h4>
                    <div class="clearfix">
                        <div class="float-tiers">
                            <ul>
                                <li>
                                     <h5><?php echo $this->lang->line('number_export'); ?></h5><p><?php echo $export_infos['since_always']['number_exports']['all']; ?></p>
                                </li>
                                <li>
                                  
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_mail'); ?></h5>
                                     <p><?php echo $export_infos['since_always']['number_exports']['mail']; ?></p>

                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_csv'); ?></h5><p><?php echo $export_infos['since_always']['number_exports']['csv']; ?></p>
                                </li>
                            </ul>
                        </div>
                        <div class="float-tiers">
                            <ul>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_print'); ?></h5>
                                    <p><?php echo $export_infos['since_always']['number_exports']['print']; ?></p>
                                </li>
                                <li>
                                    <h5><?php echo $this->lang->line('number_export_pdf'); ?></h5><p><?php echo $export_infos['since_always']['number_exports']['pdf']; ?></p>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
