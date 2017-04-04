<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Exports_m extends MY_Model {

    public $_db = 'exports';
    public $_name = 'exports_m';


    public function get($user_id,$type = false,$since_1_what = false){
    	$this->db->where('user_id',$user_id);
	    $this->db->order_by('created','desc');
	    
	    if($type){
	    	$this->db->where('type',$type);
	    }
	    
	    if($since_1_what){
	    	$this->db->where('created >',strtotime('-1 '.$since_1_what));
	    }
	    return $this->db->get($this->_db)->result();
    }

    public function getSupervisionInfos($user_id){
    	/*$this->db->where('user_id',$user_id);
	    $this->db->order_by('created','desc');
	    $exports = $this->db->get($this->_db)->result();*/

	    $exports = $this->get($user_id);
	    if(isset($exports[0]))
	        $last_export = $exports[0];
	    else
	        $last_export = false;

	     
	    return array(
	        'last_export' => $last_export,
	        'number_exports' => array(
	        	'all' => count($exports),
	        	'pdf' => count( $this->get($user_id , 'pdf')),
	        	'csv' => count( $this->get($user_id , 'csv')),
	        	'print' => count( $this->get($user_id , 'print')),
	        	'mail' => count( $this->get($user_id , 'mail')),
	        ),
	        'number_exports_since_1_week' => array(
	        	'all' => count( $this->get($user_id , false, 'week')),
	        	'pdf' => count( $this->get($user_id , 'pdf', 'week')),
	        	'csv' => count( $this->get($user_id , 'csv', 'week')),
	        	'print' => count( $this->get($user_id , 'print', 'week')),
	        	'mail' => count( $this->get($user_id , 'mail', 'week')),
	        )
	    );
    }
   
}