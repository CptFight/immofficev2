<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    
    public $_limit = 0;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get($id) {
      $this->db->where('id',$id);
      return $this->db->get($this->_db)->row();
    }

    public function getAll($table = 'id', $order = 'desc') {
        $this->db->order_by($table,$order);
        return $this->db->get($this->_db)->result();
    }

    public function count(){
        return count($this->db->get($this->_db)->result());
    }

    public function update($object){
        $this->db->where('id', $object['id']);
        unset($object['id']);
        return $this->db->update($this->_db, $object); 
    }

    public function insert($data){
        if(isset($data['id'])){
            unset($data['id']);
        }
        if($this->db->insert($this->_db, $data)){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }

    public function delete($id){
        try{
            $this->db->where('id', $id);
            return $this->db->delete($this->_db); 
        }catch(exception $e){
            return false;
        }
        
    }


    public function getCurrentUser(){
        $user = $this->session->get_userdata('user');
      
        if(!$user || !isset($user['user']) || !isset($user['user']->id)){
            redirect('/users/login');
        }else{
            $user = $user['user'];
        }
        return $user;
    }

    public function updateRappelFavorisCountInSession(){
        $user = $this->getCurrentUser();
        $today = strtotime('today');
        $tomorrow = strtotime('tomorrow');
       
        $this->db->select('count(*) as count');
         $this->db->join('favoris','rappels.favoris_id = favoris.id');
        $this->db->where('user_id',$user->id);
        $this->db->where('date_rappel >=',$today);
        $this->db->where('date_rappel <',$tomorrow);
        $user->count_rappels = $this->db->get('rappels')->row()->count;

        $this->db->select('count(*) as count');
        $this->db->where('user_id',$user->id);
        $this->db->where('date_publication >=',$today);
        $user->count_favoris = $this->db->get('favoris')->row()->count;

        $this->session->set_userdata('user', $user);
        return true;
    }

}