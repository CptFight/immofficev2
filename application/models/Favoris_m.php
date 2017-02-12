<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris_m extends CI_Model {

    public $_db = 'favoris';
    public $_name = 'favoris_m';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($params) {
        $this->db->group_by('favoris.id');
        
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
                $request_search .= "OR web_site LIKE '%".$params['search']."%'";
                $request_search .= "OR description LIKE '%".$params['search']."%' )";
                $this->db->where($request_search);
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

    public function addFavoris($user_id,$annonce){
        $data = array(
           'user_id' => $user_id,
           'annonce_id' => $annonce->id,
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
        return $this->db->insert($this->_db, $data); 
    }

    public function removeFavoris($id){
        $this->db->where('id', $id);
        $this->db->delete($this->_db); 
    }

   
}