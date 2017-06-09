<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris_m extends MY_Model {

    public $_db = 'favoris';
    public $_name = 'favoris_m';
 
    public function get($params) {
        //$this->db->group_by('favoris.id');
        $this->db->select('*, 
          favoris.id as id, 
          favoris.user_id as user_id, 
          favoris.tags as tags, 
          rappels.tags as rappel_tags, 
          rappels.id as rappel_id, 
          favoris.note as note, 
          favoris.adress as adress,
          favoris.status_id as status_id,
          favoris.owner_id as owner_id, 
          status.name as status_name, 
          status.color as status_color, 
          favoris.tel as tel, 
          rappels.note as rappel_note, 

          owners.name as owner_name, 
          owners.status_id as owner_status_id, 
          owners.tel as owner_tel, 
          owners.email as owner_email, 
          owners.note as owner_note, 

        ');

        $this->db->join('uploads','favoris.upload_id = uploads.id', 'left');
        $this->db->join('rappels','rappels.favoris_id = favoris.id', 'left');
        $this->db->join('users','users.id = favoris.user_id');
        $this->db->join('status','favoris.status_id = status.id','left');
        $this->db->join('owners','owners.id = favoris.owner_id','left');
        
        if(!is_array($params)){
            $id = $params;
            $this->db->where('favoris.id',$id);
            return $this->db->get($this->_db)->row();
        }else{


            if($params['length'] <= 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            if($params['search']){
                $params['search'] = addslashes($params['search']);
                $request_search = "( title LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.id LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.annonce_id LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tags LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.price LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.date_publication LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.adress LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.zip_code LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.province LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.note LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR users.name LIKE '%".$params['search']."%'";
                $request_search .= "OR users.firstname LIKE '%".$params['search']."%'";
                $request_search .= "OR users.login LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.name LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.tel LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.email LIKE '%".$params['search']."%'";
                $request_search .= "OR owners.note LIKE '%".$params['search']."%'";
                $request_search .= "OR status.name LIKE '%".$params['search']."%'";
                $request_search .= "OR favoris.description LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
            }

            if($params['user_id']){
                $this->db->where('favoris.user_id',$params['user_id']);
            }

            if($params['archive']){
                $this->db->where('favoris.archive',$params['archive']);
            }else{
                $this->db->where('favoris.archive',0);
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

      $this->db->where('user_id',$user_id);
      $this->db->where('created >',strtotime('-1 week'));
      $favoris_since_1_week = $this->db->get($this->_db)->result();
      if(isset($favoris_since_1_week[0]))
        $last_favoris_since_1_week = $favoris_since_1_week[0];
      else
        $last_favoris_since_1_week = false;

      $this->db->where('user_id',$user_id);
      $this->db->where('created >',strtotime('-1 month'));
      $favoris_since_1_month = $this->db->get($this->_db)->result();
      if(isset($favoris_since_1_month[0]))
        $last_favoris_since_1_month = $favoris_since_1_month[0];
      else
        $last_favoris_since_1_month = false;
     
      return array(
        'since_always' => array(
            'last_favoris' => $last_favoris,
            'number_favoris' => count($favoris)
        ),
        'since_1_week' => array(
          'last_favoris' => $last_favoris_since_1_week,
          'number_favoris' => count($favoris_since_1_week)
        ),
        'since_1_month' => array(
          'last_favoris' => $last_favoris_since_1_month,
          'number_favoris' => count($favoris_since_1_month)
        )
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


    public function addAnnonceInFavoris($user_id,$annonce,$status_id = 1){
        $data = array(
           'user_id' => $user_id,
           'annonce_id' => $annonce->id,
           //'mandataire_user_id' => $user_id,
           'price' => $annonce->price,
           'date_publication' => $annonce->date_publication,
           'url' => $annonce->url,
           'web_site' => $annonce->web_site,
           'created' => strtotime('now'),
           'zip_code' => $annonce->zip_code,
           'province' => $annonce->province,
           'living_space' => $annonce->living_space,
           'sale' => $annonce->sale,
           'lang' => $annonce->lang,
           'title' => $annonce->title,
           'status_id' => $status_id,
           'description' => $annonce->description,
           'adress' => $annonce->adress,
           'city' => $annonce->city,
           'tel' => '',
           'note' => '',
           'tags' => '',
           'archive' => 0
        );

        $return = $this->db->insert($this->_db, $data);
        $id = $this->db->insert_id(); 
        $this->updateRappelFavorisCountInSession();
        if($return){
          return $id;
        }else{
          print_r($this->db->_error_message());
          print_r($this->db->_error_number());
          return false;
        }
        
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

      $this->db->where('favoris_id', $favoris->id);
        $this->db->delete('remarks'); 
    
      $this->db->where('id', $id);
      $this->db->delete($this->_db); 
      $this->updateRappelFavorisCountInSession();
    }


    public function archive($id,$archive){
      $this->db->where('favoris_id', $id);
      $this->db->delete('rappels'); 
    


      $this->db->where('id', $id);
      if($archive) $archive = 1;
      else $archive = 0;
      $favoris = array();
      $favoris['archive'] = $archive;
      
      $this->db->update($this->_db,$favoris);

      $this->updateRappelFavorisCountInSession();
    }

    public function getByUserAnnonceId($user_id,$annonce_id){
        $this->db->where('user_id', $user_id);
        $this->db->where('annonce_id', $annonce_id);
        return $this->db->get($this->_db)->row();
    }

    public function removeAnnonceFromFavoris($user_id,$annonce_id){
        $favoris = $this->getByUserAnnonceId($user_id,$annonce_id);
        $this->db->where('favoris_id', $favoris->id);
        $this->db->delete('remarks'); 

      //  $this->db->where('user_id', $user_id);
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