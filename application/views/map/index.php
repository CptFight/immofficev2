
<div class="title-container">
    <h2><?php echo $this->lang->line('map'); ?></h2>
    <ul>
        <li>
            <a href=""><?php echo $this->lang->line('french'); ?></a>
            <a href="" class="active"><?php echo $this->lang->line('map'); ?></a>
        </li>
    </ul>
</div>
<section class="apparitionright l-map-section">
    <h2>Remplissez les champs</h2>
    <div class="l-map-section-container">
        <div class="clearfix map-btns-container">
            <fieldset class="inputstyle postalcode">
                <label for="codepostal">Code postal</label>
                <input type="text" name="codepostal" value='4000'>
            </fieldset>
            <div class="zonedaction">
                <p>Zone d'action</p>
                <a href="" class="btn-zonedaction">Diminuer</a><a href="" class="btn-zonedaction">Augmenter</a>
            </div>
            <a href="javascript:;" class="btn btn-map-rechercher">Rechercher</a>
        </div>
        <div class='clearfix map-database'>
            <div >
                <div id="map" style="height:400px"></div>
                <script>
                  function initMap() {
                    var uluru = {lat: -25.363, lng: 131.044};
                    var map = new google.maps.Map(document.getElementById('map'), {
                      zoom: 4,
                      center: uluru
                    });
                    var marker = new google.maps.Marker({
                      position: uluru,
                      map: map
                    });
                  }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzw2qXTk0QCm_u5ejz2iduBH_d4Cv-4Y0&callback=initMap">
                </script>
            </div>
            <div class=" clearfix">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="map_table">
                        <thead>
                            <tr>
                                <th>Ville</th>
                                <th>Code postal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Ville</td>
                                <td>4000</td>
                                <td><a href="" class="btn-delete"><i class="fa fa-remove"></i><span>Delete</span></a></t>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td>4000</td>
                                <td><a href="" class="btn-delete"><i class="fa fa-remove"></i><span>Delete</span></a></t>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td>4000</td>
                                <td><a href="" class="btn-delete"><i class="fa fa-remove"></i><span>Delete</span></a></t>
                            </tr>
                            <tr>
                                <td>Ville</td>
                                <td>4000</td>
                                <td><a href="" class="btn-delete"><i class="fa fa-remove"></i><span>Delete</span></a></t>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="javascript:;" class="btn btn-codepostaux">Charger ces codes postaux <i class="fa fa-check"></i></a>
            </div>
        </div>
    </div>
</section>
           
