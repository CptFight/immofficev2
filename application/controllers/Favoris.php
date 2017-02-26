<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris extends CI_Controller {

	public function index() {
		$this->load->model(array('Favoris_m','Users_m'));
		$user = $this->Users_m->getCurrentUser();

		$this->data['user_id'] = $user->id;
		$this->data['user'] = $user;
		$this->lang->load('global', $user->lang);
		
		/* Custom Scripts */
		$this->data['custom_scripts'] = array("/assets/custom_scripts/favoris.js");
		$this->data['pagename'] = "favoris";
	
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('favoris/index');
		}else{		
			$this->load->model(array('Favoris_m','Users_m'));
			$user = $this->Users_m->getCurrentUser();
			$this->data['user'] = $user;
			$this->data['user_id'] = $user->id;
			$this->lang->load('global', $user->lang);

			$this->data['pagename'] = "favoris";

			
			if($this->input->post('delete') ){
				$id = $this->input->post('id');
				$this->Favoris_m->deleteFavoris($id);
				redirect('favoris/index');
			}

			if($this->input->post('save') ){
				$favoris = array();
				$favoris['id'] = $this->input->post('id');
				$favoris['tags'] = $this->input->post('tags');
				$favoris['title'] = $this->input->post('title');
				$date_publication = str_replace('/', '-', $this->input->post('date_publication') );
				$favoris['date_publication'] = strtotime( $date_publication );
				$favoris['price'] = $this->input->post('price');
				$favoris['url'] = $this->input->post('url');
				$favoris['web_site'] = $this->input->post('web_site');
				$favoris['adress'] = $this->input->post('adress');
				$favoris['city'] = $this->input->post('city');
				$favoris['zip_code'] = $this->input->post('zip_code');
				$favoris['province'] = $this->input->post('province');
				$favoris['living_space'] = $this->input->post('living_space');
				$favoris['owner_name'] = $this->input->post('owner_name');
				$favoris['tel'] = $this->input->post('tel');
				$favoris['sale'] = $this->input->post('sale');
				$favoris['lang'] = $this->input->post('lang');
				$this->Favoris_m->saveFavoris($favoris);
				redirect('favoris/index');
			}

			$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);

			$this->load->view('template', $this->data);
		}
	}

	//AJAX
	public function getAllAnnoncesDataTable(){
		$this->load->model(array('Favoris_m'));
		
		$return = $this->input->get();
		if(isset($this->input->get('search')['value'])){
			$search = $this->input->get('search')['value'];
		}else{
			$search = false;
		}

		$start = 0;
		$length = 0;
		$user_id = 0;

		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		if($this->input->get('user_id')){
			$user_id = $this->input->get('user_id');
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

		$params = array(
			"id" => false,
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"user_id" => $user_id
		);

		
		$favoris = $this->Favoris_m->get($params);
		$data = array();

		foreach($favoris as $key => $favoris){
			$data[] = array(
				$favoris->title,
				$favoris->zip_code,
				$favoris->price.' €',
				$favoris->web_site,
				date('d/m/Y',$favoris->date_publication),
				'<ul class="list-tables-buttons list-favoris" data-favoris_id="'.$favoris->id.'">
	 				<li class="table-btn-link"><a target="_blank" href="'.$favoris->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-edit"><a href="'.site_url('favoris/edit/?id='.$favoris->id).'"><i class="fa fa-pencil"></i><span>Editer le favoris</span></a></li>
                    <li class="table-btn-rappel"><a href="#" class="add_remember"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
                </ul>',
                $favoris->id,
                "<span class='historic_price'>".$favoris->price."</span>",
                "<span class='historic_publications'>".date('d/m/Y',$favoris->date_publication)."</span>",
                $favoris->adress,
                $favoris->province,
                $favoris->city,
              	$favoris->description,
				"<a href='".$favoris->url."'>".$favoris->url."</a>"
			);
		}

		$return["recordsTotal"] = $this->Favoris_m->countAllDatas();
		$return["recordsFiltered"] = $this->Favoris_m->countDataLastRequest($params);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}

}

