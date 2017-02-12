<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends CI_Model {

    public $_db = 'users';
    public $_name = 'users_m';

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    public function get($id) {
        $this->db->where('id', $id);
        return $this->db->get($this->_db)->row();
    }

    public function saveLastSearch($user_id,$datas){
        $user = $this->get($user_id);

        $user->search_price_min = $datas['price_min'];
        $user->search_price_max = $datas['price_max'];
        $user->search_provinces = json_encode($datas['province']);
        $user->search_zipcodes = $datas['zipcode'];
        $user->search_lang = $datas['lang'];
        $user->search_sell = $datas['vente'];
        $user->search_date = $datas['daterange'];
        $this->session->set_userdata('user',$user);

        $data = array(
           'search_price_min' => $user->search_price_min,
           'search_price_max' => $user->search_price_max,
           'search_provinces' => $user->search_provinces,
           'search_zipcodes' => $user->search_zipcodes,
           'search_lang' => $user->search_lang,
           'search_sell' => $user->search_sell,
           'search_date' => $user->search_date
        );

        $this->db->where('id', $user->id);
        $this->db->update('users', $data);       
    }

    public function login($login, $password){
        $this->db->where('login',$login);
        $this->db->where('password',md5($password));
        return $this->db->get($this->_db)->row();
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


   
   
}