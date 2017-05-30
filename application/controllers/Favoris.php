<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris extends MY_Controller {

	public function index() {
		/* Custom Scripts */
		$this->load->view('template', $this->data);
	}

	public function news(){
		$this->load->model(array('Favoris_m'));
		if($this->savePost()){
			redirect('favoris/index');
		}

		$this->load->model(array('Users_m'));
		$this->data['mandataires'] = $this->Users_m->getMandatairesList($this->current_user->agence_id);	
		$this->data['tab'] = 1;
		
		$this->load->view('template', $this->data);
	}


	public function edit(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('favoris/index');
		}else{		

			$this->data['back_path'] = 'favoris/index';
			if(isset($_GET['back_path'])){
				$this->data['back_path'] = $_GET['back_path'];
			}

			if($this->savePost()){
				redirect($this->data['back_path'] );
			}		
		}

		$this->data['tab'] = 1;
		if(isset($_GET['view'])){
			switch ($_GET['view']) {
				case 'rappel':
					$this->data['tab'] = 2;
					break;
				default:
					$this->data['tab'] = 1;
					break;
			}
		}

		$this->load->model(array('Favoris_m','Users_m'));
		$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);
		
		$this->data['mandataires'] = $this->Users_m->getMandatairesList($this->current_user->agence_id);

		$this->load->view('template', $this->data);
	}

	private function savePost(){
		$this->load->model(array('Favoris_m','Rappels_m'));

		if($this->input->post('delete') ){
			$id = $this->input->post('id');
			$this->Favoris_m->delete($id);
			
			$this->Rappels_m->deleteByUserFavorisIds($this->current_user->id,$id);
			return true;
			//redirect('favoris/index');
		}

		if($this->input->post('save') ){
			$favoris = array();
			$favoris['user_id'] = $this->current_user->id;
			if($this->input->post('id')){
				$favoris['id'] = $this->input->post('id');
			}
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

			$favoris['mandataire_user_id'] = $this->input->post('mandataire_user_id');
			/*$favoris['sale'] = $this->input->post('sale');
			$favoris['lang'] = $this->input->post('lang');*/
			
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
				if(isset($favoris['id']) && $favoris['id']) {
					$return = $this->Favoris_m->update($favoris);
				}else{
					$return = $this->Favoris_m->insert($favoris);
				}
				if($return){
					$this->addMessage($this->lang->line('update_done'));
				}
				//redirect('favoris/index');
			}

			if($this->input->post('rappel_date_rappel') != '' || $this->input->post('rappel_date_rappel_mobile_date') != ''){
				$rappel = array();
				if($this->input->post('rappel_id')){
					$rappel['id'] = $this->input->post('rappel_id');
				}else{
					$rappel['id'] = false;
				}
				$rappel['user_id'] = $this->current_user->id;
				if($this->input->post('id')){
					$rappel['favoris_id'] = $this->input->post('id');
				}else{
					$rappel['favoris_id'] = $return;
				}
				
				$rappel['tags'] = $this->input->post('rappel_tags');
				$rappel['note'] = $this->input->post('rappel_note');

				if($this->input->post('rappel_date_rappel') != ''){
					$date_rappel = str_replace('/', '-', $this->input->post('rappel_date_rappel') );
				}
				if($this->input->post('rappel_date_rappel_mobile_date') != ''){
					$date_rappel = $this->input->post('rappel_date_rappel_mobile_date')." ".$this->input->post('rappel_date_rappel_mobile_time');
				}

				$rappel['date_rappel'] = strtotime( $date_rappel );

				
				if(!$rappel['id']){
					unset($rappel['id']);
					$rappel['created'] = strtotime('now');
					$this->Rappels_m->insert($rappel);
				}else{
					$this->Rappels_m->update($rappel);
				}
			}else{
				if($this->input->post('rappel_id')){
					$this->Rappels_m->delete($this->input->post('rappel_id'));
				}
			}

			if($error_upload) return false;
			else 
				return true;		
		}
		return false;
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
				"<div class='statusflag' style='color:#179d82'><i class='fa fa-flag'></i> Status</div>",
				date('d/m/Y',$favoris->date_publication),
				'<ul class="list-tables-buttons list-favoris" data-favoris_id="'.$favoris->id.'">
	 				<li class="table-btn-link"><a target="_blank" href="'.$favoris->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-edit"><a href="'.site_url('favoris/edit/?id='.$favoris->id).'"><i class="fa fa-pencil"></i><span>Editer le favoris</span></a></li>
                    <li class="table-btn-rappel"><a href="#" class="add_rappel"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
                </ul>',
                $favoris->note,
                $favoris->id,
				$favoris->web_site,
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

