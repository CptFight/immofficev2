<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Remarks_m extends MY_Model {

    public $_db = 'remarks';
    public $_name = 'remarks_m';

    public function getByFavoris($favoris_id){
    	$this->db->where('favoris_id',$favoris_id);
    	$this->db->order_by('created','desc');
    	return $this->db->get($this->_db)->result();
    }

   
}