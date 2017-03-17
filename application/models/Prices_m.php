<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prices_m extends MY_Model {

    public $_db = 'prices';
    public $_name = 'prices_m';

    public function get($annonce_id){
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->result();
    }

   
}