<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Publications_m extends MY_Model {

    public $_db = 'publications';
    public $_name = 'publications_m';

    public function get($annonce_id){
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->result();
    }

   
}