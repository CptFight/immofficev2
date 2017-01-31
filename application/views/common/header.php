<div class="page-header">
    <div class="page-header-top">
        <div class="container-fluid">
            <div class="page-logo">
                <a href="">
                    <img style="margin:0" height="75" src="<?php echo base_url(); ?>/assets/layouts/layout/img/logo.png" alt="logo" class="logo-default">
                </a>
            </div>
			<?php $this->load->view('common/top') ?>
        </div>
    </div>
    <div class="page-header-menu">
        <div class="container-fluid">
            <form class="search-form" action="page_general_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form>
            <?php $this->load->view('common/nav') ?>
        </div>
    </div>
</div>