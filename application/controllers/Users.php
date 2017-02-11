<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login() {
		$this->load->model(array('Users_m'));

		if($this->input->post('send-login')) {

			$login = $this->input->post('login');
			$password = $this->input->post('password');
			$user = $this->Users_m->login($login,$password);
			if($user){
				$this->session->set_userdata('logged', true);
				$this->session->set_userdata('user', $user);
				$this->input->set_cookie('logged', true, 60 * 60 * 24* 365);
				$this->input->set_cookie('user', 1, 60 * 60 * 24* 365);
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
			header('location:/');
			exit;
		}
		$this->load->view('user');
	}

	public function logout() {
		//$this->session->session_destroy();
		//header('location:/user/lock/');
		//exit;
		//$this->load->view('user/lock');
	}
}
