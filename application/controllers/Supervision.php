<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Supervision extends MY_Controller {

	public function index() {
		if($this->current_user->role != 'superviser' && $this->current_user->role != 'admin'){
			redirect('annonces/index');
		}

		$this->load->view('template', $this->data);
	}

	public function view(){
		if($this->current_user->role != 'superviser' && $this->current_user->role != 'admin'){
			redirect('annonces/index');
		}

		$this->load->model(array('Users_m','Favoris_m','Rappels_m','Subscribers_m','Visits_m'));

		$user_id = $this->input->get('id');
		
		$this->data['user'] = $this->Users_m->get($user_id); 
		$this->data['favoris_infos'] = $this->Favoris_m->getSupervisionInfos($user_id);
		$this->data['rappels_infos'] = $this->Rappels_m->getSupervisionInfos($user_id);
		$this->data['subscribes'] = $this->Subscribers_m->getSupervisionInfos($user_id);
		$this->data['visits_infos'] = $this->Visits_m->getSupervisionInfos($user_id);

		if(count($this->data['subscribes']) >0) $this->data['subscribers_infos'] = '<i class="fa fa-check green"></i>';
		else $this->data['subscribers_infos'] = '<i class="fa fa-remove red"></i>';


		$this->load->view('template', $this->data);
	}

	public function getAllConnectionDataTable(){
		$this->load->model(array('Connections_m'));

		$return = $this->input->get();
		if(isset($this->input->get('search')['value'])){
			$search = $this->input->get('search')['value'];
		}else{
			$search = false;
		}
		
		if($this->input->get('user_id' )){

			$user_id = $this->input->get('user_id');
		}else{
			$user_id = false;
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
					$order['column'] = 'users.name';
					break;
				case 1:
					$order['column'] = 'connections.timestamp';
					break;
				default:
					break;
			}
		}

		
		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"agence_id" => $this->current_user->agence_id,
			"user_id" => $user_id
		);


		$connexions = $this->Connections_m->getForAgenceSuperviser($params);

		$data = array();

		foreach($connexions as $key => $connexion){
			
			$data[] = array(
				$connexion->name." ".$connexion->firstname,
				date('d/m/Y H:i:s',$connexion->timestamp),
			);
		}
		$return["recordsTotal"] = count($connexions);
		$return["recordsFiltered"] = count($connexions);
		
		$return["data"] = $data;

		echo json_encode($return);


	}

	public function getAllDataTable(){
		$this->load->model(array('Users_m','Favoris_m','Rappels_m','Subscribers_m','Visits_m','Exports_m'));
		
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
					$order['column'] = 'users.name';
					break;
				default:
					$order['column'] = 'users.name';
					break;
			}
		}

		
		$params = array(
			"search" => $search,
			"start" => $start,
			"length" => $length,
			"order" => $order,
			"agence_id" => $this->current_user->agence_id
		);

		
		$users = $this->Users_m->getForAgenceSuperviser($params);
	//	echo $this->db->last_query();
		$data = array();

		foreach($users as $key => $user){
			$favoris_infos = $this->Favoris_m->getSupervisionInfos($user->id);
			$rappels_infos = $this->Rappels_m->getSupervisionInfos($user->id);
			$subscribes = $this->Subscribers_m->getSupervisionInfos($user->id);
			$visits_infos = $this->Visits_m->getSupervisionInfos($user->id);
			$export_infos = $this->Exports_m->getSupervisionInfos($user->id);

			if(count($subscribes) >0) $subscribers_infos = '<i class="fa fa-check green"></i>';
			else $subscribers_infos = '<i class="fa fa-remove red"></i>';

			if($favoris_infos['last_favoris']){
				$last_favoris_date = date('d/m/Y H:i:s',$favoris_infos['last_favoris']->created );
			}else{
				$last_favoris_date = '';
			}

			if($export_infos['last_export']){
				$last_export_date = date('d/m/Y H:i:s',$export_infos['last_export']->created);
			}else{
				$last_export_date = ''; 
			}
			
			$data[] = array(
				$user->name." ".$user->firstname,
				$subscribers_infos,
				'',
				$visits_infos['numbers_visits_since_1_week'],
				$favoris_infos['number_favoris_since_1_week'],
				$rappels_infos['number_rappels_since_1_week'],

				$export_infos['number_exports_since_1_week']['all'],
				$export_infos['number_exports_since_1_week']['mail'],
				$export_infos['number_exports_since_1_week']['csv'],	
				$export_infos['number_exports_since_1_week']['print'],
				$export_infos['number_exports_since_1_week']['pdf'],

				'',
				date('d/m/Y H:i:s',$user->last_connection),
				$visits_infos['numbers_visits'],
				$last_favoris_date,
				$favoris_infos['number_favoris'],
				date('d/m/Y H:i:s',$rappels_infos['last_rappels']),
				$rappels_infos['number_rappels'],
				$last_export_date,
				$export_infos['number_exports']['all'],
				$export_infos['number_exports']['mail'],
				$export_infos['number_exports']['csv'],	
				$export_infos['number_exports']['print'],
				$export_infos['number_exports']['pdf'],


				'<ul class="list-tables-buttons" data-annonce_id="24">
                    <li class="table-btn-rappel"><a href="'.site_url('supervision/view').'/?id='.$user->id.'" ><i class="fa fa-binoculars"></i><span>See More</span></a></li>
                </ul>'
			);
		}
		$return["recordsTotal"] = count($users);
		$return["recordsFiltered"] = count($users);
		
		$return["data"] = $data;

		echo json_encode($return);
		 
	
	}
	

}

