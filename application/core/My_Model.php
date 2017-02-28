<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getCurrentUser(){
        $user = $this->session->get_userdata('user');
      
        if(!$user || !isset($user['user']) || !isset($user['user']->id)){
            redirect('/users/login');
        }else{
            $user = $user['user'];
        }
        return $user;
    }


    public function updateRappelFavorisCountInSession(){
        $user = $this->getCurrentUser();
       
        $this->db->select('count(*) as count');
        $this->db->where('user_id',$user->id);
        $user->count_rappels = $this->db->get('rappels')->row()->count;

        $this->db->select('count(*) as count');
        $this->db->where('user_id',$user->id);
        $user->count_favoris = $this->db->get('favoris')->row()->count;

        print_r($user);
        $this->session->set_userdata('user', $user);
    }

}