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
        $this->db->join('status','status.id = owners.status_id');

        return $this->db->get($this->_db)->result();
    }
   
}