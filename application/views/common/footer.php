    
<input type="hidden" name="user_id" id="user_id" value="<?php echo $current_user->id; ?>" />

     <footer class="footer-annonces">
                <p><span>Copyright</span> Immoffice © 2016-2017</p>
            </footer>
        </div>
        
        </div>
        <aside class="l-nav-aside hide-menu" >
            <div class="m-map-marker"><i class="fa fa-map-marker"></i></div>
            <div class="dropdown-container dropdown-profile">
                <a href="javascript:;" class="btn-dropdown profile-btn" data-id="profile">
                    <span><?php echo $current_user->firstname; ?></span>
                    <?php echo $this->lang->line('my_account'); ?>
                </a>
                <ul class="dropdown hidden" id="profile">
                    <li><a href="<?php echo site_url('users/edit_profile'); ?>"><?php echo $this->lang->line('edit_my_profil'); ?></a></li>
                    <li><a href="<?php echo site_url('users/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
                </ul>
            </div>
            <ul class="l-nav-big">
                <?php if($current_user->role_id != 1){ ?>
                <li><a href="<?php echo site_url('annonces/index'); ?>" class='<?php if($pagename == "annonces") echo "active"; ?>'><i class="fa fa-search"></i><span><?php echo $this->lang->line('annonces'); ?></span></a></li>
                <?php } ?>
                <li><a href="<?php echo site_url('subscribers/index'); ?>" class="<?php if($pagename == "subscribers") echo "active"; ?>"><i class="fa fa-envelope"></i> <span><?php echo $this->lang->line('subscribers'); ?></span></a></li>
                <?php if($current_user->role_id != 1){ ?>
                <li><a href="<?php echo site_url('favoris/index'); ?>" class='<?php if($pagename == "favoris") echo "active"; ?>'><i class="fa fa-home"></i> <span><?php echo $this->lang->line('favoris'); ?>
                <?php if(isset($current_user->count_favoris)) { ?><strong class="alert-tag favoris"><?php echo $current_user->count_favoris; ?></strong><?php } ?></span></a></li>
                <li><a href="<?php echo site_url('rappels/calendar'); ?>" class='<?php if($pagename == "rappels") echo "active"; ?>'><i class="fa fa-phone"></i> <?php if(isset($current_user->count_rappels)) { ?><strong class="alert-tag rappels"><?php echo $current_user->count_rappels; ?></strong><?php } ?><span ><?php echo $this->lang->line('my_remembers'); ?></span></a></li>
                <?php } ?>
              <!--  <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>-->
                

                <?php if($current_user->role_id == 4){ ?>
                <li><a href="<?php echo site_url('users/index'); ?>" class="<?php if($pagename == "users") echo "active"; ?>"><i class="fa fa-user"></i> <span ><?php echo $this->lang->line('users'); ?></span></a></li>
                 <li><a href="<?php echo site_url('agences/index'); ?>" class="<?php if($pagename == "agences") echo "active"; ?>"><i class="fa fa-building-o"></i> <span ><?php echo $this->lang->line('agences'); ?></span></a></li>
                  <li><a href="<?php echo site_url('dashboard/index'); ?>" class="<?php if($pagename == "dashboard") echo "active"; ?>"><i class="fa fa-dashboard"></i> <span ><?php echo $this->lang->line('dashboard'); ?></span></a></li>
                <?php } ?>

                <li><a href="<?php echo site_url('agences/edit_param'); ?>" class="<?php if($pagename == "agences") echo "active"; ?>"><i class="fa fa-binoculars"></i> <span ><?php echo $this->lang->line('agency'); ?></span></a></li>

                <li><a href="<?php echo site_url('owner/index'); ?>" class="<?php if($pagename == "owner") echo "active"; ?>"><i class="fa fa-users"></i> <span ><?php echo $this->lang->line('owners'); ?></span></a></li>
                <?php if($current_user->role_id == 3 || $current_user->role_id == 4){ ?>
                <li><a href="<?php echo site_url('supervision/index'); ?>" class="<?php if($pagename == "supervision") echo "active"; ?>"><i class="fa fa-cog"></i> <span ><?php echo $this->lang->line('supervision'); ?></span></a></li>
                <?php } ?>

                
                <li><a href="<?php echo site_url('news/index'); ?>" class="<?php if($pagename == "news") echo "active"; ?>"><i class="fa fa-calendar"></i> <span ><?php echo $this->lang->line('news'); ?></span></a></li>
                <li><a href="<?php echo site_url('suggestions/index'); ?>" class="<?php if($pagename == "suggestions") echo "active"; ?>"><i class="fa fa-at"></i> <span ><?php echo $this->lang->line('suggestions'); ?></span></a></li>
            </ul>
            <ul class="l-nav-small">
                <!--<li><a href=""><?php echo $this->lang->line('need_help'); ?>?</a></li> -->
                <!--<li><a href=""><?php echo $this->lang->line('notification'); ?> <span class="badge">1</span></a></li>-->
                <li><a href="<?php echo site_url('users/logout'); ?>"><?php echo $this->lang->line('logout'); ?></a></li>
                <li class="dropdown-container">
                    <a href="javascript:;" class="btn-grey btn-dropdown" data-id="langue"><?php echo $this->lang->line('lang'); ?></a>
                    <ul class="dropdown hidden" id="langue">
                        <li><a href=""><?php echo $this->lang->line('french'); ?></a></li>
                        <li><a href=""><?php echo $this->lang->line('dutch'); ?></a></li>
                    </ul>
                </li>
            </ul>
        </aside>
    </div>
</body>