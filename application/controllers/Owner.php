<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Owner extends MY_Controller {

	public function index() {
		$this->load->model(array('Owners_m'));
		$this->data['owners'] = $this->Owners_m->getByAgence($this->current_user->agence_id);
		$this->load->view('template', $this->data);
	}

}
