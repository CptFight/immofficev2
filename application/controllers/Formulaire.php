<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulaire extends CI_Controller {

	public function index() {
		/* Custom Scripts */
		//$this->data['customscript'] = "/assets/custom_scripts/Annonces.js";
		$this->data['pagename'] = "formulaire";
		$this->load->view('template', $this->data);
	}
}

