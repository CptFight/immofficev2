<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Gdpr extends MY_Controller {

	public function index() {
		$lang = 'french';
		if(isset($_GET['lang_user'])){
			$lang = $_GET['lang_user'];
		}
		$this->lang->load('global', $lang);

		$this->session->unset_userdata('user');

		$this->data['results'] = 0;
		if($this->input->post('gdpr_send')) {
			$this->load->model(array('Favoris_m'));
			
			$this->addMessage($this->input->post('gdpr_search')." ".$this->lang->line('be_finded')." ".$this->Favoris_m->gdpr_search($this->input->post('gdpr_search'))." ".$this->lang->line('time'));
		}

		$this->load->view('template_landing',$this->data);
	}
	
}

