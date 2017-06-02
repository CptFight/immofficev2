<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status_m extends MY_Model {

    public $_db = 'status';
    public $_name = 'status_m';


    public function getStatus($agence_id,$type){

        $this->db->where('agence_id',$agence_id);
        $this->db->where('type',$type);
        return $this->db->get($this->_db)->result();
    }

     public function getBasicStatus($type,$lang){
        $this->db->where('type',"basic_".$type."_".$lang);
        return $this->db->get($this->_db)->result();
    }
   
}