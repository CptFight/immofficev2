<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rappels extends CI_Controller {

	public function index() {
		$this->load->model(array('Annonces_m','Updates_m','Users_m'));
		$user = $this->Users_m->getCurrentUser();

		$this->data['user_id'] = $user->id;
		$this->lang->load('global', $user->lang);

		//TODO SET USER INFORMATIONS.
		$this->data['date_min'] = '';
		$this->data['date_max'] = '';
		$this->data['daterange'] = '';

		$this->data['price_min'] = $user->search_price_min;
		$this->data['price_max'] = $user->search_price_max;
		$this->data['zipcode'] = $user->search_zipcodes;
		$provinces = json_decode($user->search_provinces);
		if(!$provinces) $provinces = array();
		$this->data['province'] = $provinces;
		$this->data['lang'] = $user->search_lang;
		$this->data['vente'] = $user->search_sell;
		
		/* Custom Scripts */
		$this->data['customscript'] = "/assets/custom_scripts/Annonces.js";
		$this->data['annonces'] = array();// $this->Annonces_m->get(false,1000);
		$this->data['pagename'] = "annonces";
	
		$this->load->view('template', $this->data);
	}
}

