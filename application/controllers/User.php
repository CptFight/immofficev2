<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function login() {
		/*if($login = $this->input->post('login')) {
			$this->session->set_userdata('logged', true);
			set_cookie('logged', true, 60 * 60 * 24* 365);
			set_cookie('user', 1, 60 * 60 * 24* 365);
			header('location:/home/');
			exit;
		}
		$this->load->view('user');*/
		
		$this->load->view('template', $this->data);
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
