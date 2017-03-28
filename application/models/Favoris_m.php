<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris_m extends MY_Model {

    public $_db = 'favoris';
    public $_name = 'favoris_m';
 
    public function get($params) {
        $this->db->group_by('favoris.id');
        $this->db->select('*, 
          favoris.id as id, 
          favoris.user_id as user_id, 
          favoris.tags as tags, 
          rappels.tags as rappel_tags, 
          rappels.id as rappel_id, 
          favoris.note as note, 
          favoris.owner_name as owner_name, 
          favoris.tel as tel, 
          rappels.note as rappel_note, 

        ');
        
        $this->db->join('uploads','favoris.upload_id = uploads.id', 'left');
        $this->db->join('rappels','rappels.favoris_id = favoris.id', 'left');
        $this->db->join('users','users.id = favoris.mandataire_user_id');
        
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
                $request_search .= "OR favoris.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.owner_name LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.price LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.date_publication LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.adress LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.zip_code LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.province LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR users.name LIKE '%".$params['search']."%'";
                $request_search .= "OR users.firstname LIKE '%".$params['search']."%'";
                $request_search .= "OR users.login LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.description LIKE '%".$params['search']."%' )";
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

    public function getSupervisionInfos($user_id){
      $this->db->where('user_id',$user_id);
      $this->db->order_by('created','desc');
      $favoris = $this->db->get($this->_db)->result();
      if(isset($favoris[0]))
        $last_favoris = $favoris[0];
      else
        $last_favoris = false;
     
      return array(
        'last_favoris' => $last_favoris,
        'number_favoris' => count($favoris)
      );
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
           'mandataire_user_id' => $user_id,
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
        return $this->db->update($this->_db, $favoris); 
    }

   
}