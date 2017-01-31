<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Updates_m extends CI_Model {

    var $idUser     = '';
    var $content    = '';
    var $dateCreate = '';
    var $_db = 'updates';
    var $_name = 'updates_m';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get() {
       return $this->db->get($this->_db)->result();
    }

    public function getLastUpdateDate(){
        $query ="select * from ".$this->_db." order by id DESC limit 1";
        $res = $this->db->query($query);

        if($res->num_rows() > 0) {
            return Date('d/m/Y H:i:s',$res->row()->timestamp);
            //return $res->row();
        }
        return false;
    }
}