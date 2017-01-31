<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categories_m extends CI_Model {

    var $idUser   	= '';
    var $content 	= '';
    var $dateCreate	= '';
    var $_db = 'categories';
    var $_name = 'categories_m';

    function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    public function get() {
	   return $this->db->get($this->_db)->result();
    }
}