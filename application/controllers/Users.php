<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	public function login() {
		$this->load->model(array('Users_m'));

		if($login = $this->input->post('login')) {
			$this->session->set_userdata('logged', true);
			$this->input->set_cookie('logged', true, 60 * 60 * 24* 365);
			$this->input->set_cookie('user', 1, 60 * 60 * 24* 365);
			redirect('/annonces/index');
			die();
		}		
		$this->load->view('template',$this->data);
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
