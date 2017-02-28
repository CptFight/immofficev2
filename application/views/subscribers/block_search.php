
<section class="apparitionright l-alertmail-section">
    <form action="" method="POST">
        <div class="l-annonces-form">
            <div class="clearfix">
                <div class="float-middle input-separation">
                    <select name="province[]" data-placeholder="<?php echo $this->lang->line('choose_province'); ?>" id="province" class="chosen-select form-control" multiple tabindex="4">
                        <option <?php if(in_array('Anvers',$province)) echo 'selected'; ?> value="Anvers"><?php echo $this->lang->line('anvers'); ?></option>
                        <option <?php if(in_array('Limbourg',$province)) echo 'selected'; ?> value="Limbourg"><?php echo $this->lang->line('limbourg'); ?></option>
                        <option <?php if(in_array('Bruxelles',$province)) echo 'selected'; ?> value="Bruxelles"><?php echo $this->lang->line('bruxelles'); ?></option>
                        <option <?php if(in_array('Flandre orientale',$province)) echo 'selected'; ?> value="Flandre orientale"><?php echo $this->lang->line('flandre_orientale'); ?></option>
                        <option <?php if(in_array('Brabant flamand',$province)) echo 'selected'; ?> value="Brabant flamand"><?php echo $this->lang->line('brabant_flamand'); ?></option>
                        <option <?php if(in_array('Flandre occidentale',$province)) echo 'selected'; ?> value="Flandre occidentale"><?php echo $this->lang->line('flandre_occidentale'); ?></option>
                        <option <?php if(in_array('Brabant wallon',$province)) echo 'selected'; ?> value="Brabant wallon"><?php echo $this->lang->line('brabant_wallon'); ?></option>
                        <option <?php if(in_array('Hainaut',$province)) echo 'selected'; ?> value="Hainaut"><?php echo $this->lang->line('hainaut'); ?></option>
                        <option <?php if(in_array('Liège',$province)) echo 'selected'; ?> value="Liège"><?php echo $this->lang->line('liege'); ?></option>
                        <option <?php if(in_array('Luxembourg',$province)) echo 'selected'; ?> value="Luxembourg"><?php echo $this->lang->line('luxembourg'); ?></option>
                        <option <?php if(in_array('Namur',$province)) echo 'selected'; ?> value="Namur"><?php echo $this->lang->line('namur'); ?></option>
                    </select>
                </div>
                <div class="float-middle input-separation m-input-postalcode">
                    <input type="text" id="zipcode" value="<?php echo $zipcode; ?>" name="zipcode" placeholder="Code Postaux"/>
                    <a href="" class="btn-inverse"><i class="fa fa-map-marker"></i> <?php echo $this->lang->line('map'); ?></a>
                </div>
            </div>
            <div class="clearfix">
                <div class="float-middle input-separation">
                    <div class="float-middle input-separation">
                        <div class="input-field number-euro">
                            <input type="number" name="price-min" id="price-min" placeholder="Prix minimum" value="<?php echo $price_min; ?>"/>
                        </div>
                    </div>
                    <div class="float-middle input-separation">
                        <div class="input-field number-euro">
                            <input type="number" name="price-max" id="price-max" placeholder="Prix maximum" value="<?php echo $price_max; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="float-middle input-separation" >
                    <fieldset class="inputstyle select">
                        <select name="select">
                            <option value="valeur3" selected>Fréquence</option>
                            <option value="valeur3">1x par jour</option>
                            <option value="valeur1">1x par semaine</option> 
                            <option value="valeur2">1x par mois</option>
                        </select> 
                    </fieldset>
                </div>
            </div>
            <div class='clearfix'>
                <div class="float-middle input-separation">
                    <fieldset class="radio-inline-cont pull-left">
                        <div>
                           <input name="lang" type="radio" <?php if($lang == 'FR/NL') echo "checked"; ?> value="FR/NL" id="FR/NL">
                            <label for="FR/NL">FR/NL</label>
                        </div><!--
                         --><div>
                            <input name="lang" type="radio" <?php if($lang == 'FR') echo "checked"; ?> value="FR" id="FR">
                            <label for="FR">FR</label>
                        </div><!--
                         --><div>
                            <input name="lang" type="radio"<?php if($lang == 'NL') echo "checked"; ?> value="nl" id="NL">
                            <label for="NL">NL</label>
                        </div>
                    </fieldset>
                    <fieldset class="radio-inline-cont pull-right">
                        <div>
                            <input name="vente" type="radio" <?php if($vente == '1') echo "checked"; ?> value="1" id="Vente">
                            <label for="Vente"><?php echo $this->lang->line('sell'); ?></label>
                        </div><!--
                         --><div>
                             <input name="vente" type="radio" <?php if($vente == '0') echo "checked"; ?> value="0" id="Location">
                            <label for="Location"><?php echo $this->lang->line('location'); ?></label>
                        </div>
                    </fieldset>
                </div>
                 <div class="float-middle input-separation">
                 </div>
            </div>
            <div class="clearfix">
                <input type="submit" id="button-search" name="search" value="Sauvegarder la recherche" class="btn submit">
            </div>
        </div>
    </form>
</section>  