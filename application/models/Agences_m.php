<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agences_m extends MY_Model {

    public $_db = 'agences';
    public $_name = 'agences_m';


    public function get($params) {
        if(!is_array($params)){
            $id = $params;
            $this->db->where('agences.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] == 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 
            
            if($params['search']){
                $request_search = "( users.name LIKE '%".$params['search']."%'";
                $request_search .= "OR agence LIKE '%".$params['search']."%'";
                $request_search .= "OR login LIKE '%".$params['search']."%' )";
                $request_search .= "OR tel LIKE '%".$params['search']."%' )";
                $request_search .= "OR role LIKE '%".$params['search']."%' )";
                $request_search .= "OR firstname LIKE '%".$params['search']."%' )";
                $request_search .= "OR adress LIKE '%".$params['search']."%' )";
                $request_search .= "OR owner_commercial LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

   
}