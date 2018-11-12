
    <body class="l-landing">
        <div class="wrapper" id="top"> 
            <button id="btn-toggle-nav" class="btn"><i class="fa fa-plus"></i></button>
            <div class="content">            
                <header class="l-header">
                    <div class="max-width clearfix">
                        <h1><a class="btn logo-header">Immoffice</a></h1>
                        <nav class="l-nav-top">
                            <ul>
                                <li class="l-nav-top-link"><a href="<?php echo site_url('users/login'); ?>#top"><?php echo $this->lang->line('connection'); ?></a></li>
                                <li class="l-nav-top-link"><a href="<?php echo site_url('users/login'); ?>#contact"><span><?php echo $this->lang->line('contact'); ?></span></a></li>

                                <li class="dropdown-container">
                                    <a href="javascript:;"  class="btn-grey btn-dropdown" data-id="langue-big"><?php echo $this->lang->line('lang'); ?></a>
                                    <ul class="dropdown hidden" id="langue-big">
                                        <li><a href="<?php echo site_url('gdpr/index').'?lang_user=french'; ?>" ><?php echo $this->lang->line('french'); ?></a></li>
                                        <li><a href="<?php echo site_url('gdpr/index').'?lang_user=dutch'; ?>"><?php echo $this->lang->line('dutch'); ?></a></li>
                                    </ul>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </header>
                <section class="l-landing-welcome">
                    <div class="clearfix max-width apparition">
                        <div class="float-middle">
                            <h2 class="titre-green"><?php echo $this->lang->line('welkome_immoffice'); ?></h2>
                            <p class="subtitle"><?php echo $this->lang->line('gdpr_infos'); ?></p>
                        </div>
                        <div class="float-middle">
                            <form action="" method="POST">
                                <input type="text" id="gdpr-search" name="gdpr_search" class="form-control" placeholder="<?php echo $this->lang->line('keyword'); ?>" required="">
                                <input type="submit" class="btn" name="gdpr_send" value="<?php echo $this->lang->line('search'); ?>" />
                            </form>
                            <?php $this->load->view('common/messages') ?>
                            <?php $this->load->view('common/errors') ?>
                        </div>
                       
                    </div>
                     
                </section>
                <section class="l-landing-contact" id="contact">
                    <h2 class="titre-surligne"><?php echo $this->lang->line('contact_us'); ?></h2>
                    <div class="clearfix">
                        <p>IMMOffice, Inc.</p>
                        <p><?php echo $this->lang->line('ask_us_customized_offer'); ?></p> 
                    </div>
                    <a href="mailto:gabypirson@immoffice.be" class="btn inlineblock"><?php echo $this->lang->line('contact'); ?></a>
                    <footer>
                        <p class="copyright">© 2018 IMMOffice - <a href="<?php echo site_url('gdpr/index'); ?>" class="active"><span><?php echo $this->lang->line('GDPR'); ?></span></a></p>

                    </footer>
                </section>
            </div>
            <aside class="l-nav-aside hide-menu">      
                <ul class="l-nav-small">
                    <li><a href="#top" class="active"><?php echo $this->lang->line('connection'); ?></a></li>
                    <li><a href="#contact" ><span><?php echo $this->lang->line('contact'); ?></span></a></li>
                    <li class="dropdown-container">
                        <a href="javascript:;"  class="btn-grey btn-dropdown" data-id="langue"><?php echo $this->lang->line('lang'); ?></a>
                        <ul class="dropdown hidden" id="langue">
                            <li><a href="<?php echo site_url('users/login').'?lang_user=french'; ?>" ><?php echo $this->lang->line('french'); ?></a></li>
                            <li><a href="<?php echo site_url('users/login').'?lang_user=dutch'; ?>"><?php echo $this->lang->line('dutch'); ?></a></li>
                        </ul>
                    </li>
                </ul>
            </aside>

        </div>
    </body>
   