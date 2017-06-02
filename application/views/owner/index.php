
<section class="l-annonces-search l-annonces-section apparitionright">
    <div class="btns-calendar">
    </div>

    <!-- TODO ME : AJOUTER VERIFICATION FORM + LABELS 
    <form action="" method="POST">-->
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" data-page-size="50" id="owner_table">
            <thead>
                <tr>
                    <th ><?php echo $this->lang->line('name'); ?></th>
                    <th ><?php echo $this->lang->line('email'); ?></th>
                    <th ><?php echo $this->lang->line('tel'); ?></th>
                    <th><?php echo $this->lang->line('status'); ?></th>
                    <th class='none'><?php echo $this->lang->line('note'); ?></th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($owners as $key => $owner){ ?>
                <tr>
                    <td>
                        <?php echo $owner->name; ?>
                    </td>
                    <td>
                        <?php echo $owner->email; ?>
                    </td>
                    <td>
                       <?php echo $owner->tel; ?>
                    </td>
                    <td>
                        <div style="color:<?php echo $owner->status_color; ?>"><i class="fa fa-flag"></i> <?php echo $owner->status_name; ?></div>
                    </td>
                    <td>
                        <?php echo $owner->note; ?>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <!--<a href="" class="btn">Charger plus d'annonces</a>-->
</section>
           
