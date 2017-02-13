<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris extends CI_Controller {

	public function index() {
		$this->load->model(array('Favoris_m','Users_m'));
		$user = $this->Users_m->getCurrentUser();

		$this->data['user_id'] = $user->id;
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
			$this->load->model(array('Favoris_m','Updates_m','Users_m'));
			$user = $this->Users_m->getCurrentUser();

			$this->data['user_id'] = $user->id;
			$this->lang->load('global', $user->lang);

			$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);

			$this->load->view('template', $this->data);
		}
	}

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

		$params = array(
			"id" => false,
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order
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
				'',
				'<ul class="list-tables-buttons" data-favoris_id="'.$favoris->id.'">
	 				<li><a target="_blank" href="'.$favoris->url.'"><i class="fa fa-link"></i><span>Voir le site</span></a></li>
                    <li><a href="'.site_url('favoris/edit/?id='.$favoris->id).'">Editer le favoris</a></li>
                    <li><a href="#" class="add_remember"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
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

