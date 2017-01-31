<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces_m extends CI_Model {

    public $_db = 'annonces';
    public $_name = 'annonces_m';

    public $_limit = 10;

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($params) {
        $this->db->group_by('annonces.id');
        $this->db->join('prices','prices.id = annonces.last_price_id', 'left');
        $this->db->join('publications','publications.id = annonces.last_publication_id', 'left');
        
        
        if(!is_array($params)){
            $id = $params;
            $this->db->where('id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] == 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            $this->db->select('*, (select count(prices.annonce_id) from prices where prices.annonce_id =  annonces.id ) as number_maj');
        
            if($params['search']){
                $this->db->where('title LIKE','%'.$params['search'].'%');
                $this->db->or_where('web_site LIKE','%'.$params['search'].'%');
                $this->db->or_where('description LIKE','%'.$params['search'].'%');
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }


    public function countAllDatasFiltered($search){
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }

    public function countAllDatas() {
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }


   
}