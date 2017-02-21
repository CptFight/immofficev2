<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces extends CI_Controller {

	public function index() {

		$this->load->model(array('Annonces_m','Users_m'));
		$user = $this->Users_m->getCurrentUser();

		if(isset($_GET['lang'])){
			$user->lang = $_GET['lang'];
			$this->Users_m->updateLang($user->id,$user->lang);
		}
		$this->data['user_id'] = $user->id;
		$this->data['user'] = $user;
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
		
		/*if($this->input->post('search') ){
			$this->data['daterange'] = $this->input->post('daterange');
			$this->data['date_min'] = $this->input->post('date-min');
			$this->data['date_max'] = $this->input->post('date-max');
			$this->data['price_min'] = $this->input->post('price-min');
			$this->data['price_max'] = $this->input->post('price-max');
			$this->data['zipcode'] = $this->input->post('zipcode');
			if(is_array($this->input->post('province'))){
				$this->data['province'] = $this->input->post('province');
			}else{
				$this->data['province'] = array();
			}
			$this->data['lang'] = $this->input->post('lang');
			$this->data['vente'] = $this->input->post('vente');
			
			$this->Users_m->saveLastSearch($user->id,$this->data);
		}*/

		/* Custom Scripts */
		$this->data['custom_scripts'] = array("/assets/custom_scripts/annonces.js");
		$this->data['annonces'] = array();// $this->Annonces_m->get(false,1000);
		$this->data['pagename'] = "annonces";
		//$this->data['actual_link'] = site_url('annonces/index');
	
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


		$this->load->model(array('Annonces_m'));
		
		$return = $this->input->get();
		if(isset($this->input->get('search')['value'])){
			$search = $this->input->get('search')['value'];
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
			$order['dir'] = $this->input->get('order')[0]['dir'];
			switch($this->input->get('order')[0]['column']){
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
			"id" => false,
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"criterias" => $criterias
		);

		
		$annonces = $this->Annonces_m->get($params);
	//	echo $this->db->last_query();
		$data = array();

		foreach($annonces as $key => $annonce){
			$data[] = array(
				$annonce->title,
				$annonce->zip_code,
				$annonce->price.' €',
				$annonce->web_site,
				date('d/m/Y',$annonce->date_publication),
				'',
				'<ul class="list-tables-buttons" data-annonce_id="'.$annonce->id.'">
	 				<li><a target="_blank" href="'.$annonce->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li><a href="#" class="add_favoris"><i class="fa fa-heart"></i><span> favoris</span></a></li>
                    <li><a href="#" class="add_remember"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
                </ul>',
                $annonce->id,
                "<span class='historic_price'>".$annonce->price."</span>",
                "<span class='historic_publications'>".date('d/m/Y',$annonce->date_publication)."</span>",
                $annonce->adress,
                $annonce->province,
                $annonce->city,
              	$annonce->description,
				"<a href='".$annonce->url."'>".$annonce->url."</a>"
			);
		}

		$return["recordsTotal"] = $this->Annonces_m->countAllDatas();
		$return["recordsFiltered"] = $this->Annonces_m->countDataLastRequest($params);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}

	

}

