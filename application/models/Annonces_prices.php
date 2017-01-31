<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Prices_m extends CI_Model {

    public $_db = 'Prices';
    public $_name = 'prices_m';

    public $_limit = 10;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($annonce_id) {
        $this->db->where('annonce_id',$annonce_id);
        return $this->db->get($this->_db)->result();
   
    }
   
}