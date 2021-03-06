<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Rappels_m extends MY_Model {

    public $_db = 'rappels';
    public $_name = 'rappels_m';

    public function get($params) {
        $this->db->group_by('rappels.id');
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->join('status','favoris.status_id = status.id','left');
        $this->db->join('owners','owners.id = favoris.owner_id','left');

        $this->db->select("*,
            rappels.id as id,
            favoris.id as favoris_id,
            rappels.tags as tags,
            rappels.note as rappel_note, 
            
            favoris.tags as favoris_tags,
            favoris.tel as tel, 

            status.name as status_name, 
            status.color as status_color, 
          
            owners.name as owner_name, 
            owners.status_id as owner_status_id, 
            owners.tel as owner_tel, 
            owners.email as owner_email, 
            owners.note as owner_note,

        ");

        if(!is_array($params)){
            $id = $params;
            $this->db->where('rappels.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] <= 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            if($params['search']){
                $params['search'] = addslashes($params['search']);
                $request_search = "( favoris.title LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.annonce_id LIKE '%".$params['search']."%'";
                $request_search .= "OR rappels.id LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.id LIKE '%".$params['search']."%'";
                $request_search .= "OR rappels.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR rappels.note LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.price LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.date_publication LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.adress LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.zip_code LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.province LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.name LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.email LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.note LIKE '%".$params['search']."%'";
                $request_search .= "OR status.name LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.description LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if($params['user_id']){
                $this->db->where('user_id',$params['user_id']);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

    public function getSupervisionInfos($user_id){
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->where('user_id',$user_id);
        $this->db->order_by('rappels.created','desc');

        $rappels = $this->db->get($this->_db)->result();
        if(isset($rappels[0]))
            $last_rappels = $rappels[0]->created;
        else
            $last_rappels = false;

        //since 1 week
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->where('user_id',$user_id);
        $this->db->where('rappels.created >',strtotime('-1 week'));
        $rappels_since_1_week = $this->db->get($this->_db)->result();
        if(isset($rappels_since_1_week[0]))
            $last_rappels_since_1_week = $rappels_since_1_week[0]->created;
        else
            $last_rappels_since_1_week = false;

        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->where('user_id',$user_id);
        $this->db->where('rappels.created >',strtotime('-1 month'));
        $rappels_since_1_month = $this->db->get($this->_db)->result();
        if(isset($rappels_since_1_month[0]))
            $last_rappels_since_1_month = $rappels_since_1_month[0]->created;
        else
            $last_rappels_since_1_month = false;

        return array(
            'since_always' => array(
                'last_rappels' => $last_rappels,
                'number_rappels' => count($rappels)
            ),
            'since_1_week' => array(
                'last_rappels' => $last_rappels_since_1_week,
                'number_rappels' => count($rappels_since_1_week)
            ),
            'since_1_month' => array(
                'last_rappels' => $last_rappels_since_1_month,
                'number_rappels' => count($rappels_since_1_month)
            )
        );
    }


    public function getRappelsBetween($user_id, $start,$end){
        
        $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
        $this->db->join('status','favoris.status_id = status.id');
        $this->db->select("*,
            rappels.id as id,
            status.color as color,
            rappels.tags as tags,
            favoris.tags as favoris_tags,
        ");


        $this->db->where('user_id',$user_id);
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
      $this->db->where('favoris.user_id',$user_id);
      $result = $this->db->get($this->_db)->result();
      $list_ids = array();
      foreach($result as $key => $rappels){
        $list_ids[] = $rappels->annonce_id;
      }
      return $list_ids;
    }

    public function getRappelsFavorisIds($user_id){
      $this->db->join('favoris','favoris.id = '.$this->_db.'.favoris_id');
      $this->db->where('favoris.user_id',$user_id);
      $result = $this->db->get($this->_db)->result();
      $list_ids = array();
      foreach($result as $key => $rappels){
        $list_ids[] = $rappels->favoris_id;
      }
      return $list_ids;
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete($this->_db); 
        return $this->updateRappelFavorisCountInSession();
    }

    public function add($favoris_id,$date_rappel){
        $data = array(
           'favoris_id' => $favoris_id,
           'date_rappel' => $date_rappel,
           'created' => strtotime('now')
        );
        $return = $this->db->insert($this->_db, $data); 
        $this->updateRappelFavorisCountInSession();
        return $return;
    }

    public function insert($rappel){
        $return = parent::insert($rappel);
        $this->updateRappelFavorisCountInSession();
        return $return;
    }

    public function deleteByFavorisId($favoris_id){
        $this->db->where('favoris_id', $favoris_id);
        $this->db->delete($this->_db); 
        return $this->updateRappelFavorisCountInSession();
    }

    public function update($rappel){
      $this->db->where('id', $rappel['id']);
      unset($rappel['id']);
      $this->db->update($this->_db, $rappel); 
      return $this->updateRappelFavorisCountInSession();
    }

   
}