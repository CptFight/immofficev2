<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers_m extends MY_Model {

    var $_db = 'subscribers';
    var $_name = 'subscribers_m';
 
    public function get($params = array()) {
        $frequency_set = false;
        $active_set = false;

        if(isset($params['frequency'])){
            $frequency = $params['frequency'];
            $frequency_set = true;
        }

        if(isset($params['active'])){
            $active = $params['active'];
            $active_set = true;
        }

    	$this->db->select(
    		$this->_db.".id as id,
    		users.login,
    		users.lang,
            ".$this->_db.".active,
    		".$this->_db.".frequency,
    		".$this->_db.".search_price_min,
    		".$this->_db.".search_price_max,
    		".$this->_db.".search_provinces,
    		".$this->_db.".search_zipcodes,
    		".$this->_db.".search_lang,
    		".$this->_db.".search_sell,
    		".$this->_db.".search_date,
    		".$this->_db.".search_words
    	");
    	$this->db->join('users','users.id = '.$this->_db.'.user_id');
        if($frequency_set){
            $this->db->where('frequency',$frequency);
        }
        if($active_set){
            $this->db->where('active',$active);
        }

        if(isset($params['user_id'])){
             $this->db->where('user_id',$params['user_id']);
        }

        return $this->db->get($this->_db)->result();
    }


    public function getSupervisionInfos($user_id){
        $this->db->where('user_id',$user_id);
        $this->db->where('active',1);
        return $this->db->get($this->_db)->result();
  
    }



}