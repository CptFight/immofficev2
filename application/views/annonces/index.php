<body class="l-annonces" id="annonces">
    <div class="wrapper">
        <div class="content" >      
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
                <ul>
                    <li>
                        <a href="">Accueil</a>
                        <a href="" class="active">Annonces</a>
                    </li>
                </ul>
            </div>
            <section class="l-annonces-search l-annonces-section">
                <div class="clearfix l-top-annonces-export">
                    <!--<div class="float-middle">
                        <p class="number-annonces"><span>0</span> annonces trouvées 1715</p>
                    </div>
                    <div class="float-middle">
                        <a href="" class="btn-inverse">Exporter</a>
                    </div>-->
                </div>
                <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
                <div class="l-annonces-form">
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <div class="reportrange-container">
                                <input type="text" name="daterange" id="reportrange" value="01/01/2015 - 01/31/2015" /> 
                                <input type="hidden" id="date-min" value="" />
                                <input type="hidden" id="date-max" value="" />
                            </div>
                        </div>
                        <div class="float-middle input-separation">
                            <select data-placeholder="<?php echo $this->lang->line('choose_province'); ?>" id="province" class="chosen-select form-control" multiple tabindex="4">
                                <option value="Anvers"><?php echo $this->lang->line('anvers'); ?></option>
                                <option value="Limbourg"><?php echo $this->lang->line('limbourg'); ?></option>
                                <option value="Bruxelles"><?php echo $this->lang->line('bruxelles'); ?></option>
                                <option value="Flandre orientale"><?php echo $this->lang->line('flandre_orientale'); ?></option>
                                <option value="Brabant flamand"><?php echo $this->lang->line('brabant_flamand'); ?></option>
                                <option value="Flandre occidentale"><?php echo $this->lang->line('flandre_occidentale'); ?></option>
                                <option value="Brabant wallon"><?php echo $this->lang->line('brabant_wallon'); ?></option>
                                <option value="Hainaut"><?php echo $this->lang->line('hainaut'); ?></option>
                                <option value="Liège"><?php echo $this->lang->line('liege'); ?></option>
                                <option value="Luxembourg"><?php echo $this->lang->line('luxembourg'); ?></option>
                                <option value="Namur"><?php echo $this->lang->line('namur'); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <div class="float-middle input-separation">
                                <div class="input-field number-euro">
                                    <input type="number" id="price-min" placeholder="Prix minimum"/>
                                </div>
                            </div>
                            <div class="float-middle input-separation">
                                <div class="input-field number-euro">
                                    <input type="number" id="price-max" placeholder="Prix maximum"/>
                                </div>
                            </div>
                        </div>
                        <div class="float-middle input-separation m-input-postalcode">
                            <input type="text" id="input-zipcode" placeholder="Code Postaux"/>
                            <a href="" class="btn-inverse"><i class="fa fa-map-marker"></i> Map</a>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="float-middle input-separation">
                            <input type="text" placeholder="Mots Clefs"/>
                        </div>
                        <div class="float-middle input-separation">
                            <div class="radio-inline-cont pull-left">
                                <fieldset >
                                    <input name="numbers" type="radio" value="FR/NL" id="FR/NL">
                                    <label for="FR/NL">FR/NL</label>
                                </fieldset><!--
                                 --><fieldset>
                                    <input name="numbers" type="radio" value="FR" id="FR">
                                    <label for="FR">FR</label>
                                </fieldset><!--
                                 --><fieldset >
                                    <input name="numbers" type="radio" value="NL" id="NL">
                                    <label for="NL">NL</label>
                                </fieldset>
                            </div>
                            <div class="radio-inline-cont pull-right">
                                <fieldset >
                                    <input name="vente" type="radio" value="Location" id="Location">
                                    <label for="Location">Location</label>
                                </fieldset><!--
                                 --><fieldset>
                                    <input name="vente" type="radio" value="Vente" id="Vente">
                                    <label for="Vente">Vente</label>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <a href="" class="btn">Rechercher</a>
                    <br/>
                </div>
                <div class="table-responsive">
                    <table class="footable table table-stripped toggle-arrow-tiny default breakpoint " data-page-size="50" id="sample_1">
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
                <!--<a href="" class="btn">Charger plus d'annonces</a>-->
            </section>
            <footer class="footer-annonces">
                <p><span>Copyright</span> Immoffice © 2016-2017</p>
            </footer>
        </div>
        
        </div>
        <aside class="l-nav-aside hide-menu" >
            <ul class="l-nav-small">
                <li><a href="">Besoin d'aide?</a></li>
                <li><a href="">Notifications <span class="badge">1</span></a></li>
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
                <li><a href=""><i class="fa fa-phone"></i> <span >Mes rappels</span></a></li>
                <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>
                <li><a href=""><i class="fa fa-calendar"></i> <span >News</span></a></li>
                <li><a href=""><i class="fa fa-at"></i> <span >Suggestions</span></a></li>
            </ul>
        </aside>
    </div>
</body>
