<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends MY_Controller {


	public function index() {
		if($this->input->post('save') ){
			$data = array();
			$data['id'] = $this->input->post('id');
			$data['frequency'] = $this->input->post('date-max');
			$data['search_price_min'] = $this->input->post('price-min');
			$data['search_price_max'] = $this->input->post('price-max');
			$data['search_zipcodes'] = $this->input->post('zipcode');
			if(is_array($this->input->post('province'))){
				$data['search_provinces'] = $this->input->post('province');
			}else{
				$data['search_provinces'] = array();
			}
			$data['search_lang'] = $this->input->post('lang');
			$data['search_sell'] = $this->input->post('vente');
			
			if($data['id']){
				$this->subscriber->update($this->current_user->id,$data);
			}else{
				$this->subscriber->insert($this->current_user->id,$data);
			}
		}

		$this->load->model(array('Subscribers_m'));
		$subscribers = $this->Subscribers_m->get();

		$this->data['subscribers'] = array();
		$cpt = 0;
		foreach($subscribers as $key => $subscriber){
			$this->data['subscribers'][] = array(
				'price_min' => $subscriber->search_price_min,
				'price_max' => $subscriber->search_price_max,
				'zipcode' => $subscriber->search_zipcodes,
				'province' => json_decode($subscriber->search_provinces),
				'lang' => $subscriber->search_lang,
				'vente' => $subscriber->search_sell,
				'frequency' => $subscriber->frequency
			);
			$cpt++;
		}
		for($i=0;$i<$cpt;$i++){
			$this->data['subscribers'][] = array(
				'price_min' => '',
				'price_max' => '',
				'zipcode' => '',
				'province' => '',
				'lang' => '',
				'vente' => '',
				'frequency' => ''
			);
		};
		$this->load->view('template', $this->data);

	}

	
	

}

