<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Visits_m extends MY_Model {

    public $_db = 'visits';
    public $_name = 'visits_m';

    public function deleteByUserAnnonceIds($user_id,$annonce_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('annonce_id', $annonce_id);
        $this->db->delete($this->_db); 
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