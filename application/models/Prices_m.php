<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prices_m extends MY_Model {

    public $_db = 'prices';
    public $_name = 'prices_m';

    public function get($annonce_id){
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->result();
    }

    public function updatePrice($annonce_id){
    	
    }


    public function getHistoricPrices($annonce_id){
		$historic_prices_in_string = '';
		$historic_prices = $this->get($annonce_id);
		if(count($historic_prices) <= 1){
			return '';
		}else{
			unset($historic_prices[count($historic_prices)-1]);

			foreach($historic_prices as $key => $price){
				$historic_prices_in_string .= number_format($price->price, 0, ',', ' ')." ";
			}
			$historic_prices_in_string = trim($historic_prices_in_string,' ');
			return $historic_prices_in_string." €";
		}
	}

   
}