<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends MY_Controller {

	private $number_of_block_search = 2;

	public function index() {
		$this->load->model(array('Subscribers_m'));

		
		if($this->input->post('save') ){
			$data = array();
			$data['id'] = $this->input->post('id');
			$data['frequency'] = $this->input->post('frequency');
			$data['search_price_min'] = $this->input->post('price-min');
			$data['search_price_max'] = $this->input->post('price-max');
			$data['search_zipcodes'] = $this->input->post('zipcode');
			$data['active'] = 0;
			if($this->input->post('active') == 'on'){
				$data['active'] = 1;
			}
			if(is_array($this->input->post('province'))){
				$data['search_provinces'] = json_encode($this->input->post('province'));
			}else{
				$data['search_provinces'] = '';
			}
			$data['search_lang'] = $this->input->post('lang');
			$data['search_sell'] = $this->input->post('vente');
			$data['user_id'] = $this->current_user->id;

			if($data['id'] > 0){
				$this->Subscribers_m->update($data);
			}else{
				$this->Subscribers_m->insert($data);
			}
		}

		
		$subscribers = $this->Subscribers_m->get(array('user_id' => $this->current_user->id));
		
		$this->data['subscribers'] = array();
		$cpt = 0;
		foreach($subscribers as $key => $subscriber){
			$provinces = json_decode($subscriber->search_provinces);
			if(!$provinces) $provinces = array();
			
			if(!$subscriber->search_price_min) $subscriber->search_price_min = '';
			else $subscriber->search_price_min = $subscriber->search_price_min;
			if(!$subscriber->search_price_max) $subscriber->search_price_max = '';
			else $subscriber->search_price_max = $subscriber->search_price_max;

			$this->data['subscribers'][] = array(
				'id' => $subscriber->id,
				'price_min' => $subscriber->search_price_min,
				'price_max' => $subscriber->search_price_max,
				'zipcode' => $subscriber->search_zipcodes,
				'province' => $provinces,
				'lang' => $subscriber->search_lang,
				'vente' => $subscriber->search_sell,
				'frequency' => $subscriber->frequency,
				'active' => $subscriber->active
			);
			$cpt++;
		}
		while($cpt<$this->number_of_block_search){
			$this->data['subscribers'][] = array(
				'id' => $cpt-$this->number_of_block_search,
				'price_min' => '',
				'price_max' => '',
				'zipcode' => '',
				'province' => array(),
				'lang' => 'FR/NL',
				'vente' => '1',
				'frequency' => 'day',
				'active' => 0
			);
			$cpt++;
		};
		
		$this->load->view('template', $this->data);

	}

	
	

}

