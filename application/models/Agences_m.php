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

            if($params['length'] <= 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 
            
            if($params['search']){
                $request_search = "(";
                $request_search .= "adress LIKE '%".$params['search']."%'";
                $request_search .= "OR name LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }


    public function getTotalPrice(){
        $agences = $this->db->get($this->_db)->result();
        $total_tvac = 0;
        $total_htva = 0;
        foreach($agences as $key => $agence){
            $total_tvac += $agence->price_tvac;
            $total_htva += $agence->price_htva;
        }
        return array(
                'total_tvac' => $total_tvac,
                'total_htva' => $total_htva
        );
    }

    public function countPayed(){
        $this->db->where('price_tvac >',0);
        return count($this->db->get($this->_db)->result());
    }


    public function delete($id){
        $this->db->where('agence_id', $id);
        $result = $this->db->get('users')->row();
        if($result) return false;
        else{
            $this->db->where('id', $id);
            return $this->db->delete($this->_db); 
        } 
    }

   
}