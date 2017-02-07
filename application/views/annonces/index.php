<body class="l-annonces">
    <div class="wrapper">
        <div class="content"  data-equalizer-max="menu">      
            <header class="l-header clearfix">
                <button id="btn-toggle-nav" class="btn"><i class="fa fa-navicon"></i></button>
                <h1 class="visuallyhidden">Immoffice</h1>
                <nav class="l-nav-top">
                    <ul>
                        <li class="welcome">Bienvenue sur Immoffice</li>
                        <li><a href="">Besoin d'aide?</a></li>
                        <li><a href="" class="notification-link"><i class="fa fa-bell"></i><span class="badge">1</span><span class="visuallyhidden">Notifications</span></a></li>
                        <li><a href=""><i class="fa fa-sign-out"></i> Se déconnecter</a></li>
                        <li class="dropdown-container">
                            <a href="javascript:;"  class="btn-grey btn-dropdown" data-id="langue-big">Français</a>
                            <ul class="dropdown hidden" id="langue-big">
                                <li><a href="">Français</a></li>
                                <li><a href="">Néerlandais</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="title-container">
                <h2>Annonces</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="">Accueil</a>
                        <a href="" class="active">Annonces</a>
                    </li>
                </ul>
            </div>
            <section class="l-annonces-search l-annonces-section">
                <div class="clearfix l-top-annonces-export">
                    <div class="float-middle">
                        <p class="number-annonces"><span>0</span> annonces trouvées 1715</p>
                    </div>
                    <div class="float-middle">
                        <a href="" class="btn-inverse">Exporter</a>
                    </div>
                </div>
                <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
                <div class="l-annonces-form">
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <div class="dropdown-container">
                                <a href="javascript:;" class="btn-dropdown" data-id="dates"><i class="fa fa-calendar"></i> January 29, 2017 - January 30, 2017</a>
                                <div class="dropdown hidden dropdown-dates" id="dates">
                                    <ul>
                                        <li><a href="">Aujourd'hui</a></li>
                                        <li><a href="">Depuis 2 jours</a></li>
                                        <li><a href="">Depuis 1 semaine</a></li>
                                        <li><a href="">Depuis 1 mois</a></li>
                                        <li><a href="">Depuis début du mois</a></li>
                                        <li><a href="">Détaillé</a></li>
                                    </ul>
                                    <div class="range_inputs">
                                        <div class="datepicker-cont daterangepicker_start_input">
                                            <label for="daterangepicker_start">Depuis</label><input class="input-mini" type="text" name="daterangepicker_start" value="">
                                        </div>
                                        <div class="datepicker-cont daterangepicker_end_input">
                                            <label for="daterangepicker_end">jusqu'à</label>
                                            <input class="input-mini" type="text" name="daterangepicker_end" value="">
                                        </div>
                                    </div>
                                    <button class="btn">Envoyer</button>
                                    <button class="btn-inverse">Annuler</button>
                                </div>
                                <!-- TODO ME : AJOUTER COOL DATEPICKER -->
                            </div>
                        </div>
                        <div class="float-middle input-separation">
                            <input type="text" placeholder="Choissez une province"/>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <div class="float-middle input-separation">
                                <div class="input-field number-euro">
                                    <input type="number" placeholder="Prix minimum"/>
                                </div>
                            </div>
                            <div class="float-middle input-separation">
                                <div class="input-field number-euro">
                                    <input type="number" placeholder="Prix maximum"/>
                                </div>
                            </div>
                        </div>
                        <div class="float-middle input-separation m-input-postalcode">
                            <input type="text" placeholder="Code Postaux"/>
                            <a href="" class="btn-inverse"><i class="fa fa-map-marker"></i> Map</a>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <input type="text" placeholder="Mots Clefs"/>
                        </div>
                        <div class="float-middle input-separation">
                            <div class="float-middle ">
                                <label class="radio-inline"> 
                                    <input type="radio" value="all" name="lang">FR/NL
                                </label> 
                                <label class="radio-inline">
                                    <input type="radio" value="fr" name="lang" checked="checked">FR
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" value="nl" name="lang">NL
                                </label>
                            </div>
                            <div class="float-middle">
                                <label class="radio-inline pull-right">
                                    <input type="radio" value="location" name="sell_location">Location
                                </label>
                                  <label class="radio-inline pull-right">
                                    <input type="radio" value="sell" checked="checked" name="sell_location">Vente
                                </label>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn">Rechercher</a>
                    <p>Si vous changez votre zone d'action habituelle ( provinces, codes postaux ), rafraichissez la page après avoir cliqué sur le bouton 'rechercher'. De cette manière vous importerez plus d'annonces.</p>
                </div>
                <table  class="table table-striped table-bordered table-hover dt-responsive" id="sample_1">
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
                <a href="">Charger plus d'annonces</a>
            </section>
            <footer class="footer-annonces">
                <p><span>Copyright</span> Immoffice © 2016-2017</p>
            </footer>
        </div>
        
        </div>
        <aside class="l-nav-aside hide" data-equalizer-max="menu">
            <ul class="l-nav-small">
                <li><a href="">Besoin d'aide?</a></li>
                <li><a href="">Notifications<span></span></a></li>
                <li><a href="">Se déconnecter</a></li>
                <li class="dropdown-container">
                    <a href="javascript:;" class="btn-grey btn-dropdown" data-id="langue">Français</a>
                    <ul class="dropdown hidden" id="langue">
                        <li><a href="">Français</a></li>
                        <li><a href="">Néerlandais</a></li>
                    </ul>
                </li>
            </ul>
            <div class="m-map-marker"><i class="fa fa-map-marker"></i></div>
            <div class="dropdown-container dropdown-profile">
                <a href="javascript:;" class="btn-dropdown profile-btn" data-id="profile">
                    <span>Marie</span>
                    Mon compte
                </a>
                <ul class="dropdown hidden" id="profile">
                    <li><a href="">Editer mon profil</a></li>
                    <li><a href="">Se déconnecter</a></li>
                </ul>
            </div>
            <ul class="l-nav-big">
                <li><a href="" class='active'><i class="fa fa-search"></i><span>Annonces</span></a></li>
                <li><a href=""><i class="fa fa-reddit"></i> <span>Alerte mail</span></a></li>
                <li><a href=""><i class="fa fa-heart"></i> <span>Favoris</span></a></li>
                <li><a href=""><i class="fa fa-heart"></i> <span >Favoris 2.0</span></a></li>
                <li><a href=""><i class="fa fa-phone"></i> <span >Mes rappels</span></a></li>
                <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>
                <li><a href=""><i class="fa fa-calendar"></i> <span >News</span></a></li>
                <li><a href=""><i class="fa fa-at"></i> <span >Suggestions</span></a></li>
            </ul>
        </aside>
    </div>
</body>
