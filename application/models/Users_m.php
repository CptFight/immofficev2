<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users_m extends MY_Model {

    public $_db = 'users';
    public $_name = 'users_m';
  
     public function get($params) {
        $this->db->select('*,users.id as id, users.name as name, agences.name as agence_name');
        $this->db->join('agences','users.agence_id = agences.id');
        $this->db->join('roles','users.role_id = roles.id');
        $this->db->where('deleted !=',1);
        if(!is_array($params)){
            $id = $params;
            $this->db->where('users.id',$id);
            return $this->db->get($this->_db)->row();
        }else{

            if($params['length'] == 0){
               $params['length'] = $this->_limit; 
               $params['start'] = 0;
            } 

            
            if($params['search']){
                $request_search = "(";
                $request_search .= "users.name LIKE '%".$params['search']."%'";
                $request_search .= "OR agences.name LIKE '%".$params['search']."%'";
                $request_search .= "OR login LIKE '%".$params['search']."%' ";
                $request_search .= "OR tel LIKE '%".$params['search']."%' ";
                $request_search .= "OR roles.name LIKE '%".$params['search']."%' ";
                $request_search .= "OR firstname LIKE '%".$params['search']."%' ";
                $request_search .= "OR adress LIKE '%".$params['search']."%' ";
                $request_search .= "OR owner_commercial LIKE '%".$params['search']."%' ";
                $request_search .= ")";
                $this->db->where($request_search);
            }

            if(isset($params['order'])){
                $this->db->order_by($params['order']['column'],$params['order']['dir']);
            }

            return $this->db->get($this->_db,$params['length'],$params['start'])->result();
        }
    }

    public function emailExist($email){
        $this->db->where('login',$email);
        return $this->db->get($this->_db)->row();
    }

    public function getForAgenceSuperviser($params){
        $this->db->select('*,users.id as id, users.name as name, agences.name as agence_name');
        $this->db->join('agences','agence_id = agences.id');
        $this->db->where('deleted !=',1);

        if(isset($params['agence_id'] )){

          $this->db->where('agence_id',$params['agence_id']);
        } 


        if($params['length'] == 0){
           $params['length'] = $this->_limit; 
           $params['start'] = 0;
        } 

        if($params['search']){
            $request_search = "( users.name LIKE '%".$params['search']."%'";
            $request_search .= "OR agence LIKE '%".$params['search']."%'";
            $request_search .= "OR login LIKE '%".$params['search']."%' )";
            $request_search .= "OR tel LIKE '%".$params['search']."%' )";
            $request_search .= "OR role LIKE '%".$params['search']."%' )";
            $request_search .= "OR firstname LIKE '%".$params['search']."%' )";
            $request_search .= "OR adress LIKE '%".$params['search']."%' )";
            $request_search .= "OR owner_commercial LIKE '%".$params['search']."%' )";
            $this->db->where($request_search);
        }

        if(isset($params['order'])){
            $this->db->order_by($params['order']['column'],$params['order']['dir']);
        }

        return $this->db->get($this->_db,$params['length'],$params['start'])->result();
    }

    public function getMandatairesList($agence_id){
        $this->db->where('agence_id',$agence_id);
        $this->db->where('deleted !=',1);
        return $this->db->get($this->_db)->result();
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
        return $this->db->update($this->_db, $data);       
    }

    public function insert($user){
        return $this->db->insert($this->_db, $user); 
    }

    public function update($user){
        $this->db->where('id', $user['id']);
        unset($user['id']);
        return $this->db->update($this->_db, $user); 
    }


    public function updateLang($user_id,$lang){
        $data = array(
           'lang' => $lang
        );
        $this->db->where('id', $user_id);
        return $this->db->update($this->_db, $data); 
    }

    public function login($login, $password){
        $this->db->where('deleted !=',1);
        $today = strtotime('today');
        $tomorrow = strtotime('tomorrow');
        $this->db->group_by('users.id');
        $this->db->select('*, 
            (SELECT COUNT(*) FROM favoris WHERE user_id = '.$this->_db.'.id AND date_publication >= '.$today.') as count_favoris,
            (SELECT COUNT(*) FROM rappels WHERE user_id = '.$this->_db.'.id AND date_rappel >= '.$today.' AND date_rappel < '.$tomorrow.') as count_rappels
        ');
        $this->db->where('login',$login);
        $this->db->where('password',md5($password));
        $user = $this->db->get($this->_db)->row();
        if($user){
            $data = array(
                'id' => $user->id,
                'last_connection' => strtotime('now')
            );
            $this->update($data);
        }
        return $user;
     }
   
}