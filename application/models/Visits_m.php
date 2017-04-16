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
      
      if(isset($all_visits[0])){
        $last_link_visited = $all_visits[0];
      }else{
        $last_link_visited = false;
      }

      $this->db->join('annonces','annonces.id = visits.annonce_id');
      $this->db->order_by('visits.created','desc');
      $this->db->where('visits.user_id',$user_id);
      $this->db->where('visits.created >',strtotime('-1 week'));
      $visits_since_1_week = $this->db->get($this->_db)->result();
      if(isset($visits_since_1_week[0])){
        $last_link_visits_since_1_week = $visits_since_1_week[0];
      }else{
        $last_link_visits_since_1_week = false;
      }

      $this->db->join('annonces','annonces.id = visits.annonce_id');
      $this->db->order_by('visits.created','desc');
      $this->db->where('visits.user_id',$user_id);
      $this->db->where('visits.created >',strtotime('-1 month'));
      $visits_since_1_month = $this->db->get($this->_db)->result();
      if(isset($visits_since_1_month[0])){
        $last_link_visits_since_1_month = $visits_since_1_month[0];
      }else{
        $last_link_visits_since_1_month = false;
      }

      return array(
        'since_always' => array(
            'last_link_visited' => $last_link_visited,
            'numbers_visits' => count($all_visits)
        ),
        'since_1_week' => array(
          'last_link_visited' => $last_link_visits_since_1_week,
          'numbers_visits' => count($visits_since_1_week)
        ),
        'since_1_month' => array(
          'last_link_visited' => $last_link_visits_since_1_month,
          'numbers_visits' => count($visits_since_1_month)
        )
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