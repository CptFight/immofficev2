<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers_m extends MY_Model {

    var $_db = 'Subscribers';
    var $_name = 'subscribers_m';
 
    public function get($frequency = 'day') {
        $this->db->where('frequency',$frequency);
        $this->db->where('active',1);
        return $this->db->get($this->_db)->result();
    }

}