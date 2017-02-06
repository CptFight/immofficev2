<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Annonces extends CI_Controller {

	public function index() {
		/* Database */
		$this->data['plugins_to_load'][] = "/assets/global/scripts/datatable.js";
		$this->data['plugins_to_load'][] = "/assets/global/plugins/datatables/datatables.min.js";
		$this->data['plugins_to_load'][] = "/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js";
		/* Custom Scripts */
		$this->data['customscript'] = "/assets/custom_scripts/Annonces.js";

		$this->load->model(array('Annonces_m','Updates_m'));
		$this->data['annonces'] = array();// $this->Annonces_m->get(false,1000);
		
		$value = $this->Annonces_m->countAllDatas();

		$this->data['last_update'] = $this->Updates_m->getLastUpdateDate();

		//echo "test".count($this->data['Annonces']); die();

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

		$params = array(
			"id" => false,
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order
		);

		$Annonces = $this->Annonces_m->get($params);
		//echo $this->db->last_query();
		$data = array();

		foreach($Annonces as $key => $product){
			$data[] = array(
				$product->title,
				$product->zip_code,
				$product->price.' €',
				$product->web_site,
				date('d/m/Y',$product->date_publication),
				'',
				"<a href='".$product->url."' target='_blank'>Voir l'annonce</a>"
				
			);
		}

		$return["recordsTotal"] = $this->Annonces_m->countAllDatas();
		$return["recordsFiltered"] = $this->Annonces_m->countAllDatasFiltered($params['search']);

		//echo $this->db->last_query();
		$return["data"] = $data;

		echo json_encode($return);
		 
	}
}

