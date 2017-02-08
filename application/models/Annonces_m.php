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

            if($params['criterias']['date_min']){
                $this->db->where('date_publication >=',$params['criterias']['date_min']);
            }
            if($params['criterias']['date_max']){
                $this->db->where('date_publication <=',$params['criterias']['date_max']);
            }
            if($params['criterias']['price_min']){
                $this->db->where('price >=',$params['criterias']['price_min']);
            }
            if($params['criterias']['price_max']){
                $this->db->where('price <=',$params['criterias']['price_max']);
            }
            
            if($params['criterias']['zipcode'] == '' && $params['criterias']['province']){
                $provinces = $params['criterias']['province'];
                $province_request = "province LIKE '".$provinces[0]."'";
                for($cpt=1;$cpt<count($provinces); $cpt++){
                    $province_request .= " OR province LIKE '".$provinces[$cpt]."'";
                }
                $this->db->where($province_request);
            }

            if($params['criterias']['zipcode']){
                $zipcode_list = explode(' ',$params['criterias']['zipcode']);
                $zipcode_request = "zip_code LIKE '".$zipcode_list[0]."'";
                for($cpt=1;$cpt<count($zipcode_list); $cpt++){
                    $zipcode_request .= " OR zip_code LIKE '".$zipcode_list[$cpt]."'";
                }
                $this->db->where($zipcode_request);
                
            }

            if($params['criterias']['lang'] && $params['criterias']['lang'] != 'FR/NL'){
                $this->db->where('lang',$params['criterias']['lang']);
            }
            if($params['criterias']['vente']){
                $this->db->where('sale',$params['criterias']['vente']);
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