<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $current_user = false;

	public function __construct(){
		parent::__construct();

		if($this->uri->segment(1) == 'users' && $this->uri->segment(2) == 'login'){
			return;
		}

		$user = $this->getCurrentUser();

		if(isset($_GET['lang_user'])){
			$user->lang = $_GET['lang_user'];
			$this->Users_m->updateLang($user->id,$user->lang);
		}
		

		$this->current_user = $user;
		$this->data['user'] = $this->current_user;
		$this->lang->load('global', $this->current_user->lang);
		$this->data['pagename'] = $this->uri->segment(1);
		$this->loadScripts();

	}

	protected function loadScripts(){

		$controller = strtolower($this->uri->segment(1) );
		$view = strtolower($this->uri->segment(2) );

		$base_view_path_abs = APPPATH."views/";
		$base_view_path_rel = base_url().'application/views/';

		$this->data['custom_scripts'] = array();
		$this->data['custom_scripts'][] = $base_view_path_rel."common/header.js";
		$this->data['custom_scripts'][] = $base_view_path_rel."common/footer.js";
		
		$custom_script_path_rel = $base_view_path_rel.$controller."/".$view.".js";
		$custom_script_path_abs = $base_view_path_abs.$controller."/".$view.".js";
	
		if(file_exists($custom_script_path_abs)){
			$this->data['custom_scripts'][] = $custom_script_path_rel;

		}


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
