<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends MY_Controller {


	public function index() {

		$this->data['subscribers'][0] = array(
			'date_min' => '',
			'date_max' => '',
			'price_min' => '100',
			'price_max' => '',
			'zipcode' => '',
			'province' => '',
			'lang' => '',
			'vente' => '',
		);

		$this->data['subscribers'][1] = array(
			'date_min' => '',
			'date_max' => '',
			'price_min' => '500',
			'price_max' => '',
			'zipcode' => '',
			'province' => '',
			'lang' => '',
			'vente' => ''
		);

		$this->load->view('template', $this->data);

	}

	
	

}

