<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="l-annonces-form l-form">
        <ul class="tabs">
            <li><div id="tab1" class='active'>Dashboard</div></li>
            <li><div id="tab2">Historique de connexions</div></li>
        </ul>
        <div class="block">
            <div class='active tab tab1'>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="admin_table">
                        <thead>
                            <tr>
                                <th>Utilisateur</th>
                                <th>Dernière connexion</th>

                                <th class="desktop">Dernier Favoris</th>
                                <th class="none">Nombre de favoris</th>

                                <th class="desktop">Dernier Rappel</th>
                                <th class="none">Date dernier Rappel</th>
                                <th class="none">Nombre rappels</th>

                                <th>Abonné</th>
                                <th class="none">Nombre mails reçus</th>

                                <th class="none">Liens visités</th>
                                <th class="none">Historique de connexion</th>
                                <th class="desktop">See only him</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nom de l'utilisateur</td>
                                <td>22/12/12</td>

                                <td>Site 1</td>
                                <td>10</td>

                                <td>Rappel</td>
                                <td>22/12/12</td>
                                <td>10</td>

                                <td><i class="fa fa-check green"></i><i class="fa fa-remove red"></i></td>
                                <td>10</td>

                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>Nom du site</td>
                                                <td>url</td>
                                            </tr>
                                            <tr>
                                                <td>Nom du site</td>
                                                <td>url</td>
                                            </tr>
                                            <tr>
                                                <td>Nom du site</td>
                                                <td>url</td>
                                            </tr>
                                            <tr>
                                                <td>Nom du site</td>
                                                <td>url</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                                <td>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td>22/12/12</td>
                                            </tr>
                                            <tr>
                                                <td>22/12/12</td>
                                            </tr>
                                            <tr>
                                                <td>22/12/12</td>
                                            </tr>
                                            <tr>
                                                <td>22/12/12</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>

                                <td>
                                    <ul class="list-tables-buttons" data-annonce_id="24">
                                        <li class="table-btn-rappel"><a href="<?php echo site_url('adminuser/index'); ?>" class="add_rappel"><i class="fa fa-binoculars"></i><span>See More</span></a></li>
                                    </ul>
                                </td>
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
                        <tbody>
                            <tr>
                                <td>Personne connecté</td>
                                <td>Date</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
