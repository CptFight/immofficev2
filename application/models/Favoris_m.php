<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris_m extends MY_Model {

    public $_db = 'favoris';
    public $_name = 'favoris_m';
 
    public function get($params) {
        $this->db->group_by('favoris.id');
        $this->db->select('*, favoris.id as id, favoris.user_id as user_id');
        $this->db->join('uploads','favoris.upload_id = uploads.id', 'left');
        
        if(!is_array($params)){
            $id = $params;
            $this->db->where('favoris.id',$id);
            return $this->db->get($this->_db)->row();
        }else{


            if($params['length'] == 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            if($params['search']){
                $request_search = "( title LIKE '%".$params['search']."%'";
                $request_search .= "OR tags LIKE '%".$params['search']."%'";
                $request_search .= "OR owner_name LIKE '%".$params['search']."%'";
                $request_search .= "OR price LIKE '%".$params['search']."%'";
                $request_search .= "OR date_publication LIKE '%".$params['search']."%'";
                $request_search .= "OR tel LIKE '%".$params['search']."%'";
                $request_search .= "OR adress LIKE '%".$params['search']."%'";
                $request_search .= "OR zip_code LIKE '%".$params['search']."%'";
                $request_search .= "OR province LIKE '%".$params['search']."%'";
                $request_search .= "OR web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR description LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if($params['user_id']){
                $this->db->where('favoris.user_id',$params['user_id']);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

    public function countDataLastRequest($params){
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }

    public function countAllDatas(){
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }


    public function addAnnonceInFavoris($user_id,$annonce){
        $data = array(
           'user_id' => $user_id,
           'annonce_id' => $annonce->id,
           'price' => $annonce->price,
           'created' => $annonce->created,
           'date_publication' => $annonce->date_publication,
           'url' => $annonce->url,
           'web_site' => $annonce->web_site,
           'created' => $annonce->created,
           'zip_code' => $annonce->zip_code,
           'province' => $annonce->province,
           'living_space' => $annonce->living_space,
           'sale' => $annonce->sale,
           'lang' => $annonce->lang,
           'title' => $annonce->title,
           'description' => $annonce->description,
           'adress' => $annonce->adress,
           'city' => $annonce->city,
           'tel' => ''
        );

        $return = $this->db->insert($this->_db, $data); 
        $this->updateRappelFavorisCountInSession();
        return $return;
    }

    public function getFavorisAnnoncesIds($user_id){
      $this->db->where('user_id',$user_id);
      $result = $this->db->get($this->_db)->result();
      $list_ids = array();
      foreach($result as $key => $favoris){
        $list_ids[] = $favoris->annonce_id;
      }
      return $list_ids;
    }

    public function delete($id){
      $this->db->where('favoris_id', $id);
      $this->db->delete('rappels'); 
    
      $this->db->where('id', $id);
      $this->db->delete($this->_db); 
      $this->updateRappelFavorisCountInSession();
    }

    public function getByUserAnnonceId($user_id,$annonce_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->row();
    }

    public function removeAnnonceFromFavoris($user_id,$annonce_id){
        $favoris = $this->getByUserAnnonceId($user_id,$annonce_id);
        $this->db->where('user_id', $user_id);
        $this->db->where('favoris_id', $favoris->id);
        $this->db->delete('rappels'); 
        
        $this->db->where('user_id', $user_id);
        $this->db->where('annonce_id', $annonce_id);
        $this->db->delete($this->_db); 
       
        $this->updateRappelFavorisCountInSession();       
    }

    public function update($favoris){
        $this->db->where('id', $favoris['id']);
        unset($favoris['id']);
        $this->db->update($this->_db, $favoris); 
    }

   
}