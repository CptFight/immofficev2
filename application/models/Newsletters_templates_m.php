<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newsletters_templates_m extends MY_Model {

    public $_db = 'newsletters_templates';
    public $_name = 'newsletters_templates_m';

    public function getDefaultTemplates($lang) {
        $this->db->where('defaut',1);
        $this->db->where('lang',$lang);
        return $this->db->get($this->_db)->result();
    }

    public function getTemplates($user_id,$lang) {
        $this->db->where('user_id',$user_id);
        $this->db->where('defaut',0);
        $this->db->where('lang',$lang);
        return $this->db->get($this->_db)->result();
    }

    
   
}