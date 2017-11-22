
<section class="l-annonces-search l-annonces-section apparitionright l-templatechoice">

    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS -->
   
    <div class="">
        <div class="clearfix">
        	
        	<div id="Glide" class="glide">

			    <div class="glide__arrows">
			        <button class="glide__arrow prev" data-glide-dir="<">prev</button>
			        <button class="glide__arrow next" data-glide-dir=">">next</button>
			    </div>

			    <div class="glide__wrapper">
			        <ul class="glide__track">
			            <?php
				            foreach($campaigns as $key => $campaign){
				            	echo '<li class="glide__slide"><div class="iframe-container">';
				                echo '<iframe scrolling="no" src="'.$campaign['url'].'" class="btn-iframe"></iframe>';
				                echo '<a href="#" data-featherlight="#mylightbox'.$key.'" class="btn-lightbox"><i class="fa fa-search"></i></a></div><a href="'.site_url('campaigns/infos').'" class="btn btn-choice">Choose this template</a></li>';
				            }
				        ?>
			        </ul>
			    </div>

			    <div class="glide__bullets"></div>

			</div>

	       	
        	<?php
	            foreach($campaigns as $key => $campaign){
	            	echo '<div id="mylightbox'.$key.'"  class="lightbox">';
	                echo '<iframe src="'.$campaign['url'].'"></iframe>';
	                echo '</div>';
	            }
	        ?>
        </div>
    </div>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>

           

