
<section class="l-annonces-search l-annonces-section apparitionright">

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
			            <li class="glide__slide">gege</li>
			            <li class="glide__slide">gege</li>
			            <li class="glide__slide">gege</li>
			        </ul>
			    </div>

			    <div class="glide__bullets"></div>

			</div>

	        <?php
	            foreach($campaigns as $key => $campaign){
	            	echo '<a href="#" data-featherlight="#mylightbox'.$key.'" class="btn-lightbox">';
	                echo '<iframe src="'.$campaign['url'].'" class="btn-iframe"></iframe>';
	                echo '</a>';
	            }
	        ?>
	      
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

           

