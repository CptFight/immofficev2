<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rappels extends CI_Controller {

	public function index() {
		$this->load->model(array('Favoris_m','Users_m'));
		$user = $this->Users_m->getCurrentUser();

		$this->data['user_id'] = $user->id;
		$this->data['user'] = $user;
		$this->lang->load('global', $user->lang);
		
		/* Custom Scripts */
		$this->data['custom_scripts'] = array("/assets/custom_scripts/rappels.js");
		$this->data['pagename'] = "rappels";
	
		$this->load->view('template', $this->data);
	}
}

