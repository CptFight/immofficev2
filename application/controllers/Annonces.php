<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces extends MY_Controller {

	public function index() {
		if($this->current_user->role_id == 1){
			redirect('subscribers/index');
		}
		$this->load->model(array('Annonces_m'));
		
		//TODO SET USER INFORMATIONS.
		if($this->current_user->search_date == ''){
			$date_min = strtotime('-1 week');
		}else{
			$dates = explode('-',$this->current_user->search_date);
			$date_formated_fr = explode('/',$dates[0]);
			$date_min = $date_formated_fr[1]."/".$date_formated_fr[0]."/".$date_formated_fr[2];
		}
		
		$this->data['date_min'] = strtotime($date_min);//strtotime('-1 week');
		$this->data['date_max'] = '';
		$this->data['daterange'] = $this->current_user->search_date;
		if(!$this->current_user->search_price_min) $this->data['price_min'] = '';
		else $this->data['price_min'] = $this->current_user->search_price_min;
		if(!$this->current_user->search_price_max) $this->data['price_max'] = '';
		else $this->data['price_max'] = $this->current_user->search_price_max;
		$this->data['zipcode'] = $this->current_user->search_zipcodes;
		$provinces = json_decode($this->current_user->search_provinces);
		if(!$provinces) $provinces = array();
		$this->data['province'] = $provinces;
		$this->data['lang'] = $this->current_user->search_lang;
		$this->data['vente'] = $this->current_user->search_sell;
		

		$this->load->view('template', $this->data);

	}

	public function edit(){
		if($this->current_user->role_id != 4){
			redirect('annonces/index');
		}

		$this->load->model(array('Annonces_m','Prices_m'));

		if($this->input->post('delete') ){
			$id = $this->input->post('id');
			if($this->Annonces_m->delete($id)){
				redirect('annonces/index');
			}else{
				$this->addError($this->lang->line('annonce_already_linked'));
			}	
		}

		if($this->input->post('save') ){
			$annonce = array();
			$annonce['id'] = $this->input->post('id');
			$annonce['title'] = $this->input->post('title');
			$annonce['url'] = $this->input->post('url');
			$annonce['web_site'] = $this->input->post('web_site');
			$annonce['adress'] = $this->input->post('adress');
			$annonce['city'] = $this->input->post('city');
			$annonce['zip_code'] = $this->input->post('zip_code');
			$annonce['province'] = $this->input->post('province');
			$annonce['living_space'] = $this->input->post('living_space');
			$annonce['description'] = $this->input->post('description');
			$annonce['lang'] = $this->input->post('lang');
			$annonce['sale'] = $this->input->post('sale');
			$this->Annonces_m->update($annonce);

			$price = array();
			$price['id'] = $this->input->post('last_price_id');
			$price['price'] = $this->input->post('price');
			$this->Prices_m->update($price);
			redirect('annonces/index');
		}

		$this->data['annonce'] = $this->Annonces_m->get($this->input->get('id'));

		$this->load->view('template', $this->data);
	}

	public function getDatas(){
		$annonce_id = false;
		if($this->input->post('annonce_id')){
			$annonce_id = $this->input->post('annonce_id');
		}

		$this->load->model(array('Annonces_prices_m'));
		echo json_encode($this->Annonces_prices_m->get($annonce_id));
	}

	public function getAllAnnonces(){
		$this->load->model(array('Annonces_m'));

		$begin = 0;
		$end = 0;
		if($this->input->post('begin')){
			$begin = $this->input->post('begin');
		}

		if($this->input->post('end')){
			$end = $this->input->post('end');
		}

		echo json_encode($this->Annonces_m->get());
	}

	public function getAllAnnoncesDataTable(){
		$this->load->model(array('Annonces_m','Prices_m','Publications_m'));
		
		$return = $this->input->get();
		$search = $this->input->get('search');
		if(isset($search['value'])){
			$search = $search['value'];
		}else{
			$search = false;
		}

		$start = 0;
		$length = 0;

		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		$order = false;
		if($this->input->get('order')){
			$order = array('column','dir');
			$order_value = $this->input->get('order');
			$order['dir'] = $order_value[0]['dir'];
			switch($order_value[0]['column']){
				case 0:
					$order['column'] = 'title';
					break;
				case 1:
					$order['column'] = 'zip_code';
					break;
				case 2:
					$order['column'] = 'price';
					break;
				case 3:
					$order['column'] = 'web_site';
					break;
				case 4:
					$order['column'] = 'date_publication';
					break;
				case 5:
					$order['column'] = 'title';
					break;
				case 6:
					$order['column'] = 'title';
					break;
				
				default:
					break;
			}
		}

		$criterias = array(
			'date_min' => $this->input->get('date_min'),
			'date_max' => $this->input->get('date_max'),
			'price_min' => $this->input->get('price_min'),
			'price_max' => $this->input->get('price_max'),
			'zipcode' => $this->input->get('zipcode'),
			'province' => $this->input->get('province'),
			'lang' => $this->input->get('lang'),
			'vente' => $this->input->get('vente')
		);

		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"criterias" => $criterias
		);

		$annonces = $this->Annonces_m->get($params);
		//echo $this->db->last_query();
		$data = array();
		
		foreach($annonces as $key => $annonce){

			$results = $this->Users_m->getOtherOwnerAnnonce($this->current_user->id,$this->current_user->agence_id, $annonce->id);
			$agence_users_who_have_this_favoris = array();
			foreach($results as $key => $result){
				$agence_users_who_have_this_favoris[] = $result->name." ".$result->firstname;
			}


			$historic_publications = $this->Publications_m->getHistoricPublications($annonce->id);

			$historic_price = $this->Prices_m->getHistoricPrices($annonce->id);

			$actions = '<ul class="list-tables-buttons" data-annonce_id="'.$annonce->id.'">
	 				<li class="table-btn-link" data-annonce_id="'.$annonce->id.'"><a target="_blank" href="'.$annonce->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-love"><a href="'.site_url('favoris/edit/').'" class="add_favoris"><i class="fa fa-home"></i><span> favoris</span></a></li>
                    <li class="table-btn-rappel"><a href="#" class="add_rappel"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>';
            if($this->current_user->role_id == 4){
            	$actions .= ' <li class="table-btn-edit"><a href="'.site_url('annonces/edit/?id='.$annonce->id).'"><i class="fa fa-pencil"></i><span>Editer annonce</span></a></li>';
            }
            $actions .= '</ul>';

			$data[] = array(
				$annonce->title,
				$annonce->zip_code,
				number_format($annonce->price, 0, ',', ' ').' €',
                $annonce->web_site,
				date('d/m/Y',$annonce->date_publication),
				'<input type="checkbox" class="visited" />',
				$actions,
				implode($agence_users_who_have_this_favoris,', '),
                $annonce->id,
                "<span class='historic_price old'>".$historic_price."</span> ".number_format($annonce->price, 0, ',', ' ').' €',
                "<span class='historic_publications old'>".$historic_publications."</span> ".date('d/m/Y',$annonce->date_publication),
                $annonce->adress,
                $annonce->province,
              	$annonce->description,
				"<a class='table-btn-link' data-annonce_id='".$annonce->id."' target='_blank' href='".$annonce->url."'>".$annonce->url."</a>"
			);
		}

		$return["recordsTotal"] = $this->Annonces_m->countAllDatas();
		$return["recordsFiltered"] = $this->Annonces_m->countDataLastRequest($params);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}

	
	

}

