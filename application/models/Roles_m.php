<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_m extends MY_Model {

    public $_db = 'roles';
    public $_name = 'roles_m';

    public function getAll() {
        return $this->db->get($this->_db)->result();
    }

   
}