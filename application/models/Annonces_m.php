<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces_m extends MY_Model {

    public $_db = 'annonces';
    public $_name = 'annonces_m';

    private $last_search_results;

    public function getHistoricPublications($id){
        $this->db->where('id',$id);
    }

    public function delete($id){
        $this->db->where('annonce_id', $id);
        $result = $this->db->get('favoris')->row();
        if($result) return false;
        else{
            $this->db->query("SET FOREIGN_KEY_CHECKS = 0;");
            $this->db->where('annonce_id', $id);
            $this->db->delete('prices'); 

            $this->db->where('annonce_id', $id);
            $this->db->delete('publications'); 
       
            $this->db->where('id', $id);
            $return = $this->db->delete($this->_db); 
            $this->db->query("SET FOREIGN_KEY_CHECKS = 1;");
            return $return;
        } 
    }

    public function get($params) {
        $this->db->group_by('annonces.id');
        $this->db->join('prices','prices.id = annonces.last_price_id', 'left');
        $this->db->join('publications','publications.id = annonces.last_publication_id', 'left');
        $this->db->select('*, annonces.id as id');
        
        if(!is_array($params)){
            $id = $params;
            $this->db->where('annonces.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] <= 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 


            if($params['search']){
                $request_search = '( title LIKE "%'.$params["search"].'%" ';
                $request_search .= 'OR annonces.id LIKE "%'.$params["search"].'%" ';
                $request_search .= 'OR web_site LIKE "%'.$params["search"].'%" ';
                $request_search .= 'OR url LIKE "%'.$params["search"].'%" ';
                $request_search .= 'OR description LIKE "%'.$params["search"].'%" )';
                $this->db->where($request_search);
            }

            if($params['criterias']['zipcode'] == '' && $params['criterias']['province']){
                $provinces = $params['criterias']['province'];
                $province_request = "( province LIKE '".$provinces[0]."'";
                for($cpt=1;$cpt<count($provinces); $cpt++){
                    $province_request .= " OR province LIKE '".$provinces[$cpt]."'";
                }
                $province_request .= ')';
                $this->db->where($province_request);
            }

            if($params['criterias']['zipcode']){
                $zipcode_list = explode(' ',$params['criterias']['zipcode']);
                $zipcode_request = '( zip_code LIKE "'.$zipcode_list[0].'"';
                for($cpt=1;$cpt<count($zipcode_list); $cpt++){
                    $zipcode_request .= ' OR zip_code LIKE "'.$zipcode_list[$cpt].'"';
                }
                $zipcode_request .= ')';
                $this->db->where($zipcode_request);
                
            }


            if($params['criterias']['lang'] && $params['criterias']['lang'] != 'FR/NL'){
                $this->db->where('lang',$params['criterias']['lang']);
            }

            if(isset($params['criterias']['vente'])){
                $this->db->where('sale',$params['criterias']['vente']);
            }

            if($params['criterias']['date_min']){
                $this->db->where('date_publication >= ',$params['criterias']['date_min']);
            }

            if($params['criterias']['date_max']){
                $this->db->where('date_publication <= ',$params['criterias']['date_max']);
            }

            if(isset($params['criterias']['created']) ){
                $this->db->where('annonces.created >= ',$params['criterias']['created']);
            }
  
            
            if($params['criterias']['price_min']){
                $this->db->where('price >= ',$params['criterias']['price_min']);
            }

            if($params['criterias']['price_max']){
                $this->db->where('price <= ',$params['criterias']['price_max']);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }


    public function countDataLastRequest($params){
        $this->db->group_by('annonces.id');
        $this->db->join('prices','prices.id = annonces.last_price_id', 'left');
        $this->db->join('publications','publications.id = annonces.last_publication_id', 'left');
        
        $this->db->select('count(*) as count');
        
        if($params['search']){
            $params['search'] = addslashes($params['search']);
            $request_search = "( title LIKE '%".$params['search']."%'";
            $request_search .= "OR web_site LIKE '%".$params['search']."%'";
            $request_search .= "OR description LIKE '%".$params['search']."%' )";
            $this->db->where($request_search);
        }

        if($params['criterias']['zipcode'] == '' && $params['criterias']['province']){
            $provinces = $params['criterias']['province'];
            $province_request = "( province LIKE '".$provinces[0]."'";
            for($cpt=1;$cpt<count($provinces); $cpt++){
                $province_request .= " OR province LIKE '".$provinces[$cpt]."'";
            }
            $province_request .= ')';
            $this->db->where($province_request);
        }

        if($params['criterias']['zipcode']){
            $zipcode_list = explode(' ',$params['criterias']['zipcode']);
            $zipcode_request = '( zip_code LIKE "'.$zipcode_list[0].'"';
            for($cpt=1;$cpt<count($zipcode_list); $cpt++){
                $zipcode_request .= ' OR zip_code LIKE "'.$zipcode_list[$cpt].'"';
            }
            $zipcode_request .= ')';
            $this->db->where($zipcode_request);  
        }

        if($params['criterias']['lang'] && $params['criterias']['lang'] != 'FR/NL'){
            $this->db->where('lang',$params['criterias']['lang']);
        }

        if(isset($params['criterias']['vente'])){
            $this->db->where('sale',$params['criterias']['vente']);
        }
       
        if($params['criterias']['date_min']){
            $this->db->where('date_publication >= ',$params['criterias']['date_min']);
        }

        if($params['criterias']['date_max']){
            $this->db->where('date_publication <= ',$params['criterias']['date_max']);
        }
        
        if($params['criterias']['price_min']){
            $this->db->where('price >= ',$params['criterias']['price_min']);
        }

        if($params['criterias']['price_max']){
            $this->db->where('price <= ',$params['criterias']['price_max']);
        }
        $result = $this->db->get($this->_db)->result();
        return count($result);
    }

    public function countAllDatas() {
        $this->db->select('count(*) as count');
        return $this->db->get($this->_db)->row()->count;
    }


   
}