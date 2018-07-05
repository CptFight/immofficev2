<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agences_m extends MY_Model {

    public $_db = 'agences';
    public $_name = 'agences_m';


    public function get($params) {
       
        $this->db->join('agences_status','agences.agences_status_id = agences_status.id','left');
        $this->db->select('*,agences.id as id, agences.name as name, agences_status.name as status');
        if(!is_array($params)){
            $id = $params;
            $this->db->where('agences.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if(!isset($params['role_id']) || ( $params['role_id'] != 4 && $params['role_id'] != 5 ) ){
                return false;
            }

            if($params['length'] <= 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 
            
            if($params['search']){
                $params['search'] = addslashes($params['search']);
                $request_search = "(";
                $request_search .= "adress LIKE '%".$params['search']."%'";
                $request_search .= "OR agences.name LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if($params['role_id'] == 5){
                $this->db->where('commercial_user_id',$params['current_user_id']);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

    public function getAllByUser($user_id) {
        $this->db->where('commercial_user_id',$user_id);
        $this->db->order_by($table,$order);
        return $this->db->get($this->_db)->result();
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

    public function isBlocked($agence_id){
        $this->db->join('agences_status','agences.agences_status_id = agences_status.id');
        $this->db->where('agences.id',$agence_id);
        $agence = $this->db->get($this->_db)->row();
        if($agence && ( $agence->agences_status_id == 1 || $agence->agences_status_id == 2 )){
            return false;
        }else{
            return true;
        }
        
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

            $this->db->where('agence_id', $id);
            $owners = $this->db->get('owners')->result();
            foreach($owners as $key => $owner){
                $this->db->where('owner_id', $owner->id);
                $this->db->delete('favoris'); 
            }

            $this->db->where('agence_id', $id);
            $this->db->delete('owners'); 

            $this->db->where('agence_id', $id);
            $this->db->delete('status'); 
            
            $this->db->where('id', $id);
            return $this->db->delete($this->_db); 
        } 
    }

   
}