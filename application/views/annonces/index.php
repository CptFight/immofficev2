 <div class="page-content " >
    <div class="container-fluid">
        <!-- BEGIN PAGE BREADCRUMBS -->
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a href="/">Home</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Annpnces</span>
            </li>
        </ul>
        <!-- END PAGE BREADCRUMBS -->
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-settings font-dark"></i>
                                <span class="caption-subject bold uppercase">Last update : <?php echo $last_update; ?></span>
                            </div>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">


                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                <thead>
                                    <tr>
                                        <th >Titre</th>
                                        <th >Code postal</th>
                                        <th >Prix</th>
                                        <th >Site web</th>
                                        <th >Date</th>
                                        <th >Visité</th>
                                        <th >Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php foreach($annonces as $key => $annonce){ ?>
                                    <tr>
                                        <td><?php echo $annonce->title; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
        <!-- END PAGE CONTENT INNER -->
    </div>
</div>

  
     