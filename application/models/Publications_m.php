<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publications_m extends MY_Model {

    public $_db = 'publications';
    public $_name = 'publications_m';

    public function get($annonce_id){
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->result();
    }

    public function getHistoricPublications($annonce_id){
		$historic_publications_in_string = '';
		$historic_publications = $this->get($annonce_id);
		if(count($historic_publications) <= 1){
			return '';
			
		}else{
			unset($historic_publications[count($historic_publications)-1]);
			foreach($historic_publications as $key => $publication){
				$historic_publications_in_string .= date('d/m/Y',$publication->date_publication)." ";
			}
			$historic_publications_in_string = trim($historic_publications_in_string,' ');
			return $historic_publications_in_string;
		}
	}

	

   
}