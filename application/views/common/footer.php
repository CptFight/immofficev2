
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
                <li><a href="" class='<?php if($pagename == "annonces") echo 'active'; ?> '><i class="fa fa-search"></i><span>Annonces</span></a></li>
                <li><a href="" ><i class="fa fa-reddit"></i> <span>Alerte mail</span></a></li>
                <li><a href="" class='<?php if($pagename == "favoris") echo 'active'; ?> '><i class="fa fa-heart"></i> <span>Favoris</span></a></li>
                <li><a href="" class='<?php if($pagename == "rappels") echo 'active'; ?> '><i class="fa fa-phone"></i> <span >Mes rappels</span></a></li>
                <li><a href=""><i class="fa fa-user"></i> <span >Mes comptes</span></a></li>
                <li><a href=""><i class="fa fa-calendar"></i> <span >News</span></a></li>
                <li><a href=""><i class="fa fa-at"></i> <span >Suggestions</span></a></li>
            </ul>
        </aside>
    </div>
</body>