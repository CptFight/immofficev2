<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Owners_m extends MY_Model {

    public $_db = 'owners';
    public $_name = 'owners_m';

    public function getByAgence($agence_id){
    	$this->db->select('*,
            owners.id as id,
    		owners.name as name,
    		status.color as status_color,
    		status.name as status_name');
    	
        $this->db->where('owners.agence_id',$agence_id);

        $this->db->where("(owners.name != '' OR owners.tel != '' OR owners.email != '' or owners.note != '')");
       

        $this->db->join('status','status.id = owners.status_id');

        return $this->db->get($this->_db)->result();
       
    }


    public function gdpr_search($keywords) {
        //$this->db->group_by('favoris.id');
        $this->db->select('count(*) as count');
        
        if($keywords){
            $keywords = addslashes($keywords);
            $request_search = "( ";
            $request_search .= "owners.name LIKE '%".$keywords."%'";
            $request_search .= "OR owners.tel LIKE '%".$keywords."%'";
            $request_search .= "OR owners.email LIKE '%".$keywords."%'";
            $request_search .= "OR owners.note LIKE '%".$keywords."%')";
            $this->db->where($request_search);
        }

            
        $return = $this->db->get($this->_db)->result();
      
        return $return[0]->count;
    }


            
}