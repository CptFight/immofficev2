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
			$this->load->model(array('Users_m'));
			$user->lang = $_GET['lang_user'];
			$this->Users_m->updateLang($user->id,$user->lang);
		}

		$this->current_user = $user;
		$this->data['current_user'] = $this->current_user;
		$this->lang->load('global', $this->current_user->lang);

		
		$this->data['pagename'] = $this->uri->segment(1);
		$this->data['errors'] = array();
		$this->loadScripts();

	}

	protected function uploadFile($file_name){
		$this->config->load('upload');
		$uploadPath = $this->config->item('upload_path');
		$config['allowed_types']        = $this->config->item('allowed_types');
		$config['max_size']             = $this->config->item('max_size');
		$config['max_width']            = $this->config->item('max_width');
		$config['max_height']           = $this->config->item('max_height');

		$uploadPath .= $this->current_user->id."/";
		$config['upload_path'] = $uploadPath;

		if(!file_exists($uploadPath)){
			mkdir($uploadPath, 0700);
		}

		$this->load->library('upload',$config);

		if (!$this->upload->do_upload($file_name)){
            $return = array('error' => $this->upload->display_errors());
          
        }else{
            $return = array('upload_data' => $this->upload->data());
            $this->load->model(array('Uploads_m'));
            $data = $return['upload_data'];
            $data['user_id'] = $this->current_user->id;
            $upload_repository = $this->config->item('upload_repository');

            $data['web_path'] = base_url().$upload_repository.$this->current_user->id."/".$data['file_name'];
            $return['id'] = $this->Uploads_m->insert($data);
            
        }
		return $return;		
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
