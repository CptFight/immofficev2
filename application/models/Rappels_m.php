<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rappels_m extends CI_Model {

    public $_db = 'rappels';
    public $_name = 'rappels_m';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($params) {
        $this->db->group_by('rappels.id');
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->select("*,
            rappels.id as id,
            rappels.tags as tags,
            favoris.tags as favoris_tags,
        ");

        if(!is_array($params)){
            $id = $params;
            $this->db->where('rappels.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] == 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            if($params['search']){
                $request_search = "( favoris.title LIKE '%".$params['search']."%'";
                $request_search .= "OR rappels.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.owner_name LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.price LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.date_publication LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.adress LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.zip_code LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.province LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.description LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if($params['user_id']){
                $this->db->where('rappels.user_id',$params['user_id']);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

    public function getRappelsBetween($user_id, $start,$end){
        
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->select("*,
            rappels.id as id,
            rappels.tags as tags,
            favoris.tags as favoris_tags,
        ");

        $this->db->where('rappels.user_id',$user_id);
        $this->db->where('rappels.date_rappel >=',$start);
        $this->db->where('rappels.date_rappel <=',$end);

        return $this->db->get($this->_db)->result();
    }

    public function countDataLastRequest($params){
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }

    public function countAllDatas(){
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }

    public function getRappelsAnnoncesIds($user_id){
      $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');

      $this->db->where('rappels.user_id',$user_id);
      $result = $this->db->get($this->_db)->result();
      $list_ids = array();
      foreach($result as $key => $rappels){
        $list_ids[] = $rappels->annonce_id;
      }
      return $list_ids;
    }

    public function deleteRappels($id){
        $this->db->where('id', $id);
        $this->db->delete($this->_db); 
    }

    public function addRappel($user_id,$favoris_id,$date_rappel){
        $data = array(
           'user_id' => $user_id,
           'favoris_id' => $favoris_id,
           'date_rappel' => $date_rappel
        );
        return $this->db->insert($this->_db, $data); 
    }

    public function removeRappel($user_id,$favoris_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('favoris_id', $favoris_id);
        $this->db->delete($this->_db); 
    }

    public function saveRappels($rappels){
      $this->db->where('id', $rappels['id']);
      unset($rappels['id']);
      $this->db->update($this->_db, $rappels); 
    }

   
}