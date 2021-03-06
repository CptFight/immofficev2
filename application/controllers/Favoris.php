<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Favoris extends MY_Controller {

	public function index() {
		/* Custom Scripts */
		$this->load->model(array('Status_m',"Favoris_m"));
		$this->data['status_favoris'] = $this->Status_m->getStatus($this->current_user->agence_id,'favoris');
		#print_r($this->data['status_favoris']);
		#die();
		if($this->input->get('archive')){
			$this->data['archive'] = $this->input->get('archive');
		}else{
			$this->data['archive'] = 0;
		}

		$params = array(
			"id" => false,
			"search" => false,
			"start" => false,
			"length" => false,
			"order" => false,
			"user_id" => $this->current_user->id,
			"archive" => $this->data['archive']
		);

		$favoris = $this->Favoris_m->get($params);
		$zip_codes_list = array();
		foreach($favoris as $key => $favori){
			$zip_codes_list[$favori->zip_code] = $favori->zip_code;
		}
		asort($zip_codes_list);
		
		$this->data['zip_codes'] = array_keys($zip_codes_list);

		if($this->input->post('search') ){
			$zip_code =  $this->input->post('zip_code') ;
			$status_favoris_id = $this->input->post('status_favoris') ;
			$this->data['zip_code_selected'] = $zip_code;
			$this->data['status_favoris_id_selected'] = $status_favoris_id;
		}else{
			$this->data['zip_code_selected'] = false;
			$this->data['status_favoris_id_selected'] = false;
		}


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
		
		$this->data['favoris_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'favoris');
		$this->data['owners_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'owners');
		$this->data['owners'] = $this->Owners_m->getByAgence($this->current_user->agence_id);

		$this->load->view('template', $this->data);
	}


	public function edit(){
		if(!isset($_GET['id']) || $_GET['id'] == ''){
			redirect('favoris/index');
		}else{		

			$this->data['back_path'] = 'favoris/index';
			if(isset($_GET['back_path'])){
				$this->data['back_path'] = $_GET['back_path'];
			}else{
				if($this->input->post('mandataire_user_id') && $this->input->post('mandataire_user_id') != '' && $this->input->post('mandataire_user_id') != $this->current_user->id){
					$this->addMessage($this->lang->line('favoris_send'));
					$this->data['back_path'] = 'favoris/index';
				}else{

					#if(isset($_GET['view']) && $_GET['view'] == "tab4"){
					#	$this->data['back_path'] = 'favoris/edit?id='.$_GET['id'].'&view='.$this->input->post('current_tab');
					#}else{
						$this->data['back_path'] = 'favoris/index';
					#}
					
				}
			}

			if($this->savePost()){
				
				redirect($this->data['back_path'] );
			}		
		}

		$this->data['tab'] = 1;
		if(isset($_GET['view'])){
			switch ($_GET['view']) {
				case 'rappel':
				case 'tab2':
					$this->data['tab'] = 2;
					break;
				case '3':
				case 'tab3':
					$this->data['tab'] = 3;
					break;
				case '4':
				case 'tab4':
					$this->data['tab'] = 4;
					break;
				case '5':
				case 'tab5':
					$this->data['tab'] = 5;
					break;
				case '1':
				case 'tab1':
				default:
					$this->data['tab'] = 1;
					break;
			}
		}

		$this->load->model(array('Favoris_m','Users_m','Remarks_m','Newsletters_templates_m'));
		$this->data['favoris'] = $this->Favoris_m->get($_GET['id']);
		$this->data['remarks'] = $this->Remarks_m->getByFavoris($_GET['id']);
		$this->data['mandataires'] = $this->Users_m->getMandatairesList($this->current_user->agence_id);
		$this->data['favoris_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'favoris');
		$this->data['owners_status'] = $this->Status_m->getStatus($this->current_user->agence_id,'owners');
		$this->data['owners'] = $this->Owners_m->getByAgence($this->current_user->agence_id);
		$this->data['newsletters_templates'] = $this->Newsletters_templates_m->getTemplates($this->current_user->id,$this->current_user->lang);

		if($this->input->get('remark_edit')){
			$this->data['remark_placeholder'] = $this->Remarks_m->get($this->input->get('remark_edit'))->note;
		}else{
			$this->data['remark_placeholder'] = $this->lang->line('placeholder_note');
		}	

		$this->load->view('template', $this->data);
	}

	private function savePost(){
		$this->load->model(array('Favoris_m','Rappels_m','Remarks_m','Status_m','Owners_m'));

		if($this->input->post('delete') ){
			$this->Rappels_m->deleteByFavorisId($id);

			$id = $this->input->post('id');
			$this->Favoris_m->delete($id);

			redirect('favoris/index');
		}

		if($this->input->post('archive') ){
			$id = $this->input->post('id');
			$this->Rappels_m->deleteByFavorisId($id);
			$this->Favoris_m->archive($id,true);
			//redirect('favoris/index');
		}

		if($this->input->post('desarchive') ){
			$id = $this->input->post('id');
			$this->Favoris_m->archive($id,false);
			//redirect('favoris/index');
		}

		if($this->input->post('save') ){
			$favoris = array();
			$favoris['user_id'] = $this->current_user->id;
			if($this->input->post('id')){
				$favoris['id'] = $this->input->post('id');
			}
			$favoris['tags'] = $this->input->post('tags');


			if($this->input->post('new_remark') && $this->input->post('new_remark') != '' && $this->input->post('new_remark') != $this->lang->line('placeholder_note')){
				$remarks = array();
				$remarks['favoris_id'] = $favoris['id'];
				$remarks['created'] = strtotime('now');
				$remarks['note'] = $this->input->post('new_remark');

				if($this->input->get('remark_edit')){
					$remarks['id'] = $this->input->get('remark_edit');
					$this->Remarks_m->update($remarks);
				}else{
					$this->Remarks_m->insert($remarks);
				}
				
			}

			
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
			$favoris['description'] = $this->input->post('description');
			$favoris['note'] = $this->input->post('note');
			$favoris['tel'] = $this->input->post('tel');
			$favoris['owner_name'] = $this->input->post('owner_name_old');

			$favoris['old_publications'] = $this->input->post('old_publications');
			$favoris['old_prices'] = $this->input->post('old_prices');

			


			if($this->input->post('favoris_status') && $this->input->post('favoris_status') > 0){
				$favoris['status_id'] = $this->input->post('favoris_status');
			}

			if($this->input->post('mandataire_user_id') && $this->input->post('mandataire_user_id') != '' && $this->input->post('mandataire_user_id') != $this->current_user->id){
				$favoris['user_id'] = $this->input->post('mandataire_user_id');
			}

			$owner = array();
			$owner['agence_id'] = $this->current_user->agence_id;
			$owner['status_id'] = $this->input->post('owner_status');
			$owner['name'] = $this->input->post('owner_name');
			$owner['tel'] = $this->input->post('owner_tel');
			$owner['email'] = $this->input->post('owner_mail');
			$owner['note'] = $this->input->post('note_owner');

			if(!$this->input->post('owner_id') || $this->input->post('owner_id') == 0){
				$favoris['owner_id'] = $this->Owners_m->insert($owner);
			}else{
				$owner['id'] = $this->input->post('owner_id');
				$favoris['owner_id'] = $owner['id'];
				$this->Owners_m->update($owner);
			}
			
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
				}else{
					$this->addError($this->lang->line('update_error'));
				}
			}

			if($this->input->post('rappel_date_rappel') != '' || $this->input->post('rappel_date_rappel_mobile_date') != ''){
				$rappel = array();
				if($this->input->post('rappel_id')){
					$rappel['id'] = $this->input->post('rappel_id');
				}else{
					$rappel['id'] = false;
				}
				
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
	public function removeRemark(){
		$this->load->model(array('Remarks_m'));
		
		if($this->input->post('id')){
			$this->Remarks_m->delete($this->input->post('id'));
		}
		echo json_encode($this->input->post('id'));
	}


	public function getAllAnnoncesDataTable(){
		$this->load->model(array('Favoris_m','Users_m'));
		
		$return = $this->input->get();
		$search = $this->input->get('search');
		if(isset($search['value'])){
			$search = $search['value'];
		}else{
			$search = false;
		}

		$start = 0;
		$length = 0;
		$user_id = 0;
		$archive = 0;
		$status_favoris_id = false;
		$zip_code = false;
		if($this->input->get('start')){
			$start = $this->input->get('start');
		}

		if($this->input->get('length')){
			$length = $this->input->get('length');
		}

		if($this->input->get('user_id')){
			$user_id = $this->input->get('user_id');
		}

		if($this->input->get('archive')){
			$archive = $this->input->get('archive');
		}

		if($this->input->get('zip_code')){
			$zip_code = $this->input->get('zip_code');
		}

		if($this->input->get('status_favoris_id')){
			$status_favoris_id = $this->input->get('status_favoris_id');
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
					$order['column'] = 'status_name';
					break;
				case 4:
					$order['column'] = 'date_publication';
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
			"user_id" => $user_id,
			"archive" => $archive,
			"zip_code" => $zip_code,
			"status_favoris_id" => $status_favoris_id
		);

		
		$favoris = $this->Favoris_m->get($params);
		$data = array();

		foreach($favoris as $key => $favoris){
			$results = $this->Users_m->getOtherOwnerAnnonce($this->current_user->id, $this->current_user->agence_id, $favoris->annonce_id);
			$agence_users_who_have_this_favoris = array();
			foreach($results as $key => $result){
				$agence_users_who_have_this_favoris[] = $result->name." ".$result->firstname;
			}
			//$agence_users_who_have_this_favoris = array('Test','azdazd');
			$data[] = array(
				$favoris->title,
				$favoris->zip_code,
				number_format($favoris->price, 0, ',', ' ').' €',
				"<div class='statusflag' style='color:".$favoris->status_color."'><i class='fa fa-flag'></i> ".$favoris->status_name."</div>",
				date('d/m/Y',$favoris->date_publication),
				'<ul class="list-tables-buttons list-favoris" data-favoris_id="'.$favoris->id.'">
	 				<li class="table-btn-link"><a target="_blank" href="'.$favoris->url.'"><i class="fa fa-external-link"></i><span>Voir le site</span></a></li>
                    <li class="table-btn-edit"><a href="'.site_url('favoris/edit/?id='.$favoris->id).'"><i class="fa fa-pencil"></i><span>Editer le favoris</span></a></li>
                    <li class="table-btn-rappel"><a href="#" class="add_rappel"><i class="fa fa-phone"></i><span>Ajouter aux rappels</span></a></li>
                </ul>',
                implode($agence_users_who_have_this_favoris,', '),
                $favoris->note,
                $favoris->annonce_id,
                $favoris->id,
				$favoris->web_site,
                "<span class='historic_price'>".number_format($favoris->price, 0, ',', ' ')."</span>",
                "<span class='historic_publications'>".date('d/m/Y',$favoris->date_publication)."</span>",
                $favoris->adress,
                $favoris->province,
                $favoris->city,
                $favoris->owner_name,
                $favoris->owner_email,
                $favoris->owner_tel,
                $favoris->owner_note,
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

