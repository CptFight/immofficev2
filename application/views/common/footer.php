    
<input type="hidden" name="user_id" id="user_id" value="<?php echo $user->id; ?>" />

     <footer class="footer-annonces">
                <p><span>Copyright</span> Immoffice © 2016-2017</p>
            </footer>
        </div>
        
        </div>
        <aside class="l-nav-aside hide-menu" >
            <ul class="l-nav-small">
                <li><a href=""><?php echo $this->lang->line('need_help'); ?>?</a></li>
                <!--<li><a href=""><?php echo $this->lang->line('notification'); ?> <span class="badge">1</span></a></li>-->
                <li><a href=""><?php echo $this->lang->line('logout'); ?></a></li>
                <li class="dropdown-container">
                    <a href="javascript:;" class="btn-grey btn-dropdown" data-id="langue"><?php echo $this->lang->line('lang'); ?></a>
                    <ul class="dropdown hidden" id="langue">
                        <li><a href=""><?php echo $this->lang->line('french'); ?></a></li>
                        <li><a href=""><?php echo $this->lang->line('dutch'); ?></a></li>
                    </ul>
                </li>
            </ul>
            <div class="m-map-marker"><i class="fa fa-map-marker"></i></div>
            <div class="dropdown-container dropdown-profile">
                <a href="javascript:;" class="btn-dropdown profile-btn" data-id="profile">
                    <span><?php echo $user->firstname; ?></span>
                    <?php echo $this->lang->line('my_account'); ?>
                </a>
                <ul class="dropdown hidden" id="profile">
                    <li><a href=""><?php echo $this->lang->line('edit_my_profil'); ?></a></li>
                    <li><a href=""><?php echo $this->lang->line('logout'); ?></a></li>
                </ul>
            </div>
            <ul class="l-nav-big">
                <li><a href="<?php echo site_url('annonces/index'); ?>" class='<?php if($pagename == "annonces") echo "active"; ?>'><i class="fa fa-search"></i><span><?php echo $this->lang->line('annonces'); ?></span></a></li>
                <li><a href="<?php echo site_url('subscribers/index'); ?>" class="<?php if($pagename == "alertmail") echo "active"; ?>"><i class="fa fa-reddit"></i> <span><?php echo $this->lang->line('alert_mail'); ?></span></a></li>
                <li><a href="<?php echo site_url('favoris/index'); ?>" class='<?php if($pagename == "favoris") echo "active"; ?>'><i class="fa fa-heart"></i> <span><?php echo $this->lang->line('favoris'); ?><strong class="alert-tag">8</strong></span></a></li>
                <li><a href="<?php echo site_url('rappels/index'); ?>" class='<?php if($pagename == "rappels") echo "active"; ?>'><i class="fa fa-phone"></i> <span ><?php echo $this->lang->line('my_remembers'); ?></span></a></li>
              <!--  <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>-->
                <li><a href="<?php echo site_url('news/index'); ?>" class="<?php if($pagename == "news") echo "active"; ?>"><i class="fa fa-calendar"></i> <span ><?php echo $this->lang->line('news'); ?></span></a></li>
                <li><a href="<?php echo site_url('suggestions/index'); ?>" class="<?php if($pagename == "suggestions") echo "active"; ?>"><i class="fa fa-at"></i> <span ><?php echo $this->lang->line('suggestions'); ?></span></a></li>
                <?php if($user->role == 'admin'){ ?>
                <li><a href="<?php echo site_url('users/news'); ?>"><i class="fa fa-user"></i> <span ><?php echo $this->lang->line('new_user'); ?></span></a></li>
                <?php } ?>
            </ul>
        </aside>
    </div>
</body>