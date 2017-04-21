<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

	public function index() {
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		$this->load->model(array('Agences_m','Users_m'));

		$totals = $this->Agences_m->getTotalPrice();
		$this->data['number_agence'] = $this->Agences_m->count();
		$this->data['number_users'] = $this->Users_m->count();
		$this->data['total_price_htva'] = $totals['total_htva'];
		$this->data['total_price_tvac'] = $totals['total_tvac'];

		$this->load->view('template', $this->data);
	}


}

