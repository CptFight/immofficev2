<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris extends MY_Controller {

	public function index() {
		/* Custom Scripts */
		$this->load->view('template', $this->data);
	}

	public function edit(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('favoris/index');
		}else{		
			$this->load->model(array('Favoris_m'));
			
			
			if($this->input->post('delete') ){
				$id = $this->input->post('id');
				$this->Favoris_m->delete($id);
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
				$favoris['description'] = $this->input->post('description');
				$favoris['note'] = $this->input->post('note');
				$favoris['tel'] = $this->input->post('tel');
				$favoris['sale'] = $this->input->post('sale');
				$favoris['lang'] = $this->input->post('lang');

				$error_upload = false;
				
				if(isset($_FILES['picture']['name']) && ($_FILES['picture']['name'] != '')){
					$return = $this->uploadFile('picture');
					if(isset($return['id'])){
						$favoris['upload_id'] = $return['id'];
					}else if(isset($return['error'])){
						$error_upload = true;
						$this->addError($return['error']);
					}
				}

				if(!$error_upload){
					if($this->Favoris_m->update($favoris)){
						$this->addMessage($this->lang->line('update_done'));
					}
					//redirect('favoris/index');
				}
				
			}

			$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);

			$this->load->view('template', $this->data);
		}
	}

	public function edit_full(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('favoris/index');
		}else{		

			$this->data['back_path'] = 'favoris/index';
			if(isset($_GET['back_path'])){
				$this->data['back_path'] = $_GET['back_path'];
			}

			$this->load->model(array('Favoris_m','Rappels_m'));
			
			
			if($this->input->post('delete') ){
				$id = $this->input->post('id');
				$this->Favoris_m->delete($id);
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
				$favoris['description'] = $this->input->post('description');
				$favoris['note'] = $this->input->post('note');
				$favoris['tel'] = $this->input->post('tel');
				$favoris['sale'] = $this->input->post('sale');
				$favoris['lang'] = $this->input->post('lang');

				$error_upload = false;
				if(isset($_FILES['picture']['name']) && ($_FILES['picture']['name'] != '')){
					$return = $this->uploadFile('picture');
					if(isset($return['id'])){
						$favoris['upload_id'] = $return['id'];
					}else if(isset($return['error'])){
						$error_upload = true;
						$this->addError($return['error']);
					}
				}

				if(!$error_upload){
					if($this->Favoris_m->update($favoris)){
						$this->addMessage($this->lang->line('update_done'));
					}
					//redirect('favoris/index');
				}

				if($this->input->post('rappel_date_rappel') != ''){
					$rappel = array();
					$rappel['id'] = $this->input->post('rappel_id');
					$rappel['user_id'] = $this->current_user->id;
					$rappel['favoris_id'] = $this->input->post('id');
					$rappel['tags'] = $this->input->post('rappel_tags');

					$date_rappel = str_replace('/', '-', $this->input->post('rappel_date_rappel') );
					$rappel['date_rappel'] = strtotime( $date_rappel );

					if(!$rappel['id']){
						unset($rappel['id']);
						$this->Rappels_m->insert($rappel);
					}else{
						$this->Rappels_m->update($rappel);
					}
				}else{
					if($this->input->post('rappel_id')){
						$this->Rappels_m->delete($this->input->post('rappel_id'));
					}
				}
				
				
				
				redirect($this->data['back_path'] );
			}

			$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);

			$this->load->view('template', $this->data);
		}
	}

	public function news(){
		$this->load->model(array('Favoris_m'));

		if($this->input->post('save') ){

			$favoris = array();
			$favoris['user_id'] = $this->current_user->id;
			//$favoris['annonce_id'] = 0;
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
			$favoris['description'] = $this->input->post('description');
			$favoris['note'] = $this->input->post('note');
			$favoris['tel'] = $this->input->post('tel');
			$favoris['sale'] = $this->input->post('sale');
			$favoris['lang'] = $this->input->post('lang');
			$error_upload = false;
			if(isset($_FILES['picture']['name']) && ($_FILES['picture']['name'] != '')){
				$return = $this->uploadFile('picture');
				if(isset($return['id'])){
					$favoris['upload_id'] = $return['id'];
				}else if(isset($return['error'])){
					$error_upload = true;
					$this->addError($return['error']);
				}
			}

			if(!$error_upload){
				if($this->Favoris_m->insert($favoris)){
					$this->addMessage($this->lang->line('update_done'));
				}
				redirect('favoris/index');
			}
		}

		$this->load->view('template', $this->data);
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
				number_format($favoris->price, 0, ',', ' ').' €',
				$favoris->web_site,
				date('d/m/Y',$favoris->date_publication),
				'<ul class="list-tables-buttons list-favoris" data-favoris_id="'.$favoris->id.'">
	 				<li class="table-btn-link"><a target="_blank" href="'.$favoris->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-edit"><a href="'.site_url('favoris/edit_full/?id='.$favoris->id).'"><i class="fa fa-pencil"></i><span>Editer le favoris</span></a></li>
                    <li class="table-btn-rappel"><a href="#" class="add_rappel"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
                </ul>',
                $favoris->id,
                "<span class='historic_price'>".number_format($favoris->price, 0, ',', ' ')."</span>",
                "<span class='historic_publications'>".date('d/m/Y',$favoris->date_publication)."</span>",
                $favoris->adress,
                $favoris->province,
                $favoris->city,
              	$favoris->description,
				"<a target='_blank' href='".$favoris->url."'>".$favoris->url."</a>",
				"<a target='_blank' href='".$favoris->web_path."'>".$favoris->file_name."</a>"
			);
		}

		$return["recordsTotal"] = $this->Favoris_m->countAllDatas();
		$return["recordsFiltered"] = $this->Favoris_m->countDataLastRequest($params);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	}

}

