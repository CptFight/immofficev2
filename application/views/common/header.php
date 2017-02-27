
<body class="l-annonces" id="annonces">
    <div class="wrapper">
        <div class="content" >      
            <header class="l-header clearfix">
                <button id="btn-toggle-nav" class="btn"><i class="fa fa-navicon"></i></button>
                <h1 class="visuallyhidden">Immoffice</h1>
                <nav class="l-nav-top">
                    <ul>
                        <li class="welcome"><?php echo $this->lang->line('welkome_immoffice'); ?></li>
                        <li><a href=""><?php echo $this->lang->line('need_help'); ?>?</a></li>
                        <!--<li><a href="" class="notification-link"><i class="fa fa-bell"></i><span class="badge">1</span><span class="visuallyhidden"><?php echo $this->lang->line('notifications'); ?></span></a></li>-->
                        <li><a href="<?php echo base_url(); ?>"><i class="fa fa-sign-out"></i> <?php echo $this->lang->line('logout'); ?></a></li>
                        <li class="dropdown-container">
                            <a href="javascript:;"  class="btn-grey btn-dropdown" data-id="langue-big"><?php echo $this->lang->line('lang'); ?></a>
                            <ul class="dropdown hidden" id="langue-big">
                                <li><a href="<?php echo site_url('annonces/index').'?lang_user=french'; ?>" ><?php echo $this->lang->line('french'); ?></a></li>
                                <li><a href="<?php echo site_url('annonces/index').'?lang_user=dutch'; ?>"><?php echo $this->lang->line('dutch'); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>