<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visits_m extends MY_Model {

    public $_db = 'visits';
    public $_name = 'visits_m';

    public function deleteByUserAnnonceIds($user_id,$annonce_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('annonce_id', $annonce_id);
        $this->db->delete($this->_db); 
    }

    public function getSupervisionInfos($user_id){
      $this->db->join('annonces','annonces.id = visits.annonce_id');
      $this->db->order_by('visits.created','desc');
      $this->db->where('visits.user_id',$user_id);
      $all_visits = $this->db->get($this->_db)->result();
      $numbers_visits = count($all_visits);
      if(isset($all_visits[0])){
        $last_link_visited = $all_visits[0];
      }else{
        $last_link_visited = false;
      }

      $this->db->where('user_id',$user_id);
      $this->db->where('created >',strtotime('-1 week'));
      $numbers_visits_since_1_week = count($this->db->get($this->_db)->result());
      return array(
        'numbers_visits' => $numbers_visits,
        'numbers_visits_since_1_week' => $numbers_visits_since_1_week,
        'last_link_visited' => $last_link_visited
      );
    }

    public function getVisitsAnnoncesIds($user_id){
      $this->db->where('user_id',$user_id);
      $result = $this->db->get($this->_db)->result();
      $list_ids = array();
      foreach($result as $key => $visits){
        $list_ids[] = $visits->annonce_id;
      }
      return $list_ids;
    }

    

   
}