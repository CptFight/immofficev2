<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Status_m extends MY_Model {

    public $_db = 'status';
    public $_name = 'status_m';


    public function getStatus($agence_id,$type){
        $this->db->where('agence_id',$agence_id);
        $this->db->where('type',$type);
        $results = $this->db->get($this->_db)->result();
        if(count($results) <= 0){
            $lang = $this->getCurrentUser()->lang;

            $this->db->where('type',"basic_".$type."_".$lang);
            $basic_status = $this->db->get($this->_db)->result();

            foreach($basic_status as $key => $basic_statu){
                $status = array();
                $status['agence_id'] = $agence_id;
                $status['name'] = $basic_statu->name;
                $status['color'] = $basic_statu->color;
                $status['type'] = $type;
                $this->insert($status);
            } 
            
            return $this->getStatus($agence_id,$type);
        }else{
            return $results;
        }
    }

    public function getFirstStatus($agence_id,$type){
        $this->db->limit(1);
        $this->db->where('agence_id',$agence_id);
        $this->db->where('type',$type);
        $result = $this->db->get($this->_db)->row();

        if(count($result) <= 0){
            $lang = $this->getCurrentUser()->lang;

            $this->db->limit(1);
            $this->db->where('type',"basic_".$type."_".$lang);
            return $this->db->get($this->_db)->row();

        }else{
            return $result;
        }


    }

    public function getBasicStatus($type,$lang){
        $this->db->where('type',"basic_".$type."_".$lang);
        return $this->db->get($this->_db)->result();
    }
   
}