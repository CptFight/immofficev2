<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login() {
		//$this->session->session_destroy();
		//session_destroy();
		$this->session->unset_tempdata('user');
		$this->load->model(array('Users_m'));

		if($this->input->post('send-login')) {

			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$user = $this->Users_m->login($login,$password);
			if($user){
				$this->session->set_userdata('user', $user);
				/*$this->input->set_cookie('logged', true, 60 * 60 * 24* 365);
				$this->input->set_cookie('user', 1, 60 * 60 * 24* 365);*/
				redirect('/annonces/index');
				die();
			}else{
				
			}
		}		
		$this->load->view('template');
	}


	public function lock() {
		if($login = $this->input->post('login')) {
			$this->session->set_userdata('logged', true);
			redirect('/');
			exit;
		}
		$this->load->view('user');
	}


	//AJAX
	public function changeLang(){
		$user = $this->load->model(array('Users_m'));
		$user->lang = $this->input->post('lang');
		$this->session->set_userdata('user', $user);
		echo json_encode($user);
	}

	public function logout() {
		$this->session->session_destroy();
		redirect('users/login');
	}

	public function saveLastSearch(){
		$this->load->model(array('Users_m'));
		$user_id = $this->input->post('user_id');
		$datas = array();
		$datas['price_min'] = $this->input->post('price_min');
        $datas['price_max'] = $this->input->post('price_max');
        $datas['province'] = $this->input->post('province');
        $datas['zipcode'] = $this->input->post('zipcode');
        $datas['lang'] = $this->input->post('lang');
        $datas['vente'] = $this->input->post('vente');
        $datas['daterange'] = $this->input->post('daterange');
		$this->Users_m->saveLastSearch($user_id,$datas);
	}
}
