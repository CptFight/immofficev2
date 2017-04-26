<section class="l-annonces-search l-annonces-section apparitionright l-dashboard">
    <div class="l-annonces-form l-form">
        
        <div class="clearfix">
            <div class="float-tiers">
                <h4><?php echo $this->lang->line('agences'); ?></h4>
                <ul>
                    <li>
                        <h5>Nombre agences</h5><p><?php echo $number_agence; ?> </p>
                    <li>
                        <h5>Nombre agences clientes</h5> <p><?php echo $number_agence_who_payed; ?></p>
                    </li>
                </ul>
            </div>
            <div class="float-tiers">
                <h4><?php echo $this->lang->line('users'); ?></h4>
                <ul>
                    <li>
                        <h5>Nombre utilisateurs</h5><p> <?php echo $number_users; ?> </p>
                    </li>
                </ul>
            </div>
            <div class="float-tiers">
                <h4><?php echo $this->lang->line('total'); ?></h4>
                <ul>
                    <li>
                        <h5>PRIX HTVA / MOIS</h5><p><?php echo $total_price_htva; ?> € </p>
                    </li>
                    <li>
                        <h5>PRIX TVAC / MOIS</h5><p><?php echo $total_price_tvac; ?> €</p>
                    </li>
                </ul>
            </div>

        </div>
       
    </div>

</section>


           