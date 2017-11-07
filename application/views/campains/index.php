
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="clearfix l-top-annonces-export">
       

        <?php
            foreach($campaigns as $key => $campain){
                 echo $campain['content']['html'];
            }
           

        ?>
    </div>
  
</section>
           
