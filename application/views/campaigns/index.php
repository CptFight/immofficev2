
<section class="l-annonces-search l-annonces-section apparitionright">

    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
   
    <div class="">
        <div class="clearfix">
        	
        	<?php
	            foreach($campaigns as $key => $campaign){
	            	echo '<a href="#" data-featherlight="#mylightbox'.$key.'" class="btn-lightbox">';
	                echo $campaign['content']['html'];
	                echo '</a>';
	            }
	        ?>


        	<?php
	            foreach($campaigns as $key => $campaign){
	            	echo '<div id="mylightbox'.$key.'"  class="lightbox">';
	                echo $campaign['content']['html'];
	                echo '</div>';
	            }
	        ?>
        </div>
    </div>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
           

